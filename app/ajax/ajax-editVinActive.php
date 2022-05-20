<?php

include '../../config/fonctions.php';
include '../../config/connexion.php';
include '../../config/config.php';

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$final;

if (isset($_POST['delete'])) {
    $update = $db->query('UPDATE `vins` SET `active` = 0 WHERE id = ' . $_POST['vinId']);
    $final = ['vin' => true, 'message' => '', 'icone' => '<i class="fa-solid fa-circle-check"></i>'];
}

if (isset($_POST['view'])) {
    $update = $db->query('UPDATE `vins` SET `active` = 1 WHERE id = ' . $_POST['vinId']);
    $final = ['vin' => true, 'message' => '', 'icone' => '<i class="fa-solid fa-circle-check"></i>'];
}

echo json_encode($final);
