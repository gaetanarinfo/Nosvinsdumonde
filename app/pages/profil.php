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
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Mon profil</h1>
                    </div>

                    <div class="col-md-12">

                        <div id="message_profil" class="col-md-5 m-auto alert mb-0 mt-5 d-flex align-items-center alert-success" role="alert">
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

                        <div class="col-md-4 m-auto row justify-content-center" id="blocLoginForm">

                            <div id="loaderUser" style="display: none;" class="lds-ripple">
                                <div></div>
                                <div></div>
                            </div>

                            <form id="user_profil" class="user">

                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select name="civilite" class="form-control" name="civilite">
                                            <option value="1" <?= ($user['civilite'] == "1") ? 'selected' : '' ?>>Mme</option>
                                            <option value="2" <?= ($user['civilite'] == "2") ? 'selected' : '' ?>>Mr</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="nom" value="<?= $user['nom'] ?>" placeholder="Nom">
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="prenom" value="<?= $user['prenom'] ?>" placeholder="Prénom">
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="phone" value="<?= '0' . $user['phone'] ?>" placeholder="Téléphone">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Adresse email" value="<?= $user['email'] ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="adresse" value="<?= $user['adresse'] ?>" placeholder="Adresse">
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="code_postal" value="<?= $user['code_postal'] ?>" placeholder="Code postal">
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="ville" value="<?= $user['ville'] ?>" placeholder="Ville">
                                    </div>

                                </div>


                                <div class="form-group">
                                    <select name="pays" class="form-control" id="pays">
                                        <?php foreach ($pays as $pay) { ?>
                                            <option value="<?= $pay['id'] ?>" <?= ($user['pays'] == $pay['id']) ? 'selected' : '' ?>><?= $pay['nom_fr_fr'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Enregistrer
                                </button>

                            </form>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->