<?php

include '../../config/fonctions.php';
include '../../config/connexion.php';
include '../../config/config.php';

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$final = '';

if (isset($_POST)) {

    $insert = $db->query('INSERT INTO `vins`(
        `user_id`, 
        `boisson_id`, 
        `nom`, 
        `contenance_id`, 
        `millesime`, 
        `couleur_id`,
        `pays_id`, 
        `region_id`, 
        `appellation_id`, 
        `gout_id`, 
        `degree`, 
        `created_at`) 
        VALUES (
        "' . $_SESSION['user_id'] . '",
        2,
        "' . $_POST['titre'] . '",
        "' . $_POST['contenance'] . '",
        "' . $_POST['millesime'] . '",
        "' . $_POST['couleur'] . '",
        "' . $_POST['pays'] . '",
        "' . $_POST['region'] . '",
        "' . $_POST['apellation'] . '",
        "' . $_POST['gout'] . '",
        "' . $_POST['degree'] . '",
        "' . date('Y-m-d H:i:s') . '"
        )');

    $_SESSION['vin_id'] = $db->lastInsertId();

    $insert = $db->query('INSERT INTO `definitions`(`vin_id`, `lang`) VALUES ("' . $_SESSION['vin_id'] . '", "fr")');
    $insert = $db->query('INSERT INTO `definitions`(`vin_id`, `lang`) VALUES ("' . $_SESSION['vin_id'] . '", "en")');

    $insert = $db->query('INSERT INTO `degustations`(`vin_id`, `lang`) VALUES ("' . $_SESSION['vin_id'] . '", "fr")');
    $insert = $db->query('INSERT INTO `degustations`(`vin_id`, `lang`) VALUES ("' . $_SESSION['vin_id'] . '", "en")');

    $final = ['user' => true, 'message' => 'Vin ajouter', 'message2' => 'Votre vin a bien été ajouter.', 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 40px;"></i>'];
} else {
    $final = ['user' => false, 'message' => 'Une erreur est survenue !', 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
