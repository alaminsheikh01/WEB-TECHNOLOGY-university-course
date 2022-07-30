<?php 
	session_start();
    if (isset($_SESSION['username'])) {
		header("Location: welcome.php");
	}
?>

<?php include "./view/partials/_nav.php";?>
<link href="./style.css" rel="stylesheet">
<style>
    .form-custom {
  margin-left: 20%;
  margin-right: 20%;
  margin-top: 4%;
  
}
</style>



<div class="form-custom" >
<form method="post" action="./controller/SignUpAction.php" novalidate >
		<fieldset >
			<legend>SignUp</legend>

			<label for="fname">FullName</label><br>
			<input type="text" name="fullname" id="fname" >
			<!-- <span style="color: red">*<?php echo $fullnameErrMsg; ?></span> -->

			<br><br>

            <label for="Uname">UserName</label><br>
			<input type="text" name="username" id="Uname">
			<!-- <span style="color: red">*<?php echo $userNameError; ?></span> -->

			<br><br>

			<label for="email">Email</label><br>
			<input type="email" name="email" id="email">
			<!-- <span style="color: red">*<?php echo $emailErrMsg; ?></span> -->

			<br><br>
            <label for="password">Password</label><br>
			<input type="password" name="password" id="password">
			<!-- <span style="color: red">*<?php echo $passwordError; ?></span> -->

			<br><br>
            <label for="confirmpass">Confirm Password</label><br>
			<input type="password" name="confirmPassword" id="confirmPassword">

		</fieldset>

		
		<input style="margin-top:10px" type="submit" name="submit" value="Register">
        <p>Already Signup? <a href='./login.php'> Login here </a></p>
	</form>

</div>
<?php include "view/partials/footer.php"?>
</body>
</html>