<?php 
	session_start();

	if (! isset($_SESSION['username'])) {
		header("Location: login.php");
	}
?>
<?php include "./partials/_nav.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Create Reseller</title>
</head>
<body>
	
<div style="text-align:center">
<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

</div>
<br><br>

<div style="text-align:center">	
<?php 
		include "./nav.php";
		echo "<br>";
		require "../model/Connect.php";
?>



<!-- write your code here  -->

<h2>List of Customer </h2>
<a href="./createReseller.php" role="button">New Reseller</a>
<br><br><br>

<table border="2">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
            <th>Company</th>
			<th>Address</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>

<?php

$conn = connect();
if ($conn) {
	// read all row from database table
	$sql = "SELECT * FROM reseller";
	$result = $conn->query($sql);

	if(!$result){
		die("Invalid query: " . $conn->error);
	}
	// read data of each row
	while($reseller = $result->fetch_assoc()){
		echo "
  <tr>
	<td>$reseller[id]</td>
	<td>$reseller[name]</td>
	<td>$reseller[email]</td>
	<td>$reseller[phone]</td>
    <td>$reseller[company]</td>
	<td>$reseller[address]</td>
	<td>
	<a href='./editReseller.php?id=$reseller[id]'>Edit</a>
	<a href='./deleteReseller.php?id=$reseller[id]'>Delete</a>
	</td>
  </tr>
";
	}
}

?>

	</tbody>
</table>

<?php include "./partials/footer.php"?>    
</body>
</html>