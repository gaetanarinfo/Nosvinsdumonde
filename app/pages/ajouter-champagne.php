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
                        <h1 class="h3 mb-0 text-gray-800">Ajouter un champagne au catalogue</h1>
                        <div class="row">
                            <a id="save" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-3"><i class="fa-solid fa-check text-white mr-1"></i> Sauvegarder</a>
                        </div>
                    </div>

                    <div id="message_vin" class="col-md-5 m-auto alert mb-0 mt-5 d-flex align-items-center alert-success" role="alert">
                        <h4 class="alert-heading fw-bold text-center">
                            <div class="message_icone mb-3"></div>
                            <div class="message_title"></div>
                        </h4>
                        <div class="text-center">
                            <h5 class="message_content text-center"></h5>
                        </div>
                        <hr>
                        <div class="text-center">
                            <h6 class="mb-0 message_content_2 text-center"></h6>
                        </div>
                        <div class="text-center message_back">

                        </div>
                    </div>

                    <div class="row">

                        <div id="add_vin" class="col-lg-12 mb-4 pr-0 pl-0">

                            <div class="card shadow mb-4">

                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-pencil mr-1"></i>Ajouter</h6>
                                </div>

                                <div class="row card-body">

                                    <div class="col-md-12">

                                        <form id="bloc_5" class="user">

                                            <h5>PRESENTATION DU VIN</h5>

                                            <hr>

                                            <div class="champagne">

                                                <div class="row" style="align-items: center;">

                                                    <div class="col-md-2 prev_image_2" style="display: none;">
                                                    </div>

                                                    <div class="col">
                                                        <label for="vin_img">
                                                            <a class="btn btn-info">Sélectionner un fichier</a>
                                                            <input type="file" id="vin_img" name="vin_img">
                                                            <div class="error_2"></div>
                                                        </label>
                                                    </div>

                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                    <div class="col-md-6">

                                        <form id="bloc_1" class="user">

                                            <input type="hidden" name="vin_id" value="">

                                            <h5>INFORMATIONS UTILE</h5>

                                            <hr>

                                            <div class="form-group">
                                                <label class="">Titre</label>
                                                <input type="text" class="form-control" name="titre" value="">
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Contenance</label>
                                                    <select name="contenance" class="form-control">
                                                        <option value="">---</option>
                                                        <?php foreach ($contenance as $value) { ?>
                                                            <option value="<?= $value['id'] ?>"><?= $value['nom'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Millésime</label>
                                                    <input type="text" class="form-control" name="millesime" value="">
                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Pays</label>
                                                    <select name="pays" class="form-control">
                                                        <option value="">---</option>
                                                        <?php foreach ($pays as $value) { ?>
                                                            <option value="<?= $value['id'] ?>"><?= $value['nom_fr_fr'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Apellation</label>
                                                    <select name="apellation" class="form-control">
                                                        <option value="">---</option>
                                                        <?php foreach ($appellations as $value) { ?>
                                                            <?php if ($value['id_boisson'] == "2") { ?>
                                                                <option value="<?= $value['id'] ?>"><?= $value['nom_fr_fr'] ?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </select>

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Région</label>
                                                    <select name="region" class="form-control">
                                                        <option value="">---</option>
                                                        <?php foreach ($regions as $value) { ?>
                                                            <?php if ($value['id_boisson'] == "2") { ?>
                                                                <option value="<?= $value['id'] ?>"><?= $value['nom_fr_fr'] ?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Goût</label>
                                                    <select name="gout" class="form-control">
                                                        <option value="1">Fruité et charnu</option>
                                                        <option value="2">Fruité et frais</option>
                                                        <option value="3">Fruité et léger</option>
                                                        <option value="4">Puissant avec du potentiel</option>
                                                        <option value="5">Riche et puissant</option>
                                                        <option value="6">Riche et rond</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Couleur</label>
                                                    <select name="couleur" class="form-control">
                                                        <option value="">---</option>
                                                        <?php foreach ($couleurs as $value) { ?>
                                                            <?php if ($value['nom'] != "Rouge") { ?>
                                                                <option value="<?= $value['id'] ?>"><?= $value['nom'] ?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Degrée</label>
                                                    <input type="text" class="form-control" name="degree" value="">
                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                    <div class="col-md-6">

                                        <form id="bloc_2" class="user">

                                            <h5>INFORMATIONS SUPPLEMENTAIRES</h5>

                                            <hr>

                                            <div class="form-group row">

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Niveau de garde</label>
                                                    <input type="text" class="form-control" name="garde" value="">
                                                </div>

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Activer les cépages</label>
                                                    <select id="cepages_active" name="cepages_active" class="form-control">
                                                        <option value="0">Non</option>
                                                        <option value="1">Oui</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div style="display: none;" class="cepagesBoisson form-group row">

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Cépages</label>
                                                    <textarea type="text" class="form-control" name="cepages"></textarea>
                                                </div>

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Niveau de cépage</label>
                                                    <select name="niveau_cepage" class="form-control">
                                                        <option value="">----</option>
                                                        <option value="1">Niveau 1</option>
                                                        <option value="2">Niveau 2</option>
                                                        <option value="3">Niveau 3</option>
                                                        <option value="4">Niveau 4</option>
                                                        <option value="5">Niveau 5</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="">Alliances</label>
                                                <input type="text" class="form-control" name="alliances" value="">

                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label class="">Prix (€)</label>
                                                    <input type="text" class="form-control" name="prix" value="">
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label class="">Soit (€)</label>
                                                    <input type="text" class="form-control" name="soit" value="">

                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label class="">Température de service</label>
                                                    <input type="text" class="form-control" name="service_temperature" value="">
                                                </div>

                                            </div>

                                            <div class="cepagesBoisson form-group row" style="display: none;">

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Chart (Titre des cépages)</label>
                                                    <input type="text" class="form-control" name="chart_content" value="">
                                                </div>

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Chart (Division des cépages)</label>
                                                    <input type="text" class="form-control" name="chart_number" value="">
                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                                <div class="row card-body">

                                    <div class="col-md-6">

                                        <form id="bloc_3" class="user">

                                            <h5>LE DOMAINE ET L'APPELLATION</h5>

                                            <hr>

                                            <div class="domaine">

                                                <div class="row" style="align-items: center;">

                                                    <div class="col-md-4 prev_image_1" style="display: none;">
                                                    </div>

                                                    <div class="col">
                                                        <label for="domaine_img">
                                                            <a class="btn btn-info">Sélectionner un fichier</a>
                                                            <input type="file" id="domaine_img" name="domaine_img">
                                                            <div class="error_1"></div>
                                                        </label>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <?php
                                                echo '<label class="">Description <b>FR</b></label>';
                                                echo '<textarea id="def_content_fr" class="form-control" style="rezise: vertical;" rows="6"></textarea><hr>';
                                                ?>

                                                <?php
                                                echo '<label class="">Description <b>EN</b></label>';
                                                echo '<textarea id="def_content_en" class="form-control" style="rezise: vertical;" rows="6"></textarea><hr>';
                                                ?>
                                            </div>

                                        </form>

                                    </div>

                                    <div class="col-md-6">

                                        <form id="bloc_4" class="user">

                                            <h5>CARACTÉRISTIQUES</h5>

                                            <hr>

                                            <div class="form-group">
                                                <?php
                                                echo '<label class="">Titre <b>FR</b></label>';
                                                echo '<input type="text" name="titre_fr" class="form-control" value="">';
                                                echo '<label class="mt-4">Description <b>FR</b></label>';
                                                echo '<textarea name="content_fr" class="form-control" style="rezise: vertical;" rows="6"></textarea>';
                                                echo '<hr>';
                                                ?>

                                                <?php
                                                echo '<label class="">Titre <b>EN</b></label>';
                                                echo '<input type="text" name="titre_en" class="form-control" value="">';
                                                echo '<label class="mt-4">Description <b>EN</b></label>';
                                                echo '<textarea name="content_en" class="form-control" style="rezise: vertical;" rows="6"></textarea>';
                                                echo '<hr>';
                                                ?>
                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->