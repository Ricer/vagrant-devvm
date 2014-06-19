<?php

	require_once('config.php');
	echo $_POST['model']::ajax($_POST,$_FILES);
	
?>
