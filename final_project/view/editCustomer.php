<?php 
	session_start();
    require "../model/Connect.php";
	if (! isset($_SESSION['username'])) {
		header("Location: login.php");
	}
?>
<?php include "./partials/_nav.php"?>


<?php
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";
$conn = connect();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // GET method: show the data of the customer
    if(!isset($_GET['id'])) {
        header("location: ./welcome.php");
    }
    $id = $_GET['id'];

    
    // read the row of the selected customer from database table
    $sql = "SELECT * FROM customer WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if(!$row){
        header("location: ./welcome.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["address"];
}
else{
    // POST method: Update the data of the Customer
    $id= $_POST['id'];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do{
        if(empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)){
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE customer " . 
                "SET name = '$name', email = '$email', phone= '$phone', address= '$address' " . 
                "WHERE id = $id";

        $result = $conn->query($sql);
        
        if(!$result){
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $successMessage = "Customer updated correctly";

        header("location: ./showCustomer.php");
    }while(false);
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Create Customer </title>
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
?>
    <h2>New Customer</h2>

    <?php if(!empty($errorMessage)){ echo $errorMessage;} ?>
    <?php if(!empty($successMessage)) {echo $successMessage;} ?>

    <form method="post" novalidate>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>">
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" name="address" value="<?php echo $address; ?>">
        </div>

        
        
        <button type="submit">Submit</button>
        
        <a href="#">Cancel</a>
        
    </form>
    <?php include "./partials/footer.php"?>      
</body>
</html>