<!DOCTYPE html>
<html lang="en">

 <head>
	<title></title>
 </head>
 
	<body>
		<form action="validate.php" method="post">
			<fieldset>
			<legend>General</legend>
	       <label for="firstName">First Name </label>
	       <input type="text" name="firstname" id="firstname"/>
		   <br/> <br/>
		   <label for="lastName">Last Name </label>
	       <input type="text" name="lastname" id="Lname"/>
		   <br/><br/>
		   
		   <label for="gender">Gender :</label>
		   
		   <input type="radio" name="gender" id="male" value="Male"/>
		   <label for="male">Male</label>
		   
		   <input type="radio" name="gender" id="female" value="Female"/>
		   <label for="female">Female</label>
			</fieldset>
			<br/> <br/>
			<fieldset>
			<legend>Contact</legend>
	       <label for="email">Email </label>
	       <input type="text" name="email" id="email"/>
		   <br/> <br/>
		   <label for="mobile">Mobile No </label>
	       <input type="number" name="mobile" id="mobile"/>
		   <br/><br/>
		   
			</fieldset>
			
			<br/> <br/>
			<fieldset>
			<legend>Address</legend>
	       <label for="street">Street/House/Road </label>
	       <input type="text" name="street" id="street"/>
		   <br/> <br/>
		  
	       <label for="country">Country</label>
			  <select name="country" id="country">
				<option value="bangladesh">Bangladesh</option>
				<option value="india">India</option>
				<option value="bangladesh">Bangladesh</option>
				<option value="bangladesh">Bangladesh</option>
			  </select>
		   <br/><br/>
		   
			</fieldset>
			
			<input type="submit" name="submit" value="Register"/>
		</form>
	</body>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 