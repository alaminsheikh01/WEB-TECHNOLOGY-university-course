<?php 
	session_start();

	if (! isset($_SESSION['username'])) {
		header("Location: login.php");
	}
?>
<?php include "view/partials/_nav.php"?>
<link href="style.css" rel="stylesheet">


<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

<br><br>

<a href="./view/partials/logout.php">Logout</a>


</body>
</html>