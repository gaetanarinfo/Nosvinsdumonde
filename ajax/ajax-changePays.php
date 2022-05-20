<?php

include '../config/fonctions.php';
include '../config/connexion.php';
include "../assets/langs/" . $_GET['lang'] . ".php";

if (isset($_GET) && isset($_GET['changeRegion'])) {

    $select = '*';

    $table = 'regions';

    $where = 'id_boisson = 1 AND id_pays = ' . intval($_GET['pays']);

    $ajax = selectDB($select, $table, $where . ' ORDER BY id ASC', $db, '*');

?>

    <option value="">----</option>

<?php foreach ($ajax as $region) {
        echo '<option value="' . $region['id'] . '">' . $region['nom_fr_fr'] . '</option>';
    }
}

if(isset($_GET) && isset($_GET['changeAppellation'])) {

    if(!empty($_GET['region'])) {
        $region = $_GET['region'];
    }else{
        $region = 0;
    }

    $select = '*';

    $table = 'appellation';

    $where = 'id_boisson = 1 AND id_region = ' . $region . ' AND id_pays = ' . intval($_GET['pays']);

    $ajax = selectDB($select, $table, $where . ' ORDER BY id ASC', $db, '*');

    ?>

    <option value="">----</option>

<?php foreach ($ajax as $appellation) {
        echo '<option value="' . $appellation['id'] . '">' . $appellation['nom_fr_fr'] . '</option>';
    }
}