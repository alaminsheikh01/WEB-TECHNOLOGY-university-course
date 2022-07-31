<?php

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
$confirmPass = test_input($_POST['confirmPassword']);


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
if (strlen($password) <= 8) {
    die("Password must be at least 8 characters");   
}

if(! preg_match("/[a-z]/i", $password)){
    die("password must contain at least one letter");
}
if(! preg_match("/[0-9]/i", $password)){
    die("password must contain at least one number");
}

}

// $mysqli = require __DIR__ . "./Connect.php"
require '../model/Connect.php';

$conn = connect();
// insert data into the database 

$sql = "INSERT INTO users (username, email, password)
        VALUES (?,?,?)";

$stmt = $conn->stmt_init();

if( ! $stmt->prepare($sql)){
    die("SQL error" . $conn->error);
}

$stmt->bind_param("sss", $username, $email, $password);


if($stmt->execute()) {
    echo "SignUp successfully";
}else{
    
    die($conn->error);
}

header("Location: ../login.php")

?>