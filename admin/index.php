<?php 
	session_start();
	if (!isset($_SESSION['login'])) {
		header('location:./login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>admin</title>
	<link rel="stylesheet" href="../themes/css/bootstrap.rtl.min.css">
	<link rel="stylesheet" href="../themes/css/style.css">
	<script src="../themes/js/jquery.min.js"></script>
</head>
<body>
	<div style="width: 300px; margin-block-start: 8px; margin-inline-start: 10px;">	
	<table class="table table-striped">
		<thead>
		  	<tr>
				<th scope="col" class="table-danger">ID</th>
				<th scope="col" class="table-danger">FName</th>
				<th scope="col" class="table-danger">LName</th>
				<th scope="col" class="table-danger">Email</th>
			</tr>
		</thead>
		<tbody id="records">
			
		</tbody>
	</table>

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
							<th>${user.fname}</th>	
							<th>${user.lname}</th>	
							<th>${user.email}</th>	
							<th><buuton class="btn btn-danger delete" name="id" data-id=${user.id}>Delete</buuton></th>	
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

	<a href="logout.php" class="btn btn-warning">Logout</a>
</body>
</html>