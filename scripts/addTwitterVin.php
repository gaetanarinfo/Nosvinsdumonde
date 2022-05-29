<?php

include __DIR__ . '/../config/fonctions.php';
include __DIR__ . '/../config/connexion.php';

$selects = selectDB('nom, id, image', 'vins', 'publish_twitter != 1 ORDER BY created_at', $db, '*');

/* Keys and Access Tokens */
$consumer_key = 'nPQtiNxKSUwYqh7CAj7WPS0yv'; // Enter your consumer key.
$consumer_secret = 'br2ty2XphmxB7sLAnL7wbwkdI0bzA1YSgItMWejHHi4KSWxrBV'; // Enter your consumer secret.

$oauth_access_token = '1523615889396060160-QFr9tcYwMuMBDK8VQFLPjLq4M9veqP'; // Enter your access token.
$oauth_access_token_secret = 'UgHCaRr2QJMPvaIBpoFBJyJQ1uZGmYqpLxYVYe9Gl8mA2'; // Enter your access token secret.

//twitter api urls
$URLS = array(
    "image" => "https://upload.twitter.com/1.1/media/upload.json",
    "status" => "https://api.twitter.com/1.1/statuses/update.json"
);

function buildBaseString($baseURI, $method, $params)
{
    $r = array();
    ksort($params);
    foreach ($params as $key => $value) {
        $r[] = "$key=" . rawurlencode($value);
    }
    return $method . "&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
}

function buildAuthorizationHeader($oauth)
{
    $r = 'Authorization: OAuth ';
    $values = array();
    foreach ($oauth as $key => $value)
        $values[] = "$key=\"" . rawurlencode($value) . "\"";
    $r .= implode(', ', $values);
    return $r;
}

function makeRequest($postfields, $url)
{
    global $consumer_key;
    global $consumer_secret;
    global $oauth_access_token;
    global $oauth_access_token_secret;

    $oauth = array(
        'oauth_consumer_key' => $consumer_key,
        'oauth_nonce' => time(),
        'oauth_signature_method' => 'HMAC-SHA1',
        'oauth_token' => $oauth_access_token,
        'oauth_timestamp' => time(),
        'oauth_version' => '1.0'
    );


    $base_info = buildBaseString($url, 'POST', $oauth);
    $composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
    $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
    $oauth['oauth_signature'] = $oauth_signature;

    $header = array(buildAuthorizationHeader($oauth), 'Expect:');
    $options = array(
        CURLOPT_HTTPHEADER => $header,
        CURLOPT_POSTFIELDS => $postfields,
        CURLOPT_HEADER => false,
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false
    );

    $feed = curl_init();
    curl_setopt_array($feed, $options);
    $json = curl_exec($feed);
    curl_close($feed);

    return $json;
}

foreach ($selects as $value) {

    if ($value['boisson_id'] == 1) {
        $url = "vins";
    } else if ($value['boisson_id'] == 2) {
        $url = "champagnes";
    }

    $file = file_get_contents('https://nosvinsdumonde.com/assets/img/' . $url . '/' . $value['image']);
    $postfields = array("media_data" => base64_encode($file), "media_category" => "tweet_image");

    $result = makeRequest($postfields, $URLS['image']);
    $imageresult = json_decode($result);
    $imageid = $imageresult->media_id;

    //Send status update with media_id attached
    $postfields = array(
        "status" => html_entity_decode($value['nom']) . ' https://nosvinsdumonde.com/fr/' . $url . '/' . $value['id'] . ' via @novinsdumonde',
        "media_ids" => $imageid
    );

    $result = makeRequest($postfields, $URLS['status']);
    $statusresult = json_decode($result);

    $update = $db->query('UPDATE `vins` SET `publish_twitter` = 1 WHERE id = "' . $value['id'] . '"');
}
