<?php 
	session_start();
	if (! isset($_SESSION['username'])) {
		header("Location: login.php");
	}
?>
<?php include "./partials/_nav.php"?>



<?php
require "../model/Connect.php";
  // Create database connection
$db = connect();


  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$title = mysqli_real_escape_string($db, $_POST['title']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $image_text = mysqli_real_escape_string($db,$_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, title, price, image_text) VALUES ('$image', '$title', '$price','$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<script src="./js/product_valid.js"></script>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }

</style>
<link href="style.css" rel="stylesheet">
</head>
<body>
<div style="text-align:center">
<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
</div>
<div style="text-align:center">	
<?php 
		include "./nav.php";
		echo "<br>";
?>
</div>
<div id="content">
  <form method="POST" action="./addProduct.php" enctype="multipart/form-data" novalidate onsubmit="return validate(this)";>
  	<input type="hidden" name="size" value="1000000">
  	<div>
        <label for="image">Add images</label><br>
  	  <input type="file" name="image"><br>
		<span style="color: red" id="imageErr"></span>
  	</div>
      <br><br>

      <div>
        <label for="Title">Title</label><br>
  	  <input type="text" name="title"><br>
		<span style="color: red" id="titleErr"></span>
  	</div>
      <br><br>

      <div>
        <label for="price">Price</label><br>
  	  <input type="number" name="price"><br>
		<span style="color: red" id="priceErr"></span>
  	</div>
      <br><br>
  	<div>
        <label for="desc">Description</label><br>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
		  <span style="color: red" id="imageTextErr"></span>
  	</div>
  	<div>
  		<button type="submit" name="upload">Add Product</button>
  	</div>
  </form>
</div>
</body>
</html>