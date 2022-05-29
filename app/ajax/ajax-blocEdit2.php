<?php

include '../../config/fonctions.php';
include '../../config/connexion.php';
include '../../config/config.php';

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$final = '';

if (isset($_POST)) {

    $vin = selectDB('*', 'vins', 'id = "' . $_POST['vin_id'] . '" AND user_id = "' . $_SESSION['user_id'] . '"', $db, '1');

    if (!empty($vin)) {

        $update = $db->query('UPDATE `vins` SET 
        `niveau_garde` = "' . $_POST['garde'] . '",
        `service_temperature`="' . $_POST['service_temperature'] . '",
        `cepages`="' . $_POST['cepages_active'] . '",
        `alliance_id`="' . $_POST['alliances'] . '",
        `prix`="' . number_format(floatval($_POST['prix']), 2, '.', '') . '",
        `soit`="' . number_format(floatval($_POST['soit']), 2, '.', '') . '" WHERE user_id = ' . $_SESSION['user_id'] . ' AND id = "' . $_POST['vin_id'] . '"');

        if ($_POST['cepages_active'] == 1) {

            $update = $db->query('UPDATE `cepages` SET 
        `content` = "' . $_POST['cepages'] . '",
        `niveau` = "' . $_POST['niveau_cepage'] . '",
        `chart_content`="' . $_POST['chart_content'] . '",
        `chart_number`="' . $_POST['chart_number'] . '" WHERE vin_id = "' . $_POST['vin_id'] . '"');
        
        }

        $final = ['user' => true, 'message' => 'Modification validée', 'message2' => 'Votre vin a bien été modifié.', 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 40px;"></i>'];
    }
} else {
    $final = ['user' => false, 'message' => 'Une erreur est survenue !', 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
