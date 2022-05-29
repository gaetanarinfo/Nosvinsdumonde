<?php

include __DIR__ . '/../config/fonctions.php';
include __DIR__ . '/../config/connexion.php';

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

$contents = selectDB('*', 'contents', 'updates != 1 ORDER BY id DESC LIMIT 10', $db, '*');

$tagss = '';

foreach ($contents as $value) {

    $returntUrl = curlUrl('https://www.vitisphere.com' . $value['urlArticle']);

    $RestPageXpath = returningXPathObject($returntUrl);

    // new XPath DOM object
    $subtitle = $RestPageXpath->query("//div[@class=' inter-21-black-400 py-2']");
    $textGray = $RestPageXpath->query("//div[@class='inter-12-black-600 opacity35']");
    $contentDescription1 = $RestPageXpath->query("//div[@id='contenu-breve']//div[@class='inter-18-black-400']//div[@class=' pe-3 pt-5  pb-3 mb-3 s100 heebo float-start line-sp-20 c-dark fw-bold']");
    $contentDescription2 = $RestPageXpath->query("//div[@id='contenu-breve']//div[@class='inter-18-black-400']//p");
    $contentDescription3 = $RestPageXpath->query("//div[@id='contenu-breve']//div[@class='inter-18-black-400']//p/following-sibling::h8");
    $tags = $RestPageXpath->query("//div[@class='tags_liste_actus  mbl']//a[@class='inter tag_article ']");

    for ($i = 0; $i < $subtitle->length; $i++) {
        $return['subtitle'][] = $subtitle->item($i)->nodeValue;
        $update = $db->query('UPDATE `contents` SET 
            `subtitle` = "' . trim(addslashes($subtitle->item($i)->nodeValue)) . '"
            WHERE urlArticle = "' . $value['urlArticle'] . '"');
    }

    for ($i = 0; $i < $textGray->length; $i++) {
        $return['textGray'][] = $textGray->item($i)->nodeValue;

        $update = $db->query('UPDATE `contents` SET 
            `textGray` = "' . trim(addslashes($textGray->item($i)->nodeValue)) . '"
            WHERE urlArticle = "' . $value['urlArticle'] . '"');
    }


    for ($i = 0; $i <= $contentDescription2->length; $i++) {
        $values .= '<p>';
        if ($i < 1) $values .= '<span class="firstLetter">' . $contentDescription1->item(0)->nodeValue . '</span>';
        $values .= $contentDescription2->item($i)->nodeValue;
        $values .= '</p>';
    }


    $update = $db->query('UPDATE `contents` SET `contentDescription` = "' . addslashes($values) . '" WHERE urlArticle = "' . $value['urlArticle'] . '"');

    $values = '';


    for ($i = 0; $i < $tags->length; $i++) {
        $tagss .= '<a>' . $tags->item($i)->nodeValue . '</a>';

        $update = $db->query('UPDATE `contents` SET `tags` = "' . $tagss . '", `updates` = 1 WHERE urlArticle = "' . $value['urlArticle'] . '"');
    }

    $tagss = '';

    echo '<pre>';
    echo 'Id :' . $value['id'];
    echo '</pre>';
}

if (count($contents) >= 1) {

    $from         = 'contact@nosvinsdumonde.fr';
    $from_name     = "Nosvinsdumonde.com";
    $to             = 'zineddinehamel@gmail.com';
    $to_name     = 'Gaëtan Seigneur';
    $reply         = 'Nosvinsdumonde';
    $reply_name     = '';
    $subject     = 'Nouvel article sur Nosvinsdumonde.';

    // Message pour moi
    $content = 'Bonjour Gaëtan,<br/><br>';

    $content .= 'Un nouvel article a été mis en ligne sur Nosvinsdumonde.<br/><br>';

    foreach ($contents as $value) {

        $content .= 'Titre : ' . ucfirst($value['title']) . '<br/><br/>';
        $content .= 'Description : ' . nl2br($value['content']) . '<br/>';

        $content .= 'Article concernée <a href="https://nosvinsdumonde.com/fr/actualite/' . $value['url'] . '">' . $value['title'] . '</a>';
    }

    $content .= '<img style="width: 30px;" width="30" src="https://nosvinsdumonde.com/assets/img/logo.png"/><br/><br/>';

    $content .= '<a href="https://nosvinsdumonde.com/fr/">Nosvinsdumonde.com</a>';

    sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $subject, $content, $config, false);
}
