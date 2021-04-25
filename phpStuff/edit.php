<?php
	include 'conn.php';
	
	$rawData = file_get_contents("php://input");
	$data = json_decode($rawData, true);
	$id = $data['uid'];

	$sql = "SELECT * FROM `users` WHERE `id` = {$id}";
	$res = mysqli_query($conn, $sql);
	$user = mysqli_fetch_array($res);

	echo json_encode($user);
	
?>