<?php

session_start(); 


if ($_SERVER['REQUEST_METHOD'] === "POST") {

	function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);

	// fetch data from the database and login user start

	require '../model/Connect.php';

		$conn = Connect();
		
		$sql = sprintf("SELECT * FROM users 
						WHERE username = '%s'",
						$conn->real_escape_string($username));
						
		$result = $conn->query($sql);
		$user = $result->fetch_assoc();
		
		if($user){
			
			if ($password === $user["password"]){
				echo "Login successfully";
				$_SESSION["username"] = $user["username"];
				header("Location:../welcome.php");
			}else {
				echo 'Invalid password!';
			}
		}
	

	// fetch data from the database and login user end




// if ($username === "admin" and $password === "admin") {
// 	$_SESSION['email'] = $username;
// 	header("Location:../welcome.php");
// }
if (empty($username)) {
	die("Username is Empty");
}
if (empty($username)) {
	die("username is Empty");   
}
// else {
// 	$_SESSION['error_msg'] = "Login failed!";
// 	header("Location:../welcome.php");
// }
}

?>