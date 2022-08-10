<?php
ob_start();
session_start();

if(isset($_POST['change'])){
    $color = $_POST['color'];
    $_SESSION['color'] = $color;
    header("location: welcome.php");
}

?>