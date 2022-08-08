<?php 
	session_start();
	if (! isset($_SESSION['username'])) {
		header("Location: login.php");
	}
?>

<?php include "./partials/_nav.php"?>
<link href="style.css" rel="stylesheet">

<div style="text-align:center">
<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
</div>
<br><br>

<div style="text-align:center">	
<?php 
		include "./nav.php";
		echo "<br>";
?>

<?php include "./partials/footer.php"?>

</div>
</body>
</html>

