<?php

require "../model/User.php";


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

$username = test_input($_POST['username']);
$email = test_input($_POST['email']);
$password = test_input($_POST['password']);


if (empty($username)) {
    die( "username is Empty");
}


if (empty($email)) {
    die("Email is Empty");
    
}
else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Please correct your email");
    }
}
if (strlen($password) <= 6) {
    die("Password must be at least 6 characters");   
}

}

// validate($username, $email, $password);
insertUser($username, $email, $password);

header("Location: ../login.php");

// if ($isValid) {
				
//     if($user){

//         header("Location:../login.php");
//     }
// }
// else {
//     header("Location: ../signup.php");
// }

?>