<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include '../config/config.php';

if (isset($_GET)) {

    $db->query('INSERT INTO `history_cart`(`vin_id`, `ip`, `page`, `created_at`) VALUES ("' . $_COOKIE['cart'] . '","' . $_SERVER['REMOTE_ADDR'] . '","' . $_GET['page'] . '", "' . date('Y-m-d H:i:s') . '")');
}
