<?php
 
class Dispatcher
{
	private static $_action;
	private static $_controller;

	public static function clean_url($url)
	{
		return $url;
	}

	public static function dispatch($request_uri)
	{
		$path_args = explode("/", static::clean_url(ltrim($request_uri, '/')));	

		$path_args = array_values($path_args);
		

		if (!isset($path_args[0]) || trim($path_args[0]) == '')
		{
			$path_args[0] = DEFAULT_CONTROLLER;
			$path_args[1] = DEFAULT_ACTION;
		}

		if (!isset($path_args[1]) || trim($path_args[1]) == '')
		{
			$path_args[1] = DEFAULT_ACTION;
		}

		$api_class = ucwords($path_args[0]) . 'Controller';

		self::$_controller = $api_class;
		self::$_action = $path_args[1];

		$api = new $api_class();

		$result = $api->$path_args[1]();

		if ($api->render === 'json')
		{
			return json_encode($result);
		}
		else if ($api->render)
		{
			if (isset($api->view_override))
				return $api->render($path_args[0] . '/' . $api->view_override . '.html', $result);
			else
				return $api->render($path_args[0] . '/' . self::$_action . '.html', $result);
		}
		else
		{
			return '';
		}
	}

	public static function get_action()
	{
		return self::$_action;
	}

	public static function get_controller()
	{
		return self::$_controller;
	}
}

?>