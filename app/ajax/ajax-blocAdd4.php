<?php

include '../../config/fonctions.php';
include '../../config/connexion.php';
include '../../config/config.php';

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$final;

if (isset($_POST)) {

    $vin = selectDB('*', 'vins', 'id = "' . $_SESSION['vin_id'] . '" AND user_id = "' . $_SESSION['user_id'] . '"', $db, '1');

    if (!empty($vin)) {

        $update = $db->query('UPDATE `degustations` SET 
        `titre` = "' . stripslashes($_POST['titre_fr']) . '",
        `content` = "' . stripslashes($_POST['content_fr']) . '"
         WHERE lang = "fr" AND vin_id = "' . $_SESSION['vin_id'] . '"');

        $update = $db->query('UPDATE `degustations` SET 
        `titre` = "' . stripslashes($_POST['titre_en']) . '",
         `content` = "' . stripslashes($_POST['content_en']) . '"
          WHERE lang = "en" AND vin_id = "' . $_SESSION['vin_id'] . '"');

         $final = ['user' => true, 'message' => 'Vin ajouter', 'message2' => 'Votre vin a bien été ajouter.', 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 40px;"></i>'];
    }
} else {
    $final = ['user' => false, 'message' => 'Une erreur est survenue !', 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
