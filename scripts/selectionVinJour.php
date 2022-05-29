<?php

include __DIR__ . '/../config/fonctions.php';
include __DIR__ . '/../config/connexion.php';

$verifVinsJour = selectDB('id, vin_jour', 'vins', 'vin_jour = 1 ORDER BY id ASC', $db, '1');

$compteur = ($verifVinsJour['id']) + 1;
$update = $db->query('UPDATE `vins` SET `vin_jour` = `vin_jour` + 1 WHERE id = ' . $compteur);
