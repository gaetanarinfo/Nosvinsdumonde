<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include '../config/config.php';
include "../assets/langs/" . $_POST['lang'] . ".php";

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$final;

if (isset($_POST)) {

    $token = $_SESSION['token'];

    $login = selectDB('*', 'users', 'token = "' . $token . '"', $db, '1');

    if (!empty($token)) {

        $options = [
            'cost' => 12,
        ];

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

        $update = $db->query('UPDATE `users` SET `password` = "' . $password . '" WHERE token = "' . $token . '"');

        $final = ['success' => true, 'message' => constant('MESSAGE_FORGOT_PASSWORD_1'), 'message2' => constant('MESSAGE_REGISTER_1_1'), 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 40px;"></i>'];
   
        $_SESSION['token'] = '';

    } else {
        $final = ['success' => false, 'message' => constant('MESSAGE_FORGOT_PASSWORD_2'), 'message2' => constant('MESSAGE_REGISTER_2_2'), 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
    }
} else {
    $final = ['success' => false, 'message' => constant('MESSAGE_FORGOT_PASSWORD_3'), 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
