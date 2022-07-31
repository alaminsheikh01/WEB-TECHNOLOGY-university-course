<?php

session_start(); 


if ($_SERVER['REQUEST_METHOD'] === "POST") {

	function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

	$email = test_input($_POST['email']);
	$password = test_input($_POST['password']);

	// fetch data from the database and login user start

	require '../model/Connect.php';
	if(!empty($email)){
		$conn = Connect();
		
		$sql = sprintf("SELECT * FROM users 
						WHERE email = '%s'",
						$conn->real_escape_string($email));
						
		$result = $conn->query($sql);
		$user = $result->fetch_assoc();
		
		if($user){
			if(password_verify($password, $user["password"])){
				die("Login successful");
				// $_SESSION['name'] = $user['fullname'];
				header("Location:../welcome.php");
			}
		}
	}

	// fetch data from the database and login user end




// if ($email === "admin@gmail.com" and $password === "admin") {
	// $_SESSION['email'] = $email;
	// header("Location:../welcome.php");
// }
if (empty($email)) {
	die("email is Empty");
}
if (empty($password)) {
	die("Password is Empty");   
}
// else {
// 	$_SESSION['error_msg'] = "Login failed!";
// 	header("Location:../login.php");
// }
}

?>