<?php 
	session_start();

	if (isset($_SESSION['username'])) {
		header("Location: welcome.php");
	}
?>
<?php include "./view/partials/_nav.php";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
    <link href="style.css" rel="stylesheet">
    <script src="./view/js/login_validation.js"></script>
</head>
<body>


<style>
    .form-custom {
  margin-left: 20%;
  margin-right: 20%;
  margin-top: 4%;
  
}
</style>
<!-- ./controller/LoginAction.php -->
      <body>
  <div class="form-custom">
  <form method="post" action="./controller/LoginAction.php" novalidate onsubmit="return validate(this)";>
		<fieldset>
			<?php 
			if(isset($_SESSION['msg']) and !empty($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				echo "<br><br>";
			}
			
			?>
			<legend>Login</legend>
            <label for="username">Username</label>
			<input type="text" name="username" id="username" required>
			<span style="color: red" id="unameErr"></span>
		
			<br><br>

            <label for="password">Password</label>
			<input type="password" name="password" id="password" required>
			<span style="color: red" id="passwordErr"></span>

			<br><br>

		</fieldset>

		<input style="margin-top:10px" type="submit" name="submit" value="Login">
	</form>

  </div>
  <?php include "view/partials/footer.php"?>
 </body>
</html>