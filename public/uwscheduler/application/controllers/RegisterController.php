<?

class RegisterController extends CarpoolController {
	/**
	 * @var string
	 * main template file name, without .html
	 */
	
	private $todo = array();
	
	/**
	 * @var null
	 * sub-template file path/name, without .html
	 */
	public $view_override = 'register';
	
	public function __construct() {
		parent::__construct();
		session_start();
	}
	
	public function index()
	{
		$this->view_override .= '/index';
	}
	
	public function submit()
	{
		if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['p']))
		{
			// check if user exist
			if (User::find_by_email($_REQUEST['email']))
			{
				$this->redirect('register/index/?failure=1', true);
			}
			
			// Create a random salt
			$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
 
			// Create salted password 
			$password = hash('sha512', $_POST['p'] . $random_salt);
			$data = array(
				"firstname" => $_POST['firstname'],
				"lastname" => $_POST['lastname'],
				"email" => $_POST['email'],
				"password" => $password,
				"salt" => $random_salt
			);
			$user = new User();
			$user->populate($data);
			if($user->save())
			{
				$this->redirect('register/success', true);
			}
		}
		$this->redirect('register/index/?failure=1', true);
	}
	
	public function success()
	{
		$this->view_override .= '/success';
	}
	
	public function forgot()
	{
		$this->view_override .= '/forgot';
	}
	
	public function mail()
	{
		if (isset($_REQUEST['email']))
		{
			$email = $_REQUEST['email'];
			// check if user exist
			if ($user = User::find_by_email($email))
			{
				$message = "Hi " . $user->firstname . ", your carpool from waterloo to toronto has been accepted by Luke!";
				
				Mail::send($email, $message);
				$this->redirect('register/success/', true);
			}
			$this->redirect('register/success/?failure=1', true);
		}
		$this->redirect('register/success/?failure=1', true);
	}
	
	public function __call($name, $arguments) {
		$this->redirect('register', true);
	}
	
	
}
?>
