<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="row">

        <div class="col-lg-12 m-auto text-left">

            <div style="margin: 0 auto;" class="w-50">
                <h1 class="text-center mb-3 text-white"><?= constant('TITLE_PAGE_VINS') ?></h1>
            </div>

            <div class="m-auto text-left w-50 subtitle_mobile_page_vin">
                <p class="text-white"><?= constant('SUBTITLE_PAGE_VINS') ?></p>
            </div>

        </div>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-12 m-auto">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-warning" href="/<?= $language ?>/"><?= constant('NAVBAR_ITEM_1') ?></a></li>
                <li class="breadcrumb-item text-white"><?= constant('LINK_7') ?></li>
            </ol>
        </nav>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="row align-items-start">

        <div class="col-md-12">

            <div style="max-width: 170px;">
                <h3 class="text-white"><?= constant('FILTER_BY') ?></h3>
            </div>

            <div class="mt-4 w-100">

                <form>

                    <div class="row" style="justify-content: center;">

                        <div class="mb-4 col-md-2">
                            <label class="form-label text-white millesime"><i class="fa-solid fa-chevron-right me-2"></i><?= constant('MILLESIME') ?></label>
                            <select style="display: none;" id="millesime" class="form-select">
                                <option value="">----</option>
                                <?php for ($i = 2009; $i <= 2022; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                } ?>
                            </select>
                        </div>

                        <div class="mb-4 col-md-2">
                            <label class="form-label text-white couleur"><i class="fa-solid fa-chevron-right me-2"></i><?= constant('COULEUR') ?></label>
                            <div style="display: none;" id="couleur">
                                <input type="hidden" id="couleurFinal" value="">
                                <ul class="list-group">
                                    <?php foreach ($couleurs as $couleur) { ?>
                                        <li class="list-group-item">
                                            <div class="bottle" data-value="<?= $couleur['id'] ?>">
                                                <span class="bottle_wine" style="background: #<?= $couleur['value'] ?>"><i class="fas fa-wine-bottle"></i></span>
                                                <span class="bottle_wine_text"><?= $couleur['nom'] ?></span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="mb-4 col-md-2">
                            <label class="form-label text-white prix"><i class="fa-solid fa-chevron-right me-2"></i><?= constant('PRIX') ?> <span class="ms-1 text-warning">(</span><span class="text-warning rangePrix">100</span><span class="text-warning"> €)</span></label>
                            <input style="display: none;" type="range" class="form-range" min="1" max="2200" step="15" value="100" id="prix">
                        </div>

                        <div class="mb-4 col-md-2">
                            <label class="form-label text-white pays"><i class="fa-solid fa-chevron-right me-2"></i><?= constant('PAYS') ?></label>
                            <select style="display: none;" id="pays" class="form-select">
                                <option value="">----</option>
                                <?php foreach ($pays as $pay) {
                                    echo '<option value="' . $pay['id'] . '">' . $pay['nom_fr_fr'] . '</option>';
                                } ?>
                            </select>
                        </div>

                        <div class="mb-4 col-md-2">
                            <label class="form-label text-white region"><i class="fa-solid fa-chevron-right me-2"></i><?= constant('REGION') ?></label>
                            <select style="display: none;" id="region" class="form-select">
                                <option value="">----</option>
                            </select>
                        </div>

                        <div class="mb-4 col-md-2">
                            <label class="form-label text-white appellation"><i class="fa-solid fa-chevron-right me-2"></i><?= constant('APPELLATION') ?></label>
                            <select style="display: none;" id="appellation" class="form-select">
                                <option value="">----</option>
                            </select>
                        </div>

                        <div class="mb-4 col-md-3">
                            <label class="form-label text-white gout"><i class="fa-solid fa-chevron-right me-2"></i><?= constant('GOUT') ?></label>
                            <div style="display: none;" id="gout">
                                <input type="hidden" id="goutFinal" value="">
                                <ul class="list-group">
                                    <?php foreach ($gouts as $gout) { ?>
                                        <li class="list-group-item">
                                            <div class="gout_item" data-value="<?= $gout['id'] ?>">
                                                <span class="gout_icon"><img src="<?= $static_img ?>gout/<?= $gout['image'] ?>"></span>
                                                <span class="gout_text"><?= constant($gout['nom']) ?></span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="mb-4 col-md-2">
                            <label class="form-label text-white alliance"><i class="fa-solid fa-chevron-right me-2"></i><?= constant('ALLIANCE') ?></label>
                            <div style="display: none;" id="alliance">
                                <input type="hidden" id="allianceFinal" value="">
                                <ul class="list-group">
                                    <?php foreach ($alliances as $alliance) { ?>
                                        <li class="list-group-item">
                                            <div class="alliance_item" data-value="<?= $alliance['id'] ?>">
                                                <span class="alliance_icon"><img src="<?= $static_img ?>alliances/<?= $alliance['image'] ?>"></span>
                                                <span class="alliance_text"><?= constant($alliance['nom']) ?></span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="mb-4 col-md-2 filter" style="display: none;">
                            <a id="remove_filter" class="btn btn-outline-info"><i class="fa-solid fa-eraser me-2"></i><b>Effacer les filtres</b></a>
                        </div>

                    </div>

                </form>

            </div>

        </div>

        <input type="hidden" id="lang" value="<?= $language ?>">

        <hr class="mb-5">

        <div id="blocVin2" class="col position-relative">
            <div id="loaderVin" class="lds-ripple">
                <div></div>
                <div></div>
            </div>
        </div>

    </div>

</div>