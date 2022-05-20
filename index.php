<?php

include 'config/fonctions.php';
include 'config/connexion.php';
include 'config/config.php';
include "assets/langs/" . $language . ".php";

// Vérification si c'est un vin ou un champagne
if (!empty($_GET['page']) && $_GET['page'] == 'vins' && !empty($_GET['id'])) {
	$vinVerif = selectDB('id', 'vins', 'boisson_id = 1 AND id = ' . $_GET['id'], $db, '1');
}

if (!empty($_GET['page']) && $_GET['page'] == 'champagnes' && !empty($_GET['id'])) {
	$champagneVerif = selectDB('id', 'vins', 'boisson_id = 2 AND id = ' . $_GET['id'], $db, '1');
}

if (!empty($_GET['page']) && $_GET['page'] == 'forgot-password' && empty($_SESSION['user_id']) && !empty($_SESSION['token'])) {
	$tokenForgotVerif = selectDB('token', 'users', 'token = "' . $_GET['token'] . '"', $db, '1');
}

if (!empty($_GET['page']) && $_GET['page'] == 'forgot-password' && !empty($_SESSION['user_id'])) {
	header('Location: ../../404');
}

if (!empty($_GET['page']) && $_GET['page'] == 'forgot-password' && empty($_SESSION['token'])) {
	header('Location: ../../404');
}

if (!empty($_GET['page']) && $_GET['page'] == 'forgot-password' && $_SESSION['token'] != $_GET['token']) {
	header('Location: ../../404');
}

if (!empty($_GET['page']) && $_GET['page'] == 'vins' && !empty($_GET['id']) && !$vinVerif) {
	header('Location: ../../404');
}

if (!empty($_GET['page']) && $_GET['page'] == 'champagnes' && !empty($_GET['id']) && !$champagneVerif) {
	header('Location: ../../404');
}

if (!empty($_GET['page']) && $_GET['page'] == 'favoris' && empty($_COOKIE['favoris'])) {
	header('Location: ../../404');
}

if (!empty($_GET['page']) && $_GET['page'] == 'partager' && empty($_GET['share'])) {
	header('Location: ../../404');
}

if (!empty($_GET['page']) && $_GET['page'] == 'panier' && empty($_COOKIE['cart'])) {
	header('Location: ../../');
}

if (!empty($_GET['page']) && $_GET['page'] == 'appellation' && !empty($_GET['appellationId'])) {
	$verifAppellation = selectDB('*', 'appellation', 'id_boisson = ' . $_GET['type'] . ' AND id = ' . $_GET['appellationId'], $db, '1');
}

if (!empty($_GET['page']) && $_GET['page'] == 'region' && !empty($_GET['regionId'])) {
	$verifRegion = selectDB('*', 'regions', 'id_boisson = ' . $_GET['type'] . ' AND id = ' . $_GET['regionId'], $db, '1');
}

// Page qui redirige
if (empty($_GET['page'])) {
	include 'modules/header.php';
	include 'pages/home.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'vins' && empty($_GET['id'])) {
	include 'modules/header.php';
	include 'pages/vins-all.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'vins' && !empty($_GET['id']) && $vinVerif) {
	include 'modules/header.php';
	include 'pages/vins.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'champagnes' && empty($_GET['id'])) {
	include 'modules/header.php';
	include 'pages/champagnes-all.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'champagnes' && !empty($_GET['id']) && $champagneVerif) {
	include 'modules/header.php';
	include 'pages/champagnes.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'favoris') {
	include 'modules/header.php';
	include 'pages/favoris.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'partager' && !empty($_GET['share'])) {
	include 'modules/header.php';
	include 'pages/partager.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'contact') {
	include 'modules/header.php';
	include 'pages/contact.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'contact' && !empty($_GET['suggest'])) {
	include 'modules/header.php';
	include 'pages/contact.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'politique-confidentialite') {
	include 'modules/header.php';
	include 'pages/politique-confidentialite.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'cgv') {
	include 'modules/header.php';
	include 'pages/cgv.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'cgu') {
	include 'modules/header.php';
	include 'pages/cgu.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'faq') {
	include 'modules/header.php';
	include 'pages/faq.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'livraison') {
	include 'modules/header.php';
	include 'pages/livraison.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'programme-privilege') {
	include 'modules/header.php';
	include 'pages/programme-privilege.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'plan-site') {
	include 'modules/header.php';
	include 'pages/plan-site.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'api') {
	include 'modules/header.php';
	include 'pages/api.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'nos-engagements') {
	include 'modules/header.php';
	include 'pages/nos-engagements.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'nos-valeurs') {
	include 'modules/header.php';
	include 'pages/nos-valeurs.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'nos-services') {
	include 'modules/header.php';
	include 'pages/nos-services.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'qui-sommes-nous') {
	include 'modules/header.php';
	include 'pages/qui-sommes-nous.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'login' && empty($_SESSION['user_id'])) {
	include 'modules/header.php';
	include 'pages/login.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'register' && empty($_SESSION['user_id'])) {
	include 'modules/header.php';
	include 'pages/register.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'forgot-password' && empty($_SESSION['user_id']) && $tokenForgotVerif) {
	include 'modules/header.php';
	include 'pages/forgot-password.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'panier' && !empty($_GET['step'])) {
	include 'modules/header.php';
	include 'pages/panier.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'logout') {
	include 'pages/logout.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'historique-commandes' && !empty($_SESSION['user_id'])) {
	include 'modules/header.php';
	include 'pages/historique-commandes.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'gestion-compte' && !empty($_SESSION['user_id'])) {
	include 'modules/header.php';
	include 'pages/gestion-compte.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'produits') {
	include 'modules/header.php';
	include 'pages/produits.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'appellation' && empty($_GET['id']) && $verifAppellation) {
	include 'modules/header.php';
	include 'pages/appellation.php';
	include 'modules/footer.php';
} else if (!empty($_GET['page']) && $_GET['page'] == 'region' && empty($_GET['id']) && $verifRegion) {
	include 'modules/header.php';
	include 'pages/region.php';
	include 'modules/footer.php';
} else {
	header('Location: ../../404');
}
