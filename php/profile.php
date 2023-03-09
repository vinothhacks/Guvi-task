<?php
	$age = $_POST['age'];
	$dob = $_POST['dob'];
	$contact = $_POST['contact'];
	$success = false;
	$data = $_COOKIE['session_token'];
	$redis = new Redis();
	$redis->connect("localhost", 6379);
	$user_data = json_decode($redis->get("session"));
	$redis->close();
	$db = new mysqli("localhost", "root", "", "developers");
	if($db->connect_error){
		die("Connection failed: ".$db->connect_error);
	}
	$stmt = $db->prepare("INSERT INTO profile(user_id, age, dob, contact) VALUES(?, ?, ?, ?)");
	$stmt->bind_param("isss", $user_data->id, $age, $dob, $contact);
	$stmt->execute();
	if($stmt->affected_rows > 0){
		$success = true;
	}
	echo $success ? "success" : "failed";
?>