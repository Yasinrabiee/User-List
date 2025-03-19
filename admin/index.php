<?php 
session_start();
if (!isset($_SESSION['login'])) {
	header('location:./login.php');
}

require_once 'header.php';
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

		<div id="menu" class="d-flex mb-5 mt-5 flex-wrap gap-3 justify-content-evenly">
			<a href="users.php" class="badge bg-info-subtle py-3 px-5 border border-info-subtle text-info-emphasis rounded-pill">لیست کاربران</a href="">
			<a href="setting.php" class="badge bg-warning-subtle py-3 px-5 border border-warning-subtle text-warning-emphasis rounded-pill">تنظیمات</a href="">
			<a href="" class="badge bg-dark-subtle py-3 px-5 border border-dark-subtle text-dark-emphasis rounded-pill">تغییر رمز عبور</a href="">
		</div>
		
		<div class="badge bg-info-subtle py-2 border border-info-subtle text-info-emphasis rounded-pill mt-2 mb-2">پیغام های شما برای کاربران:</div>
		<div><?= $row['user_message'] ?></div>
	</div>
</body>
</html>