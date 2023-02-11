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

extract( $_POST);

if ($select == "Name") {
  $col = "firstName";
} else if ($select == "Email") {
  $col = "email";
} else if ($select == "Phone") {
  $col = "cellPhone";
}

$sql = "SELECT * FROM " . "UserProfile" . " where " . $col . "=" . "'$keyWord'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Name: " . $row["firstName"]. " " . $row["lastName"]. " <br>Email: " . $row["email"] . " <br>Home Address: " . $row["homeAddress"] . "<br>Home Phone: " . $row["homePhone"] . "<br> Cell Phone: " . $row["cellPhone"];
    echo "<br>";
  }
} else {
  echo "0 results";
}

?>