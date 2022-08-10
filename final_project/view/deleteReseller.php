<?php
require "../model/Connect.php";

$conn = Connect();


if(isset($_GET["id"])){
    $id = $_GET['id'];

    $sql = "DELETE FROM reseller WHERE id=$id ";
    $conn->query($sql);
}

header("location: ./showReseller.php");
exit;


?>