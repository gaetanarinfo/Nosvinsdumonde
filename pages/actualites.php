<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="row">

        <div class="col-lg-12 m-auto text-left">

            <div style="margin: 0 auto;" class="w-50">
                <h1 class="text-center mb-3 text-white"><?= constant('TITLE_PAGE_ACTUALITES') ?></h1>
            </div>

        </div>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-12 m-auto">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-warning" href="/<?= $language ?>/"><?= constant('NAVBAR_ITEM_1') ?></a></li>
                <li class="breadcrumb-item text-white"><?= constant('LINK_ACTUALITE') ?></li>
            </ol>
        </nav>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <input type="hidden" id="showPlus" value="<?= constant('PLUS_ACTU') ?>">
    <input type="hidden" id="lang" value="<?= $language ?>">

    <div id="card_actu" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5 search_box_actualites">

        <?php foreach ($contents_page as $content) { ?>

            <div class="col actualites_search">

                <div class="card shadow-sm" style="height: 100%;border: none;border-top-left-radius: 16px;border-top-right-radius: 16px;background: transparent;">

                    <div class="card-img-top" style="background-repeat: no-repeat;background: url(<?= $static_img . 'contents/' . $content['image'] ?>);background-size: cover;width: 100%;height: 250px;border: none;border-top-left-radius: 16px;border-top-right-radius: 16px;" width="100%" height="225" focusable="false" title="<?= str_replace('"', '', str_replace(',', '', $content['title'])) ?>"></div>

                    <div class="card-body" style="background: white;flex-direction: column;justify-content: space-between;display: flex;">
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
            <a role="button" id="show_news" class="btn btn-outline-warning btn-lg">
                <i class="fa-solid fa-bars me-2"></i><?= constant('PLUS_ACTU') ?></a>
        </div>
    </div>

</div>