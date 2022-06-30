
<?php

	if($_SERVER["REQUEST_METHOD"] === 'POST')
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST["gender"];
		$email = $_POST['email'];
		$mobile = $_POST["mobile"];
		$street = $_POST["street"];
		$country = $_POST['country'];
		
		/*if(empty($firstname) or (empty($lastname) or (empty($gender) or 
		(empty($mobile) or empty($street) or (empty($country) )
		{
			echo "please filup all field";
		}*/
		
		elseif(empty($firstname)){
			echo "please enter first name";
		}
		elseif(empty($lastname))
		{
			echo "Please enter last name";
		}
		elseif(empty($gender)){
			echo "Please enter gender";
		}
		elseif(empty($mobile)){
			echo "please enter mobile";
		}
		elseif(empty($street))
		{
			echo "Please enter street/house/road";
		}
		elseif(empty($country)){
			echo "Please enter country";
		}
		else{
			echo "Register Succesfully";
		}
	}
	else{
		echo "Request Rejected";
	}





?>