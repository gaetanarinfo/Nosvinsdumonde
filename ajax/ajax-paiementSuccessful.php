<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

include '../config/fonctions.php';
include '../config/connexion.php';
include '../config/config.php';
include "../assets/langs/" . $_POST['lang'] . ".php";

if ($_POST['statut_transaction'] == "COMPLETED" || $_POST['statut_transaction'] == "succeeded") {

    $status;

    //Generate a random string.
    $token = openssl_random_pseudo_bytes(16);

    //Convert the binary data into hexadecimal representation.
    $token = bin2hex($token);

    switch ($_POST['statut_transaction']) {
        case 'succeeded':
            $status = 2;
            break;

        case 'COMPLETED':
            $status = 2;
            break;

        case 'CANCELED':
            $status = 3;
            break;
    }

    if (!empty($_COOKIE['giftMessage'])) {
        $giftMessage = $_COOKIE['giftMessage'];
    } else {
        $giftMessage = "";
    }

    $cart = $_COOKIE['cart'];

    $insert = $db->query('INSERT INTO `sites_commandes`(`token`, `id_status_commande`, `transaction_id`, `user_id`, `vin_id`, `giftMessage`, `origin`, `total`, `port`, `date_paiement_effectue`, `created_at`) 
    VALUES (
    "' . $token . '",
    "' . $status . '",
    "' . $_POST['transaction_id'] . '",
    "' . $_SESSION['user_id'] . '",
    "' . $cart . '",
    "' . $giftMessage . '",
    "' . $_POST['origin'] . '",
    "' . $_POST['total'] . '",
    "' . number_format(floatval($_POST['port']), 2, '.', '') . '",
    "' . date('Y-m-d H:i:s') . '",
    "' . date('Y-m-d H:i:s') . '"
    )');

    $lastId = $db->lastInsertId();

    $update = $db->query('UPDATE `users` SET `point` = "' . $_POST['point'] . '" WHERE id = "' . $_SESSION['user_id'] . '"');

    $select = selectDB('*', 'sites_commandes', 'id = "' . $lastId . '"', $db, '1');

    // WEBHOOK
    $uri = "https://chat.googleapis.com/v1/spaces/AAAA5AP-hHM/messages?key=AIzaSyDdI0hCZtE6vySjMm-WEfRq3CPzqKqqsHI&token=FP2-Mu00MP7m2NY7pEoaMYcoRCjU1ZhLIVYUDQ2b8cM%3D";

    $msg = '*Un nouveau paiement a été effectué sur Nosvinsdumonde :*\n\nLe paiement N°' . str_replace("pi_", "", $select['transaction_id'])  . ' est validé.\n\nRécapitulatif de la commande du ' . date('d/m/Y', strtotime($select['date_paiement_effectue'])) . ' à ' . date('H:i', strtotime($select['date_paiement_effectue'])) . '\n\nTotal de la commande ' . number_format($select['total'], 2, ",", "") . ' €';

    $params = '{"text": "' . $msg . '"}';

    $ch = curl_init($uri);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);

    curl_close($ch);

    if(!empty($_COOKIE['cashBackUse'])) $update = $db->query('UPDATE `users` SET `cashback` = 0 WHERE id = ' . $_SESSION['user_id']);

    $pay = selectDB('*', 'pays', 'id = ' . $user['pays'], $db, '1');

    // Client
    $from = 'contact@nosvinsdumonde.fr';
    $from_name = 'Nosvinsdumonde';
    $to = $user['email'];
    $to_name = ucfirst($user['prenom']) . ' ' . ucfirst($user['nom']);
    $reply       = "no-reply@nosvinsdumonde.fr";
    $reply_name     = 'Nosvinsdumonde';

    $sujet = constant('MAIL_PAIEMENT_SUCCESS_SUBJECT');

    $content = constant('HELLO') . ' ' . ucfirst($user['prenom']) . ' ' . ucfirst($user['nom']) . ', <br /><br />';

    $content .= constant('PAIEMENT_NUMERO') . str_replace("pi_", "", $select['transaction_id'])  . ' ' . constant('CONSERVE_MAIL') . '<br/><br/>';

    $content .= constant('ADRESSE_MAIL') . ' : <b>' . $user['adresse'] . '</b><br />';
    $content .= constant('POSTAL_MAIL') . ' : <b>' . $user['code_postal'] . '</b><br />';
    $content .= constant('VILLE_MAIL') . ' : <b>' . $user['ville'] . '</b><br />';
    if ($_POST['lang'] == "fr") $content .= constant('PAYS_MAIL') . ' : <b>' . $pay['nom_fr_fr'] . '</b><br />';
    if ($_POST['lang'] == "en") $content .= constant('PAYS_MAIL') . ' : <b>' . $pay['nom_en_gb'] . '</b><br />';
    $content .= constant('TELEPHONE_MAIL') . ' : <b>' . $user['phone'] . '</b><br />';
    if($giftMessage != "") $content .= constant('MESSAGE_COMMANDE') . $giftMessage . '<br />';

    $content .= '<br />' . constant('RECAP_PAIEMENT_MAIL') . ' ' . date('d/m/Y', strtotime($select['date_paiement_effectue'])) . ' à ' . date('H:i', strtotime($select['date_paiement_effectue'])) . ' :<br/><br/>';

    foreach ($carts as $cart) {
       $content .= '<b>' . $cart['nomBoisson'] . ' - ' . $cart['contenanceBoisson'] . '</b><br/>';
       if($cart['millesimeBoisson'] != "") $content .= $cart['nomBoisson'] . '<br/>';
       $content .= '<b>' . constant('APPELLATION') . ' :</b> ' . $cart['apellationBoisson'] . '<br/>';
       $content .= '<b>' . constant('REGION') . ' :</b> ' . $cart['regionBoisson'] . '<br/>';
       $content .= '<b>' . constant('PRIX') . ' :</b> ' . number_format($cart['prixBoisson'], 2, ",", "") . ' €' . '<br/><br/>';
    }

    if(!empty($_COOKIE['cashBackUse'])) constant('MAIL_SUPP_1') . ' <b>' . number_format($user['cashback'], 2, ",", "") . ' €</b><br />';
    $content .= constant('MAIL_SUPP_2') . ' <b>' . number_format($select['total'], 2, ",", "") . ' € TTC</b><br />';
    $content .= constant('MAIL_SUPP_3') . ' <b>' . number_format($select['port'], 2, ",", "") . ' €</b> <br /><br />';

    if ($select['refund_status'] == 0) $content .= '<a href="https://Nosvinsdumonde.com/' . $_POST['lang'] . '/paiementRefund/' . $select['token'] . '" target="_blank">' . constant('MAIL_ANNULE') . '</a><br /><br />';
    else $content .= '<br/>';

    $content .= constant('MAIL_PAIEMENT_CANCEL_SUBJECT_4');

    sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $sujet, $content, $config, false);

}
