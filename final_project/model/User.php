<?php
require 'Connect.php';
require "../view/js/login_validation.js";

function validate($username, $password) {
    $conn = connect();
    if ($conn) {

        $sql = "SELECT id FROM users WHERE username = '" . $username . "' and password = '" . $password . "'";

        $res = mysqli_query($conn, $sql);

        if ($res->num_rows === 1)
            return true;
        return false;
    }
}	


function getUser($username) {
    $conn = Connect();
		
			$sql = sprintf("SELECT * FROM users 
							WHERE username = '%s'",
							$conn->real_escape_string($username));
							
			$result = $conn->query($sql);
			$user = $result->fetch_assoc();
            return $user;
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

// function getAll() {
//     $conn = connect();
//     if ($conn) {

//         $sql = "SELECT id, username, password, email FROM users";

//         $res = mysqli_query($conn, $sql);

//         $users = array();

//         if ($res->num_rows > 0) {

//             while($row = $res->fetch_assoc()) {
//                 array_push($users, $row);
//             }

//             return $users;
//         }
//     }

//     return array();
// }
?>