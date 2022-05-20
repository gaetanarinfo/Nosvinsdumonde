<div class="container-md mt-5 mb-5 bloc_vin_title">
    <h2 class="text-light"><span><i class="fa-solid fa-chevron-right me-2"></i> <?= strtoupper(constant('VIN_JOUR')) ?></span></h2>
</div>

<div class="container-md mt-5 mb-5" id="bloc_vin_jour">

    <div class="row">

        <div class="col-sm-12">

            <div id="vin_jour">

                <div class="text-center">
                    <div class="mt-5 vin_jour_img">
                        <img role="button" data-fancybox src="<?= $static_img . strtolower($selection_jour['typeBoisson']) . '/' . $selection_jour['imageBoisson']; ?>" class="img-fluid rounded-start" alt="">
                    </div>
                    <div class="vin_jour_title">
                        <h3 class="text-white"><a class="text-white fw-bold text-decoration-none" href="/<?= $language ?>/<?= strtolower($selection_jour['typeBoisson']) . '/' . $selection_jour['idBoisson']; ?>"><?= mb_strtoupper($selection_jour['nomBoisson']) . ' ' . $selection_jour['millesimeBoisson']  ?></a></h3>
                    </div>
                    <div class="m-auto mt-5"><span class="badge_region"><?= $selection_jour['regionBoisson'] ?></span></div>
                    <div class="m-auto mt-2 appellation"><span class="text-white"><?= $selection_jour['apellationBoisson'] ?></span></div>
                    <div class="m-auto mt-2 prix"><span class="text-white"><span class="chiffre"><?= number_format($selection_jour['prixBoisson'], 2, ',', '') ?></span> €</span></div>
                    <div class="m-auto mb-5 contenance"><span class="text-white"><?= constant('CONTENANCE') ?> <?= $selection_jour['contenanceBoisson'] ?></span></div>
                    <div class="mb-5"><a href="/<?= $language ?>/<?= strtolower($selection_jour['typeBoisson']) . '/' . $selection_jour['idBoisson']; ?>" class="btn btn-outline-warning "><i class="fa-solid fa-chevron-right me-2"></i><?= strtoupper(constant('DECOUVRIR_BTN')) ?></a></div>
                </div>

            </div>

        </div>

    </div>

</div>

<div class="container-md mt-5 mb-5 bloc_vin_title">
    <h2 class="text-light"><span><i class="fa-solid fa-chevron-right me-2"></i> <?= strtoupper(constant('SELECTION')) ?></span></h2>
</div>

<div class="container-md mt-5 mb-5" id="bloc_vin">

    <div class="row">

        <?php

        foreach ($selections as $selection) {

            $avis_vins = selectDB('*', 'avis_vins', 'vin_id = ' . $selection['idBoisson'], $db, '1');
            $avis_vin = selectDB('COUNT(id) AS nbId', 'avis_vins', 'vin_id = ' . $selection['idBoisson'], $db, '1');

        ?>

            <div class="col-sm-4">
                <div class="card mb-4" itemscope itemtype="https://schema.org/Product">
                    <div class="row g-0">
                        <div class="col-md-4 card_image_vin">
                            <img itemprop="image" role="button" data-fancybox src="<?= $static_img . strtolower($selection['typeBoisson']) . '/' . $selection['imageBoisson']; ?>" class="img-fluid rounded-start" alt="<?= $selection['nomBoisson'] ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" itemprop="name"><a class="text-dark fw-bold text-decoration-none" href="/<?= $language ?>/<?= strtolower($selection['typeBoisson']) . '/' . $selection['idBoisson']; ?>"><?= mb_strtoupper($selection['nomBoisson']) . ' ' . $selection['millesimeBoisson']  ?></a></h5>

                                <div style="display: none;" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                                    <span itemprop="ratingValue"><?= (!empty($avis_vins['note'])) ? $avis_vins['note'] : 1 ?></span>
                                    <span itemprop="reviewCount"><?= (!empty($avis_vin['nbId'])) ? $avis_vin['nbId'] : 1 ?></span>
                                </div>

                                <div itemprop="review" itemtype="https://schema.org/Review" itemscope>
                                    <div itemprop="author" itemtype="https://schema.org/Person" itemscope>
                                        <meta itemprop="name" content="<?= (!empty($avis_vins['prenom'])) ? ucfirst($avis_vins['prenom']) : 'Gaëtan Seigneur' ?>" />
                                    </div>
                                    <div itemprop="reviewRating" itemtype="https://schema.org/Rating" itemscope>
                                        <meta itemprop="ratingValue" content="<?= (!empty($avis_vins['note'])) ? $avis_vins['note'] : 1 ?>" />
                                        <meta itemprop="bestRating" content="<?= (!empty($avis_vin['nbId'])) ? $avis_vin['nbId'] : 1 ?>" />
                                    </div>
                                </div>

                                <div class="m-auto"><span class="badge_region"><?= $selection['regionBoisson'] ?></span></div>

                                <div class="mb-3"><a href="/<?= $language ?>/<?= strtolower($selection['typeBoisson']) . '/' . $selection['idBoisson']; ?>" class="btn btn-outline-warning "><?= strtoupper(constant('DECOUVRIR_BTN')) ?></a></div>

                                <div class="m-auto appellation" itemprop="description"><span><?= $selection['apellationBoisson'] ?></span></div>

                                <div itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                                    <link itemprop="url" href="/<?= $language ?>/<?= strtolower($selection['typeBoisson']) . '/' . $selection['idBoisson']; ?>" />
                                    <div class="m-auto prix"><span><span class="chiffre" itemprop="price" content="<?= number_format($selection['prixBoisson'], 2, '.', '') ?>"><?= number_format($selection['prixBoisson'], 2, ',', '') ?> <span itemprop="priceCurrency" content="EUR">€</span></div>
                                    <div class="m-auto mb-3 contenance"><span><?= constant('CONTENANCE') ?> <?= $selection['contenanceBoisson'] ?></span></div>
                                    <link itemprop="availability" href="https://schema.org/InStock" />
                                    <meta itemprop="priceValidUntil" content="<?= date('Y-m-d', strtotime($selection['dateBoisson'])) ?>" />
                                </div>

                                <meta itemprop="sku" content="0615759302" />
                                <meta itemprop="gtin" content="<?= $selection['idBoisson'] ?>" />
                                <div itemprop="brand" itemtype="https://schema.org/Brand" itemscope>
                                    <meta itemprop="name" content="<?= $selection['apellationBoisson'] ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <div class="text-center mt-5 mb-5">
            <a href="/<?= $language ?>/produits" class="btn btn-outline-warning btn-lg"><i class="fa-solid fa-list me-2"></i>Voir tous nos produits</a>
        </div>

    </div>

</div>

<div class="container-md mt-5 mb-5 bloc_vin_title">
    <h2 class="text-light"><span><i class="fa-solid fa-chevron-right me-2"></i> <?= strtoupper(constant('MOMENT')) ?></span></h2>
</div>

<div class="container-md mt-5 mb-5" id="bloc_vin_selection">

    <div class="row justify-content-center">

        <div class="col-lg-5">
            <div class="card card1 mb-4 shadow">
                <a href="#" class="text-decoration-none">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body text-center">
                                <h3 class="card-title text-white"><?= constant('CARD_1') ?></h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card card2 mb-4 shadow">
                <a href="#" class="text-decoration-none">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body text-center">
                                <h3 class="card-title text-white"><?= constant('CARD_2') ?></h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>

</div>