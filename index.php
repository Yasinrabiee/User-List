<?php 
	require_once 'header.php';
?>
<body>
	<form action="" method="post" autocomplete="off" class="w-100 m-auto" style="max-width: 330px;" id="form">	
		<br>
		<div class="form-floating">
			<input maxlength="50" autofocus required type="text" class="form-control" name="fname" id="fname" placeholder="name@example.com">
			<label for="fname">نام</label>
		</div>
		<div class="form-floating">
			<input maxlength="50" required type="text" class="form-control" name="lname" id="lname" placeholder="Password">
			<label for="lname">نام خانوادگی</label>
		</div>
		<div class="form-floating">
			<input maxlength="50" required type="text" class="form-control" dir="ltr" name="email" id="email" placeholder="Password">
			<label for="email">ایمیل</label>
		</div>
		<div id="res"></div>
		<button class="btn btn-primary w-100 py-2" type="submit" name="save">ذخیره</button>
	</form>
	
	<script>
		$(`#form`).submit(function(event) {
			event.preventDefault();
			const formData = {
				fname: $(`#fname`).val(),
				lname: $(`#lname`).val(),
				email: $(`#email`).val()
			}
			
			$.ajax({
				url: 'add_user.php',
				type: 'POST',
				data: formData,
				success: function (res) {
					$(`#res`).html(`<div class="alert alert-success">کاربر با موفقیت اضافه شد.</div>`);
				},
				error: function (res) {
					$(`#res`).html(`<div class="alert alert-danger">مشکلی در اضافه کردن کاربر به وجود آمد...</div>`);
				}
			});
		});
	</script>
</body>
</html>