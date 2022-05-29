<?php

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra_fra');

// API et librairies
use PHPMailer\PHPMailer\PHPMailer;

function stripAccents($stripAccents)
{
	return strtr($stripAccents, 'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ', 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

// Permet de select dans la base : 
// 1.0
// $atas = selectDB('*','table','id = "1"',$db,'*');

function selectDB($select, $table, $where, $db, $row)
{

	if (!empty($where)) {
		$return = $db->query('SELECT ' . $select . ' FROM ' . $table . ' WHERE ' . $where);
	} else {
		$return = $db->query('SELECT ' . $select . ' FROM ' . $table);
	}

	if ($row == "1") {
		$return = $return->fetch(PDO::FETCH_ASSOC);
	} else {
		$return = $return->fetchAll(PDO::FETCH_ASSOC);
	}

	return $return;
}


// Permet de récupérer les données de confugration du site : smtp, port smtp, encode... et autres informations de confuguration types.
// $config = getConfig($db);
// 1.0

function getConfig($db)
{

	$infos = $db->query('SELECT * FROM config');
	$infos = $infos->fetchAll(PDO::FETCH_ASSOC);

	$return = array();

	foreach ($infos as $info) {
		$return[$info['tag']] = $info['value'];
	}

	return $return;
}



// Convertit une date ou un timestamp en français
function dateToFrench($date, $format)
{
	$english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
	$french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
	$english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	$french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
	return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date))));
}




// Envoi de mails
// 1.0
// echo sendMail($from ,$from_name ,$to ,$to_name ,$reply ,$reply_name ,$subject ,$content ,$config, false);

function sendMail($from, $from_name, $to, $to_name, $reply, $reply_name, $subject, $content, $config, $attachments = array())
{

	if (!empty($to)) {

		if (!class_exists('PHPMailer\PHPMailer\Exception')) {
			require __DIR__ . '/../mail/src/Exception.php';
			require __DIR__ . '/../mail/src/PHPMailer.php';
			require __DIR__ . '/../mail/src/SMTP.php';
		}

		$mail = new PHPMailer();
		$mail->SMTPDebug = 0;
		$mail->CharSet = PHPMailer::CHARSET_UTF8;
		$mail->isHTML();
		$mail->isSMTP();
		$mail->SMTPAuth = true;

		$mail->Host = $config['mail_Host'];
		$mail->Username = $config['mail_Username'];
		$mail->Password = $config['mail_Password'];
		$mail->SMTPSecure = $config['mail_SMTPSecure'];
		$mail->Port = $config['mail_Port'];

		$mail->setFrom($from, $from_name);

		if (!empty($reply) or $reply == '0') {
			if (!empty($$reply_name)) {
				$mail->addReplyTo($reply, $reply_name);
			} else {
				$mail->addReplyTo($reply, $reply);
			}
		}

		$mail->addAddress($to, $to_name);

		if (!empty($attachments)) {
			foreach ($attachments as $attachment) {
				$mail->addStringAttachment(file_get_contents($attachment['url']), $attachment['name']);
			}
		}

		$mail->Subject = $subject;
		$mail->msgHTML($content);
		$mail->AltBody = $content;

		if (!$mail->send()) {

			$return = "Une erreur s'est produite pendant l'envoi du mail";

			// Envoi d'un mail de secours
			// Ne pas décoller ces variables pour que cela soit propre dans le mail

			$sendLogs = '
Bonjour

Ce mail a été envoyé depuis ' . getUrl(true) . '. 
Merci de le transmettre au destinataire initial et de comprendre pourquoi ce mail n\'a pas pu être envoyé.

Récapitulatif du mail :
Envoyé par : ' . $from . ' ' . $from_name . '
Pour : ' . $to . ' ' . $to_name . '
Sujet : ' . $subject . '
Contenu : ' . $content;

			mail($config['mail_error'], 'Erreur : Mail non reçu envoyé depuis  ' . getUrl(true), $sendLogs);
		} else {

			$return = "Votre message a bien été envoyé";
		}
	} else {

		$return = "to empty";
	}

	return $return;
}


// Récupération de l'url en cours
// 1.0
// true : pas de transformation
// www : avec les www

function getUrl($type)
{

	if ($type == "www") {

		return 'www.' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	} else {

		return $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	}
}

// Récupération de l'url en cours et ajout du parameter

function addToUrl($url, $key, $value = null)
{
	$query = parse_url($url, PHP_URL_QUERY);
	if ($query) {
		parse_str($query, $queryParams);
		$queryParams[$key] = $value;
		$url = str_replace("?$query", '?' . http_build_query($queryParams), $url);
	} else {
		$url .= '?' . urlencode($key) . '=' . urlencode($value);
	}
	return $url;
}



// Nettoyage du champs téléphone
// 1.0

function cleanPhone($phone)
{

	return $phone = preg_replace('/\D+/', '', $phone);
}

// Fonction qui permet de formatter un article proprement a partir d'un texte brut de base de données
// 1.0
function article_format($text)
{

	$output_li = preg_replace("/^- (.*)$/m", "<li>$1</li>", nl2br($text));
	$output = preg_replace("/((<li>.*<\/li>\n)+)/m", "<ul>\n$1</ul>\n", $output_li);

	echo $output;
}


// Permet de créer dispatcher les attributs de l'url dans le GET
// Sinon nous n'avons qu'au GET['page'], à cause de l'htaccess

function makeGet($value)
{

	$return = array();

	$gets = explode('?', $value);
	if (!empty($gets[1])) {
		$gets = $gets[1];
		$gets = explode('&', $gets);

		foreach ($gets as $get) {
			$get = explode('=', $get);

			$return[$get[0]] = $get[1];
			$_GET[$get[0]] = urldecode($get[1]);
		}
	}

	return $return;
}

$get = makeGet($_SERVER["REQUEST_URI"]);

// Affichage du prix de cette manière : 1 000 564 
// 1.0

function affichage_prix($prix)
{

	$prix = floatval($prix);
	if (empty($prix) or !isset($prix)) {
		return $prix = 0;
	} else {
		return $prix = number_format($prix, 0, ",", " ");
	}
}

function generateRoundedImg($src, $sub_domain, $currentUser, $from = "")
{
	$src = str_replace('http://', 'https://', $src);
	//Obligatoire de prendre un chemin relatif car sinon erreur SSL avec le chemin absolu pour methode exif_imagetype et getimagesize
	$relativeSrc = str_replace('https://nosvinsdumonde.com', dirname(__DIR__, 2) . '/nosvinsdumonde/assets/img', $src);
	$roundedName = explode('/', $src);
	$roundedName = end($roundedName);
	$pathCurrentUser = $currentUser ? 'green_' : '';
	$relativPath = dirname(__DIR__, 2) . '/nosvinsdumonde/assets/img/rounded_avatars/' . $pathCurrentUser;
	$absolutePath = 'https://' . $sub_domain . '/assets/img/rounded_avatars/' . $pathCurrentUser;

	$extension = exif_imagetype($relativeSrc);
	$sizes = getimagesize($relativeSrc);
	if (file_exists($relativPath . $roundedName)) {
		return $absolutePath . $roundedName;
	} else {
		if ($extension != IMAGETYPE_JPEG) {
			$src = imagecreatefrompng($relativeSrc); //img png
		} else {
			$src = imagecreatefromjpeg($relativeSrc); //img jpg ou jpeg
		}

		// Création des instances d'image
		$dest = imagecreatefrompng('https://nosvinsdumonde.com/assets/img/' . $pathCurrentUser . 'cercle_' . $sizes[0] . '.png');

		imagealphablending($src, true);
		imagesavealpha($src, true);
		imagecopy($src, $dest, 0, 0, 0, 0, $sizes[0], $sizes[1]);
		imagepng($src, $relativPath . $roundedName);

		imagedestroy($dest);
		imagedestroy($src);

		return $absolutePath . $roundedName;
	}
}

function makeUrl($url)
{
	$return = mb_strtolower($url, 'UTF-8');
	$return = str_replace(array('é', 'è', 'ê', 'ë', 'à', 'â', 'î', 'ï', 'ô', 'ù', 'û', 'ç', 'ñ'), array('e', 'e', 'e', 'e', 'a', 'a', 'i', 'i', 'o', 'u', 'u', 'c', 'n'), $return);
	$return = preg_replace('/\W+/', '-', strtolower($return));
	$return = urlencode($return);
	$return = trim(preg_replace("![^a-z0-9]+!i", "-", $return), '-');
	return $return;
}

function makeDate($month)
{

	switch ($month) {

		case '1':
			return 'Janvier';
			break;

		case '2':
			return 'Février';
			break;

		case '3':
			return 'Mars';
			break;

		case '4':
			return 'Avril';
			break;

		case '5':
			return 'Mai';
			break;

		case '6':
			return 'Juin';
			break;

		case '7':
			return 'Juiller';
			break;

		case '8':
			return 'Août';
			break;

		case '9':
			return 'Septembre';
			break;

		case '10':
			return 'Octobre';
			break;

		case '11':
			return 'Novembre';
			break;

		case '12':
			return 'Décembre';
			break;
	}
}
