<?php
	require_once '../config.php';

	$title = $_POST['title'];
	$dir = $_POST['dir'];
	$message = $_POST['message'];

	$sqlUpdSetting = "UPDATE uuu_setting SET title = '$title',
	user_message = '$message', dir = '$dir' WHERE id = '1'";

	if ($conn->query($sqlUpdSetting)) {
		$response = [
			'result' => '<div class="alert alert-success text-center">تنظیمات با موفقیت اصلاح شد.</div>'
		];
	} 

	else {
		$response = [
			'result' => null
		];
	}

	header('Content-Type: application/json');
	echo json_encode($response);
?>