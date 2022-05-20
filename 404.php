<?php

include 'config/fonctions.php';
include 'config/connexion.php';
include 'config/config.php';
include "assets/langs/" . $language . ".php";

?>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>404 - Nosvinsdumonde</title>

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

    <link rel="stylesheet" href="<?= $static_url ?>css/404.css" type="text/css" media="all">

    <style>
        #banner-117972368 {
            padding-top: 100%;
        }

        #banner-117972368 .bg.bg-loaded {
            background: url('<?= $static_img ?>underwater-1400x788.jpg');
        }
    </style>

</head>

<body class="page-template page-template-page-blank-landingpage page-template-page-blank-landingpage-php page page-id-24488 theme-flatsome woocommerce-js lightbox lazy-icons nav-dropdown-has-arrow cookies-set cookies-accepted">
    <div id="wrapper">

        <div id="main" class="">


            <div class="banner has-hover is-full-height" id="banner-117972368">
                <div class="banner-inner fill">
                    <div class="banner-bg fill">
                        <div class="bg fill bg-fill bg-loaded"></div>

                    </div><!-- bg-layers -->
                    <div class="banner-layers container">
                        <div class="fill banner-link"></div>
                        <div id="text-box-1049602786" class="text-box banner-layer x50 md-x50 lg-x50 y50 md-y50 lg-y50 res-text">
                            <div class="text dark">

                                <div class="text-inner text-center">

                                    <h4 class="uppercase"><span style="font-size: 75%;"><?= constant('404') ?></span></h4>
                                    <div class="row">
                                        <div class="col medium-6 small-12 large-6">
                                            <div class="col-inner" style="padding:0px 0px 0px 0px;">
                                                <a href="/<?= $language ?>/" style="padding-top: 10px;padding-bottom: 10px;" class="button white is-outline">
                                                    <span><?= constant('BACK_404') ?></span>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- text-box-inner -->

                            <style scope="scope">
                                #text-box-1049602786 {
                                    width: 60%;
                                }

                                #text-box-1049602786 .text {
                                    font-size: 100%;
                                }
                            </style>
                        </div><!-- text-box -->

                    </div><!-- .banner-layers -->
                </div><!-- .banner-inner -->

            </div><!-- .banner -->

        </div><!-- #main -->

    </div><!-- #wrapper -->

</body>