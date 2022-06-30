<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>


<?php

$username= "";
$password ="";
$userNameError ="";
$passwordError ="";
$message = "";
$messageError = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

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

	if(file_exists('data.json'))
    {
        $filename = 'data.json';
        $data = file_get_contents($filename); //data read from json file
        echo $data;
        $users = json_decode($data);  //decode a data
        echo "<br/><br/>";
        print_r($users); //array format data printing
         $message = "<h3>JSON file data</h3>";
    }else{
         $message = "<h3>JSON file Not found</h3>";
    }

    // echo $users->username . ' ' . $users->password;
    // echo $users[0]->firstname;
    // echo $users->firstname;
    foreach ($users as $user) {
        if($user->username || $user->password){
            
            $message = "Login successfull";
        }else{
            $messageError = "User not found";
        }
         }
   
}


?>

    <span style="color: green"><?php echo $message; ?></span>
    <span style="color: red"><?php echo $messageError; ?></span>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>

           <label for="Uname">UserName</label>
			<input type="text" name="username" id="Uname">
			<span style="color: red">*<?php echo $userNameError; ?></span>

			<br><br>

            <label for="password">Password</label>
			<input type="password" name="password" id="password">
			<span style="color: red">*<?php echo $passwordError; ?></span>

			<br><br>

            <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>