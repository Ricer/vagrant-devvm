<?php

Class CarpoolController extends Controller{
	
	public function __construct() 
	{
		parent::__construct();
		
		if ($this->get_param('carpoolauth'))
		{
			$auth_key = $this->get_param('carpoolauth');
		}
		else if ($this->get_cookie('carpoolauth'))
		{
			$auth_key = $this->get_cookie('carpoolauth');
		}
		else
		{
			$auth_key = '';
		}
		
		$this->user = User::find_from_auth($auth_key);
	}

	public function redirectWithError($errorMsg,$redirectUrl='/'){
		echo $errorMsg?><a href="<?=$redirectUrl?>">Click to go back.</a><?php
		die();
	}
}
?>
