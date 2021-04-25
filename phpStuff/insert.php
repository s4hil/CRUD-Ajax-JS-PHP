<?php
	
	include 'conn.php';

	$raw_data = file_get_contents("php://input");

	$data = json_decode($raw_data, true);
	$id = null;
	$id = $data['id'];
	$name = $data['name'];
	$email = $data['email'];
	$password = $data['password'];

	$checkDublicateSql = "SELECT * FROM `users` WHERE `id` = {$id}";

	$execDubSql = mysqli_query($conn, $checkDublicateSql);

	if ($execDubSql) {
		$sql = "UPDATE `users` SET `name`= '$name',`email`= '$email',`password`= $password WHERE `id`={$id}";
		$res = mysqli_query($conn, $sql);
		if ($res) {
			echo "User Updated";
		}
		else {
			echo "Couldn't Update";
		}
	}

	else{
		$sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
		$res = mysqli_query($conn, $sql);
		if ($res) {
			echo "Data Saved";
		}
		else {
			echo "Not Saved";
		}
	}
?>