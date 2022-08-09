<?php 
	session_start();
    require "../model/Connect.php";
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
    <title>Profile</title>
</head>
<body>
    <h1>Profile info</h1>

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

    
    <button type="submit">Profile update</button>
    
    
</form>
<?php include "./partials/footer.php"?>   
</body>
</html>