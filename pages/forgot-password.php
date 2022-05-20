<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="row">

        <div class="col-lg-12 m-auto text-left">

            <div style="margin: 0 auto;" class="w-50">
                <h1 class="text-center mb-3 text-white"><?= constant('TITLE_PAGE_FORGOT') ?></h1>
            </div>

            <div class="m-auto text-center w-50">
                <h4 class="text-white"><?= constant('SUBTITLE_PAGE_FORGOT') ?></h4>
            </div>

        </div>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-12 m-auto">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-warning" href="/<?= $language ?>/"><?= constant('NAVBAR_ITEM_1') ?></a></li>
                <li class="breadcrumb-item text-white"><?= ucfirst(constant('LINK_PAGE_FORGOT')) ?></li>
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

            <div id="message_forgot" class="alert mb-0 mt-5 d-flex align-items-center alert-success" role="alert">
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

            <form id="form_forgot" class="mt-5 mb-5 row g-3">

                <input type="hidden" name="lang" id="lang" value="<?= $language ?>">
                <input type="hidden" id="text_error" value="<?= constant('TEXT_ERROR_PASSWORD') ?>">

                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label text-white"><?= constant('PASSWORD_INPUT') ?>*</label>
                    <input type="password" minlength="8" autocomplete="current-password" class="form-control" name="password" id="password" required>
                    <span id="password_error"></span>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="password2" class="form-label text-white"><?= constant('PASSWORD_INPUT_2') ?>*</label>
                    <input type="password" minlength="8" autocomplete="new-password" class="form-control" name="password2" id="password2" required>
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