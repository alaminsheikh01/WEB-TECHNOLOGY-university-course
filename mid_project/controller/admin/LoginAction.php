<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

	<h1>Login</h1>

	<?php 
		$username = $_POST['username'];
		$password = $_POST['password'];

		if ($username === "admin" and $password === "admin") {
			$_SESSION['username'] = $username;
			header("Location: ../../welcome.php");
		}
		else {
			$_SESSION['error_msg'] = "Login failed!";
			header("Location: ../../login.php");
		}

	?>

</body>
</html>