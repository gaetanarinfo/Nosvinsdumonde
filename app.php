<?php

include 'config/fonctions.php';
include 'config/connexion.php';
include 'config/config.php';
include "assets/langs/fr.php";

// Chemin des images
$static_img = 'https://' . $_SERVER['HTTP_HOST'] . '/app/assets/img/';

// Chemin assets/img/
$static_url = 'https://' . $_SERVER['HTTP_HOST'] . '/app/assets/';

if(empty($_SESSION['user_id'])) {
	header('Location: ../../404');
}else{
	$userVerif = selectDB('*', 'users', 'id = ' . $_SESSION['user_id'], $db, '1');
}

if(!empty($_SESSION['user_id']) && $userVerif['type_id'] == 1 && $userVerif['type_id'] == 2) {
	header('Location: ../../404');
}

// Page qui redirige
if (!empty($_GET['langs']) && empty($_GET['page'])) {
	include 'app/modules/header.php';
	include 'app/pages/home.php';
	include 'app/modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == "profil") {
	include 'app/modules/header.php';
	include 'app/pages/profil.php';
	include 'app/modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == "parametres") {
	include 'app/modules/header.php';
	include 'app/pages/parametres.php';
	include 'app/modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == "vins" && empty($_GET['id'])) {
	include 'app/modules/header.php';
	include 'app/pages/vins.php';
	include 'app/modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == "champagnes" && empty($_GET['id'])) {
	include 'app/modules/header.php';
	include 'app/pages/champagnes.php';
	include 'app/modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == "vins" && !empty($_GET['id'])) {
	include 'app/modules/header.php';
	include 'app/pages/vins-id.php';
	include 'app/modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == "champagnes" && !empty($_GET['id'])) {
	include 'app/modules/header.php';
	include 'app/pages/champagnes-id.php';
	include 'app/modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == "ajouter-vin") {
	include 'app/modules/header.php';
	include 'app/pages/ajouter-vin.php';
	include 'app/modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == "ajouter-champagne") {
	include 'app/modules/header.php';
	include 'app/pages/ajouter-champagne.php';
	include 'app/modules/footer.php';
} else {
	header('Location: ../../404');
}
