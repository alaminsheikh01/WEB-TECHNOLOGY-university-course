<?php 

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$gender = isset($_POST['gender']) ? $_POST['gender'] : NULL;
	$email = $_POST['email'];
	$mobileno = $_POST['mobileno'];
	$address1 = $_POST['address1'];
	$country = isset($_POST['country']) ? $_POST['country'] : NULL;

	$message = "";
	if (empty($firstname)) {
		$message .= "First Name is Empty";
		$message .= "<br>";
	}
	if (empty($lastname)) {
		$message .= "Last Name is Empty";
		$message .= "<br>";
	}
	if (empty($gender)) {
		$message .= "Gender not Selected";
		$message .= "<br>";
	}
	if (empty($email)) {
		$message .= "Email is Empty";
		$message .= "<br>";
	}
	if (empty($mobileno)) {
		$message .= "Mobileno is Empty";
		$message .= "<br>";
	}
	if (empty($address1)) {
		$message .= "Street/House/Road is Empty";
		$message .= "<br>";
	}
	if (!isset($country) or empty($country)) {
		$message .= "Country not Seletect";
		$message .= "<br>";
	}

	if ($message === "") {
		echo "Registration Successful";
	}
	else {
		echo $message;
	}
?>