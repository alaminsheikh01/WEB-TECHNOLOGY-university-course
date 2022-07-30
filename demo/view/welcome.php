<?php session_start(); 

	if(! isset($_SESSION['uname']) or empty($_SESSION['uname'])) {
			header("Location: login.php");
		}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>
</head>
<body>

	<h1>Welcome to MVC Architecture</h1>

	<br><br>

	<?php 
		if (isset($_SESSION['user_list'])) {
			var_dump($_SESSION['user_list']);
		}
	?>	

	<br><br>

	<form action="../controller/UserGetByEmail.php" method="get">
		<label id="email">Email:</label>
		<input type="email" name="email" id="email">
		<input type="submit" name="submit">
	</form>

	<br><br>

	<?php 
		if (isset($_SESSION['user_by_email'])) {
			var_dump($_SESSION['user_by_email']);
		}
	?>	

	<br><br>

	<a href="../controller/UserList.php">Show User List</a>

	<a href="../controller/Logout.php">Logout</a>

</body>
</html>