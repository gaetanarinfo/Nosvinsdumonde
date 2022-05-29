<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include '../config/config.php';

error_reporting(E_ERROR);
ini_set("display_errors", 1);

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

$name = trim($_GET['name']);
$millesime = trim($_GET['name']);
$millesimeResult = '';
$url = trim($_GET['url']);
$description = trim($_GET['description']);
$price = $_GET['price'];
$image = $_GET['images'];
$pays = $_GET['solrCountry'];
$appellationNom = trim($_GET['solrDesignation']);
$appellationId = '';
$regionNom = trim($_GET['solrRegion']);
$regionId = 0;
$contenance = $_GET['solrContainer'];
$contenanceId = 1;
$paysId = '';
$couleurId = 0;
$imageDomaines = '';
$imageFinalDomaine = '';
$allianceArray = '';
$allianceValue = '';
$alliancefinal = '';
$goutArray = '';
$goutValue = '';
$goutfinal = 0;
$gardeValue = '';
$degreeValue = '';
$cepageValue = '';
$cepageValues = '';
$chartLegendValues = '';
$tastingDescriptionValue = '';
$tastingTitreValue = '';
$stockValue = 0;

// On format le titre du vin pour supprimer la date <--- BLOC FINI
for ($i = 2003; $i <= date('Y'); $i++) {
    if (strpos($name, $i) !== false) {
        $name = str_replace($i, '', $name);
    }
}
$nameResult = preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', $name);
// <--- BLOC FIN

// On format le titre du vin pour récuperer la date <--- BLOC FINI
for ($i = 2003; $i <= date('Y'); $i++) {
    if (strpos($millesime, $i) !== false) {
        $millesimeResult = $i;
    }
}
// <--- BLOC FIN

// CURL
function curlUrl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);
    $results = curl_exec($ch);
    curl_close($ch);
    return $results;
}

$return = array();

function returningXPathObject($item)
{
    $html = mb_convert_encoding($item, "HTML-ENTITIES", "UTF-8");
    $xmlPageDom = new DomDocument();
    $xmlPageDom->loadHTML($html);
    $xmlPageXPath = new DOMXPath($xmlPageDom);
    return $xmlPageXPath;
}

// On format les quotes
$sqlName = htmlentities($nameResult);
$sqlNames = htmlentities($nameResult);
$sqlDescription = htmlentities($description);
$contenance = str_replace('Bouteille de ', '', $contenance);
$contenance = str_replace('Bouteille ', '', $contenance);

// On vérifie que le nom n'est pas présent
$select = 'V.nom AS nomBoisson, V.id AS idBoisson';
$table = 'vins AS V';
$where = 'V.boisson_id = 2 AND V.nom COLLATE utf8mb4_0900_ai_ci LIKE "%' . $sqlNames . '%"';
$vins = selectDB($select, $table, $where, $db, '*');

if (!empty($vins)) {

    $returntUrl = curlUrl('https://www.nicolas.com/fr' . $url);
    $RestPageXpath = returningXPathObject($returntUrl);

    // Tasting Description Degustation
    $tastingDescription = $RestPageXpath->query("//div[@class='ns-Oenologist-tastingContent']//p[3]");
    for ($i = 0; $i < $tastingDescription->length; $i++) {
        $a = $tastingDescription->item($i)->nodeValue;
        $return['tastingDescription'][] = trim($a);
        //do something with $src
    }

    // Tasting Titre Degustation
    $tastingTitre = $RestPageXpath->query("//p[@class='ns-Oenologist-tastingTitle']");
    for ($i = 0; $i < $tastingTitre->length; $i++) {
        $a = $tastingTitre->item($i)->nodeValue;
        $return['tastingTitre'][] = trim($a);
        //do something with $src
    }

    // Dégustation Description
    foreach ($return['tastingDescription'] as $value) {
        if (!empty($return['tastingDescription'])) {
            $tastingDescriptionValue = trim($value);
        } else {
            $tastingDescriptionValue = "";
        }
    }

    // Titre Dégustation
    foreach ($return['tastingTitre'] as $value) {
        if (!empty($return['tastingTitre'])) {
            $tastingTitreValue = trim($value);
        } else {
            $tastingTitreValue = "";
        }
    }

    foreach ($vins as $value) {
        $update = $db->query('UPDATE `definitions` SET `content` = "' . $sqlDescription . '" WHERE vin_id = "' . $value['idBoisson'] . '" AND lang = "fr"');
    }

    // $insert = $db->query('INSERT INTO `degustations`(
    // `vin_id`, 
    // `lang`, 
    // `titre`, 
    // `content`
    // ) VALUES (
    // ' . $lastId . ',
    // "fr",
    // "' . $tastingTitreValue . '",
    // "' . $tastingDescriptionValue . '"
    // )');

    // $insert = $db->query('INSERT INTO `degustations`(
    // `vin_id`, 
    // `lang`, 
    // `titre`, 
    // `content`
    // ) VALUES (
    // ' . $lastId . ',
    // "en",
    // "",
    // ""
    // )');
}
