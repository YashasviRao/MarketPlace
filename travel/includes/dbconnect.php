<?php
    $servername = "us-cdbr-east-06.cleardb.net";
    $username = "b35570cc17a7ee";
    $password = "32f00a0e";
    $dbname = "heroku_b57fa1065fc587c";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>