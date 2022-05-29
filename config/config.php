<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

//Formatage de la date depuis la fin de strftime
$fmt = datefmt_create(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN,
    'LLL'
);

// Chemin des images
$static_img = 'https://' . $_SERVER['HTTP_HOST'] . '/assets/img/';

// Chemin assets/img/
$static_url = 'https://' . $_SERVER['HTTP_HOST'] . '/assets/';

// Langue
if (!empty($_GET['langs'])) {

    $language = $_GET['langs'];

    switch ($_GET['langs']) {
        case 'fr':
            $language = "fr";
            break;

        case 'en':
            $language = "en";
            break;

        default:
            $language = "fr";
            break;
    }
} else {
    $language = "fr";
}

// Version
$version = "1.0";

// Referal
if (!empty($_SERVER['HTTP_REFERER']) && empty($_SESSION['refer'])) {
    $_SESSION['refer'] = $_SERVER['HTTP_REFERER'];
}

// Language
$langs = selectDB('*', 'langs', '1', $db, '*');

// Sélection du jour
$select = 'V.nom AS nomBoisson, 
V.millesime AS millesimeBoisson,
V.image AS imageBoisson, 
V.prix AS prixBoisson,
V.id AS idBoisson,
B.nom AS typeBoisson,
AP.nom_fr_fr AS apellationBoisson,
CN.nom AS contenanceBoisson,
R.nom_fr_fr AS regionBoisson,
V.plan AS planBoisson,
V.plan_pourcent AS planPourcentBoisson,
V.remise_plan AS remiseBoisson
';

$table = 'vins AS V
LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
LEFT JOIN boissons AS B ON B.id = V.boisson_id
LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
LEFT JOIN regions AS R ON R.id = V.region_id';

$where = '1 ORDER BY V.created_at DESC';

$selection_jour = selectDB($select, $table, $where, $db, '1');

// Les immanquables
$select = 'V.nom AS nomBoisson, 
V.millesime AS millesimeBoisson,
V.image AS imageBoisson, 
V.prix AS prixBoisson,
V.id AS idBoisson,
B.nom AS typeBoisson,
AP.nom_fr_fr AS apellationBoisson,
CN.nom AS contenanceBoisson,
R.nom_fr_fr AS regionBoisson,
V.created_at AS dateBoisson,
V.plan AS planBoisson,
V.plan_pourcent AS planPourcentBoisson,
V.remise_plan AS remiseBoisson
';

$table = 'vins AS V
LEFT JOIN alliance AS A ON A.id = V.alliance_id
LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
LEFT JOIN boissons AS B ON B.id = V.boisson_id
LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
LEFT JOIN couleur AS C ON C.id = V.couleur_id
LEFT JOIN gout AS G ON G.id = V.gout_id
LEFT JOIN pays AS P ON P.id = V.pays_id
LEFT JOIN regions AS R ON R.id = V.region_id';

$where = 'V.active = 1 ORDER BY V.created_at DESC LIMIT 12';

$selections = selectDB($select, $table, $where, $db, '*');

// Vins Par id
if (!empty($_GET['page']) && $_GET['page'] == 'vins' && !empty($_GET['id'])) {

    $select = 'V.id AS idBoisson,
    V.nom AS nomBoisson, 
    V.millesime AS millesimeBoisson,
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    V.soit AS soitBoisson,
    V.niveau_garde AS gardeBoisson,
    V.service_temperature As temperatureBoisson,
    V.degree AS degreeBoisson,
    V.alliance_id AS allianceBoisson,
    V.domaineImage AS domaineImageBoisson,
    V.cepages AS cepagesBoisson,
    V.stock AS stockBoisson,
    V.plan AS planBoisson,
V.plan_pourcent AS planPourcentBoisson,
V.remise_plan AS remiseBoisson,

    CP.content AS contentCepagesBoisson,
    CP.niveau AS niveauCepagesBoisson,
    CP.chart_content AS chartContentCepagesBoisson,
    CP.chart_number AS chartNumberCepagesBoisson,

    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    AP.id AS apellationIdBoisson,
    CN.nom AS contenanceBoisson,
    R.nom_fr_fr AS regionBoisson,
    C.nom AS couleurBoisson,

    G.nom AS nomGoutBoisson,
    G.image AS imageGoutBoisson,

    D.titre AS titreCaracteristiqueBoisson,
    D.content AS contentCaracteristiqueBoisson,

    DF.content AS contentDefinitionBoisson
    ';

    $table = 'vins AS V
    LEFT JOIN alliance AS A ON A.id = V.alliance_id
    LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
    LEFT JOIN boissons AS B ON B.id = V.boisson_id
    LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
    LEFT JOIN couleur AS C ON C.id = V.couleur_id
    LEFT JOIN gout AS G ON G.id = V.gout_id
    LEFT JOIN pays AS P ON P.id = V.pays_id
    LEFT JOIN regions AS R ON R.id = V.region_id
    LEFT JOIN cepages AS CP ON CP.vin_id = V.id
    LEFT JOIN degustations AS D ON D.vin_id = V.id AND D.lang = "' . $language . '"
    LEFT JOIN definitions AS DF ON DF.vin_id = V.id AND DF.lang = "' . $language . '"';

    $where = 'V.boisson_id = 1 AND V.active = 1 AND V.id = ' . $_GET['id'];

    $vin = selectDB($select, $table, $where, $db, '1');

    if (!empty($vin)) {
        // Array select alliance page id
        $alliances_id = selectDB('*', 'alliance', 'id IN (' . $vin['allianceBoisson'] . ') ORDER BY id DESC', $db, '*');

        $strpad = 4;
        if (strlen($vin['idBoisson']) >= 4) $vin = strlen($vin['idBoisson']) + 1;

        $viewsUpdate = $db->query('UPDATE `vins` SET `views` = views + 1 WHERE boisson_id = 1 AND id = ' . $_GET['id']);
    }

    $select = 'V.nom AS nomBoisson, 
    V.millesime AS millesimeBoisson,
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    V.id AS idBoisson,
    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    CN.nom AS contenanceBoisson,
    R.nom_fr_fr AS regionBoisson,
    V.created_at AS dateBoisson,
    V.plan AS planBoisson,
    V.plan_pourcent AS planPourcentBoisson,
    V.remise_plan AS remiseBoisson
    ';
    
    $table = 'vins AS V
    LEFT JOIN alliance AS A ON A.id = V.alliance_id
    LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
    LEFT JOIN boissons AS B ON B.id = V.boisson_id
    LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
    LEFT JOIN couleur AS C ON C.id = V.couleur_id
    LEFT JOIN gout AS G ON G.id = V.gout_id
    LEFT JOIN pays AS P ON P.id = V.pays_id
    LEFT JOIN regions AS R ON R.id = V.region_id';
    
    $where = 'V.appellation_id = "' . $vin['apellationIdBoisson'] . '" AND V.id != "' . $vin['idBoisson'] . '" AND V.boisson_id = 1 AND V.active = 1 ORDER BY V.created_at DESC LIMIT 3';
    
    $relations_vins = selectDB($select, $table, $where, $db, '*');

}

// Vins Par all
if (!empty($_GET['page']) && $_GET['page'] == 'vins' && empty($_GET['id'])) {

    $select = 'V.nom AS nomBoisson,
    V.millesime AS millesimeBoisson, 
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    CN.nom AS contenanceBoisson,
    R.nom_fr_fr AS regionBoisson,
    C.nom AS couleurBoisson,
    V.plan AS planBoisson,
V.plan_pourcent AS planPourcentBoisson
    ';

    $table = 'vins AS V
    LEFT JOIN alliance AS A ON A.id = V.alliance_id
    LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
    LEFT JOIN boissons AS B ON B.id = V.boisson_id
    LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
    LEFT JOIN couleur AS C ON C.id = V.couleur_id
    LEFT JOIN gout AS G ON G.id = V.gout_id
    LEFT JOIN pays AS P ON P.id = V.pays_id
    LEFT JOIN regions AS R ON R.id = V.region_id';

    $where = 'V.boisson_id = 1 AND V.active = 1';

    $vins = selectDB($select, $table, $where, $db, '*');
}

// Champagnes Par id
if (!empty($_GET['page']) && $_GET['page'] == 'champagnes' && !empty($_GET['id'])) {

    $select = 'V.id AS idBoisson,
    V.nom AS nomBoisson, 
    V.millesime AS millesimeBoisson,
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    V.soit AS soitBoisson,
    V.niveau_garde AS gardeBoisson,
    V.service_temperature As temperatureBoisson,
    V.degree AS degreeBoisson,
    V.alliance_id AS allianceBoisson,
    V.domaineImage AS domaineImageBoisson,
    V.cepages AS cepagesBoisson,
    V.stock AS stockBoisson,
    V.plan AS planBoisson,
V.plan_pourcent AS planPourcentBoisson,
V.remise_plan AS remiseBoisson,

    CP.content AS contentCepagesBoisson,
    CP.niveau AS niveauCepagesBoisson,
    CP.chart_content AS chartContentCepagesBoisson,
    CP.chart_number AS chartNumberCepagesBoisson,

    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    AP.id AS apellationIdBoisson,
    CN.nom AS contenanceBoisson,
    R.nom_fr_fr AS regionBoisson,
    C.nom AS couleurBoisson,

    G.nom AS nomGoutBoisson,
    G.image AS imageGoutBoisson,

    D.titre AS titreCaracteristiqueBoisson,
    D.content AS contentCaracteristiqueBoisson,

    DF.content AS contentDefinitionBoisson
    ';

    $table = 'vins AS V
    LEFT JOIN alliance AS A ON A.id = V.alliance_id
    LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
    LEFT JOIN boissons AS B ON B.id = V.boisson_id
    LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
    LEFT JOIN couleur AS C ON C.id = V.couleur_id
    LEFT JOIN gout AS G ON G.id = V.gout_id
    LEFT JOIN cepages AS CP ON CP.vin_id = V.id
    LEFT JOIN pays AS P ON P.id = V.pays_id
    LEFT JOIN regions AS R ON R.id = V.region_id
    LEFT JOIN degustations AS D ON D.vin_id = V.id AND D.lang = "' . $language . '"
    LEFT JOIN definitions AS DF ON DF.vin_id = V.id AND DF.lang = "' . $language . '"';

    $where = 'V.boisson_id = 2 AND V.active = 1 AND V.id = ' . $_GET['id'];

    $champagne = selectDB($select, $table, $where, $db, '1');

    if (!empty($champagne)) {
        // Array select alliance page id
        $alliances_id = selectDB('*', 'alliance', 'id IN (' . $champagne['allianceBoisson'] . ') ORDER BY id DESC', $db, '*');

        $strpad = 4;
        if (strlen($champagne['idBoisson']) >= 4) $champagne = strlen($champagne['idBoisson']) + 1;

        $viewsUpdate = $db->query('UPDATE `vins` SET `views` = views + 1 WHERE boisson_id = 2 AND id = ' . $_GET['id']);
    }

    $select = 'V.nom AS nomBoisson, 
    V.millesime AS millesimeBoisson,
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    V.id AS idBoisson,
    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    CN.nom AS contenanceBoisson,
    R.nom_fr_fr AS regionBoisson,
    V.created_at AS dateBoisson,
    V.plan AS planBoisson,
    V.plan_pourcent AS planPourcentBoisson,
    V.remise_plan AS remiseBoisson
    ';
    
    $table = 'vins AS V
    LEFT JOIN alliance AS A ON A.id = V.alliance_id
    LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
    LEFT JOIN boissons AS B ON B.id = V.boisson_id
    LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
    LEFT JOIN couleur AS C ON C.id = V.couleur_id
    LEFT JOIN gout AS G ON G.id = V.gout_id
    LEFT JOIN pays AS P ON P.id = V.pays_id
    LEFT JOIN regions AS R ON R.id = V.region_id';
    
    $where = 'V.appellation_id = "' . $champagne['apellationIdBoisson'] . '" AND V.id != "' . $champagne['idBoisson'] . '" AND V.boisson_id = 2 AND V.active = 1 ORDER BY V.created_at DESC LIMIT 3';
    
    $relations_vins = selectDB($select, $table, $where, $db, '*');
}

// Champagnes Par all
if (!empty($_GET['page']) && $_GET['page'] == 'champagnes') {

    $select = 'V.nom AS nomBoisson,
    V.millesime AS millesimeBoisson,
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    CN.nom AS contenanceBoisson,
    R.nom_fr_fr AS regionBoisson,
    C.nom AS couleurBoisson,
    V.plan AS planBoisson,
V.plan_pourcent AS planPourcentBoisson
    ';

    $table = 'vins AS V
    LEFT JOIN alliance AS A ON A.id = V.alliance_id
    LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
    LEFT JOIN boissons AS B ON B.id = V.boisson_id
    LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
    LEFT JOIN couleur AS C ON C.id = V.couleur_id
    LEFT JOIN gout AS G ON G.id = V.gout_id
    LEFT JOIN pays AS P ON P.id = V.pays_id
    LEFT JOIN regions AS R ON R.id = V.region_id';

    $where = 'V.boisson_id = 2 AND V.active = 1';

    $champagnes = selectDB($select, $table, $where, $db, '*');
}

// Select couleur
$couleurs = selectDB('*', 'couleur', '1 ORDER BY id', $db, '*');

// Select pays
$pays = selectDB('*', 'pays', '1 ORDER BY nom_fr_fr ASC', $db, '*');

// Select goûts
$gouts = selectDB('*', 'gout', '1 ORDER BY id', $db, '*');

// Select alliances
$alliances = selectDB('*', 'alliance', '1 ORDER BY id', $db, '*');

// Select contenance
$contenance = selectDB('*', 'contenance', '1 ORDER BY id', $db, '*');

// Select appellations
$appellations = selectDB('*', 'appellation', '1 ORDER BY id', $db, '*');

// Select appellations home
$appellations_home = selectDB('*', 'appellation', '1 ORDER BY id LIMIT 24', $db, '*');

// Select regions
$regions = selectDB('*', 'regions', '1 ORDER BY id', $db, '*');

// Select regions home
$regions_home = selectDB('*', 'regions', '1 ORDER BY id LIMIT 24', $db, '*');

// Favoris
if (!empty($_GET['page']) && $_GET['page'] == 'favoris' && !empty($_COOKIE['favoris'])) {

    $select = 'V.id AS idBoisson,
    V.nom AS nomBoisson,
    V.millesime AS millesimeBoisson,
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    CN.nom AS contenanceBoisson,
    R.nom_fr_fr AS regionBoisson,
    C.nom AS couleurBoisson,
    V.plan AS planBoisson,
V.plan_pourcent AS planPourcentBoisson
    ';

    $table = 'vins AS V
    LEFT JOIN alliance AS A ON A.id = V.alliance_id
    LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
    LEFT JOIN boissons AS B ON B.id = V.boisson_id
    LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
    LEFT JOIN couleur AS C ON C.id = V.couleur_id
    LEFT JOIN gout AS G ON G.id = V.gout_id
    LEFT JOIN pays AS P ON P.id = V.pays_id
    LEFT JOIN regions AS R ON R.id = V.region_id';

    $where = 'V.id IN (' . $_COOKIE['favoris'] . ') AND V.active = 1 ORDER BY V.nom';

    $favoris = selectDB($select, $table, $where, $db, '*');
}

// Contact par type
$contacts_types = selectDB('*', 'contacts_types', '1 ORDER BY id', $db, '*');

if (isset($_SESSION['user_id'])) { // Administration

    $user = selectDB('*', 'users', 'id = ' . $_SESSION['user_id'], $db, '1');

    // Select pays
    $pay_user = selectDB('*', 'pays', 'id =  ' . $user['pays'], $db, '1');
    $civilite_user = selectDB('*', 'users_civilite', 'id =  ' . $user['civilite'], $db, '1');

    $user_vin = selectDB('id', 'vins', 'boisson_id = 1 AND user_id = ' . $user['id'], $db, '*');
    $user_champagne = selectDB('id', 'vins', 'boisson_id = 2 AND user_id = ' . $user['id'], $db, '*');

    $ventes_years = $db->query('SELECT SUM(total) AS sumTotal FROM sites_commandes WHERE id_status_commande = 2 AND created_at LIKE "%' . date('Y') . '%" AND user_id = ' . $user['id'])->fetchColumn();
    $ventes_years_month = $db->query('SELECT SUM(total) AS sumTotal FROM sites_commandes WHERE id_status_commande = 2 AND created_at LIKE "%' . date('Y-m') . '%" AND user_id = ' . $user['id'])->fetchColumn();

    $months = selectDB('id', 'months', '1', $db, '*');

    $select = 'V.id AS idBoisson,
    V.nom AS nomBoisson, 
    V.millesime AS millesimeBoisson,
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    V.soit AS soitBoisson,
    V.niveau_garde AS gardeBoisson,
    V.service_temperature As temperatureBoisson,
    V.degree AS degreeBoisson,
    V.alliance_id AS allianceBoisson,
    V.domaineImage AS domaineImageBoisson,
    V.cepages AS cepagesBoisson,
    V.created_at AS createBoisson,
    V.active AS activeBoisson,
    V.views AS viewBoisson,
    V.stock AS stockBoisson,
    V.plan AS planBoisson,
V.plan_pourcent AS planPourcentBoisson,
V.remise_plan AS remiseBoisson,
    
    CP.content AS contentCepagesBoisson,
    CP.niveau AS niveauCepagesBoisson,
    CP.chart_content AS chartContentCepagesBoisson,
    CP.chart_number AS chartNumberCepagesBoisson,

    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    CN.nom AS contenanceBoisson,
    R.nom_fr_fr AS regionBoisson,
    C.nom AS couleurBoisson,

    G.nom AS nomGoutBoisson,
    G.image AS imageGoutBoisson,

    D.titre AS titreCaracteristiqueBoisson,
    D.content AS contentCaracteristiqueBoisson,

    DF.content AS contentDefinitionBoisson
    ';

    $table = 'vins AS V
    LEFT JOIN alliance AS A ON A.id = V.alliance_id
    LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
    LEFT JOIN boissons AS B ON B.id = V.boisson_id
    LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
    LEFT JOIN couleur AS C ON C.id = V.couleur_id
    LEFT JOIN gout AS G ON G.id = V.gout_id
    LEFT JOIN cepages AS CP ON CP.vin_id = V.id
    LEFT JOIN pays AS P ON P.id = V.pays_id
    LEFT JOIN regions AS R ON R.id = V.region_id
    LEFT JOIN degustations AS D ON D.vin_id = V.id AND D.lang = "fr"
    LEFT JOIN definitions AS DF ON DF.vin_id = V.id AND DF.lang = "fr"';

    $where = 'V.user_id = ' . $_SESSION['user_id'] . ' AND V.boisson_id = 1 AND V.active = 1';

    $vins_user = selectDB($select, $table, $where, $db, '*');

    if (!empty($_GET['id'])) {

        $select = 'V.id AS idBoisson,
    V.nom AS nomBoisson, 
    V.millesime AS millesimeBoisson,
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    V.soit AS soitBoisson,
    V.niveau_garde AS gardeBoisson,
    V.service_temperature As temperatureBoisson,
    V.degree AS degreeBoisson,
    V.alliance_id AS allianceBoisson,
    V.domaineImage AS domaineImageBoisson,
    V.cepages AS cepagesBoisson,
    V.created_at AS createBoisson,
    V.active AS activeBoisson,
    V.couleur_id AS couleurIdBoisson,
    V.pays_id AS paysIdBoisson,
    V.cepages AS cepageBoisson,
    V.appellation_id AS appellationBoisson,
    V.region_id AS regionIdBoisson,
    V.gout_id AS goutIdBoisson,
    V.stock AS stockBoisson,
    V.plan AS planBoisson,
V.plan_pourcent AS planPourcentBoisson,
V.remise_plan AS remiseBoisson,

    CP.content AS contentCepagesBoisson,
    CP.niveau AS niveauCepagesBoisson,
    CP.chart_content AS chartContentCepagesBoisson,
    CP.chart_number AS chartNumberCepagesBoisson,

    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    CN.nom AS contenanceBoisson,
    CN.id AS contenanceIdBoisson,
    R.nom_fr_fr AS regionBoisson,
    C.nom AS couleurBoisson,

    G.nom AS nomGoutBoisson,
    G.image AS imageGoutBoisson,

    D.titre AS titreCaracteristiqueBoisson,
    D.content AS contentCaracteristiqueBoisson,

    P.nom_fr_fr AS paysBoisson,

    DF.content AS contentDefinitionBoisson
    ';

        $table = 'vins AS V
    LEFT JOIN alliance AS A ON A.id = V.alliance_id
    LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
    LEFT JOIN boissons AS B ON B.id = V.boisson_id
    LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
    LEFT JOIN couleur AS C ON C.id = V.couleur_id
    LEFT JOIN gout AS G ON G.id = V.gout_id
    LEFT JOIN cepages AS CP ON CP.vin_id = V.id
    LEFT JOIN pays AS P ON P.id = V.pays_id
    LEFT JOIN regions AS R ON R.id = V.region_id
    LEFT JOIN degustations AS D ON D.vin_id = V.id
    LEFT JOIN definitions AS DF ON DF.vin_id = V.id';

        $where = 'V.user_id = ' . $_SESSION['user_id'] . ' AND V.id = ' . $_GET['id'] . ' AND V.boisson_id = 1 AND V.active = 1';

        $vin_by_user = selectDB($select, $table, $where, $db, '1');
    }
}

// Cart
if (!empty($_COOKIE['cart'])) {

    $select = 'V.id AS idBoisson,
    V.nom AS nomBoisson,
    V.boisson_id AS boissonId,
    V.millesime AS millesimeBoisson,
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    CN.nom AS contenanceBoisson,
    R.nom_fr_fr AS regionBoisson,
    C.nom AS couleurBoisson,
    V.plan AS planBoisson,
    V.plan_pourcent AS planPourcentBoisson,
V.remise_plan AS remiseBoisson
    ';

    $table = 'vins AS V
    LEFT JOIN alliance AS A ON A.id = V.alliance_id
    LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
    LEFT JOIN boissons AS B ON B.id = V.boisson_id
    LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
    LEFT JOIN couleur AS C ON C.id = V.couleur_id
    LEFT JOIN gout AS G ON G.id = V.gout_id
    LEFT JOIN pays AS P ON P.id = V.pays_id
    LEFT JOIN regions AS R ON R.id = V.region_id';

    $where = 'V.id IN (' . $_COOKIE['cart'] . ') AND V.active = 1 ORDER BY V.nom';

    $carts = selectDB($select, $table, $where, $db, '*');

    $cart_count = $_COOKIE['cart'];
    $favCartCount = explode(',', $cart_count);

    $counter_cart = array_count_values($favCartCount);

    if (!empty($_GET['step']) && $_GET['step'] == "4") {
        setcookie('cart', "", time() + 1000000, '/');
    }

    $sumPrix = selectDB('SUM(prix) AS prixCount', 'vins', 'id IN (' . $_COOKIE['cart'] . ')', $db, '1');
}

// Historique commande
if (!empty($_SESSION['user_id'])) {

    $sites_commandes = selectDB('*', 'sites_commandes', 'user_id = ' . $_SESSION['user_id'], $db, '*');
    $ports = selectDB('SUM(port) AS nombrePort', 'sites_commandes', 'user_id = ' . $_SESSION['user_id'], $db, '1');
    $prix = selectDB('SUM(total) AS nombrePrix', 'sites_commandes', 'user_id = ' . $_SESSION['user_id'], $db, '1');
}

// Produits all
$select = 'V.nom AS nomBoisson, 
V.millesime AS millesimeBoisson,
V.image AS imageBoisson, 
V.prix AS prixBoisson,
V.id AS idBoisson,
B.nom AS typeBoisson,
AP.nom_fr_fr AS apellationBoisson,
CN.nom AS contenanceBoisson,
R.nom_fr_fr AS regionBoisson,
V.plan AS planBoisson,
V.plan_pourcent AS planPourcentBoisson,
V.remise_plan AS remiseBoisson
';

$table = 'vins AS V
LEFT JOIN alliance AS A ON A.id = V.alliance_id
LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
LEFT JOIN boissons AS B ON B.id = V.boisson_id
LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
LEFT JOIN couleur AS C ON C.id = V.couleur_id
LEFT JOIN gout AS G ON G.id = V.gout_id
LEFT JOIN pays AS P ON P.id = V.pays_id
LEFT JOIN regions AS R ON R.id = V.region_id';

$where = 'V.active = 1 ORDER BY V.created_at DESC LIMIT 51';

$produits_all = selectDB($select, $table, $where, $db, '*');


if (isset($_SESSION['user_id'])) { // Administration

    $user = selectDB('*', 'users', 'id = ' . $_SESSION['user_id'], $db, '1');

    // Select pays
    $pay_user = selectDB('*', 'pays', 'id =  ' . $user['pays'], $db, '1');
    $civilite_user = selectDB('*', 'users_civilite', 'id =  ' . $user['civilite'], $db, '1');

    $user_vin = selectDB('id', 'vins', 'boisson_id = 1 AND user_id = ' . $user['id'], $db, '*');
    $user_champagne = selectDB('id', 'vins', 'boisson_id = 2 AND user_id = ' . $user['id'], $db, '*');

    $select = 'V.id AS idBoisson,
    V.nom AS nomBoisson, 
    V.millesime AS millesimeBoisson,
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    V.soit AS soitBoisson,
    V.niveau_garde AS gardeBoisson,
    V.service_temperature As temperatureBoisson,
    V.degree AS degreeBoisson,
    V.alliance_id AS allianceBoisson,
    V.domaineImage AS domaineImageBoisson,
    V.cepages AS cepagesBoisson,
    V.created_at AS createBoisson,
    V.active AS activeBoisson,
    V.views AS viewBoisson,
    V.stock AS stockBoisson,
    V.plan AS planBoisson,
V.plan_pourcent AS planPourcentBoisson,
V.remise_plan AS remiseBoisson,

    CP.content AS contentCepagesBoisson,
    CP.niveau AS niveauCepagesBoisson,
    CP.chart_content AS chartContentCepagesBoisson,
    CP.chart_number AS chartNumberCepagesBoisson,

    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    CN.nom AS contenanceBoisson,
    R.nom_fr_fr AS regionBoisson,
    C.nom AS couleurBoisson,

    G.nom AS nomGoutBoisson,
    G.image AS imageGoutBoisson,

    D.titre AS titreCaracteristiqueBoisson,
    D.content AS contentCaracteristiqueBoisson,

    DF.content AS contentDefinitionBoisson
    ';

    $table = 'vins AS V
    LEFT JOIN alliance AS A ON A.id = V.alliance_id
    LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
    LEFT JOIN boissons AS B ON B.id = V.boisson_id
    LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
    LEFT JOIN couleur AS C ON C.id = V.couleur_id
    LEFT JOIN gout AS G ON G.id = V.gout_id
    LEFT JOIN cepages AS CP ON CP.vin_id = V.id
    LEFT JOIN pays AS P ON P.id = V.pays_id
    LEFT JOIN regions AS R ON R.id = V.region_id
    LEFT JOIN degustations AS D ON D.vin_id = V.id AND D.lang = "fr"
    LEFT JOIN definitions AS DF ON DF.vin_id = V.id AND DF.lang = "fr"';

    $where = 'V.user_id = ' . $_SESSION['user_id'] . ' AND V.boisson_id = 2 AND V.active = 1';

    $champagnes_user = selectDB($select, $table, $where, $db, '*');

    if (!empty($_GET['id'])) {

        $select = 'V.id AS idBoisson,
    V.nom AS nomBoisson, 
    V.millesime AS millesimeBoisson,
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    V.soit AS soitBoisson,
    V.niveau_garde AS gardeBoisson,
    V.service_temperature As temperatureBoisson,
    V.degree AS degreeBoisson,
    V.alliance_id AS allianceBoisson,
    V.domaineImage AS domaineImageBoisson,
    V.cepages AS cepagesBoisson,
    V.created_at AS createBoisson,
    V.active AS activeBoisson,
    V.couleur_id AS couleurIdBoisson,
    V.pays_id AS paysIdBoisson,
    V.cepages AS cepageBoisson,
    V.appellation_id AS appellationBoisson,
    V.region_id AS regionIdBoisson,
    V.gout_id AS goutIdBoisson,
    V.plan AS planBoisson,
V.plan_pourcent AS planPourcentBoisson,
V.remise_plan AS remiseBoisson,

    CP.content AS contentCepagesBoisson,
    CP.niveau AS niveauCepagesBoisson,
    CP.chart_content AS chartContentCepagesBoisson,
    CP.chart_number AS chartNumberCepagesBoisson,

    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    CN.nom AS contenanceBoisson,
    CN.id AS contenanceIdBoisson,
    R.nom_fr_fr AS regionBoisson,
    C.nom AS couleurBoisson,

    G.nom AS nomGoutBoisson,
    G.image AS imageGoutBoisson,

    D.titre AS titreCaracteristiqueBoisson,
    D.content AS contentCaracteristiqueBoisson,

    P.nom_fr_fr AS paysBoisson,

    DF.content AS contentDefinitionBoisson
    ';

        $table = 'vins AS V
    LEFT JOIN alliance AS A ON A.id = V.alliance_id
    LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
    LEFT JOIN boissons AS B ON B.id = V.boisson_id
    LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
    LEFT JOIN couleur AS C ON C.id = V.couleur_id
    LEFT JOIN gout AS G ON G.id = V.gout_id
    LEFT JOIN cepages AS CP ON CP.vin_id = V.id
    LEFT JOIN pays AS P ON P.id = V.pays_id
    LEFT JOIN regions AS R ON R.id = V.region_id
    LEFT JOIN degustations AS D ON D.vin_id = V.id
    LEFT JOIN definitions AS DF ON DF.vin_id = V.id';

        $where = 'V.user_id = ' . $_SESSION['user_id'] . ' AND V.id = ' . $_GET['id'] . ' AND V.boisson_id = 2 AND V.active = 1';

        $champagne_by_user = selectDB($select, $table, $where, $db, '1');
    }
}

if (!empty($_GET['page']) && $_GET['page'] == "appellation") {

    $appellation_id = selectDB('*', 'appellation', 'id = ' . $_GET['appellationId'], $db, '1');

    // Appellations all
    $select = 'V.nom AS nomBoisson, 
V.millesime AS millesimeBoisson,
V.image AS imageBoisson, 
V.prix AS prixBoisson,
V.id AS idBoisson,
B.nom AS typeBoisson,
AP.nom_fr_fr AS apellationBoisson,
CN.nom AS contenanceBoisson,
R.nom_fr_fr AS regionBoisson,
V.plan AS planBoisson,
V.plan_pourcent AS planPourcentBoisson,
V.remise_plan AS remiseBoisson
';

    $table = 'vins AS V
LEFT JOIN alliance AS A ON A.id = V.alliance_id
LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
LEFT JOIN boissons AS B ON B.id = V.boisson_id
LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
LEFT JOIN couleur AS C ON C.id = V.couleur_id
LEFT JOIN gout AS G ON G.id = V.gout_id
LEFT JOIN pays AS P ON P.id = V.pays_id
LEFT JOIN regions AS R ON R.id = V.region_id';

    $where = 'V.appellation_id = "' . $_GET['appellationId'] . '" AND V.active = 1 ORDER BY V.created_at DESC';

    $appellations_all = selectDB($select, $table, $where, $db, '*');
}

if (!empty($_GET['page']) && $_GET['page'] == "region") {

    $region_id = selectDB('*', 'regions', 'id = ' . $_GET['regionId'], $db, '1');

    // Appellations all
    $select = 'V.nom AS nomBoisson, 
     V.millesime AS millesimeBoisson,
     V.image AS imageBoisson, 
     V.prix AS prixBoisson,
     V.id AS idBoisson,
     B.nom AS typeBoisson,
     AP.nom_fr_fr AS apellationBoisson,
     CN.nom AS contenanceBoisson,
     R.nom_fr_fr AS regionBoisson,
     V.plan AS planBoisson,
     V.plan_pourcent AS planPourcentBoisson,
     V.remise_plan AS remiseBoisson
     ';

    $table = 'vins AS V
     LEFT JOIN alliance AS A ON A.id = V.alliance_id
     LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
     LEFT JOIN boissons AS B ON B.id = V.boisson_id
     LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
     LEFT JOIN couleur AS C ON C.id = V.couleur_id
     LEFT JOIN gout AS G ON G.id = V.gout_id
     LEFT JOIN pays AS P ON P.id = V.pays_id
     LEFT JOIN regions AS R ON R.id = V.region_id';

    $where = 'V.region_id = "' . $_GET['regionId'] . '" AND V.active = 1 ORDER BY V.created_at DESC';

    $regions_all = selectDB($select, $table, $where, $db, '*');
}

// Articles home
if (empty($_GET['page'])) {
    $select = 'C.*, CONCAT(U.prenom, " ", U.nom) AS author, CG.name AS groupeName';

    $table = 'contents AS C LEFT JOIN users AS U ON U.id = C.user_id LEFT JOIN contents_groupes AS CG ON CG.id = C.groupe';

    $where = '1 ORDER BY C.created_at DESC LIMIT 12';

    $contents = selectDB($select, $table, $where, $db, '*');
}

if (!empty($_GET['page']) && $_GET['page'] == "actualite" && !empty($_GET['actualiteUrl'])) {
    $article = selectDB('C.*, CONCAT(U.prenom, " ", U.nom) AS author, CG.name AS groupeName', 'contents AS C LEFT JOIN users AS U ON U.id = C.user_id LEFT JOIN contents_groupes AS CG ON CG.id = C.groupe', 'C.url = "' . $_GET['actualiteUrl'] . '"', $db, '1');
    $update = $db->query('UPDATE `contents` SET `views` = views + 1 WHERE `url` = "' . $_GET['actualiteUrl'] . '"');
    $contents_comments = selectDB('*', 'contents_comments', 'id_content = "' . $article['id'] . '" ORDER BY created_at DESC', $db, '*');
}

if (!empty($_GET['page']) && $_GET['page'] == "article" && !empty($_GET['actualiteUrl'])) {
    $article = selectDB('C.*, CONCAT(U.prenom, " ", U.nom) AS author, CG.name AS groupeName', 'contents AS C LEFT JOIN users AS U ON U.id = C.user_id LEFT JOIN contents_groupes AS CG ON CG.id = C.groupe', 'C.url = "' . $_GET['actualiteUrl'] . '"', $db, '1');
    $update = $db->query('UPDATE `contents` SET `views` = views + 1 WHERE `url` = "' . $_GET['actualiteUrl'] . '"');
    $contents_comments = selectDB('*', 'contents_comments', 'id_content = "' . $article['id'] . '" ORDER BY created_at DESC', $db, '*');
}

if (!empty($_GET['page']) && $_GET['page'] == "actualites" || (!empty($_GET['page']) && $_GET['page'] == "actualite") || (!empty($_GET['page']) && $_GET['page'] == "article")) {

    if ($_GET['page'] == "actualites") {

        $select = 'C.*, CONCAT(U.prenom, " ", U.nom) AS author, CG.name AS groupeName';

        $table = 'contents AS C LEFT JOIN users AS U ON U.id = C.user_id LEFT JOIN contents_groupes AS CG ON CG.id = C.groupe';

        $where = '1 ORDER BY C.created_at DESC LIMIT 51';

        $contents_page = selectDB($select, $table, $where, $db, '*');
    }

    if ($_GET['page'] == "actualite") {

        $select = 'C.*, CONCAT(U.prenom, " ", U.nom) AS author, CG.name AS groupeName';

        $table = 'contents AS C LEFT JOIN users AS U ON U.id = C.user_id LEFT JOIN contents_groupes AS CG ON CG.id = C.groupe';

        $where = 'C.id != "' . $article['id'] . '" ORDER BY C.created_at DESC LIMIT 3 OFFSET 21';

        $contents_page2 = selectDB($select, $table, $where, $db, '*');

    }

    if ($_GET['page'] == "article") {

        $select = 'C.*, CONCAT(U.prenom, " ", U.nom) AS author, CG.name AS groupeName';

        $table = 'contents AS C LEFT JOIN users AS U ON U.id = C.user_id LEFT JOIN contents_groupes AS CG ON CG.id = C.groupe';

        $where = 'C.id != "' . $article['id'] . '" ORDER BY C.created_at DESC LIMIT 3 OFFSET 21';

        $contents_page2 = selectDB($select, $table, $where, $db, '*');

    }
}
