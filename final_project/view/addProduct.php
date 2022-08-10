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
<div id="content">
  <form method="POST" action="./addProduct.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
        <label for="image">Add images</label><br>
  	  <input type="file" name="image">
  	</div>
      <br><br>

      <div>
        <label for="Title">Title</label><br>
  	  <input type="text" name="title">
  	</div>
      <br><br>

      <div>
        <label for="price">Price</label><br>
  	  <input type="number" name="price">
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
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>