<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a href="https://nosvinsdumonde.com">nosvinsdumonde.com</a> <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Prêt à partir ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à mettre fin à votre session en cours.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <a class="btn btn-primary" href="/fr/logout">Se déconnecter</a>
            </div>
        </div>
    </div>
</div>

<!-- Custom scripts for all pages-->
<script src="<?= $static_url ?>js/sb-admin-2.min.js"></script>
<script src="<?= $static_url ?>js/script.js?<?= time() ?>"></script>
<?php if (!empty($_GET['page']) && $_GET['page'] == "vins") { ?><script src="<?= $static_url ?>vendor/datatables/jquery.dataTables.min.js"></script><?php } ?>
<?php if (!empty($_GET['page']) && $_GET['page'] == "champagnes" && empty($_GET['id'])) { ?><script src="<?= $static_url ?>vendor/datatables/jquery.dataTables.min.js"></script><?php } ?>
<?php if (!empty($_GET['page']) && $_GET['page'] == "vins") { ?><script src="<?= $static_url ?>vendor/datatables/dataTables.bootstrap4.min.js"></script><?php } ?>
<?php if (!empty($_GET['page']) && $_GET['page'] == "champagnes" && empty($_GET['id'])) { ?><script src="<?= $static_url ?>vendor/datatables/dataTables.bootstrap4.min.js"></script><?php } ?>

<?php if (!empty($_GET['page']) && $_GET['page'] == "profil") { ?><script src="<?= $static_url ?>js/profil.js?<?= time() ?>"></script><?php } ?>
<?php if (!empty($_GET['page']) && $_GET['page'] == "vins") { ?><script src="<?= $static_url ?>js/vins.js?<?= time() ?>"></script><?php } ?>
<?php if (!empty($_GET['page']) && $_GET['page'] == "ajouter-vin") { ?><script src="<?= $static_url ?>js/ajouter-vin.js?<?= time() ?>"></script><?php } ?>
<?php if (!empty($_GET['page']) && $_GET['page'] == "ajouter-champagne") { ?><script src="<?= $static_url ?>js/ajouter-champagne.js?<?= time() ?>"></script><?php } ?>
<?php if (!empty($_GET['page']) && $_GET['page'] == "champagnes" && empty($_GET['id'])) { ?><script src="<?= $static_url ?>js/champagnes.js?<?= time() ?>"></script><?php } ?>
<?php if (!empty($_GET['page']) && $_GET['page'] == "champagnes" && !empty($_GET['id'])) { ?><script src="<?= $static_url ?>js/champagnes-id.js?<?= time() ?>"></script><?php } ?>

<?php if (empty($_GET['page'])) { ?>

    <!-- Page level plugins -->
    <script src="<?= $static_url ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= $static_url ?>js/chart-area.js?<?= time() ?>"></script>
    <script src="<?= $static_url ?>js/chart-pie.js?<?= time() ?>"></script>

<?php } ?>

</body>

</html>