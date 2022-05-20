<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include '../config/config.php';
include "../assets/langs/" . $_POST['lang'] . ".php";

if (!empty($_POST['email']) && !empty($_POST['prenom'])) {
    $db->query('INSERT INTO `favoris_history`(`email`,`prenom`,`favoris`) VALUES ("' . $_POST['email'] . '","' . $_POST['prenom'] . '", "' . $_COOKIE['favoris'] . '")');

    $from         = "contact@nosvinsdumonde.fr";
    $from_name     = "Nosvinsdumonde.com";
    $to             = $_POST['email'];
    $to_name     = $_POST['prenom'];
    $reply         = $_POST['email'];
    $reply_name     = $_POST['prenom'];
    $subject     = constant('LIST_FAVORIS');

    $fav = $_COOKIE['favoris'];
    $favEx = explode(',', $fav);
    $var_fixe = "";

    $head = constant('BONJOUR') . ' ' . $_POST['prenom'] . ',<br/><br>' . constant('MAIL_FAVORIS_1') . '<br/><br/>';

    $select = 'V.id AS idBoisson,
    V.boisson_id AS boissonId,
    V.nom AS nomBoisson,
    V.millesime AS millesimeBoisson,
    V.image AS imageBoisson, 
    V.prix AS prixBoisson,
    B.nom AS typeBoisson,
    AP.nom_fr_fr AS apellationBoisson,
    CN.nom AS contenanceBoisson,
    R.nom_fr_fr AS regionBoisson,
    C.nom AS couleurBoisson
    ';

    $table = 'vins AS V
    LEFT JOIN alliance AS A ON A.id = V.alliance_id
    LEFT JOIN appellation AS AP ON AP.id = V.appellation_id
    LEFT JOIN boissons AS B ON B.id = V.boisson_id
    LEFT JOIN contenance AS CN ON CN.id = V.contenance_id
    LEFT JOIN couleur AS C ON C.id = V.couleur_id
    LEFT JOIN gout AS G ON G.id = V.gout_id
    LEFT JOIN pays AS P ON P.id = V.pays_id
    LEFT JOIN regions AS R ON R.id = V.region_id';

    foreach ($favEx as $favD) {

        $favoris_partager = selectDB($select, $table, 'V.id IN (' . $favD . ') ORDER BY V.nom', $db, '*');

        $res = '
				<link href="https://www.liscorn.com/assets/css/style.css" rel="stylesheet" />
				<link href="https://www.liscorn.com/assets/css/favorites.css" rel="stylesheet" />
				<div class="container" id="favorites">
				<div class="row no_padding_on_mobile on_desktop">
                <div class="col-12 no_padding no_shadow">
                    <div class="tablewrapper">
                        <table style="border: 1px solid #ccc;">
                            <thead class="no-border hideonmobile" style="text-align: left;">
                                <tr role="row">
                                    <th style="border-right:1px solid #ccc;border-bottom: 1px solid #ccc;">' . constant('NOM') . '</th>
                                    ' . constant('TABLE_HEAD_FAVORIS_2') . '
                                </tr>
                            </thead>
            
                            <tbody class="table_fav">';

        foreach ($favoris_partager as $favoris) {

            if($favoris['boissonId'] == 1) {
                $page = 'vins';
            }else if($favoris['boissonId'] == 2) {
                $page = 'champagnes';
            }

            $res1 = '<tr>
            <td style="border-right: 1px solid #ccc;padding: 0 10px 0 0;text-align: left;">
            <a href="https://' . $_POST['host'] . '/' . $_POST['lang'] . '/' . $page . '/' . $favoris['idBoisson'] . '">
                <p class="img_text"><span>' . $favoris['nomBoisson'] . ' ' . $favoris['millesimeBoisson'] . '</span></p>
            </a>
            </td>';

            $res2 = '
            <td style="border-right: 1px solid #ccc;padding: 0 10px 0 0;text-align: left;">
                <span>' . $favoris['apellationBoisson'] . '</span>
            </td>';

            $res3 = '
            <td style="border-right: 1px solid #ccc;padding: 0 10px 0 0;text-align: left;">
                <span>' . $favoris['regionBoisson'] . '</span>
            </td>';

            $res5 = '
            <td style="border-right: 1px solid #ccc;padding: 0 10px 0 0;text-align: left;">
                <span>' . constant('CONTENANCE') . ' ' . $favoris['contenanceBoisson'] . '</span>
            </td>';

            $res6 = '
            <td style="border-right: 1px solid #ccc;padding: 0 10px 0 0;text-align: left;">
                <span>' . $favoris['couleurBoisson'] . '</span>
            </td>';

            $res7 = '
            <td style="border-right: 1px solid #ccc;padding: 0 10px 0 0;text-align: left;">
                <span>' . number_format($favoris['prixBoisson'], 2, ',', '') . ' €</span>
            </td>';

            $res11 = '</tr>';

            $var_fixe .= $res1 . $res2 . $res3 . $res4 . $res5 . $res6 . $res7 . $res11;
        }

        $res12 = '</tbody>

                            </table>
                        </div>
                    </div>
                </div>
			</div>';
    }

    sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $subject, $head . $res . $var_fixe . $res12, $config, false);

    $final = ['success' => true, 'message' => constant('MESSAGE_3'), 'icone' => '<i class="fa-solid fa-circle-check"></i>'];

    echo json_encode($final);
}
