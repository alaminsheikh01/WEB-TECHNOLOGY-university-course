<?php 
	session_start();
    require "../model/Connect.php";
	if (! isset($_SESSION['username'])) {
		header("Location: login.php");
	}
?>
<?php include "./partials/_nav.php"?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./style.css" rel="stylesheet">
    <title>Profile Page</title>
</head>

<br><br>

<?php
$conn = connect();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $currentUser = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username ='$currentUser'";

    
    $gotResuslts = mysqli_query($conn,$sql);

    if($gotResuslts){
        if(mysqli_num_rows($gotResuslts)>0){
            while($row = mysqli_fetch_array($gotResuslts)){
                $id = $row['id'];
                $username = $row["username"];
                $email = $row["email"];
                $password = $row["password"];
?>
        <?php  
            }
        }

    }
}


// POST method: Update the data of the Customer
if($_SERVER['REQUEST_METHOD'] == 'POST'){

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
   "SET username = '$username', email = '$email', password= '$password'" . 
   "WHERE id = $id";

$result = $conn->query($sql);

if(!$result){
$errorMessage = "Invalid query: " . $conn->error;
break;
}

$successMessage = "Customer updated correctly";

header("location: ./welcome.php");
}while(false);

}

?>

        
<form method="post" novalidate>
<?php if(!empty($errorMessage)){ echo $errorMessage;} ?>
<?php if(!empty($successMessage)) {echo $successMessage;} ?>

        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div>
        <label for="username"> Username: </label> 
        <input type="text" name="username" id="username" value="<?php echo $username; ?>">
        <br><br>
        </div>


        <div>
        <label for="email"> Email: </label> 
        <input type="email" name="email" id="email" value="<?php echo $email; ?>"> 
        <br><br>

        </div>

        <div>
        <label for="password"> Password: </label> 
        <input type="text" name="password" id="password" value="<?php echo $password; ?>"> 
        <br><br>

        </div>
                    
                   
        <button type="submit" name="submit" class="btn">Update Profile</button>
        </form>
       
    <?php include "./partials/footer.php"?> 
</body>

</html>