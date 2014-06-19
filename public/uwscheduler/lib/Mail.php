<?php
require_once(APP_ROOT . '/lib/PHPMailer-master/PHPMailer-master/class.phpmailer.php');
require_once(APP_ROOT . '/lib/PHPMailer-master/PHPMailer-master/class.smtp.php');

class Mail{
	private static $from = 'noreply@uwcarpool.com';
	private static $default_subject = 'UW Carpool';
	
	public static function send($to, $body, $subject = "", $is_html = false)
	{
		$mail = new PHPMailer();

		$mail->AddAddress($to);
		
		if($subject == "") $subject = self::$default_subject;

		$mail->IsSMTP();
		//$mail->SMTPDebug  	= 1; 
		$mail->SMTPAuth  	= 1; 
		$mail->From 		= self::$from;
		$mail->FromName 	= "UW Carpool";
		$mail->Username 	= self::$from;
		$mail->Password 	= 'Thisispassword';		
		$mail->Host 		= 'smtpout.secureserver.net';
		//$mail->SMTPSecure 	= "ssl";
		$mail->Port       	= 25;  

		$mail->Subject 		= $subject;
		$mail->Body 		= $body;

		$mail->IsHTML(true);
		

		if (!$mail->Send()) 
		{
			return $mail->ErrorInfo;
		}
		

		return true;
	}
}
?>
