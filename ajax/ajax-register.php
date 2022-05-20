<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include '../config/config.php';
include "../assets/langs/" . $_POST['lang'] . ".php";

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

function generateCode($limit)
{
    $code = '';
    for ($i = 0; $i < $limit; $i++) {
        $code .= mt_rand(0, 9);
    }
    return $code;
}

$final;

if (isset($_POST)) {

    $email = $_POST['email'];

    $login = selectDB('*', 'users', 'email = "' . $email . '"', $db, '1');

    if (empty($login)) {

        $options = [
            'cost' => 12,
        ];

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

        if (!empty($_POST['carte']) && $_POST['carte'] == "1") {
            $carte = generateCode(12);
        } else {
            $carte = '0';
        }

        $user_profil_image = substr($_POST['nom'], 0, 1) . '.jpg';

        $insert = $db->query('INSERT INTO `users`(
            `type_id`, 
            `societe`,
            `civilite`, 
            `nom`, 
            `prenom`, 
            `email`, 
            `password`, 
            `phone`, 
            `adresse`, 
            `code_postal`, 
            `ville`, 
            `pays`, 
            `carte`, 
            `numero_carte`, 
            `user_profil_image`,
            `created_at`) 
            VALUES (
            ' . $_POST['societe'] . ',
            "' . $_POST['societeName'] . '",
            ' . $_POST['civilite'] . ',
            "' . $_POST['nom'] . '",
            "' . $_POST['prenom'] . '",
            "' . $_POST['email'] . '",
            "' . $password . '",
            ' . $_POST['phone'] . ',
            "' . $_POST['adresse'] . '",
            "' . $_POST['code_postal'] . '",
            "' . $_POST['ville'] . '",
            "' . $_POST['pays'] . '",
            "' . $_POST['carte'] . '",
            "' . $carte . '",
            "' . strtolower($user_profil_image) . '",
            "' . date('Y-m-d H:i:s') . '")');

        $pay = selectDB('*', 'pays', 'id = ' . $_POST['pays'], $db, '1');
        $societe = selectDB('*', 'users_type', 'id = ' . $_POST['societe'], $db, '1');
        $civilite = selectDB('*', 'users_civilite', 'id = ' . $_POST['civilite'], $db, '1');

        // Client
        $from = 'contact@nosvinsdumonde.fr';
        $from_name = 'Nosvinsdumonde';
        $to = $_POST['email'];
        $to_name = ucfirst($_POST['prenom']) . ' ' . ucfirst($_POST['nom']);
        $reply       = "no-reply@nosvinsdumonde.fr";
        $reply_name     = 'Nosvinsdumonde';

        $sujet = constant('MAIL_REGISTER_SUBJECT');

        $content = constant('HELLO') . ' ' . ucwords(strtolower($_POST['prenom'])) . ' ' . ucwords(strtolower($_POST['nom'])) . ', <br /><br />';

        $content .= constant('RETROUVEZ') . ' : <br/><br/>';

        if (!empty($_POST['societe']) && $_POST['societe'] != "") $content .= constant('TYPE_COMPTE_SOCIETE') . ' : <b>' . $_POST['societeName'] . '</b><br />';
        $content .= constant('TYPE_COMPTE_MAIL') . ' : <b>' . constant($societe['nom']) . '</b><br />';
        $content .= constant('CIVILITE_MAIL') . ' : <b>' . constant($civilite['nom']) . '</b><br />';
        $content .= constant('EMAIL_MAIL') . ' : <b>' . $_POST['email'] . '</b><br />';
        $content .= constant('ADRESSE_MAIL') . ' : <b>' . $_POST['adresse'] . '</b><br />';
        $content .= constant('POSTAL_MAIL') . ' : <b>' . $_POST['code_postal'] . '</b><br />';
        $content .= constant('VILLE_MAIL') . ' : <b>' . $_POST['ville'] . '</b><br />';
        if ($_POST['lang'] == "fr") $content .= constant('PAYS_MAIL') . ' : <b>' . $pay['nom_fr_fr'] . '</b><br />';
        if ($_POST['lang'] == "en") $content .= constant('PAYS_MAIL') . ' : <b>' . $pay['nom_en_gb'] . '</b><br />';
        $content .= constant('TELEPHONE_MAIL') . ' : <b>' . $_POST['phone'] . '</b><br />';

        if (!empty($_POST['carte']) && $_POST['carte'] == "1") {
            $content .= constant('CARTE_MAIL') . ' : <b>' . $carte . '</b><br />';
        }

        $content .= '<br />' . constant('QUESTION_MAIL') . '<br/><br/>';

        $content .= constant('CONFIANCE') . '<br/><br/>';

        $content .= '<img style="width: 30px;" width="30" src="https://nosvinsdumonde.com/assets/img/logo.png"/><br/><br/>';

        $content .= '<a href="https://nosvinsdumonde.com/' . $_POST['lang'] . '/">Nosvinsdumonde.com</a>';

        sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $sujet, $content, $config, false);

        $final = ['register' => true, 'message' => constant('MESSAGE_REGISTER_1'), 'message2' => constant('MESSAGE_REGISTER_1_1'), 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 40px;"></i>'];
    } else {
        $final = ['register' => false, 'message' => constant('MESSAGE_REGISTER_2'), 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
    }
} else {
    $final = ['register' => false, 'message' => constant('MESSAGE_REGISTER_3'), 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
