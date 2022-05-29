<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include "../assets/langs/" . $_GET['lang'] . ".php";

if (isset($_GET)) {

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

    $where = 'V.plan >= 1';

    if (!empty($_GET['millesime'])) {
        $where .= ' AND V.millesime = ' . intval($_GET['millesime']) . '';
    }

    if (!empty($_GET['couleur'])) {
        $where .= ' AND V.couleur_id = ' . intval($_GET['couleur']) . '';
    }

    if (!empty($_GET['prix'])) {
        $where .= ' AND V.prix <= ' . intval($_GET['prix']) . '';
    }

    if (!empty($_GET['pays'])) {
        $where .= ' AND V.pays_id = ' . $_GET['pays'] . '';
    }

    if (!empty($_GET['region'])) {
        $where .= ' AND R.id_boisson = 2 AND V.region_id = ' . $_GET['region'] . '';
    }

    if (!empty($_GET['appellation'])) {
        $where .= ' AND AP.id_boisson = 2 AND V.appellation_id = ' . $_GET['appellation'] . '';
    }

    if (!empty($_GET['gout'])) {
        $where .= ' AND V.gout_id = ' . $_GET['gout'] . '';
    }

    if (!empty($_GET['alliance'])) {
        $where .= ' AND V.alliance_id LIKE "%' . $_GET['alliance'] . '%"';
    }

    $ajax = selectDB($select, $table, $where . ' ORDER BY created_at DESC', $db, '*');

?>

    <div class="row" id="bloc_vin">

        <?php if (!empty($ajax)) { ?>

            <?php foreach ($ajax as $vin) {  ?>

                <div class="col-md-4  mb-4">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4 card_image_vin">
                                <?php if ($vin['planBoisson'] >= 1) { ?>
                                    <div class="vin_plan">
                                        <span>-<?= $vin['planPourcentBoisson'] ?>%</span>
                                        <span><?= constant('PLAN_POURCENT') ?></span>
                                    </div>
                                <?php } ?>
                                <div>
                                    <img role="button" data-fancybox src="<?= '../assets/img/' . strtolower($vin['typeBoisson']) . '/' . $vin['imageBoisson']; ?>" class="img-fluid rounded-start" alt="<?= $vin['nomBoisson'] ?>">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><a class="text-dark fw-bold text-decoration-none" href="/<?= $_GET['lang'] ?>/<?= strtolower($vin['typeBoisson']) . '/' . $vin['idBoisson']; ?>"><?= $vin['nomBoisson'] . ' ' . $vin['millesimeBoisson'] ?></a></h5>
                                    <div class="m-auto"><span class="badge_region"><?= $vin['regionBoisson'] ?></span></div>
                                    <div class="mb-3"><a href="/<?= $_GET['lang'] ?>/<?= strtolower($vin['typeBoisson']) . '/' . $vin['idBoisson']; ?>" class="btn btn-outline-warning "><?= strtoupper(constant('DECOUVRIR_BTN')) ?></a></div>
                                    <div class="m-auto appellation"><span><?= $vin['apellationBoisson'] ?></span></div>
                                    <div class="m-auto prix"><span><span class="chiffre"><?= ($vin['planBoisson'] >= 1) ? '<span class="text-warning text-decoration-line-through me-2" style="font-size: 18px;">' . number_format($vin['prixBoisson'], 2, ',', '') . ' €</span> ' . number_format($vin['remiseBoisson'], 2, ',', '') : number_format($vin['prixBoisson'], 2, ',', '') ?> €</div>
                                    <div class="m-auto mb-3 contenance"><span><?= constant('CONTENANCE') ?> <?= $vin['contenanceBoisson'] ?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="text-center mb-5">
                <h4 class="text-white"><?= constant('EMPTY_search') ?></h4>
            </div>

            <div class="text-center">
                <img style="min-width: 250px;" src="../assets/img/empty_search.png">
            </div>

        <?php } ?>

    </div>

<?php } ?>