<div id="appellationRegions" class="container-md mt-5 mb-5 bloc_vin_title">
    <h2 class="text-light"><span><i class="fa-solid fa-chevron-right me-2"></i> <?= strtoupper(constant('APPELLATION_REGION')) ?></span></h2>
</div>

<div class="container-md mt-5 mb-5" id="bloc_add_vin">

    <div class="row">

        <div class="text-left m-auto">

            <div class="row text-center" style="align-items: center;">

                <div class="col-md-6 border_center">

                    <?php foreach ($appellations_home as $value) { ?>
                        <a class="btn btn-outline-bordeaux m-2" style="border-radius: 16px;" href="/<?= $language ?>/appellation/1/<?= $value['id'] ?>">
                            <span><?= $value['nom_fr_fr'] ?></span>
                        </a>
                    <?php } ?>

                </div>

                <div class="col-md-6">

                    <?php foreach ($regions_home as $value) { ?>
                        <a class="btn btn-outline-bordeaux m-2" style="border-radius: 16px;" href="/<?= $language ?>/region/1/<?= $value['id'] ?>">
                            <span><?= $value['nom_fr_fr'] ?></span>
                        </a>
                    <?php } ?>

                </div>

            </div>

            <div class="text-center">
                <div class="mt-5">
                    <a href="/<?= $language ?>/plan-site" class="btn btn-outline-warning btn-lg">
                        <i class="fa-solid fa-bars me-2"></i><?= constant('VOIR_PLUS') ?>
                    </a>
                </div>
            </div>

        </div>

    </div>

</div>