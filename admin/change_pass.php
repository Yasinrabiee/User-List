<?php
	session_start();
	require_once '../config.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$oldPass = $_POST['oldPass'];
	$newPass = $_POST['newPass'];
	$response = [];
	// $username = 'yasin'
	// $password = '123'
	// $oldpass = '123'
	// $newPass = 'Yasinrb021'

	if (empty($oldPass) && empty($newPass)) {
		$response = [
			'alert' => '<div class="alert alert-warning">لطفا فیلد های الزامی را پر نمایید.</div>'
		];
	} 
	else {
		if ($password != $oldPass) {
			$response = [
				'alert' => '<div class="alert alert-danger">رمز عبور فعلی اشتباه است.</div>'
			];
		}
		else {
			if (strlen($newPass) <= 8) {
				$response = [
					'alert' => '<div class="alert alert-warning">رمز عبور باید بیشتر از ۸ کاراکتر باشد.</div>'
				];
			}
			
			else {
				$sql = "UPDATE uuu_admin SET pass = '$newPass' WHERE
				username = '$username' AND pass = '$password'";
				$conn->query($sql);
				$response = [
					'alert' => '<div class="alert alert-success">رمز عبور با موفقیت تغییر یافت.</div>'
				];	
				$_SESSION['login'] = $username . ':' . $newPass;
			}
		}	
	}

	header('Content-Type: application/json');
	echo json_encode($response);
?>