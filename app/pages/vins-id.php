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
                        <h1 class="h3 mb-0 text-gray-800">Gestion de <?= $vin_by_user['nomBoisson'] ?></h1>
                        <div class="row">
                            <a href="/fr/vins/<?= $vin_by_user['idBoisson'] ?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-3"><i class="fas fa-eye fa-sm text-white mr-1"></i> Prévisualiser</a>
                            <a id="edit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-3"><i class="fas fa-pencil fa-sm text-white mr-1"></i> Éditer</a>
                            <input type="hidden" id="vinId" value="<?= $vin_by_user['idBoisson'] ?>">
                            <a id="delete" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-times fa-sm text-white mr-1"></i> Supprimer</a>
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

                        <div class="col-lg-6 mb-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><?= $vin_by_user['nomBoisson'] ?></h6>
                                </div>
                                <div class="card-body">

                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="../../assets/img/vins/<?= $vin_by_user['imageBoisson'] ?>">
                                    </div>

                                    <div class="col-lg-12 pl-0 pr-0 mb-4">
                                        <div class="card bg-primary text-white shadow">
                                            <div class="card-body">
                                                <h5>INFORMATIONS UTILE</h5>
                                                <div class="text-white "><b>Bouteille de </b> <?= $vin_by_user['contenanceBoisson'] ?></div>
                                                <div class="text-white "><b>Millésime</b> <?= $vin_by_user['millesimeBoisson'] ?></div>
                                                <div class="text-white "><b>Pays</b> <?= $vin_by_user['paysBoisson'] ?></div>
                                                <div class="text-white "><b>Apellation</b> <?= $vin_by_user['apellationBoisson'] ?></div>
                                                <div class="text-white "><b>Région</b> <?= $vin_by_user['regionBoisson'] ?></div>
                                                <div class="text-white "><b>Couleur</b> <span><?= $vin_by_user['couleurBoisson'] ?></span><span> | </span><span><?= $vin['degreeBoisson'] ?></span><span>°</span></div>
                                                <div class="text-white "><b>Prix</b> <span><?= number_format($vin_by_user['prixBoisson'], 2, ',', '') ?></span> €</div>
                                                <div class="text-white "><b>Soit</b> <span><?= number_format($vin_by_user['soitBoisson'], 2, ',', '') ?></span> €</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-lg-6 mb-4">
                                            <div class="card bg-info text-white shadow">
                                                <div class="card-body">
                                                    <h5>NIVEAU DE GARDE</h5>
                                                    <div class="text-white "><b><?= $vin_by_user['gardeBoisson'] ?></b></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <div class="card bg-danger text-white shadow">
                                                <div class="card-body">
                                                    <h5>TEMPÉRATURE DE SERVICE</h5>
                                                    <div class="text-white "><b><?= $vin_by_user['temperatureBoisson'] ?>°</b></div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if ($vin_by_user['cepagesBoisson'] == "1") { ?>

                                            <div class="col-lg-6 mb-4">
                                                <div class="card bg-warning text-white shadow">
                                                    <div class="card-body">
                                                        <h5>CÉPAGES</h5>
                                                        <div class="text-white"><b><?= $vin_by_user['contentCepagesBoisson'] ?></b></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-4">
                                                <div class="card bg-dark text-white shadow" style="min-height: 88px;">
                                                    <div class="card-body">
                                                        <div class="text-white note_cepages" style="display: flex;justify-content: center;align-items: center;vertical-align: middle;">
                                                            <br>
                                                            <br>
                                                            <?php

                                                            switch ($vin_by_user['niveauCepagesBoisson']) {
                                                                case '1':
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                                                    break;

                                                                case '2':
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                                                    break;

                                                                case '3':
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                                                    break;

                                                                case '4':
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf empty"></i>';
                                                                    break;

                                                                case '5':
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    echo '<i class="fa-solid fa-leaf"></i>';
                                                                    break;
                                                            }

                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>

                                    </div>


                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <?php $degustations = selectDB('*', 'degustations', 'vin_id = ' . $vin_by_user['idBoisson'] . ' ORDER BY id', $db, '*'); ?>

                            <?php foreach ($degustations as $value) { ?>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">CARACTÉRISTIQUES (<?= strtoupper($value['lang']) ?>)</h6>
                                    </div>
                                    <div class="card-body">

                                        <div class="text-center">
                                            <h3><?= constant($vin_by_user['nomGoutBoisson']) ?></h3>
                                        </div>

                                        <hr>

                                        <p><?= $value['content'] ?></p>

                                        <hr>

                                        <div class="text-center">
                                            <h3><?= $value['titre'] ?></h3>
                                        </div>

                                    </div>
                                </div>

                            <?php } ?>

                        </div>

                        <div id="domaine" class="col-lg-12 mb-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">LE DOMAINE ET L'APPELLATION</h6>
                                </div>
                                <div class="card-body">

                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25em;" src="../../assets/img/domaine_images/<?= $vin_by_user['domaineImageBoisson'] ?>">
                                    </div>

                                    <hr>

                                    <?php $definition = selectDB('*', 'definitions', 'vin_id = ' . $vin_by_user['idBoisson'] . ' ORDER BY id', $db, '*'); ?>

                                    <?php foreach ($definition as $value) {
                                        echo '<span><b>' . strtoupper($value['lang']) . '</b></span> <p>' . nl2br($value['content']) . '</p><hr>';
                                    } ?>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div id="edit_vin" class="col-lg-12 mb-4 pr-0 pl-0">

                        <div class="card shadow mb-4">

                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-pencil mr-1"></i>Editer</h6>
                            </div>

                            <div class="row card-body">

                                <div class="col-md-12">

                                    <form id="bloc_5" class="user">

                                        <input type="hidden" name="vin_id" value="<?= $vin_by_user['idBoisson'] ?>">

                                        <h5>PRESENTATION DU VIN</h5>

                                        <hr>

                                        <div class="vin">

                                            <div class="row" style="align-items: center;">

                                                <div class="col-md-2 prev_image_2">
                                                    <img class="img-fluid mt-3 mb-4 rounded shadow" style="width: 100%;" src="../../assets/img/vins/<?= $vin_by_user['imageBoisson']; ?>">
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

                                        <input type="hidden" name="vin_id" value="<?= $vin_by_user['idBoisson'] ?>">

                                        <h5>INFORMATIONS UTILE</h5>

                                        <hr>

                                        <div class="form-group">
                                            <label class="">Titre</label>
                                            <input type="text" class="form-control" name="titre" value="<?= $vin_by_user['nomBoisson'] ?>" placeholder="Titre">
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="">Contenance</label>
                                                <select name="contenance" class="form-control">
                                                    <option value="">---</option>
                                                    <?php foreach ($contenance as $value) { ?>
                                                        <option value="<?= $value['id'] ?>" <?= ($vin_by_user['contenanceIdBoisson'] == $value['id']) ? 'selected' : '' ?>><?= $value['nom'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="">Millésime</label>
                                                <input type="text" class="form-control" name="millesime" value="<?= $vin_by_user['millesimeBoisson'] ?>" placeholder="Millésime">
                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="">Pays</label>
                                                <select name="pays" class="form-control">
                                                    <option value="">---</option>
                                                    <?php foreach ($pays as $value) { ?>
                                                        <option value="<?= $value['id'] ?>" <?= ($vin_by_user['paysIdBoisson'] == $value['id']) ? 'selected' : '' ?>><?= $value['nom_fr_fr'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="">Apellation</label>
                                                <select name="apellation" class="form-control">
                                                    <option value="">---</option>
                                                    <?php foreach ($appellations as $value) { ?>
                                                        <?php if ($value['id_boisson'] == "1") { ?>
                                                            <option value="<?= $value['id'] ?>" <?= ($vin_by_user['appellationBoisson'] == $value['id']) ? 'selected' : '' ?>><?= $value['nom_fr_fr'] ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="">Goût</label>
                                                <select name="apellation" class="form-control">
                                                    <option value="">---</option>
                                                    <?php foreach ($gouts as $value) { ?>
                                                        <option value="<?= $value['id'] ?>" <?= ($vin_by_user['goutIdBoisson'] == $value['id']) ? 'selected' : '' ?>><?= $value['nom'] ?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="">Région</label>
                                                <select name="region" class="form-control">
                                                    <option value="">---</option>
                                                    <?php foreach ($regions as $value) { ?>
                                                        <?php if ($value['id_boisson'] == "1") { ?>
                                                            <option value="<?= $value['id'] ?>" <?= ($vin_by_user['regionIdBoisson'] == $value['id']) ? 'selected' : '' ?>><?= $value['nom_fr_fr'] ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="">Couleur</label>
                                                <select name="couleur" class="form-control">
                                                    <option value="">---</option>
                                                    <?php foreach ($couleurs as $value) { ?>
                                                        <option value="<?= $value['id'] ?>" <?= ($vin_by_user['couleurIdBoisson'] == $value['id']) ? 'selected' : '' ?>><?= $value['nom'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="">Degrée</label>
                                                <input type="text" class="form-control" name="degree" value="<?= $vin_by_user['degreeBoisson'] ?>" placeholder="10">
                                            </div>

                                        </div>

                                    </form>

                                </div>

                                <div class="col-md-6">

                                    <form id="bloc_2" class="user">

                                        <input type="hidden" name="vin_id" value="<?= $vin_by_user['idBoisson'] ?>">

                                        <h5>INFORMATIONS SUPPLEMENTAIRES</h5>

                                        <hr>

                                        <div class="form-group row">

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="">Niveau de garde</label>
                                                <input type="text" class="form-control" name="garde" value="<?= $vin_by_user['gardeBoisson'] ?>" placeholder="Niveau de garde">
                                            </div>

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="">Activer les cépages</label>
                                                <select name="cepages_active" class="form-control">
                                                    <option value="">---</option>
                                                    <option value="1" <?= ($vin_by_user['cepageBoisson'] == 1) ? 'selected' : '' ?>>Oui</option>
                                                    <option value="0" <?= ($vin_by_user['cepageBoisson'] == 0) ? 'selected' : '' ?>>Non</option>
                                                </select>
                                            </div>

                                        </div>

                                        <?php if ($vin_by_user['cepagesBoisson'] == 1) { ?>

                                            <div class="form-group row">

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Cépages</label>
                                                    <textarea type="text" class="form-control" name="cepages"><?= nl2br($vin_by_user['contentCepagesBoisson']) ?></textarea>
                                                </div>

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Niveau de cépage</label>
                                                    <select name="niveau_cepage" class="form-control">
                                                        <option value="">----</option>
                                                        <option value="1" <?= ($vin_by_user['niveauCepagesBoisson'] == 1) ? 'selected' : '' ?>>Niveau 1</option>
                                                        <option value="2" <?= ($vin_by_user['niveauCepagesBoisson'] == 2) ? 'selected' : '' ?>>Niveau 2</option>
                                                        <option value="3" <?= ($vin_by_user['niveauCepagesBoisson'] == 3) ? 'selected' : '' ?>>Niveau 3</option>
                                                        <option value="4" <?= ($vin_by_user['niveauCepagesBoisson'] == 4) ? 'selected' : '' ?>>Niveau 4</option>
                                                        <option value="5" <?= ($vin_by_user['niveauCepagesBoisson'] == 5) ? 'selected' : '' ?>>Niveau 5</option>
                                                    </select>
                                                </div>

                                            </div>

                                        <?php } ?>

                                        <div class="form-group">
                                            <label class="">Alliances</label>
                                            <input type="text" class="form-control" name="alliances" value="<?= $vin_by_user['allianceBoisson'] ?>" placeholder="Alliances">

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <label class="">Prix (€)</label>
                                                <input type="text" class="form-control" name="prix" value="<?= number_format($vin_by_user['prixBoisson'], 2, ',', '') ?>" placeholder="Prix">
                                            </div>

                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <label class="">Soit (€)</label>
                                                <input type="text" class="form-control" name="soit" value="<?= number_format($vin_by_user['soitBoisson'], 2, ',', '') ?>" placeholder="Soit">

                                            </div>

                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <label class="">Température de service</label>
                                                <input type="text" class="form-control" name="service_temperature" value="<?= $vin_by_user['temperatureBoisson'] ?>" placeholder="10">
                                            </div>

                                        </div>

                                        <?php if ($vin_by_user['cepagesBoisson'] == 1) { ?>

                                            <div class="form-group row">

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Chart (Titre des cépages)</label>
                                                    <input type="text" class="form-control" name="chart_content" value="<?= $vin_by_user['chartContentCepagesBoisson'] ?>">
                                                </div>

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label class="">Chart (Division des cépages)</label>
                                                    <input type="text" class="form-control" name="chart_number" value="<?= $vin_by_user['chartNumberCepagesBoisson'] ?>">
                                                </div>

                                            </div>

                                        <?php } ?>


                                    </form>

                                </div>

                            </div>

                            <div class="row card-body">

                                <div class="col-md-6">

                                    <form id="bloc_3" class="user">

                                        <input type="hidden" name="vin_id" value="<?= $vin_by_user['idBoisson'] ?>">

                                        <h5>LE DOMAINE ET L'APPELLATION</h5>

                                        <hr>

                                        <div class="domaine">

                                            <div class="row" style="align-items: center;">

                                                <div class="col-md-4 prev_image_1">
                                                    <img class="img-fluid mt-3 mb-4 rounded shadow" style="width: 100%;" src="../../assets/img/domaine_images/<?= (!empty($vin_by_user['domaineImageBoisson'])) ? $vin_by_user['domaineImageBoisson'] : 'image_defaut_vin.jpg' ?>">
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
                                            <?php foreach ($definition as $value) { ?>
                                            <?php
                                                echo '<label class="">Description <b>' . strtoupper($value['lang']) . '</b></label>';
                                                echo '<textarea id="content_' . $value['lang'] . '" class="form-control" style="rezise: vertical;" rows="6">' . $value['content'] . '</textarea><hr>';
                                            } ?>
                                        </div>

                                    </form>

                                </div>

                                <div class="col-md-6">

                                    <form id="bloc_4" class="user">

                                        <input type="hidden" name="vin_id" value="<?= $vin_by_user['idBoisson'] ?>">

                                        <h5>CARACTÉRISTIQUES</h5>

                                        <hr>

                                        <div class="form-group">
                                            <?php foreach ($degustations as $value) { ?>
                                            <?php
                                                echo '<label class="">Titre <b>' . strtoupper($value['lang']) . '</b></label>';
                                                echo '<input type="text" name="titre_' . $value['lang'] . '" class="form-control" value="' . $value['titre'] . '">';
                                                echo '<label class="mt-4">Description <b>' . strtoupper($value['lang']) . '</b></label>';
                                                echo '<textarea name="content_' . $value['lang'] . '" class="form-control" style="rezise: vertical;" rows="6">' . $value['content'] . '</textarea>';
                                                echo '<hr>';
                                            } ?>
                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->