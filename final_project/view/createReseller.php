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
$company = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $company = $_POST["company"];
    $address = $_POST["address"];


    do{
        if(empty($name) || empty($email) || empty($phone) || empty($company) || empty($address)) {
            $errorMessage = "All the fields are required";
            break;
        }

        // add new customer to database
        $conn = connect();

        $sql = "INSERT INTO reseller (name, email, phone,company, address) " . 
                "VALUES ('$name', '$email', '$phone', '$company', '$address')";
        
        $result = $conn->query($sql);
        
        if(!$result){
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }


        $name = "";
        $email = "";
        $phone ="";
        $company="";
        $address = "";

        $successMessage = "Reseller added correctly";
        header("location: ./showReseller.php");
        exit;


    }while (false);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="./js/reseller_valid.js"></script>
    <title>Create Reseller </title>
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

    <form method="post"  novalidate onsubmit="return validate(this)";>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <span style="color: red" id="nameErr"></span>
        </div>
        <br><br>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <span style="color: red" id="emailErr"></span>
        </div>
        <br><br>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>">
            <span style="color: red" id="phoneErr"></span>
        </div>
        <br><br>
        <div>
            <label for="company">Company</label>
            <input type="text" name="company" value="<?php echo $company; ?>">
            <span style="color: red" id="companyErr"></span>
        </div>
        <br><br>
        <div>
            <label for="address">Address</label>
            <input type="text" name="address" value="<?php echo $address; ?>">
            <span style="color: red" id="addressErr"></span>
        </div>
        <br><br>
        
        
        <button type="submit">Submit</button>
        

        <a href="./showReseller.php">Cancel</a>
        
    </form>
    <?php include "./partials/footer.php"?>      
</body>
</html>