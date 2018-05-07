<?php
/**
 * Tigron Codabox Client
 *
 * This file is a part of the KNX Api client
 *
 */
namespace Tigron\Codabox\Client;

class Json {

	/**
	 * Call
	 *
	 * @access public
	 * @param string $module
	 * @param array $variables
	 * @return array $data
	 */
	public static function call($module, $variables = []) {
		$key = \Tigron\Codabox\Config::$key;
		$url = \Tigron\Codabox\Config::$url;

		$variables['api_key'] = $key;
		$variables['api_output'] = 'json';

		if (substr($url, -1) == '/') {
			$url = substr($url, 0, -1);
		}

		if ($module[0] == '/') {
			$module = substr($module, 1);
		}

		$return = @file_get_contents($url . '/' . $module . '?' . http_build_query($variables));

		if ($return === false) {
			throw new \Exception('Problem when calling ' . $url . '/' . $module);
		}
		return json_decode($return, true);
	}
}
