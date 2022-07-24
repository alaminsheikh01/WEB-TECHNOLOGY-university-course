<?php 

	function connect() {
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "online_books";

		$conn = mysqli_connect($hostname, $username, $password, $dbname);
        
		if (! $conn) {
			die("There were some problem in database connection.");
		}else{
            echo "connection successfully";
        }
        

		return $conn;
	}
?>