<div class="top_height"></div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-12 m-auto">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-warning" href="/<?= $language ?>/"><?= constant('NAVBAR_ITEM_1') ?></a></li>
                <li class="breadcrumb-item text-white"><a class="text-decoration-none text-warning" href="/<?= $language ?>/actualites"><?= constant('LINK_ACTUALITE') ?></a></li>
                <li class="breadcrumb-item text-white"><?= str_replace('"', '', str_replace(',', '', $article['title'])) ?></li>
            </ol>
        </nav>

    </div>

</div>

<div class="container-md mt-5 mb-5">

    <div class="col-lg-12">

        <div class="row">

            <div class="col-md-6">

                <div>
                    <img width="100% shadow" style="border-radius: 10px;" src="<?= $static_img . 'contents/' . $article['image'] ?>" alt="<?= str_replace('"', '', str_replace(',', '', $article['title'])) ?>">

                    <div>
                        <span class="text-secondary" style="font-size: 12px;font-weight: 600;padding-right: 20px;display: block;margin-top: 0.5em;">
                            <?= str_replace('"', '', str_replace(',', '', $article['textGray'])) ?>
                        </span>
                    </div>

                </div>

                <div class="mt-4">
                    <h1 class="text-white"><?= str_replace('"', '', str_replace(',', '', $article['title'])) ?></h1>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div style="position: relative;display: inline-flex;vertical-align: middle;">
                        <div class="groupe_article"><?= $article['groupeName'] ?></div>
                    </div>
                </div>

                <div class="text-white mt-1">
                    <p><?= nl2br($article['subtitle']) ?></p>
                    <div class="d-flex" style="flex-direction: row;justify-content: space-between;">
                        <div><?= constant('PAR') ?> <?= $article['author'] ?></div>
                        <div><span class="text-muted" style="font-size: inherit;"><?= constant('LE') ?> <?= $article['date'] ?></span></div>
                    </div>
                </div>

                <hr style="background-color: white;">

                <div class="text-white mt-4" style="display: flex;gap: 16px;justify-content:flex-end;">
                    <div><?= constant('PARTAGE') ?></div>
                    <div>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://<?= $_SERVER['HTTP_HOST'] ?>/<?= $language ?>/actualite/<?= $article['url'] ?>" style="color: #dc3e72;text-decoration: none;"><i class="fa-brands fa-facebook-f"></i></a>
                    </div>
                    <div>
                        <a href="https://twitter.com/share?url=https://<?= $_SERVER['HTTP_HOST'] ?>/<?= $language ?>/actualite/<?= $article['url'] ?>&text=<?= $article['title'] ?>&via=novinsdumonde" onclick="window.open(this.href);return false;" style="color: #dc3e72;text-decoration: none;"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>

                <div class="text-white mt-4">

                    <?php
                    $str = str_replace('&nbsp;', ' ', htmlentities($article['contentDescription']));
                    $new = html_entity_decode($str);
                    ?>

                    <p><?= $new ?></p>
                </div>

                <hr style="background-color: white;">

                <div class="text-white" style="display: flex;gap: 16px;">
                    <div><?= constant('PARTAGE') ?></div>
                    <div>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://<?= $_SERVER['HTTP_HOST'] ?>/<?= $language ?>/actualite/<?= $article['url'] ?>" style="color: #dc3e72;text-decoration: none;"><i class="fa-brands fa-facebook-f"></i></a>
                    </div>
                    <div>
                        <a href="https://twitter.com/share?url=https://<?= $_SERVER['HTTP_HOST'] ?>/<?= $language ?>/actualite/<?= $article['url'] ?>&text=<?= $article['title'] ?>&via=novinsdumonde" onclick="window.open(this.href);return false;" style="color: #dc3e72;text-decoration: none;"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>

                <hr style="background-color: white;">

                <p class="text-white fw-bold">Tags : </p>

                <div class="tags mb-3">
                    <?= $article['tags'] ?>
                </div>

                <div class="mb-3">
                    <a class="btn btn-outline-info btn-lg" id="commentaire"><i class="fa-solid fa-comment me-2"></i><?= constant('LAISSE_COMMENT') ?></a>
                </div>

                <div class="comments" style="display: none;">

                    <hr style="background: white;">

                    <div class="mb-3 mt-5">
                        <h3 class="text-white"><?= constant('COUNT_COMMENT') ?> (<?= count($contents_comments) ?>)</h3>
                    </div>

                    <div class="row">

                        <div id="load" class="col position-relative">
                            <div id="loaderComment" class="lds-ripple">
                                <div></div>
                                <div></div>
                            </div>
                        </div>

                        <div id="message_comment" style="display: none !important;" class="alert mb-0 alert-success d-flex align-items-center" role="alert">
                            <div class="message_icone me-2" style="font-size: 20px;"><i class="fa-solid fa-check me-2"></i><?= constant('MESSAGE_MERCI_COMMENT') ?></div>
                        </div>

                        <div id="message_comment_error" style="display: none !important;" class="alert mb-0 alert-danger d-flex align-items-center" role="alert">
                            <div class="message_icone me-2" style="font-size: 20px;"><i class="fa-solid fa-times me-2"></i><?= constant('MESSAGE_ERROR_COMMENT') ?></div>
                        </div>

                        <form id="post_comment">

                            <input type="hidden" name="content_id" value="<?= $article['id'] ?>">

                            <div class="row py-2">
                                <div class="col mb-3">
                                    <label for="c_nom" class="text-white"><?= constant('FORM_COMMENT_1') ?></label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>

                                <div class="col mb-3">
                                    <label for="c_mail" class="text-white"><?= constant('FORM_COMMENT_2') ?></label>
                                    <input type="email" class="form-control" id="mail" name="mail" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="c_contenu" class="text-white"><?= constant('FORM_COMMENT_3') ?></label>
                                    <textarea class="form-control" id="contenu" name="contenu" rows="3" required></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <button class="btn btn-outline-warning btn-lg"><?= constant('PUBLIER') ?></button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

                <hr style="background: white;">

                <div class="comments_show mt-4">

                    <?php if (count($contents_comments) < 1) { ?>

                        <p class="fw-bold text-white"><?= constant('ALL_COMMENTS') ?></p>

                    <?php } else { ?>

                        <div class="row">

                            <div class="plm mtm">

                                <?php foreach ($contents_comments as $value) { ?>

                                    <div class="py-3 text-white">

                                        <span style="font-weight: bold;font-size: 16px;color: burlywood;"><i class="fa-solid fa-comment-dots me-2"></i><?= mb_strtoupper($value['nom']) ?></span>

                                        <span style="font-weight: normal;font-size: 14px;" class="ms-2">Le <?= date('d', strtotime($value['created_at'])) ?> <?= strtolower(makeDate(date('m', strtotime($value['created_at'])))) ?> <?= date('Y', strtotime($value['created_at'])) ?> à <?= date('H:i', strtotime($value['created_at'])) ?></span><br>

                                        <p class="mt-3 mb-2"><?= nl2br($value['content']) ?></p>

                                        <div class="py-1">
                                            <a role="button" class="text-start text-warning text-decoration-none abuse" data-id="<?= $value['id'] ?>" data-bs-toggle="modal" data-bs-target="#abuseModal">
                                                <i class="fa-solid fa-triangle-exclamation me-2"></i><?= constant('SIGNAL_COMMENTS') ?>
                                            </a>
                                        </div>

                                    </div>

                                <?php } ?>

                            </div>

                        </div>

                    <?php } ?>

                </div>

            </div>

            <div id="article_last" class="col-md-6 text-end ">

                <div>
                    <h3 class="text-white"><?= constant('ARTICLE_LAST') ?></h3>
                </div>

                <div class="mt-3">

                    <ul class="list-group text-white">
                        <?php

                        $articlesSimilaires = selectDB('*', 'contents', 'id != ' . $article['id'] . ' ORDER BY created_at DESC LIMIT 20', $db, '*');

                        foreach ($articlesSimilaires as $value) {
                            echo '<li class="list-group-item"><a class="fw-bold text-decoration-none text-dark" href="/' . $language . '/actualite/' . $value['url'] . '">' . $value['title'] . '</a></li>';
                        }

                        ?>

                    </ul>

                </div>

            </div>

        </div>

        <?php if (!empty($contents_page2)) { ?>

            <hr style="background-color: white;">

            <div class="text-white">
                <h3><?= strtoupper(constant('LIRE_AUSSI')) ?></h3>
            </div>

            <div class="mt-4">

                <div id="card_actu" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5 search_box_actualites">

                    <?php foreach ($contents_page2 as $content) { ?>

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

            </div>

        <?php } ?>

    </div>

</div>

<?php include 'modules/modal/signalCommentModal.php'; ?>