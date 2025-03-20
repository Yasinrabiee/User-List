<?php 
	session_start();
	require_once '../config.php';
	
	$alert = '';

	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM uuu_admin WHERE username = '$username'
		AND pass = '$password' ";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			$_SESSION['login'] = $username . ':' . $password;
			$alert = '<div class="alert alert-success">در حال وارد شدن به سیستم هستید...</div>';
			header ('refresh:1; url=./');
		}
		else {
			$alert = '<div class="alert alert-danger">نام کاربری یا رمز عبور اشتباه است...</div>';
		}
	}
	require_once 'header.php';
?>
<body>
	<form action="" autocomplete="off" method="post" class="form-signin w-100 m-auto">
		<br>	
		<div class="form-floating">
			<input type="text" class="form-control" name="username"
			id="floatingInput" placeholder="name@example.com" autofocus>
			<label for="floatingInput">نام کاربری</label>
		</div>
		<div class="form-floating">
			<input type="password" class="form-control" dir="ltr"
			name="password" id="floatingPassword" placeholder="Password">
			<label for="floatingPassword">رمز عبور</label>
		</div>

		<div class="form-check form-switch">
		  <input class="form-check-input" type="checkbox"
		  id="flexSwitchCheckDefault">
		  <label class="form-check-label" for="flexSwitchCheckDefault">
		  مرا به خاطر بسپار</label>
		</div>

		<div><?php echo $alert; ?></div>
		<button class="btn btn-primary w-100 py-2" type="submit" name="login">ورود به سیستم</button>
	</form>
</body>
</html>