<!DOCTYPE html>
<html lang="fr">

<head>

    <?php include 'titles.php'; ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= $static_url ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= $static_url ?>css/style.css?<?= time() ?>" rel="stylesheet">
    <?php if (!empty($_GET['page']) && $_GET['page'] == "profil") { ?>
        <link href="<?= $static_url ?>css/profil.css?<?= time() ?>" rel="stylesheet"><?php } ?>
    <?php if (!empty($_GET['page']) && $_GET['page'] == "vins") { ?>
        <link href="<?= $static_url ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"><?php } ?>
    <?php if (!empty($_GET['page']) && $_GET['page'] == "champagnes") { ?>
        <link href="<?= $static_url ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"><?php } ?>
    <?php if (!empty($_GET['page']) && $_GET['page'] == "vins") { ?>
        <link href="<?= $static_url ?>css/vins.css?<?= time(); ?>" rel="stylesheet"><?php } ?>
    <?php if (!empty($_GET['page']) && $_GET['page'] == "ajouter-vin") { ?>
        <link href="<?= $static_url ?>css/ajouter-vin.css?<?= time(); ?>" rel="stylesheet"><?php } ?>
    <?php if (!empty($_GET['page']) && $_GET['page'] == "ajouter-champagne") { ?>
        <link href="<?= $static_url ?>css/ajouter-champagne.css?<?= time(); ?>" rel="stylesheet"><?php } ?>
    <?php if (!empty($_GET['page']) && $_GET['page'] == "champagnes") { ?>
        <link href="<?= $static_url ?>css/champagnes.css?<?= time(); ?>" rel="stylesheet"><?php } ?>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= $static_img ?>icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= $static_img ?>icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $static_img ?>icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $static_img ?>icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $static_img ?>icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $static_img ?>icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $static_img ?>icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $static_img ?>icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $static_img ?>icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= $static_img ?>icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $static_img ?>icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $static_img ?>icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $static_img ?>icons/favicon-16x16.png">
    <link rel="manifest" href="<?= $static_img ?>icons/manifest.json">
    <link rel="shortcut icon" href="<?= $static_img ?>icons/favicon.ico" type="images/x-icon" />

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= $static_img ?>icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <script src="<?= $static_url ?>js/9d1d83a1dd.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= $static_url ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= $static_url ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= $static_url ?>vendor/jquery-easing/jquery.easing.min.js"></script>


</head>

<body id="page-top">