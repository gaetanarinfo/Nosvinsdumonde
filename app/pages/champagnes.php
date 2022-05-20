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
                        <h1 class="h3 mb-0 text-gray-800">Gestions des champagnes</h1>
                        <div class="row">
                            <a href="/app/ajouter-champagne" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-3"><i class="fa-solid fa-plus fa-sm text-white mr-1"></i> Ajouter un champagne</a>
                        </div>
                    </div>

                    <div class="row">

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
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Mes ventes de <?= datefmt_format($fmt,  strtotime('Monday' . date('Y-m-d'))) ?></div>
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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Mes champagnes disponible</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Apellation</th>
                                            <th>Région</th>
                                            <th>Millésime</th>
                                            <th>Prix</th>
                                            <th>Soit</th>
                                            <th>Crée le</th>
                                            <th>Visite</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Apellation</th>
                                            <th>Région</th>
                                            <th>Millésime</th>
                                            <th>Prix</th>
                                            <th>Soit</th>
                                            <th>Crée le</th>
                                            <th>Visite</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>

                                        <?php foreach ($champagnes_user as $key => $champagne_user) { ?>

                                            <tr class="tr_<?= $champagne_user['idBoisson'] ?>">
                                                <td><a class="text-decoration-none" href="/app/champagnes/<?= $champagne_user['idBoisson'] ?>"><?= $champagne_user['nomBoisson'] ?></a></td>
                                                <td><?= $champagne_user['apellationBoisson'] ?></td>
                                                <td><?= $champagne_user['regionBoisson'] ?></td>
                                                <td><?= $champagne_user['millesimeBoisson'] ?></td>
                                                <td><?= number_format($champagne_user['prixBoisson'], 2, ',', '') ?> €</td>
                                                <td><?= number_format($champagne_user['soitBoisson'], 2, ',', '') ?> €</td>
                                                <td><?= date('d/m/Y', strtotime($champagne_user['createBoisson'])) ?></td>
                                                <td><?= intval($champagne_user['viewBoisson']) ?></td>
                                                <td>

                                                    <a href="/app/champagnes/<?= $champagne_user['idBoisson'] ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>

                                                    <?php if ($champagne_user['activeBoisson'] == 1) { ?>
                                                        <a data-id="<?= $champagne_user['idBoisson'] ?>" class="delete_vin btn btn-danger btn-sm"><i class="fa-solid fa-eye-slash"></i></a>
                                                    <?php } else { ?>
                                                        <a data-id="<?= $champagne_user['idBoisson'] ?>" class="show_vin btn btn-success btn-sm"><i class="fa-solid fa-eye"></i></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->