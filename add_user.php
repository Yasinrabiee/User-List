<?php 
	require_once 'config.php';

	$username = htmlentities($_POST['username']);
	$username = strtolower($username);
	$password = htmlentities($_POST['password']);
	$email = htmlentities($_POST['email']);

	$sqlSelect = "SELECT * FROM uuu_user WHERE username = '$username'";
	$result = $conn->query($sqlSelect);
	if ($result->num_rows > 0) {
		$response = [
			'error' => 'این نام کاربری قبلا انتخاب شده است.' 
		];
	}
	else {
		$response = [
			'error' => null 
		];

		$sqlInsert = "INSERT INTO uuu_user (username, pass, email) VALUES
		('$username', '$password', '$email')";

		$conn->query($sqlInsert);
	}

	$conn->close();

	header('Content-Type: application/json');
	echo json_encode($response);
?>