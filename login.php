<?php 
	session_start();
	require_once 'config.php';

	$alert = '';

	if (isset($_POST['login'])) {
		$username = $_POST['username']; 
		$password = $_POST['password']; 

		$sql = "SELECT * FROM uuu_user WHERE username = '$username'
		AND pass = '$password'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$_SESSION['login'] = "$username:$password";
			$alert = '<div class="alert alert-success">در حال وارد شدن به سیستم هستید...</div>';
			header ('refresh:1; url=./');
		}
		else {
			$alert = '<div class="alert alert-danger">نام کاربری یا گذرواژه اشتباه است...</div>';
		}

		// $conn->close();
	}

	require_once 'header.php';
?>
<body>
	<form action="" autocomplete="off" method="post" class="form-signin w-100 m-auto">
		<br>	
		<div class="form-floating">
			<input type="text" class="form-control" name="username"
			id="username" placeholder="example.com" autofocus>
			<label for="username">نام کاربری</label>
		</div>
		<div class="form-floating">
			<input type="password" class="form-control" dir="ltr"
			name="password" id="password" placeholder="Password">
			<label for="password">رمز عبور</label>
		</div>

		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox"
			id="remember">
			<label class="form-check-label" for="remember">
			مرا به خاطر بسپار</label>
		</div>

		<div><?php echo $alert; ?></div>
		<button class="btn btn-primary w-100 py-2" type="submit" name="login">ورود به سیستم</button>
		<div class="d-grid">
			<a href="signin.php" class="btn btn-outline-primary w-100 py-2 mt-2" type="submit" name="login">ثبت نام</a>
		</div>
	</form>
</body>
</html>