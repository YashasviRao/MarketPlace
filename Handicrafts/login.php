<?php 
extract( $_POST);

$username = "admin";
$password = "admin";

if ($USERNAME == $username and $PASSWORD == $password) {
    header("Location: contacts.php");
}
else {
    echo "<h1> Authentication failed!</h1>";
}
?>