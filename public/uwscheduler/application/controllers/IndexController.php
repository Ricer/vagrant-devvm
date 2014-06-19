<?php

class IndexController extends CarpoolController {
	/**
	 * @var string
	 * main template file name, without .html
	 */
	protected $layout = 'index';
	
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
	
	public function logout()
	{
		$this->render = false;
		setcookie('carpoolauth', 0, -1, '/');

		$this->redirect('index', true);
	}
	
	public function index(){
		$view = array();
		if($this->user){
			$view['user'] = array('name'=>$this->user->firstname." ".$this->user->lastname);
			$view['courseInfo'] = $this->user->courseInfo;
			$view['schedule'] = $this->user->schedule;
		}
		return $view;
	}
	
	public function save(){
		$this->render='json';
		try{
			$this->user->courseInfo=$_REQUEST['courseInfo'];
			$this->user->schedule=$_REQUEST['schedule'];
			$this->user->save();
		}catch(Exception $e){
			return Array('success'=>0,'errMsg'=>$e->getMessage());
		}
		return Array('success'=>1);
	}
	
	public function __call($name, $arguments) {
		if($this->todo){
			$this->redirect('index', true);
		}
	}
	
	private function process_url(){
		$url = explode('/', preg_replace(array('/\/+/', '/^\/|\s+|\/$/'), array('/', ''), strtolower(urldecode($_SERVER['REQUEST_URI']))));
		if (!empty($url[1])) {
			$this->todo = $url[1];
		}
	}
}

?>
