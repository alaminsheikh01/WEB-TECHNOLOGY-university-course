<?php 
	session_start();

	if (! isset($_SESSION['username'])) {
		header("Location: login.php");
	}
?>
<?php include "view/partials/_nav.php"?>
<link href="style.css" rel="stylesheet">



<div style="text-align:center">
<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

</div>
<br><br>

<div style="text-align:center">
	
<?php 
		include "view/admin/nav.php";
		echo "<br>";
		echo "<h2>View Added Products</h3>";
		echo "<br>";
		include "controller/admin/viewProducts.php";
?>
<?php include "view/partials/footer.php"?>
</div>
</body>
</html>