<?php 
	session_start();
    require "../model/Connect.php";
	if (! isset($_SESSION['username'])) {
		header("Location: login.php");
	}
?>
<?php include "./partials/_nav.php"?>


<?php
$username = "";
$email = "";
$password = "";

$errorMessage = "";
$successMessage = "";
$conn = connect();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // GET method: show the data of the Users
    if(!isset($_GET['id'])) {
        header("location: ./welcome.php");
    }
    $id = $_GET['id'];

    
    // read the row of the selected Users from database table
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if(!$row){
        header("location: ./welcome.php");
        exit;
    }

    $username = $row["username"];
    $email = $row["email"];
    $password = $row["password"];
}
else{
    // POST method: Update the data of the Users
    $id= $_POST['id'];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    do{
        if(empty($id) || empty($username) || empty($email) || empty($password)){
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE users " . 
                "SET username = '$username', email = '$email', password= '$password' " . 
                "WHERE id = $id";

        $result = $conn->query($sql);
        
        if(!$result){
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $successMessage = "users updated correctly";

        header("location: ./welcome.php");
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
    <title>Create Users </title>
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
    <h2>Update user</h2>

    <?php if(!empty($errorMessage)){ echo $errorMessage;} ?>
    <?php if(!empty($successMessage)) {echo $successMessage;} ?>

    <form method="post" novalidate>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div>
            <label for="name">Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <br><br>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>
        <br><br>
        <div>
            <label for="password">Password</label>
            <input type="text" name="password" value="<?php echo $password; ?>">
        </div>

        <br><br>
        
        <button type="submit">Submit</button>
        
        <a href="./welcome.php">Cancel</a>
        
    </form>
    <?php include "./partials/footer.php"?>      
</body>
</html>