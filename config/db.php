<?php
return array(
	'defaultConnection' => 'mysql',
	'mysql'             => array(
		'driver'    => 'mysql',
		'host'      => 'localhost',
		'database'  => 'forge',
		'username'  => 'forge',
		'password'  => '',
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	),
	'redis' => array(

		'cluster' => false,

		'default' => array(
			'host'     => '127.0.0.1',
			'port'     => 6379,
			'database' => 0,
		),

	),

);
