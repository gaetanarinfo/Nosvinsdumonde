<!-- Modal -->
<div class="modal fade" id="avisModal" tabindex="-1" aria-labelledby="avisModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="avisModalLabel"><?= strtoupper(constant('AVIS')) ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="formAvis" class="postion-relative">

                <div class="modal-body">

                    <div id="loaderVinAvis" style="display: none;" class="lds-ripple">
                        <div></div>
                        <div></div>
                    </div>

                    <div id="message_avis" class="alert mb-0 alert-success d-flex align-items-center" role="alert">
                        <div class="message_icone me-2"></div>
                        <div class="message_content"></div>
                    </div>

                    <div id="blocAvisForm">

                        <div class="mb-3">
                            <h5 class="text-center"><?= constant('MODAL_AVIS_SUBTITLE') ?></h5>
                        </div>

                        <input type="hidden" name="avisFinal" id="avisFinal" value="">
                        <input type="hidden" name="lang" id="lang" value="<?= $language ?>">
                        <input type="hidden" name="avis_vins_id" id="avis_vins_id" value="<?= $vin['idBoisson'] ?>">

                        <div class="mb-3">
                            <ul class="list-group groupe_alliances">
                                <li class="list-group-item selectAvis" data-value="1" role="button"><i class="fa-solid fa-wine-glass"></i></li>
                                <li class="list-group-item selectAvis" data-value="2" role="button"><i class="fa-solid fa-wine-glass"></i></li>
                                <li class="list-group-item selectAvis" data-value="3" role="button"><i class="fa-solid fa-wine-glass"></i></li>
                                <li class="list-group-item selectAvis" data-value="4" role="button"><i class="fa-solid fa-wine-glass"></i></li>
                                <li class="list-group-item selectAvis" data-value="5" role="button"><i class="fa-solid fa-wine-glass"></i></li>
                            </ul>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="avis_prenom" id="avis_prenom" placeholder="<?= constant('INPUT_PRENOM') ?>" required>
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" name="avis_email" id="avis_email" placeholder="<?= constant('INPUT_EMAIL') ?>" required>
                        </div>

                        <div class="mb-3">
                            <textarea class="form-control" name="avis_content" id="avis_content" maxlength="250" style="resize: vertical;" placeholder="<?= constant('INPUT_CONTENT') ?>"></textarea>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <div id='recaptcha' class="g-recaptcha" data-sitekey="6LftGMgfAAAAAEmakDAQjKpLv5bzlrWDeytx7s9J" data-callback="recaptchacheck" data-size="invisible"></div>
                    <button type="submit" class="btn btn-outline-warning"><?= constant('VALIDER') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>