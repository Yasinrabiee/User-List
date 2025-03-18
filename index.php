<?php
	session_start();
	if (!isset($_SESSION['login'])) {
		header('location: login.php');
	}

	$loginSes = explode(':', $_SESSION['login']); 
	$username = $loginSes[0];
	require_once 'header.php';
?>
<body>
	<div class="m-auto" style="width: 400px;">
		<div class="alert alert-success w-100 text-center mt-3">خوش آمدید کاربر محترم <?=$username?></div>
		<a href="logout.php" class="btn btn-outline-danger w-100">خروج از سیستم</a>
	</div>
</body>
</html>