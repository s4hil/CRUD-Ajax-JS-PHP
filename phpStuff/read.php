<?php
	include 'conn.php';
	$sql = "SELECT * FROM `users`";
	
	$res = mysqli_query($conn, $sql);
	$data = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$data[] = $row;
	}

	echo json_encode($data);
?>