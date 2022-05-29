<?php

session_start();

// Connexion FTP

$ftp_host		= "xxx";
$ftp_user		= "xxx";
$ftp_pass		= "xxx";


// Connexion DB

$DB_host		= "mysql.love-and-heart.fr";
$DB_name		= "nosvinsdumonde";
$DB_user		= "nosvinsdumonde";
$DB_pass		= "@Zyfnnake72";
$DB_port		= "4226";
$DB_encode		= "set names utf8";

try {

	$db = new PDO("mysql:host=" . $DB_host . ";dbname=" . $DB_name . ";port=" . $DB_port, $DB_user, $DB_pass);
	$db->exec($DB_encode);

	// Configuration du site
	$config = getConfig($db);
} catch (Exception $e) {

	echo 'Echec de la connexion à la base de données : ' . $e->getMessage();
}
