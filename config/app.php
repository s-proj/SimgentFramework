<?php
return array(
	'timezone' => 'PRC',
	'charset'  => 'utf-8',
	'cookie'   => array(
		'key'      => 'very-secret-key',
		'timeout'  => time()+(60 * 60 * 4), // Ignore submitted cookies older than 4 hours
		'expires'  => 0, // Expire on browser close
		'path'     => '/',
		'domain'   => '',
		'secure'   => '',
		'httponly' => '',
	)
);
