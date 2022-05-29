<!-- Modal -->
<div class="modal fade" id="abuseModal" tabindex="-1" aria-labelledby="abuseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="abuseModalLabel"><?= strtoupper(constant('SIGNAL_COMMENT')) ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="formAbuse" class="postion-relative">

                <input type="hidden" name="lang" value="<?= $language ?>">
                <input type="hidden" id="comment_id" name="comment_id" value="">
                <input type="hidden" id="content_id" name="content_id" value="<?= $article['id'] ?>">

                <div class="modal-body">

                    <div class="text-start">
                        <?= constant('SIGNAL_COMMENT_TEST') ?>
                    </div>

                    <div id="loaderAbuse" style="display: none;" class="lds-ripple">
                        <div></div>
                        <div></div>
                    </div>

                    <div id="message_abuse" class="alert mb-0 alert-success d-flex align-items-center" role="alert">
                        <div class="message_icone me-2"></div>
                        <div class="message_content"></div>
                    </div>

                    <div id="blocAbuseForm">

                        <div class="mb-3 mt-2">
                            <label for="recipient-name" class="col-form-label fw-bold"><?= constant('FORM_ABUSE_1') ?></label>
                            <input type="email" class="form-control" id="email-comm" name="email-comm" required="">
                        </div>

                        <div class="mb-3 mt-2">
                            <label for="recipient-name" class="col-form-label fw-bold"><?= constant('FORM_ABUSE_2') ?></label>
                            <input type="text" class="form-control" id="title-comm" name="title-comm">
                        </div>

                        <div class="mb-3">
                            <label for="message-text" class="col-form-label fw-bold"><?= constant('FORM_ABUSE_3') ?></label>
                            <textarea class="form-control" id="message-comm" name="message-comm" required=""></textarea>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><?= constant('VALIDER') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>