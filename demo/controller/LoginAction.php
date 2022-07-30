<?php 

	session_start();

	require "../model/User.php";
	
	if ($_SERVER['REQUEST_METHOD'] === "POST") {

		$username = sanitize($_POST['uname']);
		$password = sanitize($_POST['password']);

		$_SESSION['msg'] = "";

		if (empty($username) or empty($password)) {
			/*echo "Please fill up the form properly";*/
			$_SESSION['msg'] = "Please fill up the form properly";
			header("Location: ../view/login.php");
		}	
		else {
			$isValid = validate($username, $password);
			if ($isValid) {
				$_SESSION["uname"] = $username;
				$_SESSION['msg'] = "";
				header("Location: ../view/welcome.php");
			}
			else {
				$_SESSION['msg'] = "Please check your username and password"; 
				/*echo "Please check your username and password";*/
				header("Location: ../view/login.php");
			}
		}
	}

	function sanitize($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>