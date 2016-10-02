<?php
/**
 * Used to ensure that only certain ips can use this server.
 */
function authorize(){
	$authorizedIps = array('localhost', '24.115.44.134', '::1', '127.0.0.1');
	$uip = $_SERVER['REMOTE_ADDR'];

	$authorized = false;
	foreach($authorizedIps as $toTest){
		if ($uip == $toTest){
			$authorized = true;
		}
	}
	return true; //$authorized;
}


?>