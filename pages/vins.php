<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-12 m-auto">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-warning" href="/<?= $language ?>/"><?= constant('NAVBAR_ITEM_1') ?></a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none <?= (empty($_GET['id'])) ? 'active text-white' : 'text-warning' ?>" <?= (empty($_GET['id'])) ? 'aria-current="page"' : '' ?>" href="/<?= $language ?>/<?= $_GET['page'] ?>"><?= constant('NAVBAR_ITEM_2') ?></a></li>
                <?php if (!empty($_GET['id'])) { ?><li class="breadcrumb-item <?= (!empty($_GET['id'])) ? 'active text-white' : '' ?>" <?= (!empty($_GET['id'])) ? 'aria-current="page"' : '' ?>><?= $vin['nomBoisson'] ?></li><?php } ?>
            </ol>
        </nav>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="row align-items-start">

        <div id="presentation_vin" class="col-md-3">

            <?php if ($vin['planBoisson'] >= 1) { ?>
                <div class="vin_plan position-absolute">
                    <span>-<?= $vin['planPourcentBoisson'] ?>%</span>
                    <span><?= constant('PLAN_POURCENT') ?></span>
                </div>
            <?php } ?>

            <div>
                <img role="button" data-fancybox src="<?= $static_img . strtolower($vin['typeBoisson']) . '/' . $vin['imageBoisson']; ?>" class="img-fluid rounded-start" alt="<?= $vin['nomBoisson'] ?>">
            </div>

            <div class="text-center mt-4">
                <h5 class="text-white"><?= constant('PARTAGER') ?></h5>

                <section class="mt-4">
                    <!-- Facebook -->
                    <a class="btn-floating m-1" href="https://www.facebook.com/sharer/sharer.php?u=https://<?= $_SERVER['HTTP_HOST'] ?>/<?= $language ?>/<?= $_GET['page'] ?>/<?= $vin['idBoisson'] ?>" onclick="window.open(this.href);return false;" role="button"><img src="<?= $static_img ?>socials/facebook-Icon.png" alt="Facebook"></a>

                    <!-- Twitter -->
                    <a class="btn-floating m-1" href="https://twitter.com/share?url=https://<?= $_SERVER['HTTP_HOST'] ?>/<?= $language ?>/<?= $_GET['page'] ?>/<?= $vin['idBoisson'] ?>&text=<?= $vin['nomBoisson'] . ' ' . $vin['millesimeBoisson'] ?>&via=novinsdumonde" onclick="window.open(this.href);return false;" role="button"><img src="<?= $static_img ?>socials/Twitter-Icon.png" alt="Twitter"></a>
                </section>

            </div>

        </div>


        <div class="col">

            <div class="row align-items-start">

                <div id="bloc_descriptif" class="col pb-3">

                    <input type="hidden" id="boissonId" value="<?= $vin['idBoisson'] ?>">
                    <h1 class="text-white"><?= $vin['nomBoisson'] . ' ' .  $vin['millesimeBoisson'] ?></h1>
                    <?php if ($vin['regionBoisson'] != "") { ?><div class="m-auto"><span class="badge_region"><?= $vin['regionBoisson'] ?></span></div><?php } ?>
                    <?php if ($vin['apellationBoisson'] != "") { ?><div class="m-auto text-white"><span><?= $vin['apellationBoisson'] ?></span></div><?php } ?>
                    <div class="m-auto text-white"><?php if ($vin['couleurBoisson'] != "") { ?><span><?= $vin['couleurBoisson'] ?></span><span> | </span><?php } ?><span><?= $vin['degreeBoisson'] ?></span><span>°</span></div>
                    <?php if ($vin['cepagesBoisson'] == 1) { ?>
                        <hr>
                        <div class="note_cepages">
                            <?php

                            switch ($vin['niveauCepagesBoisson']) {
                                case '1':
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                    break;

                                case '2':
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                    break;

                                case '3':
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                    break;

                                case '4':
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                    break;

                                case '5':
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    echo '<i class="fa-solid fa-leaf"></i>';
                                    break;
                            }

                            ?>
                        </div>
                    <?php } ?>
                    <hr>
                    <div><span class="text-white"><a role="button" data-bs-toggle="modal" data-bs-target="#avisModal"><i class="fa-brands fa-affiliatetheme me-2"></i><span><?= constant('AVIS') ?></a></span>
                        <div role="button" class="mt-1 add_favoris text-white favoris_i"><i class="fa-solid fa-heart me-1"></i> <?= constant('ADD_FAVORIS') ?></div>
                        <div role="button" class="mt-1 add_favoris_unclick remove_favoris text-white favoris_i"><i class="fa-solid fa-heart-circle-minus me-1"></i> <?= constant('REMOVE_FAVORIS') ?></div>
                    </div>
                    <hr>
                    <div><span class="text-white">Réf : </span><span class="text-white"><?= str_pad($vin['idBoisson'], $strpad, '0', STR_PAD_LEFT) ?></span></div>

                </div>

                <div class="col ps-5">

                    <h3 class="text-white text-end no_border"><?= ($vin['planBoisson'] >= 1) ? '<span class="text-warning text-decoration-line-through me-2" style="font-size: 18px;">' . number_format($vin['prixBoisson'], 2, ',', '') . ' €</span> ' . number_format($vin['remiseBoisson'], 2, ',', '') : number_format($vin['prixBoisson'], 2, ',', '') ?><span> €</span></h3>

                    <div class="text-end">
                        <span class="text-white no_border"><?= constant('CONTENANCE') ?> <?= $vin['contenanceBoisson'] ?></span><br>
                        <span class="text-white"><?= constant('SOIT') ?> <?= number_format(($vin['soitBoisson']), 2, ',', '') ?> € / <?= constant('LITRE') ?></span>
                    </div>

                    <div class="text-end mt-3">
                        <?php if ($vin['stockBoisson'] >= 1) { ?>
                            <a class="add_cart btn btn-outline-warning btn-lg"><i class="fa-solid fa-bag-shopping me-2"></i><?= constant('ADD_CART') ?></a>
                        <?php } else { ?>
                            <a class="btn btn-outline-info btn-lg disabled"><i class="fa-solid fa-bag-shopping me-2"></i><?= constant('ERROR_CART') ?></a>
                            <p class="text-warning fw-bold mt-3" style="font-size: 12px;"><?= constant('EMPTY_PRODUIT') ?></p>
                        <?php } ?>
                    </div>

                    <div class="text-end mt-5 mini_bloc">
                        <h5 class="text-white fw-bold"><?= constant('GARDE') ?></h5>
                        <span class="text-white"><?= $vin['gardeBoisson'] ?></span>
                    </div>

                    <div class="text-end mt-5 mini_bloc">
                        <h5 class="text-white fw-bold"><?= constant('SERVICE') ?></h5>
                        <span class="text-white"><?= $vin['temperatureBoisson'] ?></span><span class="text-white">°</span>
                    </div>

                    <?php if ($vin['cepagesBoisson'] == 1) { ?>

                        <div class="text-end mt-5 mini_bloc">
                            <h5 class="text-white fw-bold"><?= constant('GRAPES') ?></h5>
                            <span class="text-white"><?= nl2br($vin['contentCepagesBoisson']) ?></span>
                        </div>

                    <?php } ?>

                </div>

                <?php if (count($alliances_id) >= 1) { ?>

                    <div class="text-center mt-5 mb-5">
                        <h4 class="text-white title_alliances"><?= strtoupper(constant('ALLIANCE_METS')) ?></h4>

                        <ul class="list-group groupe_alliances mt-5">
                            <?php foreach ($alliances_id as $alliance) { ?>

                                <li class="list-group-item">
                                    <span class="alliance_mini_icon">
                                        <img src="<?= $static_img ?>alliances/<?= $alliance['image'] ?>" alt="">
                                    </span>
                                    <div class="mt-2">
                                        <span class="alliance_mini_text"><?= constant($alliance['nom']) ?></span>
                                    </div>
                                </li>

                            <?php } ?>
                        </ul>

                    </div>

                <?php } ?>

            </div>

        </div>

    </div>

    <div class="text-center mt-5 mb-5">

        <div class="mb-5">
            <h2 class="text-white title_alliances title_domaine"><?= mb_strtoupper(constant('CARACTERISTIQUES')) ?></h2>
        </div>

        <div class="row align-items-start" id="bloc_vin_selection">

            <div class="row justify-content-center">

                <div class="col-lg-5">
                    <div class="card card1 mb-4 shadow">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body text-center flex-column">
                                    <div class="text-center mb-3">
                                        <img src="<?= $static_img ?>gout/<?= $vin['imageGoutBoisson'] ?>" alt="<?= mb_strtoupper(constant($vin['nomGoutBoisson'])) ?>">
                                    </div>
                                    <div>
                                        <h3 class="card-title text-white"><?= mb_strtoupper(constant($vin['nomGoutBoisson'])) ?></h3>
                                    </div>
                                    <div>
                                        <p class="text-white"><?= nl2br($vin['contentCaracteristiqueBoisson']) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (!empty($vin['titreCaracteristiqueBoisson'])) { ?>

                    <div class="col-lg-5">
                        <div class="card card2 mb-4 shadow">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body text-center">
                                        <h3 class="card-title text-dark"><?= mb_strtoupper($vin['titreCaracteristiqueBoisson']) ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>

        </div>

    </div>

    <div class="text-center mb-5">

        <div class="mb-5">
            <h2 class="text-white title_alliances title_domaine title_domaine_mobile"><?= mb_strtoupper(constant('DOMAINE')) ?></h2>
        </div>

        <div class="row align-items-start">

            <?php if ($vin['contentDefinitionBoisson'] != "") { ?>

                <div class="col text-white">

                    <h3 class="text-white text-bold no_border"><?= htmlspecialchars_decode($vin['nomBoisson']) ?></h3>

                    <p class="text-white mt-3">
                        <?= htmlspecialchars_decode($vin['contentDefinitionBoisson']) ?>
                    </p>

                </div>

            <?php } ?>

            <div class="col">

                <img style="max-width: 295px;" data-fancybox role="button" src="<?= $static_img ?>domaine_images/<?= $vin['domaineImageBoisson'] ?>">

            </div>

        </div>

        <?php if ($vin['cepagesBoisson'] == 1) { ?>

            <div class="row align-items-start">

                <div class="col mt-5" style="background: #fcb714;min-height: 314px;display: flex;justify-content: center;align-items: center;flex-direction: column;">

                    <h3 class="text-white no_border">
                        <?= constant('GRAPES') ?>
                    </h3>

                    <p class="text-white mt-3 fw-bold">
                        <?= nl2br($vin['contentCepagesBoisson']) ?>
                    </p>

                </div>

                <div class="col mt-5">

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                    <div class="chart-container" style="position: relative; max-width:295px;margin: 0 auto;">
                        <canvas id="myChart" width="50" height="50"></canvas>
                    </div>

                    <?php

                    $array = explode(',', $vin['chartContentCepagesBoisson']);
                    $tableau = '';

                    foreach ($array as $value) {
                        $tableau .= '\'' . $value . '\',';
                    }

                    ?>

                    <script>
                        const ctx = document.getElementById('myChart').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: [<?= $tableau ?>],
                                datasets: [{
                                    data: [<?= $vin['chartNumberCepagesBoisson'] ?>],
                                    backgroundColor: [
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgb(220,20,60, 0.2)',
                                        'rgb(50,205,50, 0.2)',
                                        'rgb(0,191,255, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgb(220,20,60, 1)',
                                        'rgb(50,205,50, 1)',
                                        'rgb(0,191,255, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                plugins: {
                                    legend: {
                                        display: false,
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {

                                                let label = ' ' + context.label + ' ' + context.parsed + '';

                                                label += '%';

                                                return label;
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        display: false
                                    }
                                }
                            }
                        });
                    </script>

                </div>

            </div>

        <?php } ?>

        <div id="produits" class="container-md mt-5 mb-5 bloc_vin_title">
            <h2 class="text-light"><span><?= strtoupper(constant('RELATION_VIN')) ?></span></h2>
        </div>

        <div class="container-md mt-5 mb-5" id="bloc_vin">

            <div class="row">

                <?php

                foreach ($relations_vins as $selection) {

                    $avis_vins = selectDB('*', 'avis_vins', 'vin_id = ' . $selection['idBoisson'], $db, '1');
                    $avis_vin = selectDB('COUNT(id) AS nbId', 'avis_vins', 'vin_id = ' . $selection['idBoisson'], $db, '1');

                ?>

                    <div class="col-md-4 mb-4">
                        <div class="card" itemscope itemtype="https://schema.org/Product">
                            <div class="row g-0">
                                <div class="col-md-4 card_image_vin">
                                    <?php if ($selection['planBoisson'] >= 1) { ?>
                                        <div class="vin_plan">
                                            <span>-<?= $selection['planPourcentBoisson'] ?>%</span>
                                            <span><?= constant('PLAN_POURCENT') ?></span>
                                        </div>
                                    <?php } ?>
                                    <div>
                                        <img itemprop="image" role="button" data-fancybox src="<?= $static_img . strtolower($selection['typeBoisson']) . '/' . $selection['imageBoisson']; ?>" class="img-fluid rounded-start" alt="<?= $selection['nomBoisson'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" itemprop="name"><a class="text-dark fw-bold text-decoration-none" href="/<?= $language ?>/<?= strtolower($selection['typeBoisson']) . '/' . $selection['idBoisson']; ?>"><?= $selection['nomBoisson'] . ' ' . $selection['millesimeBoisson']  ?></a></h5>

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
                                            <div class="m-auto prix"><span><span class="chiffre" itemprop="price" content="<?= ($selection['planBoisson'] >= 1) ? number_format($selection['remiseBoisson'], 2, '.', '') : number_format($selection['prixBoisson'], 2, '.', '') ?>"><?= ($selection['planBoisson'] >= 1) ? '<span class="text-warning text-decoration-line-through me-2" style="font-size: 18px;">' . number_format($selection['prixBoisson'], 2, ',', '') . ' €</span> ' . number_format($selection['remiseBoisson'], 2, ',', '') : number_format($selection['prixBoisson'], 2, ',', '') ?> <span itemprop="priceCurrency" content="EUR">€</span></div>
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

            </div>

        </div>

    </div>

</div>

<?php include 'modules/modal/avisModal.php'; ?>