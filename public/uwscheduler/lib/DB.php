<?php

require_once 'vendor/facebook/php-sdk/src/facebook.php';



$facebook = new Facebook(array(
	'appId' => '414737555322863',
	'secret' => '54275a5a600f76b04fa957d9c1d72d37',
	'allowSignedRequest' => false
));

class DB {

	public static function run_query($query, $con = "") {
		if ($con == "")
			$con = $GLOBALS['default'];
		$result = mysqli_query($con, $query);
		$rows = array();
		while ($r = mysqli_fetch_assoc($result)) {
			$rows[] = $r;
		}
		return $rows;
	}

	public static function get_error($con = "") {
		if ($con == "")
			$con = $GLOBALS['default'];
		$error = mysqli_error($con);
		return $error;
	}
}
?>
