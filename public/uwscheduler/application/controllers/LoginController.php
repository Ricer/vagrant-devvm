<?php

class LoginController extends CarpoolController {
	/**
	 * @var string
	 * main template file name, without .html
	 */
	protected $layout = 'login';
	
	private $todo = array();
	
	/**
	 * @var null
	 * sub-template file path/name, without .html
	 */
	public $view_override = null;
	
	public function __construct() {
		parent::__construct();
		session_start();
		$this->process_url();
	}
	
	public function index()
	{
		
	}
	
	public function submit()
	{
		if (!$user = User::login($_REQUEST['email'], $_REQUEST['p']))
		{
			$this->redirect('login/index/?failure=1', true);
		}
		else
		{
			$user->set_login_cookie();
			$this->redirect('index', true);
		}
	}
	
	public function __call($name, $arguments) {
		$this->redirect('login', true);
	}
	
	private function process_url(){
		$url = explode('/', preg_replace(array('/\/+/', '/^\/|\s+|\/$/'), array('/', ''), strtolower(urldecode($_SERVER['REQUEST_URI']))));
		if (!empty($url[1])) {
			$this->todo['action'] = $url[1];
		}
	}
	
	
}
?>
