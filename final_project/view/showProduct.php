<?php 
	session_start();
    require "../model/Connect.php";
	if (isset($_SESSION['username'])) {
		header("Location: welcome.php");
	}
?>
<?php include "./partials/_nav.php";?>

<?php
  // Create database connection
  $db = connect();
  $result = mysqli_query($db, "SELECT * FROM images");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Product</title>

    <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 400px;
  margin: auto;
  text-align: center;
  font-family: arial;
  float: left;
  margin-bottom: 10px;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
</style>  
</head>
<body>
    <h2>Product</h2>

    <?php
    while ($row = mysqli_fetch_array($result)) {

      echo "<div class='card'>";
      echo "<img src='images/".$row['image']."' style='width:100%' >";
      echo  "<h1>$row[title]</h1>";
      echo "<p class='price'>$row[price]</p>";
      echo  "<p>$row[image_text]</p>";
      echo "<p><button>Add to Cart</button></p>";
    echo "</div>";

    }
  ?>


   
</body>
</html>