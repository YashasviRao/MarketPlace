<?php
    $servername = "us-cdbr-east-06.cleardb.net";
    $username = "b247cab74118de";
    $password = "644d254a";
    $dbname = "heroku_09b5d839a699ae8";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    echo "conected!";
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $myusername = mysqli_real_escape_string($conn,'admin@admin.com');
    $mypassword = sha1(mysqli_real_escape_string($conn,'admin')); 
    
    echo $myusername;
    echo $mypassword;

    $sql = "SELECT id FROM `user_table` WHERE email = '$myusername' AND password = '$mypassword'";
    echo $sql;
    $result = mysqli_query($conn,$sql);

    //echo $result;
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //echo $row;
    $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    echo $count;

    if($count == 1) {
        header("location: test.php");
    }
?>