<?php
require "../model/Connect.php";

$conn = Connect();


if(isset($_GET["id"])){
    $id = $_GET['id'];

    $sql = "DELETE FROM customer WHERE id=$id ";
    $conn->query($sql);
}

header("location: ./showCustomer.php");
exit;


?>