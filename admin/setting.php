<?php 
	session_start();
	if (!isset($_SESSION['login'])) {
		header('location:./login.php');
	}

	require_once 'header.php';
	require_once '../config.php';
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
		<h1 class="badge text-bg-dark mt-3 px-3 py-2">تنظیمات</h1>

		<form action="" method="post" id="form">
			<div class="form-floating mb-4">
				<input maxlength="100" autofocus required type="text"
				class="form-control" name="title" id="title"
				placeholder="name@example.com" value="<?= $row['title'] ?>">
				<label for="username">عنوان سایت</label>
			</div>
			چینش صفحه:
			<select class="form-select mb-4" id="dir" name="dir">
				<option <?= $row['dir'] == 'rtl' ? 'selected' : '' ?> value="rtl">راست به چپ</option>
				<option <?= $row['dir'] == 'ltr' ? 'selected' : '' ?> value="ltr">چپ به راست</option>
			</select>
			<div class="form-floating mb-4">
				پیغام مدیر:<br>
				<textarea id="message" class="tinymce" name="message"><?= $row['user_message'] ?></textarea>
			</div>
			<div id="res"><?= $alert ?></div>
			<div class="text-center mb-1">
				<button type="submit" class="btn btn-success" name="save">ثبت تغییرات</button>
			</div>
		</form>
	</div>
	<script>
		function loadSetting() {
			$.ajax({
				url: 'load_setting.php',
				type: 'GET',
				dataType: 'json',

				success: function(result) {
					console.log(result);
				},
				error: function(result) {
					console.log(result);
				}
			});
		}

		$('#form').on('submit', function(e) {
			e.preventDefault();
			const settings = {
				title: $('#title').val(),
				dir: $('#dir').val(),
				message: tinymce.get('message').getContent()
			};

			$.ajax({
				url: 'change_setting.php',
				type: 'POST',
				data: settings,

				success: function(response) {
					if (response.result != null) {
						$(`#res`).html(`<div class="alert alert-success text-center">تنظیمات با موفقیت اصلاح شد.</div>`);
					}
					else {
						$(`#res`).html(`<div class="alert alert-danger text-center">مشکلی در اصلاح تنظیمات به وجود آمد.</div>`);
					}
					loadSetting();
 				},
				error: function(response) {
					$(`#res`).html(`<div class="alert alert-danger text-center">مشکلی در اصلاح تنظیمات به وجود آمد.</div>`);
				}
			});

			document.ready(function() {
				loadSetting();
			});
		});
	</script>
</body>
</html>