<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow fixed-top">

    <div id="navbar" class="container-fluid">

        <a class="navbar-brand" href="/<?= $language ?>/"><img class="logo me-2" src="<?= $static_img ?>logo.png" alt="<?= str_replace('www.', '', $_SERVER['HTTP_HOST']) ?>" /><span class="domain_name"><?= str_replace('www.', '', $_SERVER['HTTP_HOST']) ?></span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link font-bold fw-bolder <?php if (empty($_GET['page'])) echo 'active'; ?>" <?php if (empty($_GET['page'])) echo 'aria-current="page"'; ?> href="/<?= $language ?>/"><i class="fa-solid fa-house me-2 domain_name_i"></i><?= strtoupper(constant('NAVBAR_ITEM_1')) ?></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-bolder <?php if (!empty($_GET['page']) && $_GET['page'] == 'vins') echo 'active'; ?>" <?php if (!empty($_GET['page']) && $_GET['page'] == 'vins') echo 'aria-current="page"'; ?> href="/<?= $language ?>/vins"><i class="fa-solid fa-wine-glass me-2 vin domain_name_i"></i><?= strtoupper(constant('NAVBAR_ITEM_2')) ?></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-bolder <?php if (!empty($_GET['page']) && $_GET['page'] == 'champagnes') echo 'active'; ?>" <?php if (!empty($_GET['page']) && $_GET['page'] == 'champagnes') echo 'aria-current="page"'; ?> href="/<?= $language ?>/champagnes"><i class="fa-solid fa-martini-glass-empty me-2 champagnes domain_name_i"></i><?= strtoupper(constant('NAVBAR_ITEM_3')) ?></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-bolder <?php if (!empty($_GET['page']) && $_GET['page'] == 'contact' && isset($_GET['suggest'])) echo 'active'; ?>" <?php if (!empty($_GET['page']) && $_GET['page'] == 'contact') echo 'aria-current="page"'; ?> href="/<?= $language ?>/contact/suggest"><i class="fa-solid fa-location-arrow me-2 domain_name_i"></i><?= strtoupper(constant('NAVBAR_ITEM_4')) ?></a>
                </li>

                <?php if (empty($_GET['page'])) { ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="plus" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                        <ul class="dropdown-menu c-white bg-dark plus" aria-labelledby="plus">
                            <li class="nav-item"><a role="button" id="togglePage1" data-toggle="vitisphere" class="text-decoration-none nav-link"><i class="fa-solid fa-arrow-right me-1"></i>La vitisphere</a></li>
                            <li class="nav-item"><a role="button" id="togglePage2" data-toggle="produits" class="text-decoration-none nav-link"><i class="fa-solid fa-arrow-right me-1"></i>Nos produits</a></li>
                            <li class="nav-item"><a role="button" id="togglePage3" data-toggle="livraison" class="text-decoration-none nav-link"><i class="fa-solid fa-arrow-right me-1"></i>Livraison</a></li>
                            <li class="nav-item"><a role="button" id="togglePage4" data-toggle="appellationRegions" class="text-decoration-none nav-link"><i class="fa-solid fa-arrow-right me-1"></i>Appellations & Régions</a></li>
                        </ul>
                    </li>

                <?php } ?>

            </ul>

            <ul class="navbar-nav mb-2 me-2 mb-lg-0" id="language_nav">

                <li class="nav-item cart_nav dropdown">
                    <?php if (!empty($_COOKIE['cart'])) { ?>
                        <?php
                        $cart = $_COOKIE['cart'];
                        $favCart = explode(',', $cart);
                        ?>
                        <a href="#" class="nav-link fw-bolder position-relative" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                <?= (!empty($_COOKIE['cart'])) ? '<span class="count_cart">' . count($favCart) . '</span>' : '<span></span>' ?>
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-dark" id="cart_bloc" aria-labelledby="cart">

                            <?php

                            foreach ($carts as $cart) {

                                if ($cart['boissonId'] == 1) {
                                    $vin_image = 'vins';
                                } else if ($cart['boissonId'] == 2) {
                                    $vin_image = 'champagnes';
                                }

                                $quantity = $counter_cart[$cart['idBoisson']];

                            ?>

                                <li class="item_cart">
                                    <div class="ms-4 mt-3 mb-3 cart_bloc shadow">
                                        <a href="/<?= $language ?>/<?= $vin_image ?>/<?= $cart['idBoisson'] ?>" class="text-white text-decoration-none">
                                            <img src="<?= $static_img . $vin_image ?>/<?= $cart['imageBoisson']; ?>" alt="<?= $cart['nomBoisson']; ?>">
                                        </a>
                                    </div>
                                    <div class="text-right" style="width: 90%;padding-right: 20px;">
                                        <b style="font-size: 16px;"><a href="/<?= $language ?>/<?= $vin_image ?>/<?= $cart['idBoisson'] ?>" class="text-white text-decoration-none"><b class="text-white" style="font-size: 16px;"><?= $quantity ?> x</b> <b><?= $cart['nomBoisson']; ?></b></a></b>
                                        <p style="font-size: 16px;" class="m-0"><a href="/<?= $language ?>/<?= $vin_image ?>/<?= $cart['idBoisson'] ?>" class="text-white text-decoration-none"><b><?= $cart['apellationBoisson']; ?></b> <b><?= $cart['millesimeBoisson']; ?></b></a></p>
                                        <p class="m-0"><a href="/<?= $language ?>/<?= $vin_image ?>/<?= $cart['idBoisson'] ?>" class="text-decoration-none" style="font-size: 18px;color: #d86868 !important;"><b><?= number_format($cart['prixBoisson'], 2, ',', ''); ?> €</b></a></p>
                                    </div>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                            <?php } ?>

                            <li>
                                <div class="mt-3 mb-2 m-auto text-center" style="padding: 0 10px;">
                                    <a href="/<?= $language ?>/panier/1" class="btn btn-outline-warning btn-lg cart_redirect" data-page="<?= 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" style="width: 100%;"><i class="fa-solid fa-bag-shopping me-2"></i><?= constant('REGLE_CART') ?></a>
                                </div>
                            </li>

                        </ul>
                    <?php } else { ?>
                        <a type="button" class="nav-link fw-bolder position-relative">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span class="count_cart"></span>
                        </a>
                    <?php } ?>
                </li>

                <li class="nav-item heart_nav">
                    <?php if (!empty($_COOKIE['favoris'])) { ?>
                        <?php
                        $favorite = $_COOKIE['favoris'];
                        $favEx = explode(',', $favorite);
                        ?>
                        <a class="nav-link fw-bolder" href="/<?= $language ?>/favoris"><i class="fa-solid fa-heart me-1"></i><?= (!empty($_COOKIE['favoris'])) ? '<span>' . count($favEx) . '</span>' : '<span></span>' ?></a>
                    <?php } else { ?>
                        <a class="nav-link fw-bolder"><i class="fa-solid fa-heart me-1"></i><span></span></a>
                    <?php } ?>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle langs" href="#" id="language" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= $static_img ?>langs/<?= $language ?>.png" alt="<?= $language ?>">
                    </a>
                    <ul class="dropdown-menu c-white bg-dark" aria-labelledby="language">
                        <?php foreach ($langs as $value) { ?>
                            <li><a class="dropdown-item<?php if ($language == $value['code_by_2']) echo ' active'; ?>" href="/<?= $value['code_by_2'] ?>/"><img src="<?= $static_img ?>langs/<?= $value['code_by_2'] ?>.png" alt="<?= $value['code_by_2'] ?>"><span class="language_value ms-2 fw-bolder"><?= $value['value'] ?></span></a></li>
                        <?php } ?>
                    </ul>
                </li>

                <?php if (!empty($_SESSION['user_id'])) { ?>
                    <li class="nav-item dropdown me-4">
                        <a class="nav-link users dropdown-toggle" href="#" id="users" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= generateRoundedImg('assets/img/avatars/' . $user['user_profil_image'], $_SERVER['HTTP_HOST'], $user['id']); ?>">
                        </a>
                        <ul class="dropdown-menu c-white bg-dark" aria-labelledby="users">

                            <?php if ($user['type_id'] == 3) { ?>
                                <li><a href="/app" class="text-white dropdown-item"><i class="fa-solid fa-gear me-2"></i><?= constant('NAVBAR_APP') ?></a></li>
                                <li><a href="/<?= $language ?>/gestion-compte" class="text-white dropdown-item"><i class="fa-solid fa-user-gear me-2"></i><?= constant('GESTION_COMPTE') ?></a></li>
                                <li><a href="/<?= $language ?>/historique-commandes" class="text-white dropdown-item"><i class="fa-solid fa-cart-shopping me-2"></i><?= constant('GESTION_COMMANDE') ?></a></li>

                                <?php if ($user['carte'] != "0") { ?>
                                    <li><a role="button" data-bs-toggle="modal" data-bs-target="#cartePrivilegeModal" class="text-white dropdown-item"><i class="fa-solid fa-gift me-2"></i><?= constant('GESTION_CARTE') ?></a></li>
                                <?php } ?>

                            <?php } else { ?>
                                <li><a href="/<?= $language ?>/gestion-compte" class="text-white dropdown-item"><i class="fa-solid fa-user-gear me-2"></i><?= constant('GESTION_COMPTE') ?></a></li>
                                <li><a href="/<?= $language ?>/historique-commandes" class="text-white dropdown-item"><i class="fa-solid fa-cart-shopping me-2"></i><?= constant('GESTION_COMMANDE') ?></a></li>

                                <?php if ($user['carte'] != "0") { ?>
                                    <li><a role="button" data-bs-toggle="modal" data-bs-target="#cartePrivilegeModal" class="text-white dropdown-item"><i class="fa-solid fa-gift me-2"></i><?= constant('GESTION_CARTE') ?></a></li>
                                <?php } ?>

                            <?php } ?>

                            <li><a href="/<?= $language ?>/logout" class="text-white dropdown-item"><i class="fa-solid fa-right-from-bracket me-2"></i><?= constant('LOGOUT') ?></a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="nav-item user-nav me-4 dropdown">
                        <a class="nav-link users dropdown-toggle" href="#" id="users" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= $static_img ?>user_empty.png">
                        </a>
                        <ul class="dropdown-menu c-white bg-dark" aria-labelledby="users">
                            <li><a href="/<?= $language ?>/login" class="text-white dropdown-item<?php if (!empty($_GET['page']) && $_GET['page'] == "login") echo ' active'; ?>"><i class="fa-solid fa-right-to-bracket me-2"></i><?= constant('SIGNIN') ?></a></li>
                            <li><a href="/<?= $language ?>/register" class="text-white dropdown-item<?php if (!empty($_GET['page']) && $_GET['page'] == "register") echo ' active'; ?>"><i class="fa-solid fa-circle-plus me-2"></i><?= constant('REGISTER') ?></a></li>
                        </ul>
                    </li>
                <?php } ?>

            </ul>

            <div id="form_search" class="d-flex w-20">
                <input id="lang" type="hidden" value="<?= $language ?>">
                <input id="host" type="hidden" value="<?= $_SERVER['HTTP_HOST'] ?>">
                <input id="input_search" class="form-control me-2" type="text" placeholder="<?= constant('SEARCH_PLACEHOLER') ?>" aria-label="Search">
                <div class="text-white close_search" role="button"><i class="fa-solid fa-xmark"></i></div>
            </div>

            <div id="search_box">
                <ul class="list-group box_search list-group-flush shadow">
                </ul>
            </div>

        </div>

    </div>

</nav>

<?php if (!empty($_SESSION['user_id']) && $user['carte'] != "0") { ?>
    <?php include 'modal/cartePrivilegeModal.php'; ?>
<?php } ?>