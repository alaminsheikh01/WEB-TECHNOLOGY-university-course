<?php 
	session_start();
	
    if (isset($_SESSION['username'])) {
		header("Location: welcome.php");
	}
	// $_SESSION["is_invalid"] = "";
?>

<?php include "./partials/_nav.php";?>
<link href="./style.css" rel="stylesheet">
<script src="./js/login_validation.js"></script>
<style>
    .form-custom {
  margin-left: 20%;
  margin-right: 20%;
  margin-top: 4%;
  
}
</style>

<div class="form-custom" >
<form method="post" action="../controller/SignUpAction.php" novalidate onsubmit="return validate(this)"; >
		<fieldset >
			<legend>SignUp</legend>

			<?php 
			if(isset($_SESSION['msg']) and !empty($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				echo "<br><br>";
			}
			$_SESSION['msg'] = "";
			
			?>

			<label for="Uname">Username</label><br>
			<input type="text" name="username" id="username" >
			<span style="color: red" id="unameErr"></span>
			<br><br>

			<label for="Email">Email</label><br>
			<input type="email" name="email" id="email">
			<span style="color: red" id="emailErr"></span>

			<br><br>
            <label for="password">Password</label><br>
			<input type="password" name="password" id="password">
			<span style="color: red" id="passwordErr"></span>

		</fieldset>

		
		<input style="margin-top:10px" type="submit" name="submit" value="Register">
        <p>Already Signup? <a href='./login.php'> Login here </a></p>
	</form>

</div>
<?php include "./partials/footer.php"?>
</body>
</html>