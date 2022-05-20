<!-- Modal -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="forgotPasswordModalLAbel"><?= strtoupper(constant('TITLE_MODAL_FORGOT')) ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_forgot" class="postion-relative">

                <div class="modal-body">

                    <div id="loaderForgot" style="display: none;" class="lds-ripple">
                        <div></div>
                        <div></div>
                    </div>

                    <div id="message_forgot" class="alert mb-0 alert-success d-flex align-items-center" role="alert">
                        <div class="message_icone me-2"></div>
                        <div class="message_content"></div>
                    </div>

                    <div id="blocForgotForm">

                        <div class="mb-3">
                            <h6 class="text-center"><?= constant('MODAL_FORGOT_SUBTITLE') ?></h6>
                        </div>

                        <input type="hidden" name="lang" id="lang" value="<?= $language ?>">

                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="<?= constant('INPUT_EMAIL') ?>" required>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-warning"><?= constant('VALIDER') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>