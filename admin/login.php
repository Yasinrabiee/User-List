<?php 
	session_start();
	$usernames = ['yasin', 'yashar', 'maedeh'];
	$passwords = ['root', '123'];
	$alert = '';

	if (isset($_POST['login'])) {
		if (in_array($_POST['username'], $usernames) && 
		in_array($_POST['password'], $passwords))
		{
			$_SESSION['login'] = 'admin:123';
			$alert = '<div class="alert alert-success">در حال وارد شدن به سیستم هستید...</div>';
			header ('refresh:1; url=./');
		} 
		else 
		{
			$alert = '<div class="alert alert-danger">نام کاربری یا رمز عبور اشتباه است...</div>';
		}
	}
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../themes/css/bootstrap.rtl.min.css">
	<link rel="stylesheet" href="../themes/css/style.css">
	<title>Login | ورود به سیستم</title>
</head>
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