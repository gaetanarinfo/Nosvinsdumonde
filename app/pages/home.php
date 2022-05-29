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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (!empty($ventes_years)) ? $ventes_years : '0' ?> <i class="fa-solid fa-euro-sign"></i></div>
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
                                                Mes ventes de <?= datefmt_format($fmt,  strtotime('Monday' . date('Y-m-d'))) . ' ' . date('Y') ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (!empty($ventes_years_month)) ? $ventes_years_month : '0' ?> <i class="fa-solid fa-euro-sign"></i></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-coins fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <?php


                        // Données du graph de total
                        $ca_graph = array();

                        foreach ($months as $month) {

                            if (empty($_GET['year'])) {
                                $start_date_graph = date('Y') . "-" . $month['id'] . "-01";
                                $end_date_graph = date('Y') . "-" . $month['id'] . "-30";
                            } else {
                                $start_date_graph = $_GET['year'] . "-" . $month['id'] . "-01";
                                $end_date_graph = $_GET['year'] . "-" . $month['id'] . "-30";
                            }

                            $ca_chiffres = selectDB(
                                'SUM(total) AS total',
                                'sites_commandes',
                                'id_status_commande >= "2" 
                                AND date_paiement_effectue LIKE "%' . $start_date_graph . '%" 
                                AND date_paiement_effectue LIKE "%' . $end_date_graph . '%"',
                                $db,
                                '1'
                            );

                            if ($ca_chiffres['total'] == "") $ca_graph[] = '0';
                            else $ca_graph[] = $ca_chiffres['total'];
                        }

                        $ca_graph = implode(',', $ca_graph);

                        if (empty($_GET['year'])) {
                            $sources_start_date_graph = date('Y') . "-01-01";
                            $sources_end_date_graph = date('Y') . "-12-30";
                        } else {
                            $sources_start_date_graph = $_GET['year'] . "-01-01";
                            $sources_end_date_graph = $_GET['year'] . "-12-30";
                        }

                        // Données du graph de sources
                        $sources_graph = array();

                        $sources_chiffres = $db->query('SELECT SUM(total) AS venteTotal FROM `sites_commandes` 
                        WHERE id_status_commande >= "2" AND date_paiement_effectue LIKE "%' . $sources_start_date_graph . '%" AND 
                        date_paiement_effectue LIKE "%' . $sources_end_date_graph . '%"')->fetchALL(PDO::FETCH_ASSOC);

                        foreach ($sources_chiffres as $value) {

                            if ($value['venteTotal'] == "") $sources_graph[] = "0,0";
                            else $sources_graph[] = $value['venteTotal'];
                        }

                        $sources_graph = implode(',', $sources_graph);

                        ?>

                        <input type="hidden" id="ca_graph" data-target="<?= $ca_graph; ?>" />
                        <input type="hidden" id="sources_graph" data-target="<?= $sources_graph; ?>" />


                        <script>
                            $(document).ready(function() {

                                var ca = $('#ca_graph').data("target");
                                ca = ca.split(',');
                                myLineChart.data.datasets[0].data = ca;
                                myLineChart.update();

                                // Sources

                                var sources = $('#sources_graph').data("target");
                                sources = sources.split(',');
                                myPieChart.data.datasets[0].data = sources;
                                myPieChart.update();

                            });
                        </script>

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Ventes sur <?= date('Y') ?></h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="myAreaChart" style="display: block; height: 320px; width: 781px;" width="976" height="400" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Sources des revenus</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="myPieChart" width="447" height="306" style="display: block; height: 245px; width: 358px;" class="chartjs-render-monitor"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary" style="color: #2cbaff !important;"></i> Paypal
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success" style="color: #87ea49 !important;"></i> Stripe
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->