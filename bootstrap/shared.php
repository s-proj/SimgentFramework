<?php

/**
 * 从配置文件读取一个配置值模块
 * 使用方法:例config('db')->mysql['host']
 *
 * @param string $file 配置文件名
 * @param boolean $clear 清理config对象
 * @return object
 */
function config($file = 'app', $clear = FALSE) {
	static $configs = array();

	if ($clear) {
		unset($configs[$file]);
		return;
	}

	if (empty($configs[$file])) {
		//$configs[$file] = new \Simgent\Config($file);
		$config         = require (ROOT_PATH . 'Config/' . $file . EXT);
		$configs[$file] = (object) $config;
		//var_dump($configs);
	}

	return $configs[$file];
}

//var_dump(config()->charset);

echo Simgent\Config::get('app.cookie.key');
Simgent\Config::set('app.cookie.key', 'aaa');
echo Simgent\Config::get('app.cookie.key');
?>