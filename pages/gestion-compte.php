<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="row">

        <div class="col-lg-12 m-auto text-left">

            <div style="margin: 0 auto;" class="w-100">
                <h1 class="text-center mb-3 text-white"><?= constant('TITLE_PAGE_GESTION_COMPTE') ?></h1>
            </div>

        </div>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-12 m-auto">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-warning" href="/<?= $language ?>/"><?= constant('NAVBAR_ITEM_1') ?></a></li>
                <li class="breadcrumb-item text-white"><?= constant('LINK_20') ?></li>
            </ol>
        </nav>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-5 m-auto">

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

            <form id="form_register" class="row g-3">

                <input type="hidden" name="lang" value="<?= $language ?>">

                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="societe" value="1" <?= ($user['type_id'] == "1") ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="societe"><?= constant('SOCIETE_1') ?></label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="societe" value="2" <?= ($user['type_id'] == "2" || $user['type_id'] == "3") ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="societe"><?= constant('SOCIETE_2') ?></label>
                    </div>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="societeName" class="form-label text-white"><?= constant('SOCIETE_INPUT') ?></label>
                    <input type="text" class="form-control" autocomplete="societe" name="societeName" value="<?= $user['societe'] ?>" aria-describedby="societeName">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label text-white"><?= constant('EMAIL_INPUT') ?></label>
                    <input type="email" class="form-control" autocomplete="email" disabled aria-describedby="email" value="<?= $user['email'] ?>">
                </div>

                <div class=" text-center">
                    <h4 class="text-white fw-bold"><?= constant('INFO_PERSO') ?></h4>
                </div>

                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="civilite" value="1" <?= ($user['civilite'] == "1") ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="civilite"><?= constant('CIVILITE_1') ?></label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="civilite" value="2" <?= ($user['civilite'] == "2") ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="civilite"><?= constant('CIVILITE_2') ?></label>
                    </div>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="prenom" class="form-label text-white"><?= constant('PRENOM_INPUT') ?></label>
                    <input type="text" class="form-control" name="prenom" aria-describedby="prenom" value="<?= $user['prenom'] ?>">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="nom" class="form-label text-white"><?= constant('NOM_INPUT') ?></label>
                    <input type="text" class="form-control" name="nom" aria-describedby="nom" value="<?= $user['nom'] ?>">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="adresse" class="form-label text-white"><?= constant('ADRESSE_INPUT') ?></label>
                    <input type="text" class="form-control" name="adresse" aria-describedby="adresse" value="<?= $user['adresse'] ?>">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="pays" class="form-label text-white"><?= constant('PAYS_INPUT') ?></label>
                    <select name="pays" aria-describedby="pays" class="form-select">
                        <?php foreach ($pays as $pay) { ?>
                            <option value="<?= $pay['id'] ?>" <?= ($user['pays'] == $pay['id']) ? 'selected' : '' ?>><?= ($language == "fr") ? $pay['nom_fr_fr'] : '' ?><?= ($language == "en") ? $pay['nom_en_gb'] : '' ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="code_postal" class="form-label text-white"><?= constant('CODEPOSTAL_INPUT') ?></label>
                    <input type="number" class="form-control" name="code_postal" value="<?= $user['code_postal'] ?>" aria-describedby="code_postal">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="ville" class="form-label text-white"><?= constant('VILLE_INPUT') ?></label>
                    <input type="text" class="form-control" name="ville" aria-describedby="ville"  value="<?= $user['ville'] ?>">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label text-white"><?= constant('PHONE_INPUT') ?></label>
                    <input type="tel" inputmode="numeric" pattern="[0-9]*" class="form-control" name="phone" aria-describedby="phone"  value="<?= $user['phone'] ?>">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-outline-warning"><?= constant('SAVE') ?></button>
                </div>

            </form>

        </div>

    </div>

</div>