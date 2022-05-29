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
$select = 'V.nom AS nomBoisson';
$table = 'vins AS V';
$where = 'V.nom COLLATE utf8mb4_0900_ai_ci LIKE "%' . $sqlNames . '%"';
$vins = selectDB($select, $table, $where, $db, '*');

if (empty($vins)) {

    $returntUrl = curlUrl('https://www.nicolas.com/fr' . $url);
    $RestPageXpath = returningXPathObject($returntUrl);

    // Appellations
    $appellationArray = selectDB('id', 'appellation', 'id_boisson = 1 AND nom_fr_fr LIKE "' . $appellationNom . '"', $db, '*');
    $appellationName = array_column($appellationArray, 'id');
    array_splice($appellationName, 1);

    if (!empty($appellationName)) $appellationId = $appellationName[0];
    else $appellationId = 0;

    // Regions
    $regionArray = selectDB('id', 'regions', 'id_boisson = 1 AND nom_fr_fr LIKE "' . $regionNom . '"', $db, '*');
    $regionName = array_column($regionArray, 'id');
    array_splice($regionName, 1);

    if (!empty($regionName)) $regionId = $regionName[0];

    $contenanceArray = selectDB('id', 'contenance', 'nom LIKE "' . $contenance . '"', $db, '*');
    $contenanceName = array_column($contenanceArray, 'id');
    array_splice($contenanceName, 1);

    if (!empty($contenanceName)) $contenanceId = $contenanceName[0];
    else $contenanceId = 1;

    $paysArray = selectDB('id', 'pays', 'nom_fr_fr LIKE "' . $pays . '"', $db, '*');
    $paysName = array_column($paysArray, 'id');
    array_splice($paysName, 1);

    if (!empty($paysName)) $paysId = $paysName[0];

    // Récupération via le CURL Couleur
    $couleur = $RestPageXpath->query("//span[@class='ns-Product-cara']//span");
    for ($i = 0; $i < $couleur->length; $i++) {
        $c = $couleur->item($i)->nodeValue;
        $return['couleur'][] = $c;
        //do something with $src
    }

    // Récupération via le CURL Image Domaine
    $imageDomaine = $RestPageXpath->query("//li[@class='ns-DomainName-item ns-DomainName-item--map']");
    for ($i = 0; $i < $imageDomaine->length; $i++) {
        $img = $imageDomaine->item($i);
        $src = $img->getAttribute("style");
        $src = str_replace('background-image:url(\'', '', $src);
        $src = str_replace('\');', '', $src);
        $return['imageDomaine'][] = trim($src);
        //do something with $src
    }

    // Récupération vie le CURL Alliances
    $alliance = $RestPageXpath->query("//ul[@class='ns-AgreementList']//li//span");
    for ($i = 0; $i < $alliance->length; $i++) {
        $a = $alliance->item($i)->nodeValue;
        $return['alliance'][] = trim($a);
        //do something with $src
    }

    // Récupération vie le CURL Gout
    $gout = $RestPageXpath->query("//p[@class='ns-Oenologist-tastingTitle']");
    for ($i = 0; $i < $gout->length; $i++) {
        $a = $gout->item($i)->nodeValue;
        $return['gout'][] = trim($a);
        //do something with $src
    }

    // Récupération vie le CURL Cépages Titre
    $cepageTitre = $RestPageXpath->query("//span[@class='ns-ProductGrappe-value ns-ProductGrappe-value--grape']");
    for ($i = 0; $i < $cepageTitre->length; $i++) {
        $a = $cepageTitre->item($i)->nodeValue;
        $return['cepageTitre'][] = trim($a);
    }

    // Récupération vie le CURL Température de service
    $temperatureService = $RestPageXpath->query("//li[@class='ns-ProductGrappe-item ns-ProductGrappe-item--temperature']//span[@class='ns-ProductGrappe-value']");
    for ($i = 0; $i < $temperatureService->length; $i++) {
        $a = $temperatureService->item($i)->nodeValue;
        $return['temperatureService'][] = trim($a);
        //do something with $src
    }

    // Récupération vie le CURL Garde
    $garde = $RestPageXpath->query("//span[@class='ns-ProductGrappe-value']//span[@class='ns-ProductGrappe-value ns-ProductGrappe-value--level']");
    for ($i = 0; $i < $garde->length; $i++) {
        $a = $garde->item($i)->nodeValue;
        $return['garde'][] = trim($a);
        //do something with $src
    }

    // Récupération vie le CURL degree
    $degree = $RestPageXpath->query("//div[@class='ns-ProductDetails-cara']//span[@class='ns-Product-cara']");
    for ($i = 0; $i < $degree->length; $i++) {
        $a = $degree->item($i)->nodeValue;
        $return['degree'][] = trim($a);
        //do something with $src
    }

    // Chart Legend
    $chartLegend = $RestPageXpath->query("//ul[@class='ns-Chart-legend']//li//span[2]");
    for ($i = 0; $i < $chartLegend->length; $i++) {
        $a = $chartLegend->item($i)->nodeValue;
        $return['chartLegend'][] = trim($a);
        //do something with $src
    }

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

    // Vérification des stocks
    $stock = $RestPageXpath->query("//span[@class='ns-Product-PhraseSoonInStock']");
    for ($i = 0; $i < $stock->length; $i++) {
        $a = $stock->item($i)->nodeValue;
        $return['stock'][] = trim($a);
        //do something with $src
    }

    // Couleur id
    foreach ($return['couleur'] as $value) {
        $couleurArray = selectDB('id', 'couleur', 'nom LIKE "' . $value . '"', $db, '*');
        $couleurName = array_column($couleurArray, 'id');
        array_splice($couleurName, 1);

        if (!empty($couleurName)) $couleurId = $couleurName[0];
        else $couleurId = 0;
    }

    // Domaine image
    foreach ($return['imageDomaine'] as $value) {
        if (!empty($return['imageDomaine'])) $imageDomaines = trim($value);
    }

    // Alliance
    foreach ($return['alliance'] as $value) {
        if (!empty($return['alliance'])) $allianceValue = trim($value);
        else $allianceValue = 0;
    }
    $alliancesArray = selectDB('id, fr', 'alliance', 'fr LIKE "' . $allianceValue . '"', $db, '*');
    $allianceName = array_column($alliancesArray, 'id');
    array_splice($allianceName, 1);
    if (!empty($allianceName)) $allianceFinal = $allianceName[0];
    else $allianceFinal = "0";

    // Gout
    foreach ($return['gout'] as $value) {
        if (!empty($return['gout'])) $goutValue = trim($value);
        else $goutValue = 0;
    }
    $goutsArray = selectDB('id, fr', 'gout', 'fr LIKE "' . $goutValue . '"', $db, '*');
    $goutName = array_column($goutsArray, 'id');
    array_splice($goutName, 1);
    if (!empty($goutName)) $goutFinal = $goutName[0];
    else $goutFinal = 0;

    // Cépages Vérification -- Permet aussi de récupérer tout les cépage $return['cepageTitre']
    if (!empty($return['cepageTitre'])) $cepage_active = 1;
    else $cepage_active = 0;

    // Tempéature service
    if (!empty($return['temperatureService'])) {
        foreach ($return['temperatureService'] as $value) {
            if (!empty($return['temperatureService']) && $value != "°") $temperatureServiceValue = trim(str_replace('°', '', $value));
            else $temperatureServiceValue = rand(0, 10);
        }
    } else {
        $temperatureServiceValue = rand(0, 10);
    }

    // Garde
    foreach ($return['garde'] as $value) {
        if (!empty($return['garde'])) $gardeValue = trim($value);
    }

    // Degree
    foreach ($return['degree'] as $value) {
        if (!empty($return['degree'])) {

            $degreeValue = str_replace('Rosé', '', $value);
            $degreeValue = str_replace('Rouge', '', $degreeValue);
            $degreeValue = str_replace('Blanc', '', $degreeValue);
            $degreeValue = str_replace('|', '', $degreeValue);
            $degreeValue = str_replace('°', '', $degreeValue);
            $degreeValue = preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', $degreeValue);
        }
    }

    // Cépage Description
    foreach ($return['cepageTitre'] as $value) {
        if (!empty($return['cepageTitre'])) $cepageValue = trim(nl2br($value));
        else $cepageValue = "";
    }

    // Cépage Concat ,
    if (!empty($return['cepageTitre'])) $cepageValues = implode(',', $return['cepageTitre']);
    else $cepageValues = "";

    // Cépage Concat Number
    if (!empty($return['chartLegend'])) {
        $chartLegendValues = implode(',', $return['chartLegend']);
        $chartLegendValues = preg_replace('/^\s+|\s+$|\s+(?=\s)/', ',', $chartLegendValues);
        $chartLegendValues = str_replace('%', '', $chartLegendValues);
        $chartLegendValues = str_replace(': ', '', $chartLegendValues . '');
        $chartLegendValues = str_replace('.0', '', $chartLegendValues);
    } else {
        $chartLegendValues = "100";
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

    // Stock 0 Hors Stock / 1 En stock
    if (empty($return['stock'])) {
        $stockValue = 1;
    } else {
        $stockValue = 0;
    }

    // Requête importation BDD <-- Vins
    $prix = floatval($price['value']) + 5;
    $soit = floatval($price['value']) + $prix * 1.196;
    $totalPrix = number_format($prix, 2, '.', '');
    $totalSoit = number_format($soit, 2, '.', '');
    $cepageNumber = rand(1, 5);
    $cepageValue = preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', $cepageValue);
    $cepageValues = preg_replace('/^\s+|\s+$|\s+(?=\s)/', ',', $cepageValues);

    // Insertion de l'image du Vin
    $img = 'https://medias.nicolas.com' . $image[1]['url'];
    $imgs = $image[1]['url'];
    $imgs = str_replace('/media/sys_master/', '', $imgs);
    $imgs = str_replace('/', '', $imgs);
    $imgs = str_replace('images', '', $imgs);
    $content = file_get_contents($img);
    file_put_contents(__DIR__ . '/../assets/img/champagnes/' . $imgs, $content);
    $imageFinal = $imgs;

    // Insertion de l'image Domaine
    if ($imageDomaines != "") {
        $imgs = $image[1]['url'];
        $imgs = str_replace('/media/sys_master/', '', $imgs);
        $imgs = str_replace('/', '', $imgs);
        $imgs = str_replace('images', '', $imgs);
        $content = file_get_contents($imageDomaines);
        file_put_contents(__DIR__ . '/../assets/img/domaine_images/' . $imgs, $content);
        $imageFinalDomaine = $imgs;
    }

    // Insertion du Vin
    $insert = $db->query('INSERT INTO `vins`(
    `boisson_id`, 
    `nom`, 
    `image`, 
    `domaineImage`, 
    `contenance_id`, 
    `millesime`, 
    `couleur_id`, 
    `prix`, 
    `soit`, 
    `pays_id`, 
    `region_id`, 
    `appellation_id`, 
    `alliance_id`, 
    `gout_id`,
    `cepages`, 
    `service_temperature`, 
    `niveau_garde`, 
    `degree`, 
    `stock`, 
    `created_at`
    ) VALUES (
    2,
    "' . $sqlName . '",
    "' . $imageFinal . '",
    "' . $imageFinalDomaine . '",
    "' . $contenanceId . '",
    "' . $millesimeResult . '",
    "' . $couleurId . '",
    "' . $totalPrix . '",
    "' . $totalSoit . '",
    "' . $paysId . '",
    "36",
    "208",
    "' . $allianceFinal . '",
    "' . $goutFinal . '",
    "' . $cepage_active . '",
    "' . $temperatureServiceValue . '",
    "' . $gardeValue . '",
    "' . $degreeValue . '",
    "' . $stockValue . '",
    "' . date('Y-m-d H:i:s') . '"
    )');

    // "' . $regionId . '",
    // "' . $appellationId . '",

    $lastId = $db->lastInsertid();

    if (!empty($return['cepageTitre'])) {
        // Insertion du cépage
        $insert = $db->query('INSERT INTO `cepages`(
            `vin_id`, 
            `niveau`, 
            `content`, 
            `chart_content`, 
            `chart_number`
            ) VALUES (
            ' . $lastId . ',
            "' . $cepageNumber . '",
            "' . $cepageValue . '",
            "' . $cepageValues . '",
            "' . $chartLegendValues . '"
        )');
    }

    $insert = $db->query('INSERT INTO `definitions`(
    `vin_id`, 
    `lang`, 
    `content`
    ) VALUES (
    ' . $lastId . ',
    "fr",
    "' . $sqlDescription . '"
    )');

    $insert = $db->query('INSERT INTO `definitions`(
    `vin_id`, 
    `lang`, 
    `content`
    ) VALUES (
    ' . $lastId . ',
    "en",
    ""
    )');

    $insert = $db->query('INSERT INTO `degustations`(
    `vin_id`, 
    `lang`, 
    `titre`, 
    `content`
    ) VALUES (
    ' . $lastId . ',
    "fr",
    "' . $tastingTitreValue . '",
    "' . $tastingDescriptionValue . '"
    )');

    $insert = $db->query('INSERT INTO `degustations`(
    `vin_id`, 
    `lang`, 
    `titre`, 
    `content`
    ) VALUES (
    ' . $lastId . ',
    "en",
    "",
    ""
    )');
}
