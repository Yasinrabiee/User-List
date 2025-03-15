<?php 
	require_once '../config.php';

	$recordId = $_POST['id'];
	$sql = "DELETE FROM uuu_user WHERE id = $recordId ";
	$conn->query($sql);
	$conn->close();
?>