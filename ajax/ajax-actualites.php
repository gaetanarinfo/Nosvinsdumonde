<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include '../config/config.php';
include "../assets/langs/" . $_POST['lang'] . ".php";

// Limit de départ
$limit = 51;

$offset = 51 * $_POST['offset'];

$select = 'C.*, CONCAT(U.prenom, " ", U.nom) AS author, CG.name AS groupeName';

$table = 'contents AS C LEFT JOIN users AS U ON U.id = C.user_id LEFT JOIN contents_groupes AS CG ON CG.id = C.groupe';

$where = '1 ORDER BY C.created_at DESC LIMIT ' . $limit . ' OFFSET ' . $offset;

$contents_page = selectDB($select, $table, $where, $db, '*');

?>

<?php if (!empty($_POST)) { ?>

    <?php foreach ($contents_page as $content) { ?>

        <div class="col actualites_search">

            <div class="card shadow-sm" style="height: 100%;border: none;border-top-left-radius: 16px;border-top-right-radius: 16px;background: transparent;">

                <div class="card-img-top" style="background-repeat: no-repeat;background: url(<?= $static_img . 'contents/' . $content['image'] ?>);background-size: cover;width: 100%;height: 250px;border: none;border-top-left-radius: 16px;border-top-right-radius: 16px;" width="100%" height="225" focusable="false" title="<?= $content['title'] ?>"></div>

                <div class="card-body" style="background: white;flex-direction: column;justify-content: space-between;display: flex;">
                    <h5 class="card-text fw-bold"><a class="text-decoration-none text-dark" href="/<?= $language ?>/actualite/<?= str_replace('"', '', str_replace(',', '', $content['url'])) ?>"><?= $content['title'] ?></a></h3>

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

    <input type="hidden" class="countActualites" value="<?= $offset; ?>" />

<?php } ?>