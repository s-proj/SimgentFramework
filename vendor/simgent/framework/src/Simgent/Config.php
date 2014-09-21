<?php
namespace Simgent;

class Config {
	protected static $_config = array();
	/**
	 * 获取一个配置
	 * @param string $key
	 * @return mixed
	 */
	public static function get($key = '') {
		//inlegal param,return false
		if (!$key) {
			return false;
		}
		//without separator in param, return the whole config file
		if (strpos($key, CONFIG_SEPARATOR) === false) {
			if (!isset(self::$_config[$key])) {
				$cfg_file = PATH_CONFIG . $key . EXT;
				if (file_exists($cfg_file)) {
					self::$_config[$key] = include_once ($cfg_file);
				}
			}
			return self::$_config[$key];
		} else {
			$param = explode(CONFIG_SEPARATOR, $key);
			if (!isset(self::$_config[$param[0]])) {
				$cfg_file = PATH_CONFIG . $param[0] . EXT;
				if (file_exists($cfg_file)) {
					self::$_config[$param[0]] = include_once ($cfg_file);
				}
			}
			$tmp_config = null;
			for ($i = 1; $i < count($param); $i++) {
				if ($i == 1) {
					if (isset(self::$_config[$param[0]][$param[1]])) {
						$tmp_config = self::$_config[$param[0]][$param[1]];
					} else {
						return false;
					}
				} else {
					if (isset($tmp_config[$param[$i]])) {
						$tmp_config = $tmp_config[$param[$i]];
					} else {
						return false;
					}
				}
			}
			return $tmp_config;
		}
	}
	/**
	 * 更改某个配置项的值
	 * @param string $key
	 * @param mixed $value
	 * @return true
	 */
	public static function set($key, $value) {
		$param       = explode(CONFIG_SEPARATOR, $key);
		$count_param = count($param);
		switch ($count_param) {
			case 1:self::$_config[$param[0]] = $value;
				break;
			case 2:self::$_config[$param[0]][$param[1]] = $value;
				break;
			case 3:self::$_config[$param[0]][$param[1]][$param[2]] = $value;
				break;
			case 4:self::$_config[$param[0]][$param[1]][$param[2]][$param[3]] = $value;
				break;
			case 5:self::$_config[$param[0]][$param[1]][$param[2]][$param[3]][$param[4]] = $value;
				break;
			default:break;
		}
		return true;
	}
}