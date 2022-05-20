<!-- Modal -->
<div class="modal fade" id="shareFavorisModal" tabindex="-1" aria-labelledby="shareFavorisModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">

                <div>

                    <div class="mb-3">
                        <h4 class="text-center text-bold"><?= mb_strtoupper(constant('MODAL_FAVORIS_SUBTITLE')) ?></h4>
                    </div>

                    <div class="text-center">
                        <?php $favorites = str_replace(',', '-', $_COOKIE['favoris']); ?>
                        <input type="hidden" id="p1" value="https://<?= $_SERVER['HTTP_HOST'] ?>/<?= $language ?>/partager/<?= $favorites ?>">
                        <a id="shared" class="btn btn-outline-info me-3" onclick="copyToClipboard('#p1')"><i class="fa-solid fa-copy me-1"></i><?= constant('MODAL_FAVORIS_BTN') ?></a>
                        <a id="shareds" class="btn btn-outline-info me-3"><i class="fa-solid fa-copy me-1"></i><?= constant('MODAL_FAVORIS_BTN_2') ?></a>
                        <a class="btn btn-outline-dark" data-bs-dismiss="modal" aria-label="Close"><?= constant('MODAL_FAVORIS_BTN_3') ?></a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>