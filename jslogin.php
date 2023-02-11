<?php
session_start();
require_once('includes/dbconnect.php');

echo 'Helloooooo!!!';
$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM user_table WHERE email = ? AND password = ? LIMIT 1";
$stmtselect  = $conn->prepare($sql);
$result = $stmtselect->execute([$username, $password]);

if($result){
	$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0){
		$_SESSION['userlogin'] = $user;
		echo '1';
	}else{
		echo 'There no user for that combo';		
	}
}else{
	echo 'There were errors while connecting to database.';
}
?>