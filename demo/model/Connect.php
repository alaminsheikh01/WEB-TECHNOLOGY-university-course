<?php 

	function connect() {
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "vsms";

		$conn = mysqli_connect($hostname, $username, $password, $dbname);

		/*if (! $conn) {
			die("There were some problem in database connection.");
		}*/

		return $conn;
	}
?>