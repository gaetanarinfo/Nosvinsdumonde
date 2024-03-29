<?php

include '../../config/fonctions.php';
include '../../config/connexion.php';
include '../../config/config.php';

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

    $where = 'V.nom LIKE "%' . trim($_GET['search']) . '%" ORDER BY V.nom';

    $search_produits = selectDB($select, $table, $where, $db, '*');

    $pages = '';

    $total = '';

    if (count($search_produits) != 0) {

        foreach ($search_produits as $search_produit) {

            if ($search_produit['boissonId'] == 1) {
                $pages = 'vins';
            } else if ($search_produit['boissonId'] == 2) {
                $pages = 'champagnes';
            } else {
                $pages = '';
            }

            if ($search_produit['millesimeBoisson'] != "") $return = '<li class="list-group-item"><a class="text-decoration-none text-white" href="https://www.nosvinsdumonde.com/app/' . $pages . '/' . $search_produit['idBoisson'] . '"><i class="fa-solid fa-magnifying-glass-arrow-right" style="margin-right: 0.5em;"></i>' . $search_produit['nomBoisson'] . ' - ' . $search_produit['millesimeBoisson'] . ' - ' . $search_produit['apellationBoisson'] . '</a></li>';
            else $return = '<li class="list-group-item"><a class="text-decoration-none text-white" href="https://www.nosvinsdumonde.com/app/' . $pages . '/' . $search_produit['idBoisson'] . '"><i class="fa-solid fa-magnifying-glass-arrow-right" style="margin-right: 0.5em;"></i>' . $search_produit['nomBoisson'] . ' - ' . $search_produit['apellationBoisson'] . '</a></li>';

            $total .= $return;
        }

        $final = ['search' => true, 'return' => $total];
    } else {

        $return = '<li class="list-group-item text-warning fw-bold"><i class="fa-solid fa-triangle-exclamation" style="margin-right: 0.5em;"></i>Votre recherche n\'a donné aucun résultat.</li>';

        $final = ['search' => false, 'return' => $return];
    }
} else {

    $return = '<li class="list-group-item text-warning fw-bold"><i class="fa-solid fa-triangle-exclamation" style="margin-right: 0.5em;"></i>Aucun résultat</li>';

    $final = ['search' => false, 'return' => $return];
}

echo json_encode($final);
