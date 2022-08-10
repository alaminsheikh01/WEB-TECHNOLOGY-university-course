
<div class="topnav">
  <a class="active" href="./index.php">LOGO HERE</a>
  <a  href="./index.php">Home</a>

  <?php 

if (!isset($_SESSION['username'])) {
 
  echo '<a href="./signup.php">SignUp</a>';
  echo '<a href="./login.php">Login</a>';
  echo '<a href="./showProduct.php">Product</a>';
  
}else{
  echo '<a href="./welcome.php">Dashboard</a>';
  echo '<a href="./profile.php">Profile</a>';
  echo '<a href="./partials/logout.php">Logout</a>';
  echo '<a href="./showProduct.php">Product</a>';
  
}
?>
 
</div>

</body>
</html>