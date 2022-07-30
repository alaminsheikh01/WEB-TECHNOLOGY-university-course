<?php 

	require 'Connect.php';
	
	function validate($username, $password) {
		$conn = connect();
		if ($conn) {

			$sql = "SELECT id FROM users WHERE username = '" . $username . "' and password = '" . $password . "'";

			$res = mysqli_query($conn, $sql);

			if ($res->num_rows === 1)
				return true;
			return false;
		}
	}	

	function get($email) {
		$conn = connect();
		if ($conn) {
			$stmt = $conn->prepare("SELECT id, username, password, email FROM users WHERE email = ?");
			$stmt->bind_param("s", $e);
			$e = $email;
			$stmt->execute();
			$res = $stmt->get_result();
			$users = array();

			if ($res->num_rows > 0) {

				while($row = $res->fetch_assoc()) {
					array_push($users, $row);
				}

				return $users;
			}
		}

		return array();
	}

	function getAll() {
		$conn = connect();
		if ($conn) {

			$sql = "SELECT id, username, password, email FROM users";

			$res = mysqli_query($conn, $sql);

			$users = array();

			if ($res->num_rows > 0) {

				while($row = $res->fetch_assoc()) {
					array_push($users, $row);
				}

				return $users;
			}
		}

		return array();
	}
?>