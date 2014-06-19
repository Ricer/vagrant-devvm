<?php

class Controller
{
	public $render = true;

	protected $parameters;

	public function __construct()
	{
		$this->parameters = $_REQUEST;
		$this->cookies = $_COOKIE;

		unset($this->parameters['controller']);
		unset($this->parameters['action']);
	}

	public function render($view_path, $view = array())
	{
		if (!isset($this->layout))
			require_once(APP_ROOT . '/application/views/' . $this->view_override . '.html');
		else
			require_once(APP_ROOT . '/application/views/'. $this->layout . '.html');
	}

	public function redirect($location, $root = false)
	{
		if ($root == false)
		{
			header('Location: ' . APP_URL . '/' . $location);
		}
		else
		{
			header('Location: /' . $location);
		}
		die;
	}

	public function get_param($name)
	{
		if (isset($this->parameters[$name]))
			return $this->parameters[$name];
		else
			return false;
	}
	
	public function get_cookie($name)
	{
		if (isset($this->cookies[$name]))
			return $this->cookies[$name];
		else
			return false;	
	}
}