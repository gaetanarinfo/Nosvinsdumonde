<?php

include '../../config/fonctions.php';
include '../../config/connexion.php';
include '../../config/config.php';

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$final;

if (isset($_POST)) {

    $login = selectDB('*', 'users', 'id = "' . $_SESSION['user_id'] . '"', $db, '1');

    if (!empty($login)) {

        $update = $db->query('UPDATE `users` SET 
        `civilite` = "' . $_POST['civilite'] . '",
        `nom` = "' . $_POST['nom'] . '",
        `prenom`="' . $_POST['prenom'] . '",
        `phone`="' . $_POST['phone'] . '",
        `adresse`="' . $_POST['adresse'] . '",
        `code_postal`="' . $_POST['code_postal'] . '",
        `ville`="' . $_POST['ville'] . '",
        `pays`="' . $_POST['pays'] . '",
        `updated_at`="' . date('Y-m-d H:i:s') . '" 
         WHERE id = ' . $_SESSION['user_id']);

        $final = ['user' => true, 'message' => 'Modification validée', 'message2' => 'Votre profil a bien été modifié.', 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 40px;"></i>'];
    }
} else {
    $final = ['user' => false, 'message' => 'Une erreur est survenue !', 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
