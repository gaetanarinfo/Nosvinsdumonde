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

        if (!empty($_FILES)) {

            $message = '';
            $extension = [];
            $success = true;
            $valid_extensions = array('png', 'jpg', 'jpeg');
            $attachement = [];
            $attachements = [];
            $fichier = $_FILES;
            $file_name;

            $img = $fichier['file_0']['name'];
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

            // Upload
            if (!in_array($ext, $valid_extensions)) {

                array_push($extension, $ext);
            } else {

                $file_name = $fichier['file_0']['name'];
                array_push($attachement, $_SERVER['DOCUMENT_ROOT'] . '/assets/img/vins/' . $file_name);
                array_push($attachements, 'assets/img/vins/' . $file_name);

                move_uploaded_file($fichier['file_0']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/assets/img/vins/' . $file_name);
            }

            if (!empty($extension)) {

                if (count($extension) > 1) {

                    $message = 'Les extensions suivantes : ' . implode(', ', $extension) . ' ne sont pas prise en charge';
                } else {

                    $message = 'L\'extension suivante : ' . implode('', $extension) . ' n\'est pas prise en charge';
                }
            } else {
                $message = 'Vos fichiers ont bien été uploadé.';
            }

            $final = ['success' => $success, 'message' => $message];

            if ($final['success']) {

                $attachemens = implode(";", $attachements);

                $attachemens = str_replace('assets/img/vins/', '', $attachemens);

                $insert = $db->query('INSERT INTO `vins_image`(
                        `vin_id`,
                        `value`,
                        `created_at`
                        ) VALUES (
                            "' . $_POST['vin_id'] . '",
                            "' . $attachemens . '",
                            "' . date('Y-m-d H:i:s') . '"
                            )');

                $update = $db->query('UPDATE `vins` SET 
                            `image` = "' . $attachemens . '"
                            WHERE id = "' . $_POST['vin_id'] . '"');
            }
        }

        $final = ['user' => true, 'message' => 'Modification validée', 'message2' => 'Votre vin a bien été modifié.', 'icone' => '<i class="fa-solid fa-circle-check" style="font-size: 40px;"></i>'];
    }
} else {
    $final = ['user' => false, 'message' => 'Une erreur est survenue !', 'back' => '<a role="button" class="back">' . constant('BACK') .  '</a>', 'icone' => '<i class="fa-solid fa-triangle-exclamation" style="font-size: 40px;"></i>'];
}

echo json_encode($final);
