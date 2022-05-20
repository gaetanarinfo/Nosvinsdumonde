<div class="top_height"></div>

<div class="container-md mt-5 mb-3">

    <div class="row">

        <div class="col-lg-12 m-auto text-left">

            <div style="margin: 0 auto;" class="<?= (!empty($_GET['suggest'])) ? 'w-75' : 'w-50' ?>">
                <?php if (!empty($_GET['suggest'])) { ?>
                    <h1 class="text-center mb-3 text-white"><?= constant('TITLE_PAGE_CONTACT_SUGGEST') ?></h1>
                <?php } else { ?>
                    <h1 class="text-center mb-3 text-white"><?= constant('TITLE_PAGE_CONTACT') ?></h1>
                <?php } ?>
            </div>

            <div class="m-auto text-center <?= (!empty($_GET['suggest'])) ? 'w-75' : 'w-50' ?> subtitle_mobile_page_vin">

                <?php if (!empty($_GET['suggest'])) { ?>
                    <h4 class="text-white"><?= constant('SUBTITLE_PAGE_CONTACT_SUGGEST') ?></h4>
                <?php } ?>

                <?php if (!empty($_GET['suggest'])) { ?><br><?php } ?>

                <p class="text-white">
                    <?= constant('SUBTITLE_PAGE_CONTACT') ?>
                </p>
            </div>

        </div>

    </div>

</div>

<div class="container-md mt-3 mb-5">

    <div id="rowForm" class="row align-items-start justify-content-center">

        <div class="col">

            <div class="blocContactForm">

                <div id="loaderContact" style="display: none;" class="lds-ripple">
                    <div></div>
                    <div></div>
                </div>

                <div id="message_contact" class="alert alert-success" role="alert">
                    <h4 class="alert-heading fw-bold text-center">
                        <div class="message_icone mb-3"></div>
                        <div class="message_title"></div>
                    </h4>
                    <div class="text-center">
                        <h5 class="message_content"></h5>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h6 class="mb-0 message_content_2"></h6>
                    </div>
                </div>

                <form id="form_contact">

                    <input type="hidden" name="lang" value="<?= $language ?>">

                    <div class="mb-3">
                        <label for="societe" class="form-label text-white"><?= constant('FORM_INPUT_1') ?></label>
                        <input type="text" autocomplete="off" class="form-control" name="societe">
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label text-white"><?= constant('FORM_INPUT_2') ?>*</label>
                        <input type="text" class="form-control" name="prenom" required>
                    </div>

                    <div class="mb-3">
                        <label for="nom" class="form-label text-white"><?= constant('FORM_INPUT_3') ?>*</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-white"><?= constant('FORM_INPUT_4') ?>*</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label text-white"><?= constant('FORM_INPUT_5') ?>*</label>
                        <input type="number" class="form-control" name="phone" required>
                    </div>

                    <?php if (!empty($_GET['suggest'])) { ?>
                        <input type="hidden" name="sujet" value="<?= constant('AJOUT_PRODUIT') ?>">
                    <?php } else { ?>

                        <div class="mb-3">
                            <label for="sujet" class="form-label text-white"><?= constant('FORM_INPUT_6') ?>*</label>
                            <select name="sujet" class="form-select" required>
                                <option value="">----</option>
                                <?php foreach ($contacts_types as $contact) {
                                    echo '<option value="' . $contact['id'] . '">' . constant($contact['nom']) . '</option>';
                                } ?>
                            </select>
                        </div>

                    <?php } ?>

                    <div class="mb-3">
                        <label for="message" class="form-label text-white"><?= constant('FORM_INPUT_7') ?>*</label>
                        <textarea style="resize: vertical;" name="message" id="message" maxlength="250" cols="30" rows="5" class="form-control" required><?= (!empty($_GET['suggest'])) ? constant('MESSAGE_PRODUIT') : ''; ?></textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input text-white" id="verifHumain" required>
                        <label class="form-check-label text-white" for="verifHumain"><?= constant('FORM_INPUT_8') ?></label>
                    </div>
                    <p class="text-white text-end"><?= constant('FORM_INPUT_9') ?></p>
                    <div class="text-end">
                        <div id='recaptcha' class="g-recaptcha" data-sitekey="6LftGMgfAAAAAEmakDAQjKpLv5bzlrWDeytx7s9J" data-callback="recaptchacheck" data-size="invisible"></div>
                        <button type="submit" class="btn btn-outline-info btn-lg"><?= constant('FORM_INPUT_10') ?></button>
                    </div>
                </form>

            </div>

        </div>

        <div class="col">
            <img class="image_vigne" style="max-width: 600px;" data-fancybox role="button" src="<?= $static_img ?>vigne.jpg" alt="">
            <hr>
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2670.801849913395!2d0.20670651549920388!3d47.97888897921108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e28ee050a8bd4d%3A0xcfbd863c3c58f11a!2s125%20Av.%20F%C3%A9lix%20Geneslay%2C%2072100%20Le%20Mans!5e0!3m2!1sfr!2sfr!4v1651932543473!5m2!1sfr!2sfr" width="600" height="340" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>

</div>