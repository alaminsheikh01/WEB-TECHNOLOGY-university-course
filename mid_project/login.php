<?php 
	session_start();

	if (isset($_SESSION['username'])) {
		header("Location: Welcome.php");
	}
?>

<?php include "./view/partials/_nav.php";?>
<link href="style.css" rel="stylesheet">

<style>
    .form-custom {
  margin-left: 20%;
  margin-right: 20%;
  margin-top: 4%;
  
}
</style>

      <body>
    
    
  <div class="form-custom">
  <form method="post" action="./controller/admin/LoginAction.php" novalidate>
		<fieldset>
			<legend>Login</legend>

            <label for="Uname">UserName</label>
			<input type="text" name="username" id="Uname" required>
		

			<br><br>

            <label for="password">Password</label>
			<input type="password" name="password" id="password" required>


			<br><br>

		</fieldset>

		
		<input type="submit" name="submit" value="Login">
	</form>

  </div>
 </body>
</html>