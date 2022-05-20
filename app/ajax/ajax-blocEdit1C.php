<?php

include '../../config/fonctions.php';
include '../../config/connexion.php';
include '../../config/config.php';

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$final;

if (isset($_POST)) {

    $vin = selectDB('*', 'vins', 'id = "' . $_POST['vin_id'] . '" AND user_id = "' . $_SESSION['user_id'] . '"', $db, '1');

    if (!empty($vin)) {

        $update = $db->query('UPDATE `vins` SET 
        `nom` = "' . $_POST['titre'] . '",
        `contenance_id`="' . $_POST['contenance'] . '",
        `millesime`="' . $_POST['millesime'] . '",
        `pays_id`="' . $_POST['pays'] . '",
        `appellation_id`="' . $_POST['apellation'] . '",
        `gout_id`="' . $_POST['gout'] . '",
        `region_id`="' . $_POST['region'] . '",
        `couleur_id`="' . $_POST['couleur'] . '",
        `degree`="' . $_POST['degree'] . '",
        `updated_at`="' . date('Y-m-d H:i:s') . '" 
         WHERE user_id = ' . $_SESSION['user_id'] . ' AND id = "' . $_POST['vin_id'] . '"');

        $final = ['user' => true, 'message' => 'Modification validée', 'message2' => 'Votre vin a bien été modifié.', 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 40px;"></i>'];
    }
} else {
    $final = ['user' => false, 'message' => 'Une erreur est survenue !', 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
