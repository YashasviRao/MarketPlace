<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>

Congratulation! You have logged into password protected page. <a href="logout.php">Click here</a> to Logout.

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<p>List of Users for this Web App:</p>
	<div class="contact-infos">
		<ul>
			<?php 
				$myfile = fopen("users.txt", "r") or die("Unable to open file!");
				// Output one line until end-of-file
				while(!feof($myfile)) {
					echo '<li>' . fgets($myfile) . '</li>';
				}
				fclose($myfile);
			?>
		</ul>
	</div>
</body>
</html>