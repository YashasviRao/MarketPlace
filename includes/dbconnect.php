<?php
    $servername = "us-cdbr-east-06.cleardb.net";
    $username = "b247cab74118de";
    $password = "644d254a";
    $dbname = "heroku_09b5d839a699ae8";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>