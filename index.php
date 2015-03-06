<?php
require_once 'lib/config.inc.php'; 

$strEventDirectory 	= "lib/event/";
$strEvent			= "event_";
if ( array_key_exists( "event", $_REQUEST)) {
	$strEvent .= $_REQUEST["event"];
} else {
	$strEvent .= "home";
}

if ( is_file( $strEventDirectory . $strEvent . ".php")) {
	include $strEventDirectory . $strEvent . ".php";
	$objEvent = new $strEvent();
	if ( $objEvent instanceof IEvent) {
		$objEvent->execute();
	}
}
