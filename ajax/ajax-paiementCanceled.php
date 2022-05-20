<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../config/fonctions.php';
include '../config/connexion.php';
include '../config/config.php';
include "../assets/langs/" . $_POST['lang'] . ".php";

if ($_POST['statut_transaction'] == "card_declined" || $_POST['statut_transaction'] == "CANCELED" || $_POST['statut_transaction'] == "ERROR") {

    $status;

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

        case 'ERROR':
            $status = 3;
            break;
    }

    $cart = $_COOKIE['cart'];

    if (!empty($_COOKIE['giftMessage'])) {
        $giftMessage = $_COOKIE['giftMessage'];
    } else {
        $giftMessage = "";
    }

    $insert = $db->query('INSERT INTO `sites_commandes`(`id_status_commande`, `user_id`, `vin_id`, `giftMessage`, `origin`, `total`, `port`, `date_paiement_effectue`, `created_at`) 
    VALUES (
    "' . $status . '",
    "' . $_SESSION['user_id'] . '",
    "' . $cart . '",
    "' . $giftMessage . '",
    "' . $_POST['origin'] . '",
    "' . str_replace(',', '.', $_POST['total']) . '",
    "' . str_replace(',', '.', $_POST['port']) . '",
    NULL,
    "' . date('Y-m-d H:i:s') . '"
    )');

    $lastId = $db->lastInsertId();

    $select = selectDB('*', 'sites_commandes', 'id = "' . $lastId . '"', $db, '1');

    // Client
    $from = 'contact@nosvinsdumonde.fr';
    $from_name = 'Nosvinsdumonde';
    $to = $user['email'];
    $to_name = ucfirst($user['prenom']) . ' ' . ucfirst($user['nom']);
    $reply       = "no-reply@nosvinsdumonde.fr";
    $reply_name     = 'Nosvinsdumonde';

    $sujet = constant('MAIL_PAIEMENT_CANCEL_SUBJECT');

    $content = constant('HELLO') . ' ' . ucwords(strtolower($user['prenom'])) . ' ' . ucwords(strtolower($user['nom'])) . ', <br /><br />';

    $content .= constant('MAIL_PAIEMENT_CANCEL_SUBJECT_2') . '<br/><br/>';

    $content .= constant('MAIL_PAIEMENT_CANCEL_SUBJECT_3') . '<br/><br/>';

    $content .= constant('MAIL_PAIEMENT_CANCEL_SUBJECT_4');

    sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $sujet, $content, $config, false);

}
