<div class="container-md mt-5 mb-5 bloc_vin_title">
    <separator></separator>
</div>

<div class="container-md mt-5 mb-5" id="bloc_add_vin">

    <div class="row">

        <div class="text-center">
            <h4 class="text-white"><?= constant('DESCRIPTION_VIN_2') ?></h4>
            <h4 class="text-white"><?= constant('DESCRIPTION_VIN') ?></h4>
        </div>

        <div class="text-center">
            <div class="mt-5">
                <a href="/<?= $language ?>/contact/suggest" class="text-decoration-none">
                    <img src="<?= $static_img ?>add_vin.png" alt="">
                </a>
            </div>
        </div>

    </div>

</div>

<div id="vitisphere" class="container-md mt-5 mb-5 bloc_vin_title">
    <h2 class="text-light"><span><i class="fa-solid fa-chevron-right me-2"></i> <?= mb_strtoupper(constant('TITLE_PAGE_ACTUALITES')) ?></span></h2>
</div>

<div class="container-md mt-5 mb-5">

    <div id="card_actu" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">

        <?php foreach ($contents as $content) {

            echo '<script type="application/ld+json">
                    {
                        "@context": "https://schema.org",
                        "@type": "NewsArticle",
                        "mainEntityOfPage": {
                            "@type": "WebPage",
                            "@id": "https://google.com/article"
                        },
                        "headline": "' . str_replace('"', '', $content['title']) . '",
                        "image": [
                            "' . $static_img . 'contents/' . $content['image'] . '"
                        ],
                        "datePublished": "' . date('Y-m-dTH:i:s', strtotime($content['created_at'])) . '",
                        "dateModified": "' . date('Y-m-dTH:i:s', strtotime($content['created_at'])) . '",
                        "author": {
                            "@type": "Person",
                            "name": "' . $content['author'] . '",
                            "url": "' . '/' . $language . '/article/' . str_replace('"', '', str_replace(',', '', $content['url'])) . '"
                        },
                        "publisher": {
                            "@type": "Organization",
                            "name": "Nosvinsdumonde",
                            "url": "https://nosvinsdumonde.com",
                            "logo": {
                                "@type": "ImageObject",
                                "url": "https://nosvinsdumonde.fr/assets/img/logo.png"
                            }
                        }

                    }
                </script>';

        ?>

            <div class="col">

                <div class="card shadow-sm" style="height: 100%;border: none;border-top-left-radius: 16px;border-top-right-radius: 16px;background: transparent;">

                    <div class="card-img-top" style="background-repeat: no-repeat;background: url(<?= $static_img . 'contents/' . $content['image'] ?>);background-size: cover;width: 100%;height: 250px;border: none;border-top-left-radius: 16px;border-top-right-radius: 16px;" width="100%" height="225" focusable="false" title="<?= str_replace('"', '', str_replace(',', '', $content['title'])) ?>"></div>

                    <div class="card-body" style="background: white;flex-direction: column;justify-content: space-between;    display: flex;">
                        <h5 class="card-text fw-bold"><a class="text-decoration-none text-dark" href="/<?= $language ?>/actualite/<?= str_replace('"', '', str_replace(',', '', $content['url'])) ?>"><?= str_replace('"', '', str_replace(',', '', $content['title'])) ?></a></h3>

                            <div class="d-flex justify-content-between align-items-center">
                                <div style="position: relative;display: inline-flex;vertical-align: middle;">
                                    <div class="groupe_article"><?= $content['groupeName'] ?></div>
                                </div>
                            </div>

                            <p class="card-text"><?= str_replace('(...)', '...', $content['content']) ?></p>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/<?= $language ?>/actualite/<?= str_replace('"', '', str_replace(',', '', $content['url'])) ?>" class="btn btn-sm btn-outline-info"><?= constant('SUITE') ?></a>
                                </div>
                                <small class="text-muted"><?= $content['date'] ?></small>
                            </div>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

    <div class="text-center">
        <div class="mt-5">
            <a href="/<?= $language ?>/actualites" class="btn btn-outline-warning btn-lg">
                <i class="fa-solid fa-bars me-2"></i><?= constant('PLUS_ACTU') ?></a>
        </div>
    </div>

</div>