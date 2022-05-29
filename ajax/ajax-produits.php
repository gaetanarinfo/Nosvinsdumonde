<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include '../config/config.php';
include "../assets/langs/" . $_POST['lang'] . ".php";

// Limit de départ
$limit = 51;

$offset = 51 * $_POST['offset'];

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

$where = 'V.active = 1 ORDER BY V.created_at DESC LIMIT ' . $limit . ' OFFSET ' . $offset;

$produits_all = selectDB($select, $table, $where, $db, '*');

?>

<?php if (!empty($_POST)) { ?>

    <?php foreach ($produits_all as $selection) {  ?>

        <div class="col-md-4 mb-4 produits_search">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4 card_image_vin">
                        <?php if ($selection['planBoisson'] >= 1) { ?>
                            <div class="vin_plan">
                                <span>-<?= $selection['planPourcentBoisson'] ?>%</span>
                                <span><?= constant('PLAN_POURCENT') ?></span>
                            </div>
                        <?php } ?>
                        <div>
                            <img role="button" data-fancybox src="<?= $static_img . strtolower($selection['typeBoisson']) . '/' . $selection['imageBoisson']; ?>" class="img-fluid rounded-start" alt="<?= $selection['nomBoisson'] ?>">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a class="text-dark fw-bold text-decoration-none" href="/<?= $language ?>/<?= strtolower($selection['typeBoisson']) . '/' . $selection['idBoisson']; ?>"><?= $selection['nomBoisson'] . ' ' . $selection['millesimeBoisson']  ?></a></h5>
                            <div class="m-auto"><span class="badge_region"><?= $selection['regionBoisson'] ?></span></div>
                            <div class="mb-3"><a href="/<?= $language ?>/<?= strtolower($selection['typeBoisson']) . '/' . $selection['idBoisson']; ?>" class="btn btn-outline-warning "><?= strtoupper(constant('DECOUVRIR_BTN')) ?></a></div>
                            <div class="m-auto appellation"><span><?= $selection['apellationBoisson'] ?></span></div>
                            <div class="m-auto prix"><span><span class="chiffre"><?= ($selection['planBoisson'] >= 1) ? '<span class="text-warning text-decoration-line-through me-2" style="font-size: 18px;">' . number_format($selection['prixBoisson'], 2, ',', '') . ' €</span> ' . number_format($selection['remiseBoisson'], 2, ',', '') : number_format($selection['prixBoisson'], 2, ',', '') ?> €</div>
                            <div class="m-auto mb-3 contenance"><span><?= constant('CONTENANCE') ?> <?= $selection['contenanceBoisson'] ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

    <input type="hidden" class="countProduits" value="<?= $offset; ?>" />

<?php } ?>