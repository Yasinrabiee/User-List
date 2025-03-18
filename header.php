<?php
	require_once 'config.php';

	$sqlSettings = "SELECT title, user_message, dir FROM uuu_setting";

	$resultSettings = $conn->query($sqlSettings);

    $row = $resultSettings->fetch_assoc();
	$conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="<?= $row['dir'] ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $row['title'] ?></title>
	<script src="themes/js/jquery.min.js"></script>
	<link rel="stylesheet" href="themes/css/bootstrap.rtl.min.css">
	<link rel="stylesheet" href="themes/css/style.css">
</head>