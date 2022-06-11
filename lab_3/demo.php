<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>

	<form method="post" action="PHPFile.php" novalidate>
		<fieldset>
			<legend>General</legend>

			<label for="fname">First Name</label>
			<input type="text" name="firstname" id="fname">

			<br><br>

			<label for="lname">Last Name</label>
			<input type="text" name="lastname" id="lname">

		</fieldset>

		<input type="submit" name="submit" value="Register">
	</form>

</body>
</html>