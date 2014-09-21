<?php

define('START_TIME', microtime(true));
define('START_MEMORY_USAGE', memory_get_usage());
define('DS', '/');
define('EXT', '.php');
define('ROOT_PATH', str_replace('\\', DS, dirname(dirname(__FILE__))) . DS);
define('AJAX_REQUEST', strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest');
define('DOMAIN', (strtolower(getenv('HTTPS')) == 'on' ? 'https' : 'http') . '://' . getenv('HTTP_HOST') . (($p = getenv('SERVER_PORT')) != 80 AND $p != 443 ? ":$p" : ''));
define('PATH', parse_url(getenv('REQUEST_URI'), PHP_URL_PATH));
define('CONFIG_SEPARATOR', '.');//config分隔符
define('PATH_CONFIG', ROOT_PATH . 'config' . DS);
/**
 * 自动加载类
 */
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
	require_once (__DIR__ . '/../vendor/autoload.php');
} else {
	define('SIMGENT_PATH', dirname(__DIR__) . '/vendor/simgent/framework/src');
	set_include_path(get_include_path() . PATH_SEPARATOR . SIMGENT_PATH);
	spl_autoload_register(function ($className) {
		include str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
		return class_exists($className, false) or interface_exists($className, false) or trait_exists($className);
		false;
	}, true, true);
}

require __DIR__ . './shared.php';
header('Content-type: text/html;charset=' . config()->charset);

?>