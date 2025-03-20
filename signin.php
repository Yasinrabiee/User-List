<?php 
	require_once 'header.php';
?>
<body>
	<form action="" method="post" autocomplete="off" class="w-100 m-auto" style="max-width: 330px;" id="form">	
		<br>
		<div class="form-floating mb-2">
			<input dir="ltr" maxlength="50" autofocus required type="text" class="form-control" name="username" id="username" placeholder="name@example.com">
			<label for="username">نام کاربری</label>
		</div>
		<div class="form-floating mb-2">
			<input dir="ltr" maxlength="50" required type="password" class="form-control" name="password" id="password" placeholder="Password">
			<label for="password">گذرواژه</label>
		</div>
		<div class="form-floating mb-2">
			<input maxlength="50" type="text" class="form-control" dir="ltr" name="email" id="email" placeholder="Password">
			<label for="email">ایمیل</label>
		</div>
		<div id="res"></div>
		<button class="btn btn-primary w-100 py-2" type="submit" name="save">ثبت نام</button>
		<div class="d-grid">
			<a href="login.php" class="btn btn-outline-primary py-2 mt-2">ورود به سیستم</a>
		</div>
	</form>
	
	<script>
		$(`#form`).submit(function(event) {
			event.preventDefault();
			const formData = {
				username: $(`#username`).val(),
				password: $(`#password`).val(),
				email: $(`#email`).val()
			}
			
			$.ajax({
				url: 'add_user.php',
				type: 'POST',
				data: formData,
				success: function (response) {
					if (response.error != null) {
						$(`#res`).html(`<div class="alert alert-danger">این نام کاربری قبلا انتخاب شده است...</div>`);
					}
					else {
						$(`#res`).html(`<div class="alert alert-success">کاربر با موفقیت اضافه شد.</div>`);
					}
				},
				error: function (response) {
					$(`#res`).html(`<div class="alert alert-danger">مشکلی در اضافه کردن کاربر به وجود آمد...</div>`);
				}
			});
		});
	</script>
</body>
</html>