<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include '../config/config.php';
include "../assets/langs/" . $_POST['lang'] . ".php";

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$final;

if (isset($_POST)) {

    $email = $_POST['email'];

    $login = selectDB('*', 'users', 'email = "' . $email . '"', $db, '1');

    if (!empty($login)) {

        if ($email == $login['email']) {

            $_SESSION['token'] = uniqid();

            $token = $_SESSION['token'];

            $update = $db->query('UPDATE `users` SET `token` = "' . $token . '" WHERE email = "' . $_POST['email'] . '"');

            // Client
            $from = 'contact@nosvinsdumonde.fr';
            $from_name = 'Nosvinsdumonde';
            $to = $login['email'];
            $to_name = ucfirst($login['prenom']) . ' ' . ucfirst($login['nom']);
            $reply       = "no-reply@nosvinsdumonde.fr";
            $reply_name     = 'Nosvinsdumonde';

            $sujet = constant('MAIL_FORGOT_SUBJECT');

            $content = constant('HELLO') . ' ' . ucwords(strtolower($login['prenom'])) . ' ' . ucwords(strtolower($login['nom'])) . ', <br /><br />';

            $content .= constant('MAIL_FORGOT_1') . ' ' . date('d/m/Y à H:i:s') . '<br/><br/>';

            $content .= '<a href="https://nosvinsdumonde.com/' . $_POST['lang'] . '/forgot-password/' . $token . '">' . constant('CLIQUE_ICI') . '</a><br/><br/>';

            $content .= constant('ORIGINE_FORGOT') . '<br/><br/>';

            $content .= constant('QUESTION_MAIL') . '<br/><br/>';

            $content .= constant('CONFIANCE') . '<br/><br/>';

            $content .= '<img style="width: 30px;" width="30" src="https://nosvinsdumonde.com/assets/img/logo.png"/><br/><br/>';

            $content .= '<a href="https://nosvinsdumonde.com/' . $_POST['lang'] . '/">Nosvinsdumonde.com</a>';

            sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $sujet, $content, $config, false);

            $final = ['success' => true, 'message' => constant('MESSAGE_FORGOT_1'), 'icone' => '<i class="fa-solid fa-circle-check"></i>'];
        } else {
            $final = ['success' => false, 'message' => constant('MESSAGE_FORGOT_2'), 'icone' => '<i class="fa-solid fa-triangle-exclamation"></i>'];
        }
    } else {
        $final = ['success' => false, 'message' => constant('MESSAGE_FORGOT_2'), 'icone' => '<i class="fa-solid fa-triangle-exclamation"></i>'];
    }
} else {
    $final = ['success' => false, 'message' => constant('MESSAGE_FORGOT_3'), 'icone' => '<i class="fa-solid fa-triangle-exclamation"></i>'];
}

echo json_encode($final);
