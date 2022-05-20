<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="row">

        <div class="col-lg-12 m-auto text-left">

            <div style="margin: 0 auto;" class="w-50">
                <h1 class="text-center mb-3 text-white"><?= $appellation_id['nom_fr_fr'] ?></h1>
            </div>

        </div>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-12 m-auto">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-warning" href="/<?= $language ?>/"><?= constant('NAVBAR_ITEM_1') ?></a></li>
                <li class="breadcrumb-item text-white"><?= ($_GET['type'] == "1") ? '<a class="text-decoration-none text-warning" href="/' . $language . '/vins">' . constant('LINK_7') . '</a>' : '' ?><?= ($_GET['type'] == "2") ? '<a class="text-decoration-none text-warning" href="/' . $language . '/champagnes">' . constant('LINK_8') . '</a>' : '' ?></li>
                <li class="breadcrumb-item text-white"><?= $appellation_id['nom_fr_fr'] ?></li>
            </ol>
        </nav>

    </div>

</div>

<div class="container-md mt-5 mb-5" id="bloc_vin">

    <div class="row">

        <?php if (count($appellations_all) >= 1) { ?>

            <?php foreach ($appellations_all as $selection) {  ?>

                <div class="col-sm-4">
                    <div class="card mb-4">
                        <div class="row g-0">
                            <div class="col-md-4 card_image_vin">
                                <img role="button" data-fancybox src="<?= $static_img . strtolower($selection['typeBoisson']) . '/' . $selection['imageBoisson']; ?>" class="img-fluid rounded-start" alt="<?= $selection['nomBoisson'] ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><a class="text-dark fw-bold text-decoration-none" href="/<?= $language ?>/<?= strtolower($selection['typeBoisson']) . '/' . $selection['idBoisson']; ?>"><?= mb_strtoupper($selection['nomBoisson']) . ' ' . $selection['millesimeBoisson']  ?></a></h5>
                                    <div class="m-auto"><span class="badge_region"><?= $selection['regionBoisson'] ?></span></div>
                                    <div class="mb-3"><a href="/<?= $language ?>/<?= strtolower($selection['typeBoisson']) . '/' . $selection['idBoisson']; ?>" class="btn btn-outline-warning "><?= strtoupper(constant('DECOUVRIR_BTN')) ?></a></div>
                                    <div class="m-auto appellation"><span><?= $selection['apellationBoisson'] ?></span></div>
                                    <div class="m-auto prix"><span><span class="chiffre"><?= number_format($selection['prixBoisson'], 2, ',', '') ?> €</div>
                                    <div class="m-auto mb-3 contenance"><span><?= constant('CONTENANCE') ?> <?= $selection['contenanceBoisson'] ?></span></div>
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
        <?php } ?>

    </div>

</div>