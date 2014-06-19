<?php

class SettingsController extends CarpoolController {
  /**
   * @var string
   * main template file name, without .html
   */
  protected $layout = 'settings';
  
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

  public function __call($name, $arguments) {
    return $this->general();
  }
  public function general() {
    $view = array();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if(!$_REQUEST['email']||!$_REQUEST['firstname']||!$_REQUEST['lastname']){
        $view['error']="email,firstname,lastname cannot be empty";
      }else if($_REQUEST['cellphone']&&$_REQUEST['cellphone']!=""&&!is_numeric($_REQUEST['cellphone'])){
        $view['error']="cellphone must be numeric";
      }else{
        try {
          $user=$this->user;

          $verified=$_REQUEST['email']==$user->email?$user->emailverified:0;
          $user->populate(Array(
            'email'=>$_REQUEST['email'],
            'emailverified'=>$verified,
            'firstname'=>$_REQUEST['firstname'],
            'lastname'=>$_REQUEST['lastname'],
            'cellphone'=>$_REQUEST['cellphone']
          ));
          $result=User::update($user);
		  $user->set_login_cookie();
          if($verified==0){
            //send email verify new email
            //send email to old email to notify
          }
          $view['saved']=1;
        } catch (Exception $e) {
          $view['error']=$e->getMessage();
        }
      }
    }    
    $view['user'] = $this->user;
    if(!isset($this->todo)){
      $view['page']="general";
    }else{
      $view['page']=$this->todo;
    }
    return $view;
  }
  
  private function process_url(){
    $url = explode('/', preg_replace(array('/\/+/', '/^\/|\s+|\/$/'), array('/', ''), strtolower(urldecode($_SERVER['REQUEST_URI']))));
    if (!empty($url[1])) {
      $this->todo = $url[1];
    }
  }
}

?>
