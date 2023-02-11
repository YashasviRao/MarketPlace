<?php
$servername = "localhost";
$username = "root";
$password = "admin220";
$dbname = "mysql";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

extract( $_POST);

$sql = "INSERT INTO UserProfile (firstName, lastName, email, homeAddress, homePhone, cellPhone) VALUES('$FIRSTNAME', '$LASTNAME', '$EMAIL', '$HOMEADDRESS', '$HOMEPHONE', '$CELLPHONE')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>