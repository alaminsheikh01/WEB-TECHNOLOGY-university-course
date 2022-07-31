<?php 
	session_start();

	if (isset($_SESSION['username'])) {
		header("Location: welcome.php");
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
  <form method="post" action="./controller/LoginAction.php" novalidate>
		<fieldset>
			<legend>Login</legend>

			<?php
			if(isset($_SESSION['is_invalid'])): ?>
			<em>Invalid login</em>
			<?php endif;?>
			<br>
            <label for="username">Username</label>
			<input type="text" name="username" id="username" required>
			<!-- <span style="color: red">*<?php echo $userNameError; ?></span> -->
		
			<br><br>

            <label for="password">Password</label>
			<input type="password" name="password" id="password" required>
			<!-- <span style="color: red">*<?php echo $passwordError; ?></span> -->

			<br><br>

		</fieldset>

		<input style="margin-top:10px" type="submit" name="submit" value="Login">
	</form>

  </div>
  <?php include "view/partials/footer.php"?>
 </body>
</html>