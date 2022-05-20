<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-12 m-auto">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-warning" href="/<?= $language ?>/"><?= constant('NAVBAR_ITEM_1') ?></a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none <?= (empty($_GET['id'])) ? 'active text-white' : 'text-warning' ?>" <?= (empty($_GET['id'])) ? 'aria-current="page"' : '' ?>" href="/<?= $language ?>/<?= $_GET['page'] ?>"><?= ucfirst($_GET['page']) ?></a></li>
                <?php if (!empty($_GET['id'])) { ?><li class="breadcrumb-item <?= (!empty($_GET['id'])) ? 'active text-white' : '' ?>" <?= (!empty($_GET['id'])) ? 'aria-current="page"' : '' ?>><?= $champagne['nomBoisson'] ?></li><?php } ?>
            </ol>
        </nav>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="row align-items-start">

        <div id="presentation_vin" class="col-md-3">

            <img role="button" data-fancybox src="<?= $static_img . strtolower($champagne['typeBoisson']) . '/' . $champagne['imageBoisson']; ?>" class="img-fluid rounded-start" alt="<?= $champagne['nomBoisson'] ?>">

            <div class="text-center mt-4">
                <h5 class="text-white"><?= constant('PARTAGER') ?></h5>

                <section class="mt-4">
                    <!-- Facebook -->
                    <a class="btn-floating m-1" href="https://www.facebook.com/sharer/sharer.php?u=https://<?= $_SERVER['HTTP_HOST'] ?>/<?= $language ?>/<?= $_GET['page'] ?>/<?= $champagne['idBoisson'] ?>" onclick="window.open(this.href);return false;" role="button"><img src="<?= $static_img ?>socials/facebook-Icon.png" alt="Facebook"></a>

                    <!-- Twitter -->
                    <a class="btn-floating m-1" href="https://twitter.com/share?url=https://<?= $_SERVER['HTTP_HOST'] ?>/<?= $language ?>/<?= $_GET['page'] ?>/<?= $champagne['idBoisson'] ?>&text=<?= $champagne['nomBoisson'] . ' ' . $champagne['millesimeBoisson'] ?>&via=novinsdumonde" onclick="window.open(this.href);return false;" role="button"><img src="<?= $static_img ?>socials/Twitter-Icon.png" alt="Twitter"></a>
                </section>

            </div>

        </div>


        <div class="col">

            <div class="row align-items-start">

                <div id="bloc_descriptif" class="col pe-5 pb-3">

                    <h1 class="text-white"><?= $champagne['nomBoisson'] . ' ' .  $champagne['millesimeBoisson'] ?></h1>
                    <div class="m-auto"><span class="badge_region"><?= $champagne['regionBoisson'] ?></span></div>
                    <div class="m-auto text-white"><span><?= $champagne['apellationBoisson'] ?></span></div>
                    <div class="m-auto text-white"><span><?= $champagne['couleurBoisson'] ?></span><span> | </span><span><?= $champagne['degreeBoisson'] ?></span><span>°</span></div>
                    <?php if ($champagne['cepagesBoisson'] == 1) { ?>
                        <hr>
                        <div class="note_cepages">
                            <?php

                            switch ($champagne['niveauCepagesBoisson']) {
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

                                case 3:
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
                    <input type="hidden" id="boissonId" value="<?= $champagne['idBoisson'] ?>">
                    <div><span class="text-white"><a role="button" data-bs-toggle="modal" data-bs-target="#avisModal"><i class="fa-brands fa-affiliatetheme me-2"></i><span><?= constant('AVIS') ?></a></span> <span class="text-white me-2">|</span> <span role="button" class="add_favoris text-white favoris_i"><i class="fa-solid fa-heart me-1"></i> <?= constant('ADD_FAVORIS') ?></span> <span role="button" class="add_favoris_unclick remove_favoris text-white favoris_i"><i class="fa-solid fa-heart-circle-minus me-1"></i> <?= constant('REMOVE_FAVORIS') ?></span></div>
                    <hr>
                    <div><span class="text-white">Réf : </span><span class="text-white"><?= str_pad($champagne['idBoisson'], $strpad, '0', STR_PAD_LEFT) ?></span></div>

                </div>

                <div class="col ps-5">

                    <h3 class="text-white text-end no_border"><?= number_format($champagne['prixBoisson'], 2, ',', '') ?><span> €</span></h3>

                    <div class="text-end">
                        <span class="text-white no_border"><?= constant('CONTENANCE') ?> <?= $champagne['contenanceBoisson'] ?></span><br>
                        <span class="text-white"><?= constant('SOIT') ?> <?= number_format(($champagne['soitBoisson']), 2, ',', '') ?> € / <?= constant('LITRE') ?></span>
                    </div>

                    <div class="text-end mt-3">
                        <a class="add_cart btn btn-outline-warning btn-lg"><i class="fa-solid fa-bag-shopping me-2"></i><?= constant('ADD_CART') ?></a>
                    </div>

                    <div class="text-end mt-5 mini_bloc">
                        <h5 class="text-white fw-bold"><?= constant('GARDE') ?></h5>
                        <span class="text-white"><?= $champagne['gardeBoisson'] ?></span>
                    </div>

                    <div class="text-end mt-5 mini_bloc">
                        <h5 class="text-white fw-bold"><?= constant('SERVICE') ?></h5>
                        <span class="text-white"><?= $champagne['temperatureBoisson'] ?></span><span class="text-white">°</span>
                    </div>

                    <?php if ($champagne['cepagesBoisson'] == 1) { ?>

                        <div class="text-end mt-5 mini_bloc">
                            <h5 class="text-white fw-bold"><?= constant('GRAPES') ?></h5>
                            <span class="text-white"><?= nl2br($champagne['contentCepagesBoisson']) ?></span>
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
                                        <img src="<?= $static_img ?>gout/<?= $champagne['imageGoutBoisson'] ?>" alt="<?= mb_strtoupper(constant($champagne['nomGoutBoisson'])) ?>">
                                    </div>
                                    <div>
                                        <h3 class="card-title text-white"><?= mb_strtoupper(constant($champagne['nomGoutBoisson'])) ?></h3>
                                    </div>
                                    <?php if (!empty($champagne['contentCaracteristiqueBoisson'])) { ?>
                                        <div>
                                            <p class="text-white"><?= nl2br($champagne['contentCaracteristiqueBoisson']) ?></p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (!empty($champagne['titreCaracteristiqueBoisson'])) { ?>

                    <div class="col-lg-5">
                        <div class="card card2 mb-4 shadow">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body text-center">
                                        <h3 class="card-title text-dark"><?= mb_strtoupper($champagne['titreCaracteristiqueBoisson']) ?></h3>
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

            <div class="col">

                <h3 class="text-white text-bold no_border"><?= mb_strtoupper($champagne['nomBoisson']) ?></h3>

                <p class="text-white mt-3">
                    <?= nl2br($champagne['contentDefinitionBoisson']) ?>
                </p>

            </div>

            <div class="col">

                <img style="max-width: 315px;" data-fancybox role="button" src="<?= $static_img ?>domaine_images/<?= $champagne['domaineImageBoisson'] ?>">

            </div>

        </div>

        <?php if ($champagne['cepagesBoisson'] == 1) { ?>

            <div class="row align-items-start">

                <div class="col mt-5" style="background: #fcb714;min-height: 314px;display: flex;justify-content: center;align-items: center;flex-direction: column;">

                    <h3 class="text-white no_border">
                        <?= constant('GRAPES') ?>
                    </h3>

                    <p class="text-white mt-3 fw-bold">
                        <?= nl2br($champagne['contentCepagesBoisson']) ?>
                    </p>

                </div>

                <div class="col mt-5">

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                    <div class="chart-container" style="position: relative; max-width:315px;margin: 0 auto;">
                        <canvas id="myChart" width="50" height="50"></canvas>
                    </div>

                    <script>
                        const ctx = document.getElementById('myChart').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: [<?= $champagne['chartContentCepagesBoisson'] ?>],
                                datasets: [{
                                    data: [<?= $champagne['chartNumberCepagesBoisson'] ?>],
                                    backgroundColor: [
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgb(220,20,60, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgb(220,20,60, 1)'
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

    </div>

</div>

<?php include 'modules/modal/avisModal.php'; ?>