
<div class="topnav">
  <a class="active" href="./index.php">LOGO HERE</a>
  <a  href="./index.php">Home</a>

  <?php 

if (!isset($_SESSION['username'])) {
 
  echo '<a href="./signup.php">SignUp</a>';
  echo '<a href="./login.php">Login</a>';
  
}else{
  echo '<a href="./welcome.php">Dashboard</a>';
  echo '<a href="./view/partials/logout.php">Logout</a>';
  
}
?>
 

  <!-- <a href="#contact">Contact</a>
  <a href="#about">About</a> -->
</div>

</body>
</html>