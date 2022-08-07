<?php

session_start(); 

require "../model/User.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {


	function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
	

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);

	$_SESSION['msg'] = "";

		if (empty($username) or empty($password)) {
			$_SESSION['msg'] = "Please fill up the form properly username and password";
			header("Location: ../login.php");
		}	
		else {
			
			$user = getUser($username);

			$isValid = validate($username, $password);

			if ($isValid) {
				
				if($user){
			
					if ($password === $user["password"]){
						$_SESSION["username"] = $user["username"];
						$_SESSION['msg'] = "";
						header("Location:../welcome.php");
					}else {
						echo 'Invalid password!';
					}
				}
			}
			else {
				$_SESSION['msg'] = "Please check your username and password"; 
				header("Location: ../login.php");
			}
		}

	// fetch data from the database and login user start




		// $is_invalid = false;
		// $_SESSION["is_invalid"] = $is_invalid;


		


		// $is_invalid = true;
		// $_SESSION["is_invalid"] = $is_invalid;
		// header("Location:../login.php");
		
	

	// fetch data from the database and login user end


if (empty($username)) {
	die("Username is Empty");
}
if (empty($username)) {
	die("username is Empty");   
}
else {
	$_SESSION['error_msg'] = "Login failed!";
	header("Location:../welcome.php");
}
}

?>