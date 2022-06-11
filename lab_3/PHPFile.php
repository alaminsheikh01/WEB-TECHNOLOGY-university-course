<?php 
	
	// if ($_SERVER['REQUEST_METHOD'] === "POST") {

	// 	function test_input($data) {
	// 		$data = trim($data);
	// 		$data = stripslashes($data);
	// 		$data = htmlspecialchars($data);
	// 		return $data;
	// 	}

	// 	$fname = test_input($_POST['firstname']);
	// 	$lname = test_input($_POST['lastname']);

	// 	if (empty($fname) or empty($lname)) {
	// 		echo "Please fill up the form properly";
	// 	}
	// 	else {
	// 		$arr1 = array('firstname' => $fname, 'lastname' => $lname);

	// 		$f = fopen("data.json", "a");
	// 		fwrite($f, json_encode($arr1));
	// 		fclose($f);

	// 		echo "Registration Successful";
	// 	}
	// }

	if(isset($_POST['submit'])){
		$new_message = array(
			"firstName" => $_POST['firstname'],
			"lastname" => $_POST['lastname']
		);



		if(filesize('message.json') == 0){
			$first_record = array($new_message);
			$data_to_save = $first_record;
		}else{
			$old_records = json_decode(file_get_contents('message.json'));
			array_push($old_records, $new_message);

			$data_to_save = $old_records;
		}

		if(!file_put_contents('message.json', json_encode($data_to_save, JSON_PRETTY_PRINT), LOCK_EX)){
			$error = "Error storing message, please try again";
		}else{
			$success = "Message is stored successfully";
		}
	}
?>