
<div class="topnav">
  <a class="#home" href="./index.php">LOGO HERE</a>
  <a class="active" href="./index.php">Home</a>

  <?php 

if (!isset($_SESSION['username'])) {
 
  echo '<a href="./signup.php">SignUp</a>';
  echo '<a href="./login.php">Login</a>';
  
}
?>
 
  <?php 

  if (isset($_SESSION['username'])) {
    echo '<a href="./view/partials/logout.php">Logout</a>';
    
	}
  ?>

  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>

</body>
</html>