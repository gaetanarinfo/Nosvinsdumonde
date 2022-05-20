<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="row">

        <div class="col-lg-12 m-auto text-left">

            <div style="margin: 0 auto;" class="w-50">
                <h1 class="text-center mb-3 text-white"><?= constant('TITLE_PAGE_HISTORIQUE') ?></h1>
            </div>

            <div class="m-auto text-center w-50 subtitle_mobile_page_vin">
                <h4 class="text-white no-border"><?= constant('SUBTITLE_PAGE_HISTORIQUE') ?></h4>
            </div>

        </div>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-12 m-auto">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-warning" href="/<?= $language ?>/"><?= constant('NAVBAR_ITEM_1') ?></a></li>
                <li class="breadcrumb-item text-white"><?= constant('LINK_17') ?></li>
            </ol>
        </nav>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <?php if (count($sites_commandes) < 1) { ?>

        <div class="text-center text-white">
            <h3 class="no_border"><i class="fa-solid fa-triangle-exclamation me-3" style="color: #ffec02;"></i><?= constant('EMPTY_COMMANDE') ?></h3>
        </div>

    <?php } else { ?>

        <div id="tableTotal" class="col-lg-12 mb-5">

            <div class="row justify-content-center text-white">

                <div class="col-md-3 item shadow mt-3 mb-3 ms-3 me-3">

                    <div class="text-center">
                        <h5><b><?= constant('COMMANDE_ITEM_1') ?></b></h5>
                    </div>

                    <div class="text-center mt-4 mb-4">
                        <i class="fa-solid fa-cart-shopping" style="color: burlywood;font-size: 40px;"></i>
                    </div>

                    <div class="text-center mt-3 mb-3">
                        <h4><b><?= count($sites_commandes) ?> / <?= number_format($prix['nombrePrix'], 2, ',', '') ?> €</b></h4>
                    </div>

                </div>

                <div class="col-md-3 item shadow mt-3 mb-3 ms-3 me-3">

                    <div class="text-center">
                        <h5><b><?= constant('COMMANDE_ITEM_2') ?></b></h5>
                    </div>

                    <div class="text-center mt-4 mb-4">
                        <i class="fa-solid fa-piggy-bank" style="color: #97f1ff;font-size: 40px;"></i>
                    </div>

                    <div class="text-center mt-3 mb-3">
                        <h4><b><?= number_format($ports['nombrePort'], 2, ',', '') ?> €</b></h4>
                    </div>

                </div>

                <div class="col-md-3 item shadow mt-3 mb-3 ms-3 me-3">

                    <div class="text-center">
                        <h5><b><?= constant('COMMANDE_ITEM_3') ?></b></h5>
                    </div>

                    <div class="text-center mt-4 mb-4">
                        <i class="fa-solid fa-gift" style="color: #f1ff7d;font-size: 40px;"></i>
                    </div>

                    <div class="text-center mt-3 mb-3">
                        <h4><b><?= $user['point'] ?></b></h4>
                    </div>

                </div>

            </div>

        </div>

        <div class="table-responsive">

            <table id="commandesTable" class="table">

                <thead class="table-light">

                    <tr>
                        <?= constant('TABLE_COMMANDE') ?>
                    </tr>

                </thead>

                <tbody class="text-white align-middle">

                    <?php

                    foreach ($sites_commandes as $sites_commande) {

                        if (!empty($sites_commandes)) {

                            $select = 'V.id AS idBoisson,V.nom AS nomBoisson,V.boisson_id AS typeBoisson';

                            $table = 'vins AS V';

                            $where = 'V.id IN (' . $sites_commande['vin_id'] . ') AND V.active = 1 ORDER BY V.nom';

                            $produits = selectDB($select, $table, $where, $db, '*');
                        }

                        $status_commandes = selectDB('*', 'status_commandes', 'id = ' . $sites_commande['id_status_commande'], $db, '1');

                        $strpad = 4;
                        if (strlen($sites_commande['id']) >= 4) $strpad = strlen($sites_commande['id']) + 1;

                    ?>

                        <tr>
                            <th scope="row"><?= str_pad($sites_commande['id'], $strpad, '0', STR_PAD_LEFT); ?></th>
                            <th>

                                <?php

                                foreach ($produits as $value) {

                                    echo '<i class="fa-solid fa-chevron-right me-1"></i>';

                                    if ($value['typeBoisson'] == "1") {
                                        $vin_url = 'vins';
                                    } else if ($value['typeBoisson'] == "2") {
                                        $vin_url = 'champagnes';
                                    }

                                ?>

                                    <?php if (count($produits) >= 2) { ?>
                                        <a class="text-white" href="/<?= $language ?>/<?= $vin_url ?>/<?= $value['idBoisson'] ?>"><?= $value['nomBoisson'] . '<br>' ?></a>
                                    <?php } else { ?>
                                        <a class="text-white" href="/<?= $language ?>/<?= $vin_image ?>/<?= $value['idBoisson'] ?>"><?= $value['nomBoisson'] ?></a>
                                    <?php } ?>
                                <?php } ?>

                            </th>
                            <th><?= str_replace('pi_', '', $sites_commande['transaction_id']) ?></th>
                            <th><?= $status_commandes['label'] ?></th>
                            <th><?= number_format($sites_commande['total'], 2, ',', '') . ' €' ?></th>
                            <th><?= number_format($sites_commande['port'], 2, ',', '') . ' €' ?></th>
                            <th class="text-end"><?= date('d/m/Y à H:i', strtotime($sites_commande['date_paiement_effectue'])) ?></th>
                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    <?php } ?>

</div>