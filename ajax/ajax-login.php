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
    $password = $_POST['password'];

    $login = selectDB('*', 'users', 'email = "' . $email . '"', $db, '1');

    if (!empty($login)) {

        if ($login['active'] == 1) {

            if ($email == $login['email']) {

                if (password_verify($password, $login['password'])) {

                    $_SESSION['user_id'] = $login['id'];

                    $update = $db->query('UPDATE `users` SET `last_online` = "' . date('Y-m-d H:i:s') . '" WHERE email = "' . $email . '"');

                    $final = ['login' => true, 'message' => constant('MESSAGE_LOGIN_1'), 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 40px;"></i>'];
                } else {
                    $final = ['login' => false, 'message' => constant('MESSAGE_LOGIN_4'), 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
                }
            } else {
                $final = ['login' => false, 'message' => constant('MESSAGE_LOGIN_4'), 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
            }
        } else {
            $final = ['login' => false, 'message' => constant('MESSAGE_LOGIN_5'), 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
        }
    } else {
        $final = ['login' => false, 'message' => constant('MESSAGE_LOGIN_2'), 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
    }
} else {
    $final = ['login' => false, 'message' => constant('MESSAGE_LOGIN_3'), 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
