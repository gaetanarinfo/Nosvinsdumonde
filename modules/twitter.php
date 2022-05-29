<?php

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


//Upload image to twitter and get media_id
// $file = file_get_contents('https://www.nosvinsdumonde.com/assets/img/vins/9421475938334.png');
// $postfields = array("media_data" => base64_encode($file));

// $result = makeRequest($postfields, $URLS['image']);
// $imageresult = json_decode($result);
// $imageid = $imageresult->media_id;
// //output results
// // print_r($imageresult);


// //Send status update with media_id attached
// $postfields = array(
//     "status" => "test messsage with image",
//     "media_ids" => $imageid
// );

// //output results
// $result = makeRequest($postfields, $URLS['status']);
// $statusresult = json_decode($result);
// // print_r($statusresult);
