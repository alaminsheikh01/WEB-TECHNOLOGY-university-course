<?php
require 'Connect.php';


function addcustomer1($name, $email, $phone, $address){
    $conn = connect();

    $sql = "INSERT INTO customer (name, email, phone, address) " . 
            "VALUES ('$name', '$email', '$phone', '$address')";
    
    $result1 = $conn->query($sql);
    
    if(!$result1){
        $errorMessage = "Invalid query: " . $conn->error;
    }
}

function getCustomer(){
    $conn = connect();
    if ($conn) {
        // read all row from database table
        $sql = "SELECT * FROM customer";
        $result = $conn->query($sql);

        if(!$result){
            die("Invalid query: " . $conn->error);
        }
        // read data of each row
        while($row = $result->fetch_assoc()){
            return $row;
        }
    }
}
?>