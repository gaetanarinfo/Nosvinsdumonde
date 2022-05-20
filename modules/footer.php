<?php if (empty($_GET['page'])) { ?>

    <div class="container-md mt-5 mb-5" style="display: none;">

        <div class="text-white">

            <h4>Vins</h4>

            <p class="mt-3"><b>Appellation :</b></p>

            <ul vocab="https://schema.org/" typeof="BreadcrumbList">
                <?php foreach ($appellations as $value) { ?>
                    <?php if ($value['id_boisson'] == "1") { ?>
                        <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" class="text-white" href="/<?= $language ?>/appellation/1/<?= $value['id'] ?>"><span property="name"><?= $value['nom_fr_fr'] ?></a></span>
                            <meta property="position" content="1">
                        </li>
                    <?php } ?>
                <?php } ?>

            </ul>

            <p><b>Régions :</b></p>

            <ul vocab="https://schema.org/" typeof="BreadcrumbList">
                <?php foreach ($regions as $value) { ?>
                    <?php if ($value['id_boisson'] == "1") { ?>
                        <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" class="text-white" href="/<?= $language ?>/region/1/<?= $value['id'] ?>"><span property="name"><?= $value['nom_fr_fr'] ?></a></span>
                            <meta property="position" content="1">
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>

            <hr>

            <h4>Champagnes</h4>

            <p class="mt-3"><b>Appellations :</b></p>

            <ul vocab="https://schema.org/" typeof="BreadcrumbList">
                <?php foreach ($appellations as $value) { ?>
                    <?php if ($value['id_boisson'] == "2") { ?>
                        <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" class="text-white" href="/<?= $language ?>/appellation/2/<?= $value['id'] ?>"><span property="name"><?= $value['nom_fr_fr'] ?></span></a>
                            <meta property="position" content="1">
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>

            <p><b>Régions :</b></p>

            <ul vocab="https://schema.org/" typeof="BreadcrumbList">
                <?php foreach ($regions as $value) { ?>
                    <?php if ($value['id_boisson'] == "2") { ?>
                        <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" class="text-white" href="/<?= $language ?>/region/2/<?= $value['id'] ?>"><span property="name"><?= $value['nom_fr_fr'] ?></span></a>
                            <meta property="position" content="1">
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>

        </div>

    </div>

<?php } ?>

<!-- Footer -->
<footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn-floating m-1" href="https://www.facebook.com/nosvindumonde/" role="button"><img src="<?= $static_img ?>socials/facebook-Icon.png" alt="Facebook"></a>

            <!-- Twitter -->
            <a class="btn-floating m-1" href="https://twitter.com/nosvinsdumonde" role="button"><img src="<?= $static_img ?>socials/Twitter-Icon.png" alt="Twitter"></a>

            <!-- Linkedin -->
            <a class="btn-floating m-1" href="https://www.linkedin.com/in/ga%C3%ABtan-seigneur-2b3357200/" role="button"><img src="<?= $static_img ?>socials/Linkedin.png" alt="Linkedin"></a>

        </section>
        <!-- Section: Social media -->

        <!-- Section: Text -->
        <section class="mb-4">
            <p>
                <?= constant('SLOGAN_FOOTER') ?>
            </p>

            <p id="abus" class="text-white"><?= constant('ABUS') ?></p>
        </section>
        <!-- Section: Text -->

        <!-- Section: Links -->
        <section class="links">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase"><?= constant('LINK_TILE_1'); ?></h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="/<?= $language ?>/qui-sommes-nous" class="text-white"><?= constant('LINK_1'); ?></a>
                        </li>
                        <li>
                            <a href="/<?= $language ?>/contact" class="text-white"><?= constant('LINK_2'); ?></a>
                        </li>
                        <li>
                            <a href="/<?= $language ?>/nos-services" class="text-white"><?= constant('LINK_3'); ?></a>
                        </li>
                        <li>
                            <a href="/<?= $language ?>/nos-valeurs" class="text-white"><?= constant('LINK_4'); ?></a>
                        </li>
                        <li>
                            <a href="/<?= $language ?>/nos-engagements" class="text-white"><?= constant('LINK_5'); ?></a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase"><?= constant('LINK_TILE_2'); ?></h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="/<?= $language ?>/vins" class="text-white"><?= constant('LINK_7'); ?></a>
                        </li>
                        <li>
                            <a href="/<?= $language ?>/champagnes" class="text-white"><?= constant('LINK_8'); ?></a>
                        </li>
                        <li>
                            <a href="/<?= $language ?>/plan-site" class="text-white"><?= constant('LINK_9'); ?></a>
                        </li>
                        <li>
                            <a href="/<?= $language ?>/livraison" class="text-white"><?= constant('LINK_22'); ?></a>
                        </li>
                        <li>
                            <a href="/<?= $language ?>/api" class="text-white"><?= constant('LINK_6'); ?></a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase"><?= constant('LINK_TILE_3'); ?></h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="/<?= $language ?>/faq" class="text-white"><?= constant('LINK_10'); ?></a>
                        </li>
                        <li>
                            <a href="/<?= $language ?>/programme-privilege" class="text-white"><?= constant('LINK_11'); ?></a>
                        </li>
                        <li>
                            <a href="/<?= $language ?>/cgv" class="text-white"><?= constant('LINK_12'); ?></a>
                        </li>
                        <li>
                            <a href="/<?= $language ?>/cgu" class="text-white"><?= constant('LINK_13'); ?></a>
                        </li>
                        <li>
                            <a href="/<?= $language ?>/politique-confidentialite" class="text-white"><?= constant('LINK_14'); ?></a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 copyright" style="background-color: rgba(0, 0, 0, 0.2);">
        © <?= date('Y') ?> Copyright -
        <a class="text-warning text-decoration-none" href="https://<?= $_SERVER['HTTP_HOST'] ?>/"><?= $_SERVER['HTTP_HOST'] ?></a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<!-- Back to top button -->
<button type="button" class="btn btn-warning btn-floating btn-lg" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>

<!-- Script -->
<script src="<?= $static_url ?>js/9d1d83a1dd.js" crossorigin="anonymous"></script>
<script src="<?= $static_url ?>js/jquery.min.js"></script>
<?= (!empty($_GET['page']) && $_GET['page'] == 'panier' && $_GET['step'] == "3" && !empty($_SESSION['user_id'])) ? '<script src="' . $static_url . 'js/client.js?' . time() . '"></script>' : '' ?>
<script src="<?= $static_url ?>js/jquery.cookie.js"></script>
<script src="<?= $static_url ?>js/bootstrap.min.js"></script>
<script src="<?= $static_url ?>js/script.js?<?= time() ?>"></script>
<?= (!empty($_GET['page']) && $_GET['page'] == 'vins' && empty($_GET['id'])) ? '<script src="' . $static_url . 'js/vins.js?' . time() . '"></script>' : '' ?>
<?= (!empty($_GET['page']) && $_GET['page'] == 'vins' && !empty($_GET['id'])) ? '<script src="' . $static_url . 'js/vins-id.js?' . time() . '"></script>' : '' ?>
<?= (!empty($_GET['page']) && $_GET['page'] == 'champagnes' && empty($_GET['id'])) ? '<script src="' . $static_url . 'js/champagnes.js?' . time() . '"></script>' : '' ?>
<?= (!empty($_GET['page']) && $_GET['page'] == 'champagnes' && !empty($_GET['id'])) ? '<script src="' . $static_url . 'js/champagnes-id.js?' . time() . '"></script>' : '' ?>
<?= (!empty($_GET['page']) && $_GET['page'] == 'favoris') ? '<script src="' . $static_url . 'js/favoris.js?' . time() . '"></script>' : '' ?>
<?= (!empty($_GET['page']) && $_GET['page'] == 'contact') ? '<script src="' . $static_url . 'js/contact.js?' . time() . '"></script>' : '' ?>
<?= (!empty($_GET['page']) && $_GET['page'] == 'login') ? '<script src="' . $static_url . 'js/login.js?' . time() . '"></script>' : '' ?>
<?= (!empty($_GET['page']) && $_GET['page'] == 'register') ? '<script src="' . $static_url . 'js/register.js?' . time() . '"></script>' : '' ?>
<?= (!empty($_GET['page']) && $_GET['page'] == 'forgot-password') ? '<script src="' . $static_url . 'js/forgot-password.js?' . time() . '"></script>' : '' ?>
<?= (!empty($_GET['page']) && $_GET['page'] == 'panier') ? '<script src="' . $static_url . 'js/panier.js?' . time() . '"></script>' : '' ?>
<?= (!empty($_GET['page']) && $_GET['page'] == 'gestion-compte' && !empty($_SESSION['user_id'])) ? '<script src="' . $static_url . 'js/gestion-compte.js?' . time() . '"></script>' : '' ?>

<?php if (!empty($_GET['page']) && $_GET['page'] == 'panier' && $_GET['step'] == "3" && !empty($_SESSION['user_id'])) { ?>
    <script src="https://www.paypal.com/sdk/js?client-id=Ae7gZSOdUtSzTBRkci42fn5VDNQttxYeEQiaX-yZSqYcjTkymRJ9SEXhIPPBCsvDsuPrL6nB6VdIeH_Y&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory"></script>

    <script>
        var amount = $('#total').val();
        var description = $('#description').val();

        initPayPalButton(amount, description);

        function initPayPalButton(total, description) {

            paypal.Buttons({
                style: {
                    layout: 'horizontal',
                    size: 'small',
                    color: 'blue',
                    shape: 'pill',
                    label: 'pay',
                    tagline: 'false',
                    fundingicons: 'false',
                },

                // Set up a payment
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            "description": description,
                            "amount": {
                                "currency_code": "EUR",
                                "value": total
                            }
                        }]
                    });
                },

                onApprove: function(data, actions) {

                    $("#after_paiement").hide();

                    $('#loaderpaiement').show();

                    setTimeout(() => {
                        $("#check_list2").fadeIn(600);
                    }, 200);

                    return actions.order.capture().then(function(orderData) {

                        $.ajax({
                            url: "https://<?= $_SERVER['HTTP_HOST'] ?>/ajax/ajax-paiementSuccessful.php",
                            method: 'POST',
                            data: {
                                token: $('input[name=token]').val(),
                                origin: "paypal",
                                transaction_id: orderData.id,
                                statut_transaction: orderData.status,
                                created_at: orderData.create_time,
                            },
                            cache: false,
                            success: function(data) {

                                location.href = '/' + $('input[name=lang]').val() + '/panier/4';

                            }

                        });

                    });
                },

                onError: function(data) {

                    $("#after_paiement").hide();

                    $('#loaderpaiement').show();

                    $.ajax({
                        url: "https://<?= $_SERVER['HTTP_HOST'] ?>/ajax/ajax-paiementCanceled.php",
                        method: 'POST',
                        data: {
                            token: $('input[name=token]').val(),
                            origin: "paypal",
                            transaction_id: "",
                            statut_transaction: "ERROR",
                            giftMessage: $('#giftMessage').val(),
                            total: $('#total').val(),
                            port: $('#port').val(),
                            point: $('#point').val(),
                            lang: $('input[name=lang]').val()
                        },
                        cache: false,
                        success: function(data) {

                            $('#loaderpaiement').hide();
                            $('#choice_methode').hide();
                            $("#error").show();
                        }

                    });

                },

                onCancel: function(data) {

                    $("#after_paiement").hide();

                    $('#loaderpaiement').show();

                    $.ajax({
                        url: "https://<?= $_SERVER['HTTP_HOST'] ?>/ajax/ajax-paiementCanceled.php",
                        method: 'POST',
                        data: {
                            token: $('input[name=token]').val(),
                            origin: "paypal",
                            transaction_id: "",
                            statut_transaction: "CANCELED",
                            giftMessage: $('#giftMessage').val(),
                            total: $('#total').val(),
                            port: $('#port').val(),
                            point: $('#point').val(),
                            lang: $('input[name=lang]').val()
                        },
                        cache: false,
                        success: function(data) {

                            console.log(data);

                            $('#loaderpaiement').hide();
                            $('#choice_methode').hide();
                            $("#error").show();
                        }

                    });
                }

            }).render('#paypal-button-container');

        }
    </script>
<?php } ?>

<script src="<?= $static_url ?>js/fancybox.umd.js"></script>

<?= (empty($_GET['page'])) ? '<script src="' . $static_url . 'js/home.js?' . time() . '"></script>' : '' ?>

<script src="https://www.google.com/recaptcha/api.js"></script>

</body>

</html>