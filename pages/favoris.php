<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="row">

        <div class="col-lg-12 m-auto text-left">

            <div style="margin: 0 auto;" class="w-50">
                <h1 class="text-center mb-3 text-white"><?= constant('TITLE_FAVORIS') ?></h1>
            </div>

        </div>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-12 m-auto">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-warning" href="/<?= $language ?>/"><?= constant('NAVBAR_ITEM_1') ?></a></li>
                <li class="breadcrumb-item text-white"><?= constant('FAVORIS') ?></li>
            </ol>
        </nav>

    </div>

</div>

<div class="container-md mt-5 mb-5" id="bloc_vin">

    <div class="row">

        <input type="hidden" id="langs_fav" value="<?= $language ?>">
        <input type="hidden" id="host" value="<?= $_SERVER['HTTP_HOST'] ?>">

        <?php foreach ($favoris as $favoris) {  ?>

            <div class="col-sm-4 fav_box_<?= $favoris['idBoisson'] ?>">
                <div class="card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4 card_image_vin">
                            <img role="button" data-fancybox src="<?= $static_img . strtolower($favoris['typeBoisson']) . '/' . $favoris['imageBoisson']; ?>" class="img-fluid rounded-start" alt="<?= $favoris['nomBoisson'] ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= mb_strtoupper($favoris['nomBoisson']) . ' ' . $favoris['millesimeBoisson']  ?></h5>
                                <div class="m-auto"><span class="badge_region"><?= $favoris['regionBoisson'] ?></span></div>
                                <div class="mb-3"><a href="/<?= $language ?>/<?= strtolower($favoris['typeBoisson']) . '/' . $favoris['idBoisson']; ?>" class="btn btn-outline-warning "><?= strtoupper(constant('DECOUVRIR_BTN')) ?></a><span role="button" data-id="<?= $favoris['idBoisson'] ?>" class="ms-2 remove_favoris btn btn-outline-danger favoris_i"><i class="fa-solid fa-trash-can"></i> </span></div>
                                <div class="m-auto appellation"><span><?= $favoris['apellationBoisson'] ?></span></div>
                                <div class="m-auto prix"><span><span class="chiffre"><?= number_format($favoris['prixBoisson'], 2, ',', '') ?> €</div>
                                <div class="m-auto mb-3 contenance"><span><?= constant('CONTENANCE') ?> <?= $favoris['contenanceBoisson'] ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <div class="mt-5 mb-5 text-center">
            <a class="btn btn-outline-info me-3 ms-3 mb-3 btn-lg" data-bs-toggle="modal" data-bs-target="#shareFavorisModal"><i class="fa-solid fa-share me-2"></i><?= constant('SHARE') ?></a>
            <a class="btn btn-outline-success mb-3 btn-lg" data-bs-toggle="modal" data-bs-target="#downloadFavorisModal"><i class="fa-solid fa-download me-2"></i><?= constant('ENVOYER_LISTE') ?></a>
        </div>

    </div>

</div>

<?php include 'modules/modal/shareFavorisModal.php'; ?>
<?php include 'modules/modal/downloadFavorisModal.php'; ?>