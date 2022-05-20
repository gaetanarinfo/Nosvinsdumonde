<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="row">

        <div class="col-lg-12 m-auto text-left">

            <div style="margin: 0 auto;" class="w-50">
                <h1 class="text-center mb-3 text-white"><?= constant('TITLE_PAGE_REGISTER') ?></h1>
            </div>

            <div class="m-auto text-center w-50">
                <h4 class="text-white"><?= constant('SUBTITLE_PAGE_REGISTER') ?></h4>
            </div>

        </div>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-12 m-auto">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-warning" href="/<?= $language ?>/"><?= constant('NAVBAR_ITEM_1') ?></a></li>
                <li class="breadcrumb-item text-white"><?= ucfirst(constant('TITLE_PAGE_REGISTER')) ?></li>
            </ol>
        </nav>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-5 m-auto">

        <div class="m-auto logo_login text-center">
            <img src="<?= $static_img ?>logo.png" alt="Nosvinsdumonde">
        </div>

        <div id="blocLoginForm">

            <div id="loaderUser" style="display: none;" class="lds-ripple">
                <div></div>
                <div></div>
            </div>

            <div id="message_register" class="alert mb-0 d-flex align-items-center alert-success" role="alert">
                <h4 class="alert-heading fw-bold text-center">
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

            <form id="form_register" class="mt-5 mb-5 row g-3">

                <input type="hidden" name="lang" value="<?= $language ?>">

                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="societe" value="1" checked>
                        <label class="form-check-label text-white" for="societe"><?= constant('SOCIETE_1') ?></label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="societe" value="2">
                        <label class="form-check-label text-white" for="societe"><?= constant('SOCIETE_2') ?></label>
                    </div>
                </div>

                <div class="mb-3 col-md-12">
                    <label for="societeName" class="form-label text-white"><?= constant('SOCIETE_INPUT') ?></label>
                    <input type="text" class="form-control" autocomplete="societe" name="societeName" aria-describedby="societeName">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label text-white"><?= constant('EMAIL_INPUT') ?>*</label>
                    <input type="email" class="form-control" autocomplete="email" name="email" aria-describedby="email" required>
                    <div id="emailHelp" class="form-text text-white"><?= constant('LABEL_1') ?></div>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label text-white"><?= constant('PASSWORD_INPUT') ?>*</label>
                    <input type="password" minlength="8" autocomplete="current-password" class="form-control" name="password" required>
                    <div id="passwordHelp" class="form-text text-white"><?= constant('LABEL_2') ?></div>
                </div>

                <div class="text-center">
                    <h4 class="text-white fw-bold"><?= constant('INFO_PERSO') ?></h4>
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
                    <input type="tel" inputmode="numeric" pattern="[0-9]*" class="form-control" name="phone" aria-describedby="phone" required>
                </div>

                <div class="text-center">
                    <h4 class="text-white fw-bold"><?= constant('CARTE_PERSO') ?></h4>
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

<?php include 'modules/modal/forgotPasswordModal.php'; ?>