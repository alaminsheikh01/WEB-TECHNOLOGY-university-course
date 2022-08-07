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
    <title>Create User</title>
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
		require "../model/Customer.php";
?>



<!-- write your code here  -->

<h2>List of Customer </h2>
<a href="/createCustomer.php" role="button">New Customer</a>
<br>

<table border="2">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>

	<?php

$customer = getCustomer();
echo "
  <tr>
	<td>$customer[id]</td>
	<td>$customer[name]</td>
	<td>$customer[email]</td>
	<td>$customer[phone]</td>
	<td>$customer[address]</td>
	<td>
	<a href='./createCustomer.php?id=$customer[id]'>Edit</a>
	<a href='./welcome.php?id=$customer[id]'>Delete</a>
	</td>
  </tr>
"
?>

	</tbody>
</table>

<?php include "./partials/footer.php"?>    
</body>
</html>