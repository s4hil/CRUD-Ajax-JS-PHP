<?php
	
	include 'conn.php';

	$rawdata = file_get_contents("php://input");
	$data = json_decode($rawdata, true);
	$id = $data['uid'];

	$sql = "DELETE FROM `users` WHERE `id` = {$id}";
	$res = mysqli_query($conn, $sql);
	if ($res) {
		echo "Record Deleted!";
	}
	else{
		echo "Not deleted";
	}
?>