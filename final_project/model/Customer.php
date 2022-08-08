<?php
require 'Connect.php';


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