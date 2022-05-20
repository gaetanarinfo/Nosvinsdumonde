<!-- Modal -->
<div class="modal fade" id="cartePrivilegeModal" tabindex="-1" aria-labelledby="cartePrivilegeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="cartePrivilegeModalLabel"><?= mb_strtoupper(constant('CARTE_PRIVILEGE')) ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="carte">
                    <p class="text-center text-white fw-bold no_border"><i class="fa-solid fa-gift" style="font-size: 50px;"></i></p>
                    <h3 class="text-center text-white fw-bold no_border"><?= constant('CARTE_NUMBER') ?> <?= $user['numero_carte'] ?></h3>
                    <h4 class="text-center text-white fw-bold no_border"><?= $user['point'] ?> <?= constant('CARTE_POINT') ?></h4>
                    <div class="mt-3"><?= "<center><img alt='testing' src='../../modules/barcode.php?codetype=code39&size=50&text=" . $user['numero_carte'] . "&print=true'/></center>";  ?></div>
                </div>

                <hr>

                <div class="text-center mt-4 mb-4 postition-relative  <?php if ($user['point'] >= 15) { ?>loaderPrivilege<?php } ?>">

                    <?php if ($user['point'] >= 15) { ?>

                        <div id="loaderPrivilege" style="display: none;" class="lds-ripple">
                            <div></div>
                            <div></div>
                        </div>

                        <div id="message_privilege" class="alert mb-0 d-flex align-items-center alert-success" role="alert">

                            <h4 class="alert-heading fw-bold text-center">
                                <div class="message_icone mb-3"></div>
                                <div class="message_content"></div>
                            </h4>

                        </div>

                        <input type="hidden" name="lang" value="<?= $language ?>">
                        <a id="convertPoints" class="btn btn-outline-info btn-lg"><i class="fa-solid fa-money-bill-transfer me-2"></i><?= constant('CONVERT_POINT') ?></a>

                    <?php } else { ?>

                        <a class="btn btn-outline-info btn-lg disabled"><i class="fa-solid fa-money-bill-transfer me-2"></i><?= constant('CONVERT_POINT') ?></a>

                    <?php } ?>

                    <h5 class="mt-3 fw-bold"><?= constant('SOLDE'); ?> : </h5><span class="text-info" style="font-size: 23px;"><?= number_format($user['cashback'], 2, ',', '') ?> €</span>

                </div>

            </div>

        </div>
    </div>
</div>