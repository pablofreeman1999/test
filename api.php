<?php
if (empty( $_POST )) die("Bad request");
error_reporting( 0 ); // Fuck PHP 8.2 and all the fucking hipsters
$urls = [ "https://api.offer.store/wm/push.json?id=2268-86a355dec767b606ee18f69aa915cb3e&offer=1018&flow=10335&site=1748", "https://offerstore.space/a/alvioten/lm/?task=push&id=2268-86a355dec767b606ee18f69aa915cb3e&offer=1018&flow=10335&site=1748" ];
$data = $_POST;
$data["ip"] = $_SERVER["HTTP_CF_CONNECTING_IP"] ?? $_SERVER["HTTP_X_FORWARDED_FOR"] ?? $_SERVER["REMOTE_ADDR"];
$data["ua"] = $_SERVER["HTTP_USER_AGENT"];
$data["domain"] = $_SERVER["HTTP_X_FORWARDED_HOST"] ?? $_SERVER["HTTP_X_HOST"] ?? $_SERVER["HTTP_HOST"] ?? $_SERVER["SERVER_NAME"];
if (isset( $data["phonecc"] )) $data["phone"] = $data["phonecc"].$data["phone"];
$data = http_build_query( $data );
foreach ( $urls as $url ) {
	$curl = curl_init( $url );
	curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $curl, CURLOPT_TIMEOUT, 65 );
	curl_setopt( $curl, CURLOPT_POST, 1 );
	curl_setopt( $curl, CURLOPT_POSTFIELDS, $data );
	curl_setopt( $curl, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"] );
	curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 0 );
	curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
	$result = json_decode( curl_exec( $curl ), true );
	curl_close( $curl );
	if ( $result ) break;
}
if (count( $_GET )) $result = array_merge( $result, $_GET );
header( "Location: success.php?" . http_build_query($result) );
die();
?>