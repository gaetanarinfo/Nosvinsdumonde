<!doctype html>
<html lang="<?= $language ?>">

<head>

	<?php include 'titles.php'; ?>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<meta name="author" content="Gaëtan Seineur" />

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?= $static_img ?>icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?= $static_img ?>icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= $static_img ?>icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= $static_img ?>icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= $static_img ?>icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= $static_img ?>icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?= $static_img ?>icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?= $static_img ?>icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?= $static_img ?>icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?= $static_img ?>icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= $static_img ?>icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= $static_img ?>icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= $static_img ?>icons/favicon-16x16.png">
	<link rel="manifest" href="<?= $static_img ?>icons/manifest.json">
	<link rel="shortcut icon" href="<?= $static_img ?>icons/favicon.ico" type="images/x-icon" />

	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?= $static_img ?>icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "Organization",
			"url": "https://nosvinsdumonde.com",
			"logo": "https://nosvinsdumonde.fr/assets/img/logo.png"
		}
	</script>

	<!-- Styles -->
	<link href="<?= $static_url ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= $static_url ?>css/style.css?<?= time(); ?>" rel="stylesheet" type="text/css" />
	<link href="<?= $static_url ?>css/fancybox.css" rel="stylesheet" type="text/css" />
	<?= (!empty($_GET['page']) && $_GET['page'] == 'vins') ? '<link href="' . $static_url . 'css/vins.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'champagnes') ? '<link href="' . $static_url . 'css/champagnes.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'favoris') ? '<link href="' . $static_url . 'css/favoris.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'partager') ? '<link href="' . $static_url . 'css/favoris.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'contact') ? '<link href="' . $static_url . 'css/contact.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'login') ? '<link href="' . $static_url . 'css/login.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'register') ? '<link href="' . $static_url . 'css/register.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'forgot-password') ? '<link href="' . $static_url . 'css/forgot-password.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'panier') ? '<link href="' . $static_url . 'css/panier.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'historique-commandes') ? '<link href="' . $static_url . 'css/historique-commandes.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'produits') ? '<link href="' . $static_url . 'css/produits.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'programme-privilege') ? '<link href="' . $static_url . 'css/programme-privilege.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'gestion-compte') ? '<link href="' . $static_url . 'css/gestion-compte.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'cgv') ? '<link href="' . $static_url . 'css/cgv.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'cgu') ? '<link href="' . $static_url . 'css/cgu.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'politique-confidentialite') ? '<link href="' . $static_url . 'css/politique-confidentialite.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'faq') ? '<link href="' . $static_url . 'css/faq.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'appellation') ? '<link href="' . $static_url . 'css/appellation.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'region') ? '<link href="' . $static_url . 'css/region.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'nos-engagements') ? '<link href="' . $static_url . 'css/nos-engagements.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>
	<?= (!empty($_GET['page']) && $_GET['page'] == 'livraison') ? '<link href="' . $static_url . 'css/livraison.css?' . time() . '" rel="stylesheet" type="text/css" />' : '' ?>

	<?php if (!empty($_GET['page']) && $_GET['page'] == 'panier') { ?>
		<link href="<?= $static_url ?>css/stripe.css?<?= time(); ?>" rel="stylesheet" type="text/css" />
		<!-- Stripe -->
		<script src="https://js.stripe.com/v3/"></script>
		<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
	<?php } ?>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<?php if (empty($_GET['page'])) { ?>
		<!-- Home alternée -->
		<link rel="alternate" hreflang="fr" href="https://<?= $_SERVER['HTTP_HOST'] ?>/fr/" />
		<link rel="alternate" hreflang="en" href="https://<?= $_SERVER['HTTP_HOST'] ?>/en/" />
	<?php } else if (!empty($_GET['page']) && $_GET['page'] == 'vins' && empty($_GET['id'])) { ?>
		<!-- Page vins all -->
		<link rel="alternate" hreflang="fr" href="https://<?= $_SERVER['HTTP_HOST'] ?>/fr/vins" />
		<link rel="alternate" hreflang="en" href="https://<?= $_SERVER['HTTP_HOST'] ?>/en/vins" />
	<?php } else if (!empty($_GET['page']) && $_GET['page'] == 'champagnes' && empty($_GET['id'])) { ?>
		<!-- Page champagnes all -->
		<link rel="alternate" hreflang="fr" href="https://<?= $_SERVER['HTTP_HOST'] ?>/fr/champagnes" />
		<link rel="alternate" hreflang="en" href="https://<?= $_SERVER['HTTP_HOST'] ?>/en/champagnes" />
	<?php } ?>

	<link rel="alternate" hreflang="x-default" href="https://<?= $_SERVER['HTTP_HOST'] ?>" />

	<?php if (!empty($_GET['page']) && $_GET['page'] == 'vins' && !empty($_GET['id'])) { ?>
		<!-- Open Graph / Facebook -->
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://nosvinsdumonde.com/<?= $language ?>/<?= $_GET['page'] ?>/<?= $_GET['id'] ?>">
		<meta property="og:title" content="<?= $title ?>">
		<meta property="og:description" content="<?= $description ?>">
		<meta property="og:image" content="<?= $static_img ?>vins/<?= $vin['imageBoisson'] ?>">

		<!-- Twitter -->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:url" content="https://nosvinsdumonde.com/<?= $language ?>/<?= $_GET['page'] ?>/<?= $_GET['id'] ?>">
		<meta property="twitter:title" content="<?= $title ?>">
		<meta property="twitter:description" content="<?= $description ?>">
		<meta property="twitter:image" content="<?= $static_img ?>vins/<?= $vin['imageBoisson'] ?>">
	<?php } ?>

	<?php if (!empty($_GET['page']) && $_GET['page'] == 'vins' && empty($_GET['id'])) { ?>
		<!-- Open Graph / Facebook -->
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://nosvinsdumonde.com/<?= $language ?>/<?= $_GET['page'] ?>">
		<meta property="og:title" content="<?= $title ?>">
		<meta property="og:description" content="<?= $description ?>">
		<meta property="og:image" content="<?= $static_img ?>logo.png">

		<!-- Twitter -->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:url" content="https://nosvinsdumonde.com/<?= $language ?>/<?= $_GET['page'] ?>">
		<meta property="twitter:title" content="<?= $title ?>">
		<meta property="twitter:description" content="<?= $description ?>">
		<meta property="twitter:image" content="<?= $static_img ?>logo.png">
	<?php } ?>

	<?php if (!empty($_GET['page']) && $_GET['page'] == 'champagnes' && !empty($_GET['id'])) { ?>
		<!-- Open Graph / Facebook -->
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://nosvinsdumonde.com/<?= $language ?>/<?= $_GET['page'] ?>/<?= $_GET['id'] ?>">
		<meta property="og:title" content="<?= $title ?>">
		<meta property="og:description" content="<?= $description ?>">
		<meta property="og:image" content="<?= $static_img ?>champagnes/<?= $champagne['imageBoisson'] ?>">

		<!-- Twitter -->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:url" content="https://nosvinsdumonde.com/<?= $language ?>/<?= $_GET['page'] ?>/<?= $_GET['id'] ?>">
		<meta property="twitter:title" content="<?= $title ?>">
		<meta property="twitter:description" content="<?= $description ?>">
		<meta property="twitter:image" content="<?= $static_img ?>champagnes/<?= $champagne['imageBoisson'] ?>">
	<?php } ?>

	<?php if (!empty($_GET['page']) && $_GET['page'] == 'champagnes' && empty($_GET['id'])) { ?>
		<!-- Open Graph / Facebook -->
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://nosvinsdumonde.com/<?= $language ?>/<?= $_GET['page'] ?>">
		<meta property="og:title" content="<?= $title ?>">
		<meta property="og:description" content="<?= $description ?>">
		<meta property="og:image" content="<?= $static_img ?>logo.png">

		<!-- Twitter -->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:url" content="https://nosvinsdumonde.com/<?= $language ?>/<?= $_GET['page'] ?>">
		<meta property="twitter:title" content="<?= $title ?>">
		<meta property="twitter:description" content="<?= $description ?>">
		<meta property="twitter:image" content="<?= $static_img ?>logo.png">
	<?php } ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-T3K6CCZSPL"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-T3K6CCZSPL');
	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105806955-3">
	</script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-105806955-3');
	</script>

	<?php if ($_SERVER['HTTP_HOST'] == "nosvinsdumonde.com") { ?>

		<script>
			window.gdprAppliesGlobally = true;
			if (!("cmp_id" in window) || window.cmp_id < 1) {
				window.cmp_id = 0
			}
			if (!("cmp_cdid" in window)) {
				window.cmp_cdid = "bd887f3ce677"
			}
			if (!("cmp_params" in window)) {
				window.cmp_params = ""
			}
			if (!("cmp_host" in window)) {
				window.cmp_host = "a.delivery.consentmanager.net"
			}
			if (!("cmp_cdn" in window)) {
				window.cmp_cdn = "cdn.consentmanager.net"
			}
			if (!("cmp_proto" in window)) {
				window.cmp_proto = "https:"
			}
			if (!("cmp_codesrc" in window)) {
				window.cmp_codesrc = "1"
			}
			window.cmp_getsupportedLangs = function() {
				var b = ["DE", "EN", "FR", "IT", "NO", "DA", "FI", "ES", "PT", "RO", "BG", "ET", "EL", "GA", "HR", "LV", "LT", "MT", "NL", "PL", "SV", "SK", "SL", "CS", "HU", "RU", "SR", "ZH", "TR", "UK", "AR", "BS"];
				if ("cmp_customlanguages" in window) {
					for (var a = 0; a < window.cmp_customlanguages.length; a++) {
						b.push(window.cmp_customlanguages[a].l.toUpperCase())
					}
				}
				return b
			};
			window.cmp_getRTLLangs = function() {
				return ["AR"]
			};
			window.cmp_getlang = function(j) {
				if (typeof(j) != "boolean") {
					j = true
				}
				if (j && typeof(cmp_getlang.usedlang) == "string" && cmp_getlang.usedlang !== "") {
					return cmp_getlang.usedlang
				}
				var g = window.cmp_getsupportedLangs();
				var c = [];
				var f = location.hash;
				var e = location.search;
				var a = "languages" in navigator ? navigator.languages : [];
				if (f.indexOf("cmplang=") != -1) {
					c.push(f.substr(f.indexOf("cmplang=") + 8, 2).toUpperCase())
				} else {
					if (e.indexOf("cmplang=") != -1) {
						c.push(e.substr(e.indexOf("cmplang=") + 8, 2).toUpperCase())
					} else {
						if ("cmp_setlang" in window && window.cmp_setlang != "") {
							c.push(window.cmp_setlang.toUpperCase())
						} else {
							if (a.length > 0) {
								for (var d = 0; d < a.length; d++) {
									c.push(a[d])
								}
							}
						}
					}
				}
				if ("language" in navigator) {
					c.push(navigator.language)
				}
				if ("userLanguage" in navigator) {
					c.push(navigator.userLanguage)
				}
				var h = "";
				for (var d = 0; d < c.length; d++) {
					var b = c[d].toUpperCase();
					if (g.indexOf(b) != -1) {
						h = b;
						break
					}
					if (b.indexOf("-") != -1) {
						b = b.substr(0, 2)
					}
					if (g.indexOf(b) != -1) {
						h = b;
						break
					}
				}
				if (h == "" && typeof(cmp_getlang.defaultlang) == "string" && cmp_getlang.defaultlang !== "") {
					return cmp_getlang.defaultlang
				} else {
					if (h == "") {
						h = "EN"
					}
				}
				h = h.toUpperCase();
				return h
			};
			(function() {
				var n = document;
				var p = window;
				var f = "";
				var b = "_en";
				if ("cmp_getlang" in p) {
					f = p.cmp_getlang().toLowerCase();
					if ("cmp_customlanguages" in p) {
						for (var h = 0; h < p.cmp_customlanguages.length; h++) {
							if (p.cmp_customlanguages[h].l.toUpperCase() == f.toUpperCase()) {
								f = "en";
								break
							}
						}
					}
					b = "_" + f
				}

				function g(e, d) {
					var l = "";
					e += "=";
					var i = e.length;
					if (location.hash.indexOf(e) != -1) {
						l = location.hash.substr(location.hash.indexOf(e) + i, 9999)
					} else {
						if (location.search.indexOf(e) != -1) {
							l = location.search.substr(location.search.indexOf(e) + i, 9999)
						} else {
							return d
						}
					}
					if (l.indexOf("&") != -1) {
						l = l.substr(0, l.indexOf("&"))
					}
					return l
				}
				var j = ("cmp_proto" in p) ? p.cmp_proto : "https:";
				var o = ["cmp_id", "cmp_params", "cmp_host", "cmp_cdn", "cmp_proto"];
				for (var h = 0; h < o.length; h++) {
					if (g(o[h], "%%%") != "%%%") {
						window[o[h]] = g(o[h], "")
					}
				}
				var k = ("cmp_ref" in p) ? p.cmp_ref : location.href;
				var q = n.createElement("script");
				q.setAttribute("data-cmp-ab", "1");
				var c = g("cmpdesign", "");
				var a = g("cmpregulationkey", "");
				q.src = j + "//" + p.cmp_host + "/delivery/cmp.php?" + ("cmp_id" in p && p.cmp_id > 0 ? "id=" + p.cmp_id : "") + ("cmp_cdid" in p ? "cdid=" + p.cmp_cdid : "") + "&h=" + encodeURIComponent(k) + (c != "" ? "&cmpdesign=" + encodeURIComponent(c) : "") + (a != "" ? "&cmpregulationkey=" + encodeURIComponent(a) : "") + ("cmp_params" in p ? "&" + p.cmp_params : "") + (n.cookie.length > 0 ? "&__cmpfcc=1" : "") + "&l=" + f.toLowerCase() + "&o=" + (new Date()).getTime();
				q.type = "text/javascript";
				q.async = true;
				if (n.currentScript) {
					n.currentScript.parentElement.appendChild(q)
				} else {
					if (n.body) {
						n.body.appendChild(q)
					} else {
						var m = n.getElementsByTagName("body");
						if (m.length == 0) {
							m = n.getElementsByTagName("div")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("span")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("ins")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("script")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("head")
						}
						if (m.length > 0) {
							m[0].appendChild(q)
						}
					}
				}
				var q = n.createElement("script");
				q.src = j + "//" + p.cmp_cdn + "/delivery/js/cmp" + b + ".min.js";
				q.type = "text/javascript";
				q.setAttribute("data-cmp-ab", "1");
				q.async = true;
				if (n.currentScript) {
					n.currentScript.parentElement.appendChild(q)
				} else {
					if (n.body) {
						n.body.appendChild(q)
					} else {
						var m = n.getElementsByTagName("body");
						if (m.length == 0) {
							m = n.getElementsByTagName("div")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("span")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("ins")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("script")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("head")
						}
						if (m.length > 0) {
							m[0].appendChild(q)
						}
					}
				}
			})();
			window.cmp_addFrame = function(b) {
				if (!window.frames[b]) {
					if (document.body) {
						var a = document.createElement("iframe");
						a.style.cssText = "display:none";
						a.name = b;
						document.body.appendChild(a)
					} else {
						window.setTimeout(window.cmp_addFrame, 10, b)
					}
				}
			};
			window.cmp_rc = function(h) {
				var b = document.cookie;
				var f = "";
				var d = 0;
				while (b != "" && d < 100) {
					d++;
					while (b.substr(0, 1) == " ") {
						b = b.substr(1, b.length)
					}
					var g = b.substring(0, b.indexOf("="));
					if (b.indexOf(";") != -1) {
						var c = b.substring(b.indexOf("=") + 1, b.indexOf(";"))
					} else {
						var c = b.substr(b.indexOf("=") + 1, b.length)
					}
					if (h == g) {
						f = c
					}
					var e = b.indexOf(";") + 1;
					if (e == 0) {
						e = b.length
					}
					b = b.substring(e, b.length)
				}
				return (f)
			};
			window.cmp_stub = function() {
				var a = arguments;
				__cmp.a = __cmp.a || [];
				if (!a.length) {
					return __cmp.a
				} else {
					if (a[0] === "ping") {
						if (a[1] === 2) {
							a[2]({
								gdprApplies: gdprAppliesGlobally,
								cmpLoaded: false,
								cmpStatus: "stub",
								displayStatus: "hidden",
								apiVersion: "2.0",
								cmpId: 31
							}, true)
						} else {
							a[2](false, true)
						}
					} else {
						if (a[0] === "getUSPData") {
							a[2]({
								version: 1,
								uspString: window.cmp_rc("")
							}, true)
						} else {
							if (a[0] === "getTCData") {
								__cmp.a.push([].slice.apply(a))
							} else {
								if (a[0] === "addEventListener" || a[0] === "removeEventListener") {
									__cmp.a.push([].slice.apply(a))
								} else {
									if (a.length == 4 && a[3] === false) {
										a[2]({}, false)
									} else {
										__cmp.a.push([].slice.apply(a))
									}
								}
							}
						}
					}
				}
			};
			window.cmp_msghandler = function(d) {
				var a = typeof d.data === "string";
				try {
					var c = a ? JSON.parse(d.data) : d.data
				} catch (f) {
					var c = null
				}
				if (typeof(c) === "object" && c !== null && "__cmpCall" in c) {
					var b = c.__cmpCall;
					window.__cmp(b.command, b.parameter, function(h, g) {
						var e = {
							__cmpReturn: {
								returnValue: h,
								success: g,
								callId: b.callId
							}
						};
						d.source.postMessage(a ? JSON.stringify(e) : e, "*")
					})
				}
				if (typeof(c) === "object" && c !== null && "__uspapiCall" in c) {
					var b = c.__uspapiCall;
					window.__uspapi(b.command, b.version, function(h, g) {
						var e = {
							__uspapiReturn: {
								returnValue: h,
								success: g,
								callId: b.callId
							}
						};
						d.source.postMessage(a ? JSON.stringify(e) : e, "*")
					})
				}
				if (typeof(c) === "object" && c !== null && "__tcfapiCall" in c) {
					var b = c.__tcfapiCall;
					window.__tcfapi(b.command, b.version, function(h, g) {
						var e = {
							__tcfapiReturn: {
								returnValue: h,
								success: g,
								callId: b.callId
							}
						};
						d.source.postMessage(a ? JSON.stringify(e) : e, "*")
					}, b.parameter)
				}
			};
			window.cmp_setStub = function(a) {
				if (!(a in window) || (typeof(window[a]) !== "function" && typeof(window[a]) !== "object" && (typeof(window[a]) === "undefined" || window[a] !== null))) {
					window[a] = window.cmp_stub;
					window[a].msgHandler = window.cmp_msghandler;
					window.addEventListener("message", window.cmp_msghandler, false)
				}
			};
			window.cmp_addFrame("__cmpLocator");
			if (!("cmp_disableusp" in window) || !window.cmp_disableusp) {
				window.cmp_addFrame("__uspapiLocator")
			}
			if (!("cmp_disabletcf" in window) || !window.cmp_disabletcf) {
				window.cmp_addFrame("__tcfapiLocator")
			}
			window.cmp_setStub("__cmp");
			if (!("cmp_disabletcf" in window) || !window.cmp_disabletcf) {
				window.cmp_setStub("__tcfapi")
			}
			if (!("cmp_disableusp" in window) || !window.cmp_disableusp) {
				window.cmp_setStub("__uspapi")
			};
		</script>
	<?php } else if ($_SERVER['HTTP_HOST'] == "nosvinsdumonde.fr") { ?>
		<script>
			window.gdprAppliesGlobally = true;
			if (!("cmp_id" in window) || window.cmp_id < 1) {
				window.cmp_id = 0
			}
			if (!("cmp_cdid" in window)) {
				window.cmp_cdid = "64e93fbc210a"
			}
			if (!("cmp_params" in window)) {
				window.cmp_params = ""
			}
			if (!("cmp_host" in window)) {
				window.cmp_host = "d.delivery.consentmanager.net"
			}
			if (!("cmp_cdn" in window)) {
				window.cmp_cdn = "cdn.consentmanager.net"
			}
			if (!("cmp_proto" in window)) {
				window.cmp_proto = "https:"
			}
			if (!("cmp_codesrc" in window)) {
				window.cmp_codesrc = "0"
			}
			window.cmp_getsupportedLangs = function() {
				var b = ["DE", "EN", "FR", "IT", "NO", "DA", "FI", "ES", "PT", "RO", "BG", "ET", "EL", "GA", "HR", "LV", "LT", "MT", "NL", "PL", "SV", "SK", "SL", "CS", "HU", "RU", "SR", "ZH", "TR", "UK", "AR", "BS"];
				if ("cmp_customlanguages" in window) {
					for (var a = 0; a < window.cmp_customlanguages.length; a++) {
						b.push(window.cmp_customlanguages[a].l.toUpperCase())
					}
				}
				return b
			};
			window.cmp_getRTLLangs = function() {
				return ["AR"]
			};
			window.cmp_getlang = function(j) {
				if (typeof(j) != "boolean") {
					j = true
				}
				if (j && typeof(cmp_getlang.usedlang) == "string" && cmp_getlang.usedlang !== "") {
					return cmp_getlang.usedlang
				}
				var g = window.cmp_getsupportedLangs();
				var c = [];
				var f = location.hash;
				var e = location.search;
				var a = "languages" in navigator ? navigator.languages : [];
				if (f.indexOf("cmplang=") != -1) {
					c.push(f.substr(f.indexOf("cmplang=") + 8, 2).toUpperCase())
				} else {
					if (e.indexOf("cmplang=") != -1) {
						c.push(e.substr(e.indexOf("cmplang=") + 8, 2).toUpperCase())
					} else {
						if ("cmp_setlang" in window && window.cmp_setlang != "") {
							c.push(window.cmp_setlang.toUpperCase())
						} else {
							if (a.length > 0) {
								for (var d = 0; d < a.length; d++) {
									c.push(a[d])
								}
							}
						}
					}
				}
				if ("language" in navigator) {
					c.push(navigator.language)
				}
				if ("userLanguage" in navigator) {
					c.push(navigator.userLanguage)
				}
				var h = "";
				for (var d = 0; d < c.length; d++) {
					var b = c[d].toUpperCase();
					if (g.indexOf(b) != -1) {
						h = b;
						break
					}
					if (b.indexOf("-") != -1) {
						b = b.substr(0, 2)
					}
					if (g.indexOf(b) != -1) {
						h = b;
						break
					}
				}
				if (h == "" && typeof(cmp_getlang.defaultlang) == "string" && cmp_getlang.defaultlang !== "") {
					return cmp_getlang.defaultlang
				} else {
					if (h == "") {
						h = "EN"
					}
				}
				h = h.toUpperCase();
				return h
			};
			(function() {
				var n = document;
				var p = window;
				var f = "";
				var b = "_en";
				if ("cmp_getlang" in p) {
					f = p.cmp_getlang().toLowerCase();
					if ("cmp_customlanguages" in p) {
						for (var h = 0; h < p.cmp_customlanguages.length; h++) {
							if (p.cmp_customlanguages[h].l.toUpperCase() == f.toUpperCase()) {
								f = "en";
								break
							}
						}
					}
					b = "_" + f
				}

				function g(e, d) {
					var l = "";
					e += "=";
					var i = e.length;
					if (location.hash.indexOf(e) != -1) {
						l = location.hash.substr(location.hash.indexOf(e) + i, 9999)
					} else {
						if (location.search.indexOf(e) != -1) {
							l = location.search.substr(location.search.indexOf(e) + i, 9999)
						} else {
							return d
						}
					}
					if (l.indexOf("&") != -1) {
						l = l.substr(0, l.indexOf("&"))
					}
					return l
				}
				var j = ("cmp_proto" in p) ? p.cmp_proto : "https:";
				var o = ["cmp_id", "cmp_params", "cmp_host", "cmp_cdn", "cmp_proto"];
				for (var h = 0; h < o.length; h++) {
					if (g(o[h], "%%%") != "%%%") {
						window[o[h]] = g(o[h], "")
					}
				}
				var k = ("cmp_ref" in p) ? p.cmp_ref : location.href;
				var q = n.createElement("script");
				q.setAttribute("data-cmp-ab", "1");
				var c = g("cmpdesign", "");
				var a = g("cmpregulationkey", "");
				q.src = j + "//" + p.cmp_host + "/delivery/cmp.php?" + ("cmp_id" in p && p.cmp_id > 0 ? "id=" + p.cmp_id : "") + ("cmp_cdid" in p ? "cdid=" + p.cmp_cdid : "") + "&h=" + encodeURIComponent(k) + (c != "" ? "&cmpdesign=" + encodeURIComponent(c) : "") + (a != "" ? "&cmpregulationkey=" + encodeURIComponent(a) : "") + ("cmp_params" in p ? "&" + p.cmp_params : "") + (n.cookie.length > 0 ? "&__cmpfcc=1" : "") + "&l=" + f.toLowerCase() + "&o=" + (new Date()).getTime();
				q.type = "text/javascript";
				q.async = true;
				if (n.currentScript) {
					n.currentScript.parentElement.appendChild(q)
				} else {
					if (n.body) {
						n.body.appendChild(q)
					} else {
						var m = n.getElementsByTagName("body");
						if (m.length == 0) {
							m = n.getElementsByTagName("div")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("span")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("ins")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("script")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("head")
						}
						if (m.length > 0) {
							m[0].appendChild(q)
						}
					}
				}
				var q = n.createElement("script");
				q.src = j + "//" + p.cmp_cdn + "/delivery/js/cmp" + b + ".min.js";
				q.type = "text/javascript";
				q.setAttribute("data-cmp-ab", "1");
				q.async = true;
				if (n.currentScript) {
					n.currentScript.parentElement.appendChild(q)
				} else {
					if (n.body) {
						n.body.appendChild(q)
					} else {
						var m = n.getElementsByTagName("body");
						if (m.length == 0) {
							m = n.getElementsByTagName("div")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("span")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("ins")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("script")
						}
						if (m.length == 0) {
							m = n.getElementsByTagName("head")
						}
						if (m.length > 0) {
							m[0].appendChild(q)
						}
					}
				}
			})();
			window.cmp_addFrame = function(b) {
				if (!window.frames[b]) {
					if (document.body) {
						var a = document.createElement("iframe");
						a.style.cssText = "display:none";
						a.name = b;
						document.body.appendChild(a)
					} else {
						window.setTimeout(window.cmp_addFrame, 10, b)
					}
				}
			};
			window.cmp_rc = function(h) {
				var b = document.cookie;
				var f = "";
				var d = 0;
				while (b != "" && d < 100) {
					d++;
					while (b.substr(0, 1) == " ") {
						b = b.substr(1, b.length)
					}
					var g = b.substring(0, b.indexOf("="));
					if (b.indexOf(";") != -1) {
						var c = b.substring(b.indexOf("=") + 1, b.indexOf(";"))
					} else {
						var c = b.substr(b.indexOf("=") + 1, b.length)
					}
					if (h == g) {
						f = c
					}
					var e = b.indexOf(";") + 1;
					if (e == 0) {
						e = b.length
					}
					b = b.substring(e, b.length)
				}
				return (f)
			};
			window.cmp_stub = function() {
				var a = arguments;
				__cmp.a = __cmp.a || [];
				if (!a.length) {
					return __cmp.a
				} else {
					if (a[0] === "ping") {
						if (a[1] === 2) {
							a[2]({
								gdprApplies: gdprAppliesGlobally,
								cmpLoaded: false,
								cmpStatus: "stub",
								displayStatus: "hidden",
								apiVersion: "2.0",
								cmpId: 31
							}, true)
						} else {
							a[2](false, true)
						}
					} else {
						if (a[0] === "getUSPData") {
							a[2]({
								version: 1,
								uspString: window.cmp_rc("")
							}, true)
						} else {
							if (a[0] === "getTCData") {
								__cmp.a.push([].slice.apply(a))
							} else {
								if (a[0] === "addEventListener" || a[0] === "removeEventListener") {
									__cmp.a.push([].slice.apply(a))
								} else {
									if (a.length == 4 && a[3] === false) {
										a[2]({}, false)
									} else {
										__cmp.a.push([].slice.apply(a))
									}
								}
							}
						}
					}
				}
			};
			window.cmp_msghandler = function(d) {
				var a = typeof d.data === "string";
				try {
					var c = a ? JSON.parse(d.data) : d.data
				} catch (f) {
					var c = null
				}
				if (typeof(c) === "object" && c !== null && "__cmpCall" in c) {
					var b = c.__cmpCall;
					window.__cmp(b.command, b.parameter, function(h, g) {
						var e = {
							__cmpReturn: {
								returnValue: h,
								success: g,
								callId: b.callId
							}
						};
						d.source.postMessage(a ? JSON.stringify(e) : e, "*")
					})
				}
				if (typeof(c) === "object" && c !== null && "__uspapiCall" in c) {
					var b = c.__uspapiCall;
					window.__uspapi(b.command, b.version, function(h, g) {
						var e = {
							__uspapiReturn: {
								returnValue: h,
								success: g,
								callId: b.callId
							}
						};
						d.source.postMessage(a ? JSON.stringify(e) : e, "*")
					})
				}
				if (typeof(c) === "object" && c !== null && "__tcfapiCall" in c) {
					var b = c.__tcfapiCall;
					window.__tcfapi(b.command, b.version, function(h, g) {
						var e = {
							__tcfapiReturn: {
								returnValue: h,
								success: g,
								callId: b.callId
							}
						};
						d.source.postMessage(a ? JSON.stringify(e) : e, "*")
					}, b.parameter)
				}
			};
			window.cmp_setStub = function(a) {
				if (!(a in window) || (typeof(window[a]) !== "function" && typeof(window[a]) !== "object" && (typeof(window[a]) === "undefined" || window[a] !== null))) {
					window[a] = window.cmp_stub;
					window[a].msgHandler = window.cmp_msghandler;
					window.addEventListener("message", window.cmp_msghandler, false)
				}
			};
			window.cmp_addFrame("__cmpLocator");
			if (!("cmp_disableusp" in window) || !window.cmp_disableusp) {
				window.cmp_addFrame("__uspapiLocator")
			}
			if (!("cmp_disabletcf" in window) || !window.cmp_disabletcf) {
				window.cmp_addFrame("__tcfapiLocator")
			}
			window.cmp_setStub("__cmp");
			if (!("cmp_disabletcf" in window) || !window.cmp_disabletcf) {
				window.cmp_setStub("__tcfapi")
			}
			if (!("cmp_disableusp" in window) || !window.cmp_disableusp) {
				window.cmp_setStub("__uspapi")
			};
		</script>
	<?php } ?>

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-TDNK3PF');
	</script>
	<!-- End Google Tag Manager -->

</head>

<body>
	
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TDNK3PF" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<?php include_once 'modules/navbar.php';
