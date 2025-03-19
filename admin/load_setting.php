<?php
	require_once '../config.php';
	$sqlLoadSetting = "SELECT * FROM uuu_setting";
	$result = $conn->query($sqlLoadSetting);
	$result = $result->fetch_assoc();

	$conn->close();

	header('Content-Type: application/json');
	echo json_encode($result);
?>