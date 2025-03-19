<?php
	require_once '../config.php';

	$sqlSettings = "SELECT title, user_message, dir FROM uuu_setting";

	$resultSettings = $conn->query($sqlSettings);

    $row = $resultSettings->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en" dir="<?= $row['dir'] ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $row['title'] ?></title>
	<link rel="stylesheet" href="../themes/css/bootstrap.rtl.min.css">
	<link rel="stylesheet" href="themes/css/style.css">
	<script src="../themes/js/jquery.min.js"></script>
	<script src="themes/js/tinymce.min.js"></script>
	<script>  
		tinymce.init({
	    	selector: '.tinymce',
	    	plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
	    	toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
			directionality: 'rtl',
			// content_style: 'body { font-family: Mikhak; }'
	    });
	</script>
</head>
