<?php

require_once 'Facebook/autoload.php';
include __DIR__ . '/../config/fonctions.php';
include __DIR__ . '/../config/connexion.php';

$selects = selectDB('title, url, date', 'contents', 'publish_facebook != 1 ORDER BY created_at LIMIT 135', $db, '*');

function postStatus($status)
{

    // Kpasapp facebook app
    $_appID = "433575385256976";
    $_appSecret = "70d4474650a50c304599227f36de7963";
    // For bcs.kpasapp
    $_accessToken = "EAAGKVaLSVBABALH74GZCsTq1uAOPhlp9YowogBgzc2ZCZAYEee9ZBxjmtfZB6CEIDTcXcCXelDt4pa1CsjBvY7LBSUwFkmKAm05xmZCh1Om0j73ZATM1joPjXUZBTL5vCKR2YamEAXhHzpaevO4mi9ewB0Tqs8VksVIsWIbtJkfhrbPsPhqrzKXZB";
    // For master.kpasapp
    $_defaultGraphVersion = "v2.5";


    $fb = new Facebook\Facebook(['app_id' => $_appID, 'app_secret' => $_appSecret, 'default_graph_version' => $_defaultGraphVersion]);
    try {
        // Post to https://www.facebook.com/bcs.kpasapp
        $response = $fb->post('/me/feed', $status, $_accessToken);
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
    }
}


foreach ($selects as $value) {

    $status = [
        'link' => 'https://nosvinsdumonde.com/fr/actualite/' . $value['url'],
        'message' => html_entity_decode($value['title']),
    ];

    postStatus($status);

    $update = $db->query('UPDATE `contents` SET `publish_facebook` = 1 WHERE url = "' . $value['url'] . '"');

}
