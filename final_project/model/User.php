<?php
require 'Connect.php';

function getUser($username) {
    $conn = connect();
		
			$sql = sprintf("SELECT * FROM users 
							WHERE username = '%s'",
							$conn->real_escape_string($username));
							
			$result = $conn->query($sql);
			$user = $result->fetch_assoc();
            return $user;
}

function CheckUser($logusername,$logemail)
{
$result = $conn->query("SELECT * FROM users WHERE username='". $logusername."' AND password='". $logemail."'");
return $result;
}

function insertUser($username, $email, $password){
    
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
}

}

?>