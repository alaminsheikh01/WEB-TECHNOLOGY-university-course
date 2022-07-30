<?php
	
	require '../model/User.php';

	session_start();

	if (isset($_GET['email'])) {

		$list = get($_GET['email']);

		$_SESSION['user_by_email'] = $list;

		if (count($list) === 0) {
			$_SESSION['user_by_email'] = "No records found";		
		} 
	}

	else {
		$_SESSION['user_by_email'] = "Please write an email first";	
	}

	header("Location: ../view/welcome.php");

?>