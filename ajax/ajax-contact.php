<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include "../assets/langs/" . $_POST['lang'] . ".php";

$final;

if (!empty($_POST)) {

    $insert = $db->query('INSERT INTO `contacts_history`(
        `societe`, 
        `prenom`, 
        `nom`, 
        `email`, 
        `phone`, 
        `sujet`, 
        `message`) VALUES (
        "' . $_POST['societe'] . '",
        "' . $_POST['prenom'] . '",
        "' . $_POST['nom'] . '",
        "' . $_POST['email'] . '",
        "' . $_POST['phone'] . '",
        ' . $_POST['sujet'] . ',
        "' . addslashes($_POST['message']) . '")
        ');

    $sujet = selectDB('*', 'contacts_types', 'id = ' . $_POST['sujet'], $db, '1');

    $from         = $_POST['email'];
    $from_name     = "Nosvinsdumonde.com";
    $to             = 'contact@nosvinsdumonde.fr';
    $to_name     = ucfirst($_POST['prenom']) . ' ' . ucfirst($_POST['nom']);
    $reply         = $_POST['email'];
    $reply_name     = ucfirst($_POST['prenom']) . ' ' . ucfirst($_POST['nom']);
    $subject     = 'Demande de contact sur Nosvinsdumonde';


    // Message pour moi
    $content = constant('BONJOUR') . ' Gaëtan,<br/><br>';

    $content .= constant('RECAPITULATIF_MAIL') . '<br/><br>';

    if (!empty($_POST['societe'])) $content .= constant('SOCIETE') . ' : ' . $_POST['societe'] . '<br/>';

    $content .= constant('PRENOM') . ' : ' . ucfirst($_POST['prenom']) . '<br/>';

    $content .= constant('NOM') . ' : ' . ucfirst($_POST['nom']) . '<br/>';

    $content .= constant('EMAIL') . ' : ' . $_POST['email'] . '<br/>';

    $content .= constant('SUJET') . ' : ' . constant($sujet['nom']) . '<br/><br/>';

    $content .= constant('MESSAGE') . ' :<br/><br/>' . $_POST['message'] . '<br/><br/>';

    $content .= constant('CONFIANCE') . '<br/><br/>';

    $content .= '<img style="width: 30px;" width="30" src="https://nosvinsdumonde.com/assets/img/logo.png"/><br/><br/>';

    $content .= '<a href="https://nosvinsdumonde.com/' . $_POST['lang'] . '/">Nosvinsdumonde.com</a>';

    sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $subject, $content, $config, false);

    // Message pour l'utilisateur
    $from         = 'contact@nosvinsdumonde.fr';
    $from_name     = "Nosvinsdumonde.com";
    $to             = $_POST['email'];
    $to_name     = ucfirst($_POST['prenom']) . ' ' . ucfirst($_POST['nom']);
    $reply         = 'contact@nosvinsdumonde.fr';
    $reply_name     = 'Nosvinsdumonde';
    $subject     = 'Demande de contact sur Nosvinsdumonde';

    $content = constant('BONJOUR') . ' ' . ucfirst($_POST['prenom']) . ' ' . ucfirst($_POST['nom']) . ',<br/><br/>';

    $content .= constant('RECAPITULATIF_MAIL_2') . '<br/><br>';

    if (!empty($_POST['societe'])) $content .= constant('SOCIETE') . ' : <b>' . $_POST['societe'] . '</b><br/>';

    $content .= constant('PRENOM') . ' : <b>' . ucfirst($_POST['prenom']) . '</b><br/>';

    $content .= constant('NOM') . ' : <b>' . ucfirst($_POST['nom']) . '</b><br/>';

    $content .= constant('EMAIL') . ' : <b>' . $_POST['email'] . '</b><br/>';

    $content .= constant('SUJET') . '  : <b>' . constant($sujet['nom']) . '</b><br/><br/>';

    $content .= constant('MESSAGE') . ' :<b><br/><br/>' . $_POST['message'] . '</b><br/><br/>';

    $content .= constant('CONFIANCE') . '<br/><br/>';

    $content .= '<img style="width: 30px;" width="30" src="https://nosvinsdumonde.com/assets/img/logo.png"/><br/><br/>';

    $content .= '<a href="https://nosvinsdumonde.com/' . $_POST['lang'] . '/">Nosvinsdumonde.com</a>';

    sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $subject, $content, $config, false);

    $final = ['success' => true, 'title' => constant('MESSAGE_TITLE_1'), 'message' => constant('MESSAGE_5'), 'message2' => constant('MESSAGE_6'), 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 40px;"></i>'];
} else {
    $final = ['success' => false, 'title' => constant('MESSAGE_TITLE_2'), 'message' => constant('MESSAGE_5_5'), 'message2' => constant('MESSAGE_6'), 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
