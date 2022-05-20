<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include '../config/config.php';
include "../assets/langs/" . $_GET['lang'] . ".php";

$final = '';

if ($user['point'] >= 15) {

    $points = 15;
    $cachback = 5.00;

    $update = $db->query('UPDATE `users` SET `point` = `point` - ' . $points . ', `cashback` = `cashback` + ' . $cachback . ' WHERE id = ' . $_SESSION['user_id']);

    $final = ['success' => true, 'message' => constant('MESSAGE_CONVERT_1'), 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 40px;"></i>'];
} else {
    $final = ['success' => false, 'message' => constant('MESSAGE_CONVERT_2'), 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
