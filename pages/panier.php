<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="row">

        <div class="col-lg-12 m-auto text-left">

            <div style="margin: 0 auto;" class="w-50">
                <h1 class="text-center mb-3 text-white"><?= constant('TITLE_PAGE_CART') ?></h1>
            </div>

        </div>

    </div>

</div>

<div class="container-md mt-5 mb-3">

    <div class="col-lg-12 m-auto">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-warning" href="/<?= $language ?>/"><?= constant('NAVBAR_ITEM_1') ?></a></li>
                <li class="breadcrumb-item text-white"><?= constant('LINK_16') ?></li>
            </ol>
        </nav>

    </div>

</div>

<?php

if (!empty($_COOKIE['port']) && $_COOKIE['port'] == "1") {

    $port = 0.00;
    $port_definitif = 14.00;
} else {

    $port_definitif = 14.00;

    if (count($carts) * $quantity <= 12) {
        $port = 14.00;
        $port_definitif = 14.00;
    } else if (count($carts) * $quantity >= 13 && count($carts) * $quantity <= 24) {
        $port = 23.00;
        $port_definitif = 23.00;
    } else if (count($carts) * $quantity >= 25 && count($carts) * $quantity <= 36) {
        $port = 29.00;
        $port_definitif = 29.00;
    } else if (count($carts) * $quantity >= 37 && count($carts) * $quantity <= 48) {
        $port = 34.00;
        $port_definitif = 34.00;
    } else if (count($carts) * $quantity >= 49 && count($carts) * $quantity <= 60) {
        $port = 40.00;
        $port_definitif = 40.00;
    }
}

if (empty($_COOKIE['port'])) {

    $port = 14.00;
    $port_definitif = 14.00;

    if (count($carts) * $quantity <= 12) {
        $port = 14.00;
        $port_definitif = 14.00;
    } else if (count($carts) * $quantity >= 13 && count($carts) * $quantity <= 24) {
        $port = 23.00;
        $port_definitif = 23.00;
    } else if (count($carts) * $quantity >= 25 && count($carts) * $quantity <= 36) {
        $port = 29.00;
        $port_definitif = 29.00;
    } else if (count($carts) * $quantity >= 37 && count($carts) * $quantity <= 48) {
        $port = 34.00;
        $port_definitif = 34.00;
    } else if (count($carts) * $quantity >= 49 && count($carts) * $quantity <= 60) {
        $port = 40.00;
        $port_definitif = 40.00;
    }
}

?>

<div class="container-md mt-3 mb-5">

    <div class="col-lg-12 m-auto">

        <div class="row">
            <div class="col-md-8 m-0">

                <div height="auto" class="stepper text-white" id="stepper2">
                    <div class="steps-container">
                        <div class="steps">

                            <div class="step <?php if ($_GET['step'] == "1") { ?>active<?php } ?> disabled" icon="fa fa-bag-shopping" id="1">
                                <div class="step-title">
                                    <span class="step-number">01</span>
                                    <div class="step-text"><?= constant('LINK_16') ?></div>
                                </div>
                            </div>


                            <?php if (empty($_SESSION['user_id'])) { ?>

                                <div class="step <?php if ($_GET['step'] == "2") { ?>active<?php } ?> disabled" icon="fa fa-user-clock" id="2">
                                    <div class="step-title">
                                        <span class="step-number">02</span>
                                        <div class="step-text"><?= constant('STEP_1') ?></div>
                                    </div>
                                </div>

                                <?php if (empty($_SESSION['user_id'])) { ?>

                                    <div class="step <?php if ($_GET['step'] == "3") { ?>active<?php } ?> disabled" icon="fa fa-map-location-dot" id="3">
                                        <div class="step-title">
                                            <span class="step-number">03</span>
                                            <div class="step-text"><?= constant('STEP_2') ?></div>
                                        </div>
                                    </div>

                                    <div class="step <?php if ($_GET['step'] == "4") { ?>active<?php } ?> disabled" icon="fa fa-credit-card" id="4">
                                        <div class="step-title">
                                            <span class="step-number">04</span>
                                            <div class="step-text"><?= constant('STEP_3') ?></div>
                                        </div>
                                    </div>

                                    <div class="step <?php if ($_GET['step'] == "5") { ?>active<?php } ?> disabled" icon="fa fa-check" id="5">
                                        <div class="step-title">
                                            <span class="step-number">05</span>
                                            <div class="step-text"><?= constant('STEP_4') ?></div>
                                        </div>
                                    </div>

                                <?php } ?>

                            <?php } else { ?>

                                <div class="step <?php if ($_GET['step'] == "2" || $_GET['step'] == "3" || $_GET['step'] == "4") { ?>active<?php } ?> disabled" icon="fa fa-map-location-dot" id="2">
                                    <div class="step-title">
                                        <span class="step-number">02</span>
                                        <div class="step-text"><?= constant('STEP_2') ?></div>
                                    </div>
                                </div>

                                <div class="step <?php if ($_GET['step'] == "3" || $_GET['step'] == "4") { ?>active<?php } ?> disabled" icon="fa fa-credit-card" id="3">
                                    <div class="step-title">
                                        <span class="step-number">03</span>
                                        <div class="step-text"><?= constant('STEP_3') ?></div>
                                    </div>
                                </div>

                                <div class="step <?php if ($_GET['step'] == "4") { ?>active<?php } ?> disabled" icon="fa fa-check" id="4">
                                    <div class="step-title">
                                        <span class="step-number">04</span>
                                        <div class="step-text"><?= constant('STEP_4') ?></div>
                                    </div>
                                </div>

                            <?php } ?>



                        </div>
                    </div>

                    <div class="stepper-content-container">

                        <div class="stepper-content <?php if ($_GET['step'] == "2" || $_GET['step'] == "3" || $_GET['step'] == "4") { ?>hide<?php } ?> fade-in <?php if ($_GET['step'] == "1") { ?>active<?php } ?>" stepper-label="1">

                            <?php

                            $total = 0;
                            $quantity;

                            foreach ($carts as $cart) {

                                if ($cart['boissonId'] == 1) {
                                    $vin_image = 'vins';
                                } else if ($cart['boissonId'] == 2) {
                                    $vin_image = 'champagnes';
                                }

                                $quantity = $counter_cart[$cart['idBoisson']];

                                $total += $cart['prixBoisson'] * $quantity;

                            ?>

                                <div class="row mt-3" style="border: 1px solid #ccc;padding: 20px;">

                                    <div class="col-md-2 text-left img_produit">
                                        <img width="100%" role="button" data-fancybox src="<?= $static_img . $vin_image ?>/<?= $cart['imageBoisson']; ?>" alt="<?= $cart['nomBoisson']; ?>">
                                    </div>

                                    <div class="col-md-7" style="display: flex;flex-direction: column;justify-content: space-around;">

                                        <div class="col">
                                            <h5><a class="text-white text-decoration-none" href="/<?= $language ?>/<?= $vin_image ?>/<?= $cart['idBoisson'] ?>"><b><?= $cart['nomBoisson']; ?></b></a></h5>
                                            <p><a class="text-white text-decoration-none" href="/<?= $language ?>/<?= $vin_image ?>/<?= $cart['idBoisson'] ?>"><?= constant('CONTENANCE') ?><?= $cart['contenanceBoisson']; ?></a></p>
                                        </div>

                                        <div class="col mt-4">
                                            <span class="me-2 remove_produit" data-id="<?= $cart['idBoisson'] ?>" role="button"><i class="fa-solid fa-minus"></i></span><span><?= $quantity ?></span><span role="button" data-id="<?= $cart['idBoisson'] ?>" class="ms-2 add_produit"><i class="fa-solid fa-plus"></i></span><br>
                                            <a role="button" class="text-white remove_produit" data-id="<?= $cart['idBoisson'] ?>"><?= constant('SUPPRIMER') ?></a>
                                        </div>

                                    </div>

                                    <div class="col-md-3" style="text-align: right;">
                                        <span class="total"><?= number_format($cart['prixBoisson'] * $quantity, 2, ',', ''); ?> €</span>
                                    </div>

                                </div>

                            <?php } ?>

                            <?php

                            $points = 0;

                            for ($i = 0; $i <= $sumPrix['prixCount']; $i += 5) {
                                $points += 1;
                            }

                            ?>

                            <?php if (!empty($_SESSION['user_id']) && $user['carte'] == "1") { ?>
                                <div class="text-center mt-3">
                                    <p><?= constant('POINTS') ?> : <?= $points ?> PTS</p>
                                </div>
                            <?php } else { ?>
                                <div class="text-center mt-3">
                                    <p><?= constant('CUMULE_POINTS') ?></p>
                                </div>
                            <?php } ?>

                        </div>

                        <?php if (empty($_SESSION['user_id'])) { ?>

                            <?php if ($_GET['step'] == "2") { ?>

                                <div class="stepper-content show active fade-in" stepper-label="2">

                                    <div class="col-lg-12">

                                        <div class="row m-auto">

                                            <div class="col-md-6">

                                                <div class="container-md mt-5">

                                                    <div class="row">

                                                        <div class="col-lg-12 m-auto text-left">

                                                            <div class="m-auto text-center w-100">
                                                                <h4 class="text-white"><?= constant('LOGIN_CART') ?></h4>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="container-md">

                                                    <div class="row">

                                                        <div class="col-lg-12 m-auto">

                                                            <div id="blocLoginForm">

                                                                <div id="loaderUser" style="display: none;" class="lds-ripple">
                                                                    <div></div>
                                                                    <div></div>
                                                                </div>

                                                                <div id="message_user" class="alert mb-0 mt-5 d-flex align-items-center alert-success" role="alert">
                                                                    <h4 class="alert-heading fw-bold text-center no-border">
                                                                        <div class="message_icone mb-3"></div>
                                                                        <div class="message_title"></div>
                                                                    </h4>
                                                                    <div class="text-center">
                                                                        <h5 class="message_content text-center"></h5>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="text-center">
                                                                        <h6 class="mb-0 message_content_2 text-center"></h6>
                                                                    </div>
                                                                    <div class="text-center message_back">

                                                                    </div>
                                                                </div>

                                                                <form id="form_login" class="mt-3 mb-3">

                                                                    <input type="hidden" name="lang" value="<?= $language ?>">

                                                                    <div class="mb-3">
                                                                        <label for="email" class="form-label text-white"><?= constant('EMAIL_INPUT') ?></label>
                                                                        <input type="email" class="form-control" autocomplete="email" name="email" aria-describedby="email" required>
                                                                        <div id="emailHelp" class="form-text text-white"><?= constant('LABEL_1') ?></div>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="password" class="form-label text-white"><?= constant('PASSWORD_INPUT') ?></label>
                                                                        <input type="password" minlength="8" autocomplete="current-password" class="form-control" name="password" required>
                                                                        <div id="emailHelp" class="form-text text-white"><?= constant('LABEL_2') ?></div>
                                                                    </div>

                                                                    <div class="text-center">
                                                                        <button type="submit" class="btn btn-outline-warning"><?= constant('SIGNIN') ?></button>
                                                                    </div>

                                                                </form>

                                                            </div>

                                                        </div>

                                                        <div class="col-lg-12 m-auto">

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="container-md mt-5">

                                                    <div class="row">

                                                        <div class="col-lg-12 m-auto text-left">

                                                            <div class="m-auto text-center w-100">
                                                                <h4 class="text-white"><?= constant('REGISTER_CART') ?></h4>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div id="blocRegisterForm">

                                                    <div id="loaderUser2" style="display: none;" class="lds-ripple">
                                                        <div></div>
                                                        <div></div>
                                                    </div>

                                                    <div id="message_register" class="alert mb-0 mt-5 d-flex align-items-center alert-success" role="alert">

                                                        <h4 class="alert-heading fw-bold text-center no-border">
                                                            <div class="message_icone mb-3"></div>
                                                            <div class="message_title"></div>
                                                        </h4>

                                                        <div class="text-center">
                                                            <h5 class="message_content text-center"></h5>
                                                        </div>

                                                        <hr>

                                                        <div class="text-center">
                                                            <h6 class="mb-0 message_content_2 text-center"></h6>
                                                        </div>

                                                        <div class="text-center message_back">

                                                        </div>

                                                    </div>

                                                    <form id="form_register" class="row">

                                                        <input type="hidden" name="lang" value="<?= $language ?>">

                                                        <div class="mb-3 mt-3">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="societe" value="1" checked>
                                                                <label class="form-check-label text-white" for="societe"><?= constant('SOCIETE_1') ?></label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="societe" value="2">
                                                                <label class="form-check-label text-white" for="societe"><?= constant('SOCIETE_2') ?></label>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="societeName" class="form-label text-white"><?= constant('SOCIETE_INPUT') ?></label>
                                                            <input type="text" class="form-control" autocomplete="societe" name="societeName" aria-describedby="societeName">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="email" class="form-label text-white"><?= constant('EMAIL_INPUT') ?>*</label>
                                                            <input type="email" class="form-control" autocomplete="email" name="email" aria-describedby="email" required>
                                                            <div id="emailHelp" class="form-text text-white"><?= constant('LABEL_1') ?></div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="password" class="form-label text-white"><?= constant('PASSWORD_INPUT') ?>*</label>
                                                            <input type="password" minlength="8" autocomplete="current-password" class="form-control" name="password" required>
                                                            <div id="emailHelp" class="form-text text-white"><?= constant('LABEL_2') ?></div>
                                                        </div>

                                                        <div class="mb-4 mt-4 text-center">
                                                            <h4 class="text-white fw-bold no-border"><?= constant('INFO_PERSO') ?></h4>
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="civilite" value="1" checked>
                                                                <label class="form-check-label text-white" for="civilite"><?= constant('CIVILITE_1') ?></label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="civilite" value="2">
                                                                <label class="form-check-label text-white" for="civilite"><?= constant('CIVILITE_2') ?></label>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="prenom" class="form-label text-white"><?= constant('PRENOM_INPUT') ?>*</label>
                                                            <input type="text" class="form-control" name="prenom" aria-describedby="prenom" required>
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="nom" class="form-label text-white"><?= constant('NOM_INPUT') ?>*</label>
                                                            <input type="text" class="form-control" name="nom" aria-describedby="nom" required>
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="adresse" class="form-label text-white"><?= constant('ADRESSE_INPUT') ?>*</label>
                                                            <input type="text" class="form-control" name="adresse" aria-describedby="adresse" required>
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="pays" class="form-label text-white"><?= constant('PAYS_INPUT') ?>*</label>
                                                            <select name="pays" aria-describedby="pays" class="form-select" required>
                                                                <?php foreach ($pays as $pay) { ?>
                                                                    <option value="<?= $pay['id'] ?>" <?= ($language == "fr" && $pay['id'] == "75") ? 'selected' : '' ?> <?= ($language == "en" && $pay['id'] == "228") ? 'selected' : '' ?>><?= ($language == "fr") ? $pay['nom_fr_fr'] : '' ?><?= ($language == "en") ? $pay['nom_en_gb'] : '' ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="code_postal" class="form-label text-white"><?= constant('CODEPOSTAL_INPUT') ?>*</label>
                                                            <input type="number" class="form-control" name="code_postal" aria-describedby="code_postal" required>
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="ville" class="form-label text-white"><?= constant('VILLE_INPUT') ?>*</label>
                                                            <input type="text" class="form-control" name="ville" aria-describedby="ville" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label text-white"><?= constant('PHONE_INPUT') ?>*</label>
                                                            <input type="number" class="form-control" name="phone" aria-describedby="phone" required>
                                                        </div>

                                                        <div class="mb-4 mt-4 text-center">
                                                            <h4 class="text-white fw-bold no-border"><?= constant('CARTE_PERSO') ?></h4>
                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="carte" value="1" checked>
                                                                <label class="form-check-label text-white" for="carte"><?= constant('CARTE_1') ?></label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="carte" value="2">
                                                                <label class="form-check-label text-white" for="carte"><?= constant('CARTE_2') ?></label>
                                                            </div>
                                                        </div>


                                                        <div class="mb-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="humain" checked>
                                                                <label class="form-check-label text-white" for="humain">
                                                                    <?= constant('FORM_INPUT_8') ?>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="text-left">
                                                            <p class="text-white"><?= constant('VERIF_CHAMP') ?></p>
                                                        </div>

                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-outline-warning"><?= constant('SUIVANT') ?></button>
                                                        </div>

                                                    </form>

                                                </div>


                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php } ?>

                        <?php } else { ?>

                            <?php if ($_GET['step'] == "2") { ?>

                                <div class="stepper-content show active fade-in" stepper-label="2">

                                    <div class="col-lg-12">

                                        <div class="row m-auto">

                                            <div class="container-md mt-5">

                                                <div class="row">

                                                    <div class="col-lg-12 m-auto text-left">

                                                        <div class="m-auto text-center w-100">
                                                            <h2 class="text-white"><?= constant('MODE_LIVRAISON') ?></h2>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="container-md mt-5">

                                                <div class="col-lg-12">

                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <div class="form-check">
                                                                <input class="form-check-input me-3" type="radio" name="retrait" value="1" style="width: 1.5em;height: 1.5em;" <?= (!empty($_COOKIE['port']) && $_COOKIE['port'] == "1") ? 'checked' : ''; ?>>
                                                                <h4 class="no-border"><?= constant('RETRAIT') ?></h4><span class="small ms-3"><?= constant('RETRAIT_2') ?></span>
                                                            </div>

                                                            <br>
                                                            <br>

                                                            <div class="form-check">
                                                                <input style="width: 1.5em;height: 1.5em;" class="form-check-input me-3" type="radio" name="retrait" value="2" <?= (empty($_COOKIE['port'])) ? 'checked' : ''; ?> <?= (!empty($_COOKIE['port']) && $_COOKIE['port'] == "2") ? 'checked' : ''; ?>>
                                                                <h4 class="no-border"><?= constant('DOMICILE') ?></h4>
                                                                <span class="small ms-3">(<?= constant('FRANCE') ?>)</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 text-end">

                                                            <h4 class="no-border" style="min-height: 1.5rem;padding-left: 1.5em;margin-bottom: 0.125rem;">0,00 €</h4>

                                                            <br>
                                                            <br>
                                                            <br>

                                                            <h4 class="no-border" style="min-height: 1.5rem;padding-left: 1.5em;margin-bottom: 0.125rem;"><?= number_format($port_definitif, 2, ',', ''); ?> €</h4>

                                                        </div>

                                                    </div>

                                                </div>

                                                <hr>

                                                <div class="col-md-12">

                                                    <h4 class="no-border"><?= constant('COLIS') ?></h4>
                                                    <span>(<?= constant('CHAR') ?>)</span>

                                                    <textarea id="giftMessage" style="resize: vertical;" class="form-control" maxlength="360" rows="6"></textarea>

                                                    <div class="row d-flex mt-5" style="align-items: center;">

                                                        <div class="text-start col">
                                                            <a href="/<?= $language ?>/panier/1" class="text-decoration-none text-white"><i class="fa-solid fa-angle-left me-1"></i> <?= constant('BACK_PAIEMENT') ?></a>
                                                        </div>

                                                        <div class="text-end col">
                                                            <a href="/<?= $language ?>/panier/3" class="btn btn-outline-warning btn-lg"><i class="fa-solid fa-angle-right me-2"></i> <?= constant('CONTINUER_PAIEMENT') ?></a>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php } ?>

                            <?php if ($_GET['step'] == "3") { ?>

                                <div class="stepper-content <?php if ($_GET['step'] == "3") { ?>show<?php } ?> active fade-in" stepper-label="3">

                                    <div class="col-lg-12">

                                        <div class="row m-auto">

                                            <div class="container-md mt-5">

                                                <div class="row">

                                                    <div class="col-lg-12 m-auto text-left">

                                                        <div class="m-auto text-center w-100">
                                                            <h2 class="text-white"><?= constant('MODE_PAIEMENT') ?></h2>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="container-md mt-5">

                                            <div class="col-lg-12">

                                                <div class="row">

                                                    <div id="choice_methode" class="col-md-6">

                                                        <div class="form-check">
                                                            <input class="form-check-input me-3" type="radio" name="paiement" value="1" style="width: 1.5em;height: 1.5em;" checked>
                                                            <h4 class="no-border"><?= constant('METHODE_1') ?></h4>
                                                        </div>
                                                        <br>
                                                        <div class="form-check">
                                                            <input style="width: 1.5em;height: 1.5em;" class="form-check-input me-3" type="radio" name="paiement" value="2">
                                                            <h4 class="no-border"><?= constant('METHODE_2') ?></h4>
                                                        </div>

                                                    </div>

                                                    <div id="loaderpaiement" class="col-md-6">

                                                        <div id="loaderUserPaiement" class="lds-ripple">
                                                            <div></div>
                                                            <div></div>
                                                        </div>

                                                    </div>

                                                    <div id="error" class="alert mb-0 align-items-center alert-danger" role="alert">

                                                        <h4 class="alert-heading fw-bold text-center no-border">
                                                            <div class="message_icone mb-3"><i class="fa-solid fa-times" style="font-size: 40px;"></i></div>
                                                            <div class="message_title"><?= constant('MESSAGE_PAY_CANCEL') ?></div>
                                                        </h4>

                                                        <div class="text-center">
                                                            <h5 class="message_content text-center no-border"><?= constant('MESSAGE_PAY_CANCEL_2') ?></h5>
                                                        </div>

                                                        <hr>

                                                        <div class="text-center">
                                                            <h6 class="mb-0 message_content_2 text-center no-border"><?= constant('MESSAGE_PAY_CANCEL_3') ?></h6>
                                                        </div>

                                                        <div class="text-center mt-3">
                                                            <a class="text-dark" href="/<?= $language ?>/panier/3">Retour</a>
                                                        </div>

                                                    </div>

                                                    <div id="after_paiement" class="col-md-6">

                                                        <div class="card_element">

                                                            <!-- Display a payment form -->
                                                            <form id="payment-form">

                                                                <div id="card-element">
                                                                    <!--Stripe.js injects the Card Element-->
                                                                </div>
                                                                <input type="hidden" value="<?php if (!empty($_COOKIE['cashBackUse'])) { ?><?= str_replace('.', '', number_format($total + $port - $user['cashback'], 2, '', '')) ?><?php } else { ?><?= str_replace('.', '', number_format($total + $port, 2, '', '')) ?><?php } ?>" id="amount">
                                                                <input type="hidden" value="<?php if (!empty($_COOKIE['cashBackUse'])) { ?><?= number_format($total + $port - $user['cashback'], 2, '.', '') ?><?php } else { ?><?= number_format($total + $port, 2, '.', '') ?><?php } ?>" id="total">
                                                                <input type="hidden" value="Commande - <?= $user['nom'] . ' ' . $user['prenom'] . ' - ' . $user['email'] . ' - ' . date('Y/m/d H:i:s') ?>" id="description">
                                                                <input type="hidden" value="<?= number_format($port, 2, ',', '') ?>" id="port">
                                                                <input type="hidden" value="<?= $points ?>" id="point">
                                                                <input type="hidden" value="<?= $language ?>" name="lang">
                                                                <button class="btn btn-outline-warning btn-lg mt-3 w-100" id="submit_card">
                                                                    <span id="button-text"><?= constant('PAY_COMMANDE') ?></span>
                                                                </button>

                                                            </form>

                                                        </div>

                                                        <div class="paypal_element">

                                                            <div id="paypal-button-container" class="hidden" style="display: block;margin: 0 auto;"></div>

                                                        </div>

                                                    </div>

                                                    <?php if ($user['cashback'] >= 1) { ?>

                                                        <div class="p-0 text-start mt-5">
                                                            <h4 class="no-border text-white"><?= constant('CASHBACK_DIV') ?></h4>
                                                            <h4 class="no-border text-info">
                                                                <?= number_format($user['cashback'], 2, ',', '') . ' €' ?>
                                                            </h4>
                                                            <?php if (empty($_COOKIE['cashBackUse'])) { ?>
                                                                <a id="user_cashback" class="btn btn-outline-warning mt-2"><?= constant('UTILISE_CASH') ?></a>
                                                            <?php } else { ?>
                                                                <a id="user_remove_cashback" class="btn btn-outline-danger mt-2"><?= constant('REMOVE_CASH') ?></a>
                                                            <?php } ?>
                                                        </div>

                                                    <?php } ?>

                                                    <div class="p-0 text-start mt-5">
                                                        <span><?= constant('COMMANDE_LEGALE') ?></span>
                                                    </div>

                                                    <div class="p-0 row d-flex mt-5" style="align-items: center;">

                                                        <div class="text-start col">
                                                            <a href="/<?= $language ?>/panier/2" class="text-decoration-none text-white"><i class="fa-solid fa-angle-left me-1"></i> <?= constant('BACK_PAIEMENT') ?></a>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php } ?>

                            <?php if ($_GET['step'] == "4") { ?>

                                <div class="stepper-content show active fade-in" stepper-label="4">

                                    <div class="col-lg-12">

                                        <div class="col-lg-10 m-auto">

                                            <div class="alert mb-0 mt-5 align-items-center alert-success" role="alert">

                                                <h4 class="alert-heading fw-bold text-center no-border">
                                                    <div class="message_icone mb-3"><i class="fa-solid fa-circle-check" style="font-size: 40px;"></i></div>
                                                    <div class="message_title"><?= constant('MESSAGE_PAY_VALIDE') ?></div>
                                                </h4>

                                                <div class="text-center">
                                                    <h5 class="message_content text-center no-border"><?= constant('MESSAGE_PAY_VALIDE_2') ?></h5>
                                                </div>

                                                <hr>

                                                <div class="text-center">
                                                    <h6 class="mb-0 message_content_2 text-center no-border"><?= constant('MESSAGE_PAY_VALIDE_3') ?></h6>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php } ?>

                        <?php } ?>

                    </div>

                </div>

            </div>

            <div class="col-md-4 m-0 mt-3">

                <div class="col text-white" style="border: 1px solid #ccc;padding: 12px;background: darkslategrey;">

                    <div class="row">

                        <div class="col-sm-3 service_assistance_img" style="align-self: center;">
                            <img width="80px" src="<?= $static_img ?>assistance.png" alt="">
                        </div>

                        <div class="col ps-0 service_assistance">
                            <span><?= constant('ASSISTANCE_1') ?></span><br>
                            <span><?= constant('ASSISTANCE_2') ?></span><br>
                            <span><?= constant('ASSISTANCE_3') ?></span><br>
                            <span><?= constant('ASSISTANCE_4') ?></span><br>
                        </div>

                    </div>

                </div>

                <?php if ($_GET['step'] == "1") { ?>

                    <div id="bloc_paiement_recap" class="col text-white mt-3" style="border: 1px solid #ccc;padding: 12px;background: darkslategrey;">
                        <h5><b><?= constant('TOTAL') ?></b></h5>

                        <span class="total"><?= number_format($total, 2, ',', '') ?> €</span>

                        <div class="text-center mt-3 mb-3">
                            <a href="/<?= $language ?>/panier/2" class="btn btn-outline-warning btn-lg"><i class="fa-solid fa-angle-right me-2"></i> <?= constant('VALIDER_CART') ?></a>
                        </div>

                        <div class="text-center mt-3 mb-3">
                            <span><i class="fa-solid fa-lock"></i></span>
                            <span class="ms-1"><?= constant('PAIEMENT_SECUR') ?></span>
                        </div>

                        <div class="text-center">
                            <img width="250px" src="<?= $static_img ?>paiement-securise.png" alt="">
                        </div>
                    </div>

                <?php } ?>

                <?php if (!empty($_SESSION['user_id'])) { ?>

                    <?php if ($_GET['step'] == "2" || $_GET['step'] == "3") { ?>

                        <div id="bloc_paiement_final" class="col text-white mt-3" style="border: 1px solid rgb(204, 204, 204); padding: 12px; background: darkslategrey;">

                            <div>

                                <h5><b><?= constant('RECAP_COMMANDE') ?></b></h5>

                                <?php if (!empty($_COOKIE['cashBackUse'])) { ?>

                                    <div class="col-md-12 mt-4">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <h6 class="no-border"><b><?= constant('CASHBACK') ?></b></h6>
                                            </div>

                                            <div class="col-md-6 text-end">
                                                <span><?= number_format($user['cashback'], 2, ',', '') ?> €</span>
                                            </div>

                                        </div>

                                    </div>

                                <?php } ?>

                                <div class="col-md-12 <?php if (!empty($_COOKIE['cashBackUse'])) { ?>mt-1<?php } else { ?>mt-4<?php } ?>">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <h6 class="no-border"><b><?= constant('TOTAL_1') ?></b></h6>
                                        </div>

                                        <div class="col-md-6 text-end">
                                            <span><?= number_format($total, 2, ',', '') ?> €</span>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-12 mt-1">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <h6 class="no-border"><b><?= constant('FDP') ?></b></h6>
                                        </div>

                                        <div class="col-md-6 text-end">
                                            <span><?= (!empty($_COOKIE['port']) && $_COOKIE['port'] == "2") ? number_format($port, 2, ',', '') : number_format($port, 2, ',', ''); ?> €</span>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-12 mt-1">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <h6 class="no-border"><b><?= constant('TOTAL_2') ?></b></h6>
                                        </div>

                                        <div class="col-md-6 text-end">
                                            <span>
                                                <?php if (!empty($_COOKIE['port']) && $_COOKIE['port'] == "2") { ?>
                                                    <?php if (!empty($_COOKIE['cashBackUse'])) { ?>
                                                        <?= number_format($total + $port - $user['cashback'], 2, ',', '') ?> €
                                                    <?php } else { ?>
                                                        <?= number_format($total + $port, 2, ',', '') ?> €
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php if (!empty($_COOKIE['cashBackUse'])) { ?>
                                                        <?= number_format($total + $port - $user['cashback'], 2, ',', '') ?> €
                                                    <?php } else { ?>
                                                        <?= number_format($total + $port, 2, ',', '') ?> €
                                                    <?php } ?>
                                                <?php } ?>
                                            </span>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div id="bloc_adresse_final" class="col text-white mt-3" style="border: 1px solid rgb(204, 204, 204); padding: 12px; background: darkslategrey;">

                            <div>

                                <h5><b><?= constant('ADRESSE_1') ?></b></h5>

                                <div class="col-md-12 mt-4">

                                    <span><?= constant($civilite_user['nom']) ?><?= ($user['type_id'] == "2") ? '<br><span>' . $user['societe'] . '</span>' : '' ?></span><br>
                                    <span><?= $user['prenom'] . ' ' . $user['nom'] ?></span><br>
                                    <span><?= $user['adresse'] ?></span><br>
                                    <span><?= $user['code_postal'] . ' ' . $user['ville'] ?></span><br>
                                    <span>
                                        <?= ($language == "fr") ? $pay_user['nom_fr_fr'] :  $pay_user['nom_en_gb'] ?>
                                    </span>

                                </div>

                            </div>

                            <div class="mt-4">

                                <h5><b><?= constant('ADRESSE_2') ?></b></h5>

                                <div class="col-md-12 mt-4">

                                    <span><?= constant($civilite_user['nom']) ?><?= ($user['type_id'] == "2") ? '<br><span>' . $user['societe'] . '</span>' : '' ?></span><br>
                                    <span><?= $user['prenom'] . ' ' . $user['nom'] ?></span><br>
                                    <span><?= $user['adresse'] ?></span><br>
                                    <span><?= $user['code_postal'] . ' ' . $user['ville'] ?></span><br>
                                    <span>
                                        <?= ($language == "fr") ? $pay_user['nom_fr_fr'] :  $pay_user['nom_en_gb'] ?>
                                    </span>

                                </div>

                            </div>

                        </div>

                    <?php } ?>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/cdb.min.js"></script>

<script>
    const stepper = document.querySelector('#stepper2');
    new CDB.Stepper(stepper);
</script>