<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="row">

        <div class="col-lg-12 m-auto text-left">

            <div style="margin: 0 auto;" class="w-25">
                <h1 class="text-center mb-3 text-white"><?= constant('TITLE_PARTAGER') ?></h1>
            </div>

        </div>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-12 m-auto">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-warning" href="/<?= $language ?>/"><?= constant('NAVBAR_ITEM_1') ?></a></li>
                <li class="breadcrumb-item text-white"><?= constant('PARTAGER_LINK') ?></li>
            </ol>
        </nav>

    </div>

</div>

<div class="container-md mt-5 mb-5" id="bloc_vin">

    <div class="row">

        <input type="hidden" id="langs_fav" value="<?= $language ?>">
        <input type="hidden" id="host" value="<?= $_SERVER['HTTP_HOST'] ?>">

        <?php

        $select = 'V.id AS idBoisson,
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
        LEFT JOIN marque AS M ON M.id = V.marque_id
        LEFT JOIN pays AS P ON P.id = V.pays_id
        LEFT JOIN regions AS R ON R.id = V.region_id';

        $fav = $_GET['share'];
        $favEx = explode('-', $fav);

        foreach ($favEx as $favD) {
            
            $partagers = selectDB($select, $table, 'V.id IN (' . $favD . ') ORDER BY V.nom', $db, '*');

            foreach ($partagers as $partager) {  ?>

                <div class="col-sm-4 fav_box_<?= $partager['idBoisson'] ?>">
                    <div class="card mb-4">
                        <div class="row g-0">
                            <div class="col-md-4 card_image_vin">
                                <img role="button" data-fancybox src="<?= $static_img . strtolower($partager['typeBoisson']) . '/' . $partager['imageBoisson']; ?>" class="img-fluid rounded-start" alt="<?= $partager['nomBoisson'] ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= mb_strtoupper($partager['nomBoisson']) . ' ' . $partager['millesimeBoisson']  ?></h5>
                                    <div class="m-auto"><span class="badge_region"><?= $partager['regionBoisson'] ?></span></div>
                                    <div class="mb-3"><a href="/<?= $language ?>/<?= strtolower($partager['typeBoisson']) . '/' . $partager['idBoisson']; ?>" class="btn btn-outline-warning "><?= strtoupper(constant('DECOUVRIR_BTN')) ?></a></div>
                                    <div class="m-auto appellation"><span><?= $partager['apellationBoisson'] ?></span></div>
                                    <div class="m-auto prix"><span><span class="chiffre"><?= number_format($partager['prixBoisson'], 2, ',', '') ?> €</div>
                                    <div class="m-auto mb-3 contenance"><span><?= constant('CONTENANCE') ?> <?= $partager['contenanceBoisson'] ?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        <?php } ?>

    </div>

</div>