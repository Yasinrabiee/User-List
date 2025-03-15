<?php 
	require_once 'config.php';

	$fname = htmlentities($_POST['fname']);
	$lname = htmlentities($_POST['lname']);
	$email = htmlentities($_POST['email']);

	$sql = "INSERT INTO uuu_user (fname, lname, email) VALUES
	('$fname', '$lname', '$email')";

	$conn->query($sql);
	$conn->close();
?>