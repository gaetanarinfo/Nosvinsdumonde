<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include "../assets/langs/" . $_POST['lang'] . ".php";

$final;

if (!empty($_POST)) {

    $select = selectDB('id, email', 'avis_vins', 'email = "' . trim($_POST['avis_email']) . '"', $db, '*');

    if (empty($select)) {

        $insert = $db->query('INSERT INTO `avis_vins`(`vin_id`, `note`, `email`, `prenom`, `content`) VALUES (' . $_POST['avis_vins_id'] . ', "' . $_POST['avisFinal'] . '", "' . trim($_POST['avis_email']) . '", "' . trim($_POST['avis_prenom']) . '", "' . addslashes($_POST['avis_content']) . '")');

        $final = ['success' => true, 'message' => constant('MESSAGE_1'), 'icone' => '<i class="fa-solid fa-circle-check"></i>'];
    }else{
        $final = ['success' => false, 'message' => constant('MESSAGE_2'), 'icone' => '<i class="fa-solid fa-triangle-exclamation"></i>'];
    }
} else {
    $final = ['success' => false, 'message' => constant('MESSAGE_2'), 'icone' => '<i class="fa-solid fa-triangle-exclamation"></i>'];
}

echo json_encode($final);
