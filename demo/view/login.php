<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<script src="js/login_validation.js"></script>
</head>
<body>

	<h1>Login</h1>

	<form method="post" action="../controller/LoginAction.php" novalidate onsubmit="return validate(this);">
		<label for="uname">Username:</label>
		<input type="text" name="uname" id="uname">
		<span id="unameErr"></span>

		<br><br>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
		<span id="passwordErr"></span>
		<br><br>

		<input type="submit" name="submit">
	</form>

	<?php 

		if(isset($_SESSION['msg']) and !empty($_SESSION['msg'])) {
			echo $_SESSION['msg'];
		}
	?>
</body>
</html>