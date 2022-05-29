<?php

include __DIR__ . '/../config/fonctions.php';
include __DIR__ . '/../config/connexion.php';


date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

function curlUrl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);
    $results = curl_exec($ch);
    curl_close($ch);
    return $results;
}

$return = array();

function returningXPathObject($item)
{
    $html = mb_convert_encoding($item, "HTML-ENTITIES", "UTF-8"); 
    $xmlPageDom = new DomDocument();
    $xmlPageDom->loadHTML($html);
    $xmlPageXPath = new DOMXPath($xmlPageDom);
    return $xmlPageXPath;
}

for ($a = 0; $a <= 20; $a++) {

    $returntUrl = curlUrl('https://www.vitisphere.com/rubrique-vin-4-' . $a . '-gens-du-vin.html');

    $RestPageXpath = returningXPathObject($returntUrl);

    // new XPath DOM object
    $title = $RestPageXpath->query("//div[@class='col-md-8 col-12']//div[@class='row py-4']//div[@class='col-md-8 col-8']//a//h2");
    $description = $RestPageXpath->query("//div[@class='col-md-8 col-12']//div[@class='row py-4']//div[@class='col-md-8 col-8']//a//div[@class='inter s16 c-noir py-2 line-sp-20 d-none d-md-block']");
    $date = $RestPageXpath->query("//div[@class='col-md-8 col-12']//div[@class='row py-4']//div[@class='col-md-8 col-8']//a//div[@class='inter c-dark opacity40   py-1']");
    $image = $RestPageXpath->query("//div[@class='col-md-8 col-12']//div[@class='row py-4']//div[@class='col-md-4 col-4']//a//img");
    $urlArticle = $RestPageXpath->query("//div[@class='col-md-8 col-12']//div[@class='row py-4']//div[@class='col-md-4 col-4']//a");

    for ($i = 0; $i < $urlArticle->length; $i++) {
        $url = $urlArticle->item($i);
        $href = $url->getAttribute("href");
        $return['url'][] = $href;
    }

    $select = selectDB('urlArticle', 'contents', 'urlArticle = "' . $return['url'][$a] . '"', $db, '*');

    if (empty($select)) {

        if ($title->length > 0) {
            // For each restaturant
            for ($i = 0; $i < $title->length; $i++) {
                $return['title'][] = $title->item($i)->nodeValue;
            }

            for ($i = 0; $i < $description->length; $i++) {
                $return['description'][] = $description->item($i)->nodeValue;
            }

            for ($i = 0; $i < $date->length; $i++) {
                $return['date'][] = $date->item($i)->nodeValue;
            }

            for ($i = 0; $i < $image->length; $i++) {
                $img = $image->item($i);
                $src = $img->getAttribute("data-original");
                $return['image'][] = $src;
                //do something with $src
            }
        }

        $dateJ = substr($return['date'][$a], 0, 2);

        if (strstr($return['date'][$a], '2020')) {
            $dateY = 2020;
        }

        if (strstr($return['date'][$a], '2021')) {
            $dateY = 2021;
        }

        if (strstr($return['date'][$a], '2022')) {
            $dateY = 2022;
        }

        if (strstr($return['date'][$a], 'janvier')) {
            $dateM = '01';
        }

        if (strstr($return['date'][$a], 'février')) {
            $dateM = '02';
        }

        if (strstr($return['date'][$a], 'mars')) {
            $dateM = '03';
        }

        if (strstr($return['date'][$a], 'avril')) {
            $dateM = '04';
        }

        if (strstr($return['date'][$a], 'mai')) {
            $dateM = '05';
        }

        if (strstr($return['date'][$a], 'juin')) {
            $dateM = '06';
        }

        if (strstr($return['date'][$a], 'juillet')) {
            $dateM = '07';
        }

        if (strstr($return['date'][$a], 'août')) {
            $dateM = '08';
        }

        if (strstr($return['date'][$a], 'septembre')) {
            $dateM = '09';
        }

        if (strstr($return['date'][$a], 'octobre')) {
            $dateM = '10';
        }

        if (strstr($return['date'][$a], 'novembre')) {
            $dateM = '11';
        }

        if (strstr($return['date'][$a], 'décembre')) {
            $dateM = '12';
        }

        $insert = $db->query('INSERT INTO `contents`(
        `groupe`, 
        `url`, 
        `title`, 
        `content`, 
        `date`, 
        `image`,
        `urlArticle`,
        `created_at`
        ) VALUES (
        3, 
        "' . makeUrl($return['title'][$a]) . '", 
        "' . trim(addslashes($return['title'][$a])) . '", 
        "' . trim(addslashes($return['description'][$a])) . '",
        "' . trim($return['date'][$a]) . '",
        "' . substr($return['image'][$a], 49, 102) . '",
        "' . $return['url'][$a] . '",
        "' . date($dateY . '-' . $dateM . '-' . $dateJ . ' H:i:s') . '"
        )');

        if (!empty($return['image'][$a])) {
            $content = file_get_contents($return['image'][$a]);
            file_put_contents(__DIR__ . '/../assets/img/contents/' . substr($return['image'][$a], 49, 102), $content);
        }
    } else {
        echo '<pre>';
        echo 'Existe déjà !!';
        echo '</pre>';
    }
}
