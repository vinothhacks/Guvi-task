<html>
<head>
    <title>php</title>
</head>
<?php
$email = $_POST['email'];
$password = $_POST['password'];
$success = false;
$db = new mysqli("localhost", "root", "", "developers");
if($db->connect_error){
    die("Connection failed: ".$db->connect_error);
}
$stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){
    $success = true;
    $row = $result->fetch_assoc();
    $data = json_encode($row);
    $redis =new Redis();
    $redis->connect("localhost", 6379);
    $redis->set("session", $data);
    $redis->close();
    setcookie("session_token", $data, time() + (86400 * 30));
    $_SESSION['session_token'] = $data;
}
echo $success ? "success" : "failed";
?>
</html>