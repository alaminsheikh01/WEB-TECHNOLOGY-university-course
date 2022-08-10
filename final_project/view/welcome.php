<?php 
	session_start();
	if (! isset($_SESSION['username'])) {
		header("Location: login.php");
	}
	require "../model/Connect.php";
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

<h2>List of User </h2>
<br><br>

<table border="2">
	<thead>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Email</th>
			<th>password</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>

<?php

$conn = connect();
if ($conn) {
	// read all row from database table
	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);

	if(!$result){
		die("Invalid query: " . $conn->error);
	}
	// read data of each row
	while($user = $result->fetch_assoc()){
		echo "
  <tr>
	<td>$user[id]</td>
	<td>$user[username]</td>
	<td>$user[email]</td>
	<td>$user[password]</td>
	<td>
	<a href='./editUser.php?id=$user[id]'>Edit</a>
	<a href='./deleteUser.php?id=$user[id]'>Delete</a>
	</td>
  </tr>
";
	}
}

?>

	</tbody>
</table>

<?php include "./partials/footer.php"?>

</div>
</body>
</html>

