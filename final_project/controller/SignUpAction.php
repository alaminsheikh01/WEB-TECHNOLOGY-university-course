<?php
session_start(); 

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
$_SESSION['msg'] = "";

if (empty($username) or empty($email) or empty($password)) {
    $_SESSION['msg'] = "Please fill up the form properly username, email and password";
    header("Location: ../signup.php");
}
else{
    $user = insertUser($username, $email, $password);
    if($user){
        header("Location: ../login.php");
    }
}
}
?>