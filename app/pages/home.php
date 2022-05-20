    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'app/modules/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'app/modules/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
                    </div>

                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Mes vins</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($user_vin) ?> bouteille(s)</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-brands fa-pagelines fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Mes champagnes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($user_champagne) ?> bouteille(s)</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-wine-glass fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Mes ventes en <?= date('Y') ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0 <i class="fa-solid fa-euro-sign"></i></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-coins fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Mes ventes de <?= datefmt_format($fmt,  strtotime('Monday' . date('Y-m-d'))) . ' ' .date('Y') ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0 <i class="fa-solid fa-euro-sign"></i></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-coins fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->