<html>
    <head>
        <title>php</title>
</head>
<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$success = false;
	$db = new mysqli("localhost", "root", "", "developers");
	if($db->connect_error){
		die("Connection failed: ".$db->connect_error);
	}
	$stmt = $db->prepare("INSERT INTO users(name, email, password) VALUES(?, ?, ?)");
	$stmt->bind_param("sss", $name, $email, $password);
	$stmt->execute();
	if($stmt->affected_rows > 0){
		$success = true;
	}
	echo $success ? "success" : "failed";
?>
</html>