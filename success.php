<?php // Default AlterCPA success page

// All the available languages
$lang = [
	'de'	=> [
		'thankspage_title'	=>'Ihre Bestellung wurde angenommen!',
		'thankspage_text'	=> 'Wir werden uns in Kürze mit Ihnen in Verbindung setzen, um weitere Einzelheiten zu erfahren',
		'gotopage_title'	=> 'Registrierung ist abgeschlossen!',
		'gotopage_text'		=> 'Gehen Sie zu Ihrem persönlichen Konto ...',
		'gotopage_proceed'	=> 'Persönliches Konto eröffnen',
	],
	'en'	=> [
		'thankspage_title'	=> 'Your order is accepted!',
		'thankspage_text'	=> 'We will contact you shortly for further details.',
		'gotopage_title'	=> 'Registation completed!',
		'gotopage_text'		=> 'We are logging you in ...',
		'gotopage_proceed'	=> 'Proceed to your account',
	],
	'es'	=> [
		'thankspage_title' 	=> '¡Su pedido ha sido aceptado!',
		'thankspage_text' 	=> 'Nos comunicaremos contigo en breve para obtener más detalles',
		'gotopage_title' 	=> '¡Registro completado!',
		'gotopage_text' 	=> 'Ir a su cuenta personal ...',
		'gotopage_proceed' 	=> 'Abrir cuenta personal',
	],
	'fr'	=> [
		'thankspage_title'	=> 'Votre commande est acceptée!',
		'thankspage_text'	=> 'Nous vous contacterons dans un avenir proche pour plus de détails',
		'gotopage_title'	=> 'Enregistrement terminé!',
		'gotopage_text'		=> 'Accédez à votre compte personnel ...',
		'gotopage_proceed'	=> 'Ouvrir un compte personnel',
	],
	'it'	=> [
		'thankspage_title'	=> 'Il tuo ordine è accettato!',
		'thankspage_text'	=> 'Vi contatteremo a breve per ulteriori dettagli.',
		'gotopage_title'	=> 'Registrazione completata!',
		'gotopage_text'		=> 'Vi stiamo registrando in ...',
		'gotopage_proceed'	=> 'Procedi al tuo account',
	],
	'pl'	=> [
		'thankspage_title'	=> 'Twoje zamówienie zostało przyjęte!',
		'thankspage_text'	=> 'Wkrótce skontaktujemy się z tobą aby uzyskać więcej szczegółów.',
		'gotopage_title'	=> 'Rejestracja zakończona!',
		'gotopage_text'		=> 'Trwa logowanie...',
		'gotopage_proceed'	=> 'Przejdź do profilu',
	],
	'ro'	=> [
		'thankspage_title'	=> 'Comanda dvs. a fost primită!',
		'thankspage_text'	=> 'Vă vom contacta în curând pentru a clarifica detaliile',
		'gotopage_title'	=> 'Înregistrarea este finalizată!',
		'gotopage_text'		=> 'Să mergem la biroul personal ...',
		'gotopage_proceed'	=> 'Deschide un cont personal',
	],
	'ru'	=> [
		'thankspage_title'	=> 'Ваш заказ принят!',
		'thankspage_text'	=> 'Мы скоро свяжемся с вами для уточнения деталей',
		'gotopage_title'	=> 'Регистрация завершена!',
		'gotopage_text'		=> 'Переходим в личный кабинет ...',
		'gotopage_proceed'	=> 'Открыть личный кабинет',
	],
	'uk'	=> [
		'thankspage_title'	=> 'Ваше замовлення отримано!',
		'thankspage_text'	=> 'Найближчим часом ми зв\'яжемося з Вами для уточнення деталей',
		'gotopage_title'	=> 'Реєстрація завершена!',
		'gotopage_text'		=> 'Переходимо в особистий кабінет ...',
		'gotopage_proceed'	=> 'Відкрити особистий кабінет',
	],
	'lt' => [
		'thankspage_title' => 'Jūsų registracija priimta!',
		'thankspage_text' => 'Netrukus su jumis susisieksime ir pateiksime daugiau informacijos.',
		'gotopage_title' => 'Registracija baigta!',
		'gotopage_text'  => 'Registruojame jus ...',
		'gotopage_proceed' => 'Pereikite prie savo paskyros',
	],
	'pt' => [
		'thankspage_title' => 'A sua inscrição foi aceite!',
		'thankspage_text' => 'Entraremos em contacto consigo em breve para mais informações.',
		'gotopage_title' => 'Registo concluído!',
		'gotopage_text'  => 'Estamos a registá-lo em ...',
		'gotopage_proceed' => 'Aceder à sua conta',
	],
];

// Get all the possible languages
$langs = [];
$ll = explode( ',', $_SERVER['HTTP_ACCEPT_LANGUAGE'] );
foreach ( $ll as $l ) if ( $l = trim( $l ) ) {
	$l = strtolower(substr( $l, 0, 2 ));
	$langs[$l] = $l;
}

// Prepare language and URL
$langs = array_values( $langs );
foreach ( $langs as $li ) if ( $l = $lang[$li] ) break;
if (empty( $l )) $l = $lang['en'];
$url = isset($_GET['url']) ? filter_var( $_GET['url'], FILTER_SANITIZE_URL ) : false;

?><html>
<head>
	<title><?= $url ? $l['gotopage_title'] : $l['thankspage_title']; ?></title>
	<meta charset="utf-8" />
	<style type="text/css">
		body,h1,h2,p,div{ font: normal 14px OpenSans, Segoe UI, Tahoma,sans-serif; }
		body{padding: 40px 10px;text-align:center}
		h1 { font-size: 24px;padding:0;margin: 15px 0;color:#292; }
		p { font-size: 18px;padding:0;margin: 15px 0;color:#111; }
		a { display: inline-block; background: #292; padding: 12px 20px; color: #fff; text-decoration: none; border-radius: 5px; }
		a:hover { background: #060; }
		.lds-roller{display:inline-block;position:relative;width:80px;height:80px}.lds-roller div{animation:lds-roller 1.2s cubic-bezier(.5,0,.5,1) infinite;transform-origin:40px 40px}.lds-roller div:after{content:" ";display:block;position:absolute;width:7px;height:7px;border-radius:50%;background:#292;margin:-4px 0 0 -4px}.lds-roller div:nth-child(1){animation-delay:-0.036s}.lds-roller div:nth-child(1):after{top:63px;left:63px}.lds-roller div:nth-child(2){animation-delay:-0.072s}.lds-roller div:nth-child(2):after{top:68px;left:56px}.lds-roller div:nth-child(3){animation-delay:-0.108s}.lds-roller div:nth-child(3):after{top:71px;left:48px}.lds-roller div:nth-child(4){animation-delay:-0.144s}.lds-roller div:nth-child(4):after{top:72px;left:40px}.lds-roller div:nth-child(5){animation-delay:-0.18s}.lds-roller div:nth-child(5):after{top:71px;left:32px}.lds-roller div:nth-child(6){animation-delay:-0.216s}.lds-roller div:nth-child(6):after{top:68px;left:24px}.lds-roller div:nth-child(7){animation-delay:-0.252s}.lds-roller div:nth-child(7):after{top:63px;left:17px}.lds-roller div:nth-child(8){animation-delay:-0.288s}.lds-roller div:nth-child(8):after{top:56px;left:12px}@keyframes lds-roller{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}
	</style>
	<?php if ( isset($_GET["url"]) && $_GET["url"] ) : ?><meta http-equiv="refresh" content="3; url=<?=$_GET["url"];?>" /><?php endif; ?>
</head>
<body>
	<?php if ( $url ) : ?><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div><?php endif; ?>
	<h1><?= $url ? $l['gotopage_title'] : $l['thankspage_title']; ?></h1>
	<p><?= $url ? $l['gotopage_text'] : $l['thankspage_text']; ?></p>
	<?php if ( $url ) : ?><div><a href="<?=$url;?>"><?=$l['gotopage_proceed'];?></a></div><?php endif; ?>
	<?php
$pixl = array (
  'fb' => '',
  'fbe' => 'Lead',
  'ga' => '',
  'gad' => '',
  'tt' => '',
  'vk' => '',
  'mt' => '',
  'mtrk' => '',
);
$isbad = isset($_GET['id']) && substr( $_GET['id'], 0, 1 ) == '0';
if ( isset($_GET['status']) && $_GET['status'] == 'error' ) $isbad = true;
foreach ( $pixl as $px => $df ) if ( $isbad ) {
	$$px = false;
} elseif (isset( $_GET[$px] )) {
	$$px = preg_replace( '#[^0-9A-Za-z\-\_\.\,]+#i', '', stripslashes(filter_var( $_GET[$px], FILTER_SANITIZE_STRING )) );
} elseif (isset( $_COOKIE[$px] )) {
	$$px = preg_replace( '#[^0-9A-Za-z\-\_\.\,]+#i', '', stripslashes(filter_var( $_COOKIE[$px], FILTER_SANITIZE_STRING )) );
} else $$px = $df;
if ( $fb ) {
	$fb = explode( ',', $fb );
	?><script>!function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window, document,'script','https://connect.facebook.net/en_US/fbevents.js'); <?php
	foreach ( $fb as $f ) if ( $f = trim($f) ) :
	?> fbq('init', '<?=$f;?>'); <?php
	endif;
	?> fbq('track', 'PageView'); fbq('track', '<?=$fbe;?>'); </script><?php
}
?>
</body>
</html>