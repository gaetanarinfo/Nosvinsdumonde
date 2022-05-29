<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include '../config/config.php';

if (!empty($_POST)) {

    $verif_ip = selectDB('*', 'contents_comments', 'ip = "' . $_SERVER['REMOTE_ADDR'] . '" AND id_content = "' . $_POST['content_id'] . '" ORDER BY id DESC', $db, '1');

    if (empty($verif_ip)) {
        $insert = $db->query('INSERT INTO `contents_comments`(
        `id_content`, 
        `nom`, 
        `mail`, 
        `content`, 
        `ip`, 
        `created_at`
        ) VALUES (
        "' . $_POST['content_id'] . '",
        "' . trim($_POST['nom']) . '",
        "' . trim($_POST['mail']) . '",
        "' . trim(addslashes($_POST['contenu'])) . '",
        "' . $_SERVER['REMOTE_ADDR'] . '",
        "' . date('Y-m-d H:i:s') . '"
        )');

        $final = ['success' => true];
    } else {

        $final = ['success' => false];
    }

    echo json_encode($final);
}
