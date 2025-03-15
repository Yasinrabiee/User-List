<?php 
	define('servername', 'localhost');
	define('username', 'app');
	define('password', 'Yasinrb021');
	define('dbname', 'app');

	$conn = mysqli_connect(servername, username, password, dbname);
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
?>