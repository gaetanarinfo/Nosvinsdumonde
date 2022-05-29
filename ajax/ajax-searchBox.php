<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include '../config/config.php';
include "../assets/langs/" . $_GET['lang'] . ".php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

$final = '';

if (isset($_GET['search'])) {

    $select = 'V.id AS idBoisson,
    V.boisson_id AS boissonId,
    V.nom AS nomBoisson,
    V.millesime AS millesimeBoisson,
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    CN.nom AS contenanceBoisson,
    R.nom_fr_fr AS regionBoisson,
    C.nom AS couleurBoisson
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

    $where = 'V.nom COLLATE utf8mb4_0900_ai_ci LIKE "%' . trim($_GET['search']) . '%" ORDER BY V.nom LIMIT 10';

    $search_produits = selectDB($select, $table, $where, $db, '*');

    // Actualites
    $select = 'C.title, C.url';

    $table = 'contents AS C';

    $where = 'C.title COLLATE utf8mb4_0900_ai_ci LIKE "%' . trim($_GET['search']) . '%" ORDER BY C.title LIMIT 10';

    $contents_search = selectDB($select, $table, $where, $db, '*');

    $pages = '';

    $total = '';

    if (count($search_produits) >= 1) {

        foreach ($search_produits as $search_produit) {

            if ($search_produit['boissonId'] == 1) {
                $pages = 'vins';
            } else if ($search_produit['boissonId'] == 2) {
                $pages = 'champagnes';
            } else {
                $pages = '';
            }

            if ($search_produit['millesimeBoisson'] != "") $return = '<li class="list-group-item"><a class="text-decoration-none text-white" href="https://' . $_GET['host'] . '/' . $_GET['lang'] . '/' . $pages . '/' . $search_produit['idBoisson'] . '"><i class="fa-solid fa-magnifying-glass-arrow-right me-2"></i>' . $search_produit['nomBoisson'] . ' - ' . $search_produit['millesimeBoisson'] . ' - ' . $search_produit['apellationBoisson'] . '</a></li>';
            else $return = '<li class="list-group-item"><a class="text-decoration-none text-white" href="https://' . $_GET['host'] . '/' . $_GET['lang'] . '/' . $pages . '/' . $search_produit['idBoisson'] . '"><i class="fa-solid fa-magnifying-glass-arrow-right me-2"></i>' . $search_produit['nomBoisson'] . ' - ' . $search_produit['apellationBoisson'] . '</a></li>';

            $total .= $return;
        }

        $final = ['search' => true, 'return' => $total];
    } else if (count($contents_search) >= 1) {

        foreach ($contents_search as $search_content) {

            $return = '<li class="list-group-item"><a class="text-decoration-none text-white" href="https://' . $_GET['host'] . '/' . $_GET['lang'] . '/actualite/' . $search_content['url'] . '"><i class="fa-solid fa-magnifying-glass-arrow-right me-2"></i>' . $search_content['title'] . '</a></li>';

            $total .= $return;
        }

        $final = ['search' => true, 'return' => $total];
    } else {

        $return = '<li class="list-group-item text-warning fw-bold"><i class="fa-solid fa-triangle-exclamation me-2"></i>' . constant('EMPTY_SEARCH') . '</li>';

        $final = ['search' => false, 'return' => $return];
    }
} else {

    $return = '<li class="list-group-item text-warning fw-bold"><i class="fa-solid fa-triangle-exclamation me-2"></i>' . constant('EMPTY_SEARCH') . '</li>';

    $final = ['search' => false, 'return' => $return];
}

echo json_encode($final);
