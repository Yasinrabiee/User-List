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

		<h1 class="badge text-bg-dark mt-3 px-3 py-2">لیست کاربران</h1>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">نام کاربری</th>
						<th scope="col">گذرواژه</th>
						<th scope="col">ایمیل</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody id="records">
					
				</tbody>
			</table>
		</div>
		<script>
			function loadUsers() {
				$.ajax({
					url: 'load_users.php',
					type: 'GET',
					dataType: 'json',

					success: function (users) {
						console.log(users);
						$(`#records`).empty();
						$.each(users, function (index, user) {
							$('#records').append(`
							<tr>
								<th scope="row">${user.id}</th>	
								<td>${user.username}</td>	
								<td>${user.password}</td>	
								<td>${user.email}</td>	
								<td class='text-center'>
									<buuton class="btn btn-danger delete" name="id" data-id=${user.id}>حذف</buuton>
									<buuton class="btn btn-success delete" name="id" data-id=${user.id}>ویرایش</buuton>
								</td>	
							</tr>
							`);
						});
					},

					error: function () {
						alert('خطا در بارگذاری کاربر‌ها');
					}
				});
			}

			$(document).on('click', '.delete',function(event) {
				event.preventDefault();
				let recordId = $(this).data('id');
				
				$.ajax({
					url: 'delete_user.php',
					type: 'POST',
					data: {id: recordId},

					success: function (res) {
						loadUsers();
					},

					error: function (res) {
						console.log('error');
						loadUsers();
					}
				});
			});

			$(document).ready(function() {
				loadUsers();
			});
		</script>
</body>
</html>