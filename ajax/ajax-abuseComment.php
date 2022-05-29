<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include "../assets/langs/" . $_POST['lang'] . ".php";

error_reporting(E_ALL);
ini_set("display_errors", 1);

$final = '';

if (!empty($_POST)) {

    $articleMail = selectDB('title, url', 'contents', 'id = ' . $_POST['content_id'], $db, '1');

    $insert = $db->query('INSERT INTO `contents_comments_abuses`(
            `id_content`, 
            `id_comment`, 
            `email`, 
            `titre`, 
            `message`, 
            `ip`, 
            `created_at`
            ) VALUES (
            "' . $_POST['content_id'] . '",
            "' . $_POST['comment_id'] . '",
            "' . trim($_POST['email-comm']) . '",
            "' . trim($_POST['title-comm']) . '",
            "' . trim(addslashes($_POST['message-comm'])) . '",
            "' . $_SERVER['REMOTE_ADDR'] . '",
            "' . date('Y-m-d H:i:s') . '"
            )');

    $from         = $_POST['email-comm'];
    $from_name     = "Nosvinsdumonde.com";
    $to             = 'contact@nosvinsdumonde.fr';
    $to_name     = 'Gaëtan Seigneur';
    $reply         = $_POST['email-comm'];
    $reply_name     = '';
    $subject     = 'Commentaire inapproprié concernant Nosvinsdumonde.';

    // Message pour moi
    $content = constant('BONJOUR') . ' Gaëtan,<br/><br>';

    $content .= 'Un commentaire à été signaler sur Nosvinsdumonde.<br/><br>';

    $content .= 'Titre : ' . ucfirst($_POST['title-comm']) . '<br/>';

    $content .= '<br/>Message : <br/>' . $_POST['message-comm'] . '<br/><br/>';

    $content .= 'Article concernée <a href="https://nosvinsdumonde.com/' . $_POST['lang'] . '/actualite/' . $articleMail['url'] . '">' . $articleMail['title'] . '</a>';

    $content .= '<img style="width: 30px;" width="30" src="https://nosvinsdumonde.com/assets/img/logo.png"/><br/><br/>';

    $content .= '<a href="https://nosvinsdumonde.com/' . $_POST['lang'] . '/">Nosvinsdumonde.com</a>';

    sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $subject, $content, $config, false);

    $final = ['success' => true, 'message' => constant('MESSAGE_ABUSE_1'), 'icone' => '<i class="fa-solid fa-circle-check"></i>'];
} else {

    $final = ['success' => false, 'message' => constant('MESSAGE_ABUSE_2'), 'icone' => '<i class="fa-solid fa-triangle-exclamation"></i>'];
}

echo json_encode($final);
