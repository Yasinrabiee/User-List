<?php 
	session_start();
	require_once '../config.php';
	if (!isset($_SESSION['login'])) {
		header('location:./login.php');
	}

	$userPass = explode(':', $_SESSION['login']);
	$username = $userPass[0];
	$password = $userPass[1];

	require_once 'header.php';
	// print_r($_SESSION);
?>
<body>
	<div id="container" class="rounded-4">

		<div class="d-flex">
			<div class="badge d-flex align-items-center p-2 pe-3 text-light-emphasis bg-light-subtle border border-light-subtle rounded-pill">
				خروج
				<span class="vr mx-2"></span>
				<a href="logout.php">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left text-danger" style="cursor: pointer;" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
						<path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
					</svg>
				</a>
				<!-- img/avatar -->
			</div>
		</div>

		<div class="text-center">
			<span class="alert alert-success text-center mt-3" style="display: inline-block;">مدیر محترم به پنل مدیریت سیستم خوش آمدید.</span>
		</div>

		<div id="menu" class="d-flex mb-5 mt-5 flex-wrap gap-5 justify-content-evenly">
			<a href="users.php" class="badge bg-info-subtle py-3 px-5 border border-info-subtle text-info-emphasis rounded-pill">لیست دانشجویان</a>
			<a href="setting.php" class="badge bg-warning-subtle py-3 px-5 border border-warning-subtle text-warning-emphasis rounded-pill">تنظیمات</a>
			<button data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" class="badge bg-dark-subtle py-3 px-5 border border-dark-subtle text-dark-emphasis rounded-pill">تغییر رمز عبور</button>
			<a href="" class="badge bg-primary-subtle py-3 px-5 border border-primary-subtle text-primary-emphasis rounded-pill">اضافه کردن مدیر</a>
			<a href="" class="badge bg-danger-subtle py-3 px-5 border border-danger-subtle text-danger-emphasis rounded-pill">اضافه کردن دانشجو</a>
		</div>

		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">تغییر رمز عبور</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="" method="post" id="changePassForm">
						<div class="modal-body">
								<div class="mb-3">
									<label for="oldPass" class="col-form-label">رمز عبور فعلی<span class="text-danger">*</span>:</label>
									<input dir="ltr" type="text" name="oldPass" class="form-control" id="oldPass">
								</div>
								<div class="mb-3">
									<label for="newPass" class="col-form-label">رمز عبور جدید<span class="text-danger">*</span>:</label>
									<input dir="ltr" type="password" id="newPass" name="newPass" class="form-control" id="message-text">
								</div>
								<div id="res" class="text-center mt-3">
									
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
								<button type="submit" name="changePass" class="btn btn-primary">ثبت تغییرات</button>
							</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="badge bg-info-subtle py-2 border border-info-subtle text-info-emphasis rounded-pill mt-2 mb-2">پیغام های شما برای کاربران:</div>
		<div><?= $row['user_message'] ?></div>
	</div>

	<script>
		$('#changePassForm').submit(function(event) {
			event.preventDefault();
			const formData = {
				username: '<?= $username ?>',
				password: '<?= $password ?>',
				oldPass: $('#oldPass').val(),
				newPass: $('#newPass').val()
			}
			// console.log(formData); dir="ltr"
			$.ajax({
				url: 'change_pass.php',
				type: 'POST',
				data: formData,

				success: function(response) {
					$('#res').html(response.alert);
					$('#oldPass').val('');
					$('#newPass').val('');
				},
				error: function(response) {
					$('#res').html('<div class="alert alert-danger">مشکلی در اتصال به سرور به وجود آمد.</div>');
				}
			});
		});
	</script>
</body>
</html>