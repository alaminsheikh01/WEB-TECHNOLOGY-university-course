<?php include "./view/partials/_nav.php";?>
<link href="style.css" rel="stylesheet">

<style>
    .form-custom {
  margin-left: 20%;
  margin-right: 20%;
  margin-top: 4%;
  
}
</style>

<?php

$username = $password =   "";
$userNameError = $passwordError = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

$username = test_input($_POST['username']);
$password = test_input($_POST['password']);

$message = "";


if (empty($username)) {

    $userNameError = "UserName is Empty";
}
else {
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
    

        $userNameError = "Only letters and spaces";
    }
}

if (empty($password)) {
    $passwordError = "Password is Empty";
    
}
else {
    echo $message;
}


    $output = file_get_contents("data.json");
    $decode = json_decode($output, true);
    
    if(isset($_POST['login'])) {
      $username = $_REQUEST['username'];
      $password = sha1($_REQUEST['password']);
    
      for($i = 0; $i < count($decode); $i++) {
        if($decode[$i]['username'] == $username && $decode[$i]['password'] == $password) {
          echo "<script>alert('Login successful!')</script>";
          $_SESSION['username'] = $username;
          header("location url=welcome.php");
        
        }
        else {  
              echo "<script>alert('Invalid creds!')</script>";
        }
      }
    
    }
}
    
    ?>
      <body>
    
    
        <div class="form-custom">
<form method="post" novalidate>
		<fieldset>
			<legend>Login</legend>

            <label for="Uname">UserName</label>
			<input type="text" name="username" id="Uname">
			<span style="color: red">*<?php echo $userNameError; ?></span>

			<br><br>

            <label for="password">Password</label>
			<input type="password" name="password" id="password">
			<span style="color: red">*<?php echo $passwordError; ?></span>

			<br><br>

		</fieldset>

		
		<input type="submit" name="submit" value="Login">
	</form>

  </div>
 </body>
</html>