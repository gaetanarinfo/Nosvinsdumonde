<div class="container-md mt-5 mb-5 bloc_vin_title" id="livraison">
    <h2 class="text-light"><span><i class="fa-solid fa-chevron-right me-2"></i> <?= strtoupper(constant('TITLE_LIVRAISON')) ?></span></h2>
</div>

<div class="container-md mt-5 mb-5">

    <div class="row">

        <div class="text-left m-auto">

            <div class="row" style="display: flex;align-items: flex-start;">

                <div class="col-md-5">
                    <img class="w-100" src="<?= $static_img ?>livraison.png" alt="">
                </div>

                <div class="col-md-7">

                    <h4 class="text-white"><?= constant('LIVRAISON_PHRASE_1') ?></h4>
                    <h4 class="mt-5 text-white"><?= constant('LIVRAISON_PHRASE_2') ?></h4>

                    <h5 class="mt-5 mb-4 text-white fw-bold"><i class="fa-solid fa-truck-fast me-1"></i><?= constant('LIVRAISON_PHRASE_3') ?></h5>
                    <h5 class="text-white fw-bold"><i class="fa-brands fa-usps me-1"></i><?= constant('LIVRAISON_PHRASE_4') ?></h5>

                </div>

            </div>

        </div>

        <div class="text-center">
            <div class="mt-5">
                <a href="/<?= $language ?>/livraison" class="btn btn-outline-warning btn-lg">
                    <i class="fa-solid fa-shoe-prints me-2"></i><?= constant('SAVOIR') ?>
                </a>
            </div>
        </div>

    </div>

</div>