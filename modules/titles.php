<?php

if (isset($_GET['page'])) {

    $page = $_GET['page'];

    switch ($page) {

        case 'vins':

            if (!empty($_GET['id']) && $vin['couleurBoisson'] != 0) {
                if (!empty($_GET['id'])) {
                    if ($vin['apellationBoisson'] != "") {
                        $title = $vin['nomBoisson'] . ' ' . $vin['millesimeBoisson'] . ' vin ' . strtolower($vin['couleurBoisson']) . ' ' . $vin['apellationBoisson'];
                    } else {
                        $title = $vin['nomBoisson'] . ' ' . $vin['millesimeBoisson'] . ' vin ' . strtolower($vin['couleurBoisson']);
                    }
                } else {
                    $title = constant('TITLE_VINS');
                }
            } else {
                if (!empty($_GET['id'])) {
                    if ($vin['millesimeBoisson'] != "") {
                        $title = $vin['nomBoisson'] . ' ' . $vin['millesimeBoisson'] . ' ' . $vin['apellationBoisson'];
                    } else {
                        $title = $vin['nomBoisson'] . ' ' . $vin['millesimeBoisson'];
                    }
                } else {
                    $title = constant('TITLE_VINS');
                }
            }

            if (!empty($_GET['id'])) {
                if (!empty($vin['apellationBoisson'])) {
                    if (!empty($vin['couleurBoisson'])) {
                        $description = 'Le ' . $vin['nomBoisson'] . ' ' . $vin['millesimeBoisson'] . ' ' . $vin['apellationBoisson'] . ' est un excellent vin ' . strtolower($vin['couleurBoisson']) . ' ! Dévouvrez-le !';
                    } else {
                        $description = 'Le ' . $vin['nomBoisson'] . ' ' . $vin['millesimeBoisson'] . ' ' . $vin['apellationBoisson'] . ' est un excellent vin ! Dévouvrez-le !';
                    }
                } else {
                    if (!empty($vin['couleurBoisson'])) {
                        $description = 'Le ' . $vin['nomBoisson'] . ' ' . $vin['millesimeBoisson'] . ' est un excellent vin ' . strtolower($vin['couleurBoisson']) . ' ! Dévouvrez-le !';
                    } else {
                        $description = 'Le ' . $vin['nomBoisson'] . ' ' . $vin['millesimeBoisson'] . ' est un excellent vin ! Dévouvrez-le !';
                    }
                }
            } else {
                $description = constant('SUBTITLE_PAGE_VINS');
            }

            break;

        case 'champagnes':
            if (!empty($_GET['id']) && $champagne['couleurBoisson'] != 0) {
                if (!empty($_GET['id'])) {
                    if ($champagne['apellationBoisson'] != "") {
                        $title = $champagne['nomBoisson'] . ' ' . $champagne['millesimeBoisson'] . ' champagne ' . strtolower($champagne['couleurBoisson']) . ' ' . $champagne['apellationBoisson'];
                    } else {
                        $title = $champagne['nomBoisson'] . ' ' . $champagne['millesimeBoisson'] . ' champagne ' . strtolower($champagne['couleurBoisson']);
                    }
                } else {
                    $title = constant('TITLE_CHAMPAGNES');
                }
            } else {
                if (!empty($_GET['id'])) {
                    if ($champagne['millesimeBoisson'] != "") {
                        $title = $champagne['nomBoisson'] . ' ' . $champagne['millesimeBoisson'] . ' ' . $champagne['apellationBoisson'];
                    } else {
                        $title = $champagne['nomBoisson'] . ' ' . $champagne['millesimeBoisson'];
                    }
                } else {
                    $title = constant('TITLE_CHAMPAGNES');
                }
            }

            if (!empty($_GET['id'])) {
                if (!empty($champagne['apellationBoisson'])) {
                    if (!empty($champagne['couleurBoisson'])) {
                        $description = 'Le ' . $champagne['nomBoisson'] . ' ' . $champagne['millesimeBoisson'] . ' ' . $champagne['apellationBoisson'] . ' est un excellent champagne ' . strtolower($champagne['couleurBoisson']) . ' ! Dévouvrez-le !';
                    } else {
                        $description = 'Le ' . $champagne['nomBoisson'] . ' ' . $champagne['millesimeBoisson'] . ' ' . $champagne['apellationBoisson'] . ' est un excellent champagne ! Dévouvrez-le !';
                    }
                } else {
                    if (!empty($champagne['couleurBoisson'])) {
                        $description = 'Le ' . $champagne['nomBoisson'] . ' ' . $champagne['millesimeBoisson'] . ' est un excellent champagne ' . strtolower($champagne['couleurBoisson']) . ' ! Dévouvrez-le !';
                    } else {
                        $description = 'Le ' . $champagne['nomBoisson'] . ' ' . $champagne['millesimeBoisson'] . ' est un excellent champagne ! Dévouvrez-le !';
                    }
                }
            } else {
                $description = constant('SUBTITLE_PAGE_CHAMPAGNES');
            }

            break;

        case 'favoris':
            $title = constant('TITLE_FAVORIS');

            $description = constant('DESCRIPTION_FAVORIS');

            break;

        case 'partager':
            $title = constant('TITLE_PARTAGER');

            $description = constant('DESCRIPTION_PARTAGER');

            break;

        case 'contact':

            if (!empty($_GET['suggest'])) $title = constant('TITLE_PAGE_CONTACT_SUGGEST');
            else $title = constant('TITLE_CONTACT');

            if (!empty($_GET['suggest'])) $description = constant('SUBTITLE_PAGE_CONTACT_SUGGEST');
            else $description = constant('MINI_DESC');

            break;

        case 'politique-confidentialite':

            $title = constant('TITLE_PAGE_POLITIQUE');
            $description = constant('MINI_DESC');

            break;

        case 'cgv':

            $title = constant('TITLE_PAGE_CGV');
            $description = constant('MINI_DESC');

            break;

        case 'cgu':

            $title = constant('TITLE_PAGE_CGU');
            $description = constant('MINI_DESC');

            break;

        case 'faq':

            $title = constant('TITLE_PAGE_FAQ');
            $description = constant('MINI_DESC');

            break;

        case 'programme-privilege':

            $title = constant('TITLE_PAGE_PRIVILEGE');
            $description = constant('MINI_DESC');

            break;

        case 'plan-site':

            $title = constant('TITLE_PAGE_PLAN_SITE');
            $description = constant('MINI_DESC');

            break;

        case 'api':

            $title = constant('TITLE_PAGE_API');
            $description = constant('MINI_DESC');

            break;

        case 'nos-engagements':

            $title = constant('TITLE_PAGE_PLAN_ENGUAGEMENT');
            $description = constant('MINI_DESC');

            break;

        case 'nos-valeurs':

            $title = constant('TITLE_PAGE_VALEURS');
            $description = constant('MINI_DESC');

            break;

        case 'nos-services':

            $title = constant('TITLE_PAGE_SERVICES');
            $description = constant('MINI_DESC');

            break;

        case 'qui-sommes-nous':

            $title = constant('TITLE_PAGE_QUI');
            $description = constant('MINI_DESC');

            break;

        case 'login':

            $title = constant('TITLE_PAGE_LOGIN');
            $description = constant('MINI_DESC');

            break;

        case 'register':

            $title = constant('TITLE_PAGE_REGISTER');
            $description = constant('MINI_DESC');

            break;

        case 'forgot-password':

            $title = constant('TITLE_PAGE_FORGOT');
            $description = constant('MINI_DESC');

            break;

        case 'panier':

            $title = constant('TITLE_PAGE_CARTE');
            $description = constant('MINI_DESC');

            break;

        case 'historique-commandes':

            $title = constant('TITLE_PAGE_HISTORIQUE');
            $description = constant('MINI_DESC');

            break;

        case 'produits':

            $title = constant('TITLE_PAGE_PRODUITS');
            $description = constant('MINI_DESC');

            break;

        case 'gestion-compte':

            $title = constant('TITLE_PAGE_GESTION_COMPTE');
            $description = constant('MINI_DESC');

            break;

        case 'appellation':

            $title = $appellation_id['nom_fr_fr'];
            $description = constant('MINI_DESC');

            break;

        case 'region':

            $title = $region_id['nom_fr_fr'];
            $description = constant('MINI_DESC');

            break;

        case 'livraison':

            $title = constant('TITLE_PAGE_LIVRAISON');
            $description = constant('MINI_DESC');

            break;

        case 'bons-plans':

            $title = constant('TITLE_PAGE_PLANS');
            $description = constant('MINI_DESC');

            break;

        case 'actualites':

            $title = constant('TITLE_PAGE_ACTUALITES');
            $description = constant('MINI_DESC');

            break;

        case 'actualite':

            $title = str_replace('"', '', str_replace(',', '', $article['title']));
            $description = $article['content'];

            break;

        case 'article':

            $title = str_replace('"', '', str_replace(',', '', $article['title']));
            $description = $article['content'];

            break;

    }
}

if (isset($_GET['page']) && $_GET['page'] == $page) { // Page Get 
?>

    <?= '<title>' . html_entity_decode($title) . ' - Nosvinsdumonde</title>' ?>
    <meta name="description" content="<?= html_entity_decode($description) ?>" />

<?php } else { // Default 
?>

    <title>Nosvinsdumonde - ACHAT DE VIN - rouge, blanc, rosé, champagne ★★★</title>
    <meta name="description" content="<?= constant('MINI_DESC'); ?>" />

<?php } ?>