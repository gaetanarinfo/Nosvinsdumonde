<!-- Modal -->
<div class="modal fade" id="downloadFavorisModal" tabindex="-1" aria-labelledby="downloadFavorisModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form id="form_partager">

                <div class="modal-body">

                    <div id="loaderFavoris" style="display: none;" class="lds-ripple">
                        <div></div>
                        <div></div>
                    </div>

                    <div id="message_favoris" class="alert mb-0 alert-success d-flex align-items-center" role="alert">
                        <div class="message_icone me-2"></div>
                        <div class="message_content"></div>
                    </div>

                    <div class="form_partager">

                        <div class="mb-3">
                            <h4 class="text-center text-bold"><?= mb_strtoupper(constant('MODAL_DOWNLOAD_SUBTITLE')) ?></h4>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="partager_prenom" id="partager_prenom" placeholder="<?= constant('INPUT_PRENOM') ?>" required>
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" name="partager_email" id="partager_email" placeholder="<?= constant('INPUT_EMAIL') ?>" required>
                        </div>

                        <div class="text-center">
                            <div id='recaptcha' class="g-recaptcha" data-sitekey="6LftGMgfAAAAAEmakDAQjKpLv5bzlrWDeytx7s9J" data-callback="recaptcha_check" data-size="invisible"></div>
                            <button type="submit" class="btn btn-outline-info me-3"><?= constant('VALIDER') ?></button>
                            <a class="btn btn-outline-dark" data-bs-dismiss="modal" aria-label="Close"><?= constant('MODAL_FAVORIS_BTN_3') ?></a>
                        </div>

                    </div>

                    <div class="text-center mt-3" id="close_modal_favoris">
                        <a class="btn btn-outline-dark" data-bs-dismiss="modal" aria-label="Close"><?= constant('MODAL_FAVORIS_BTN_3') ?></a>
                    </div>

                </div>

            </form>

        </div>
    </div>
</div>