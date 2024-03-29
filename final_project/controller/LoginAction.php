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
			header("Location: ../view/login.php");
		}	
		else {
			
			$user = getUser($username);

				
				if($user){
			
					if ($password === $user["password"]){
						$_SESSION["username"] = $user["username"];
						$_SESSION['msg'] = "";
						header("Location:../view/welcome.php");
					}else {
						echo 'Invalid password!';
					}
				}
				else {
					$_SESSION['msg'] = "Please check your username and password"; 
					header("Location: ../view/login.php");
				}
			}
		
		}


if (empty($username)) {
	die("Username is Empty");
}
if (empty($username)) {
	die("username is Empty");   
}
else {
	$_SESSION['error_msg'] = "Login failed!";
	header("Location:../view/welcome.php");
}

?>