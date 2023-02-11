<?php
require_once('includes/dbconnect.php');
?>
<?php

if(isset($_POST)){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	$password = sha1($_POST['password']);
    $city = $_POST['city'];

    // $sql = "INSERT INTO user_table (name, password, email, city, mobile) 
    //         VALUES ('$name', '$password', '$email', '$city', '$phonenumber')";
        
    // if ($conn->query($sql) === TRUE) {
    //     echo "New record created successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    $sql = "INSERT INTO user_table (name, password, email, city, mobile) VALUES(?,?,?,?,?)";
    $stmtinsert = $conn->prepare($sql);
    $result = $stmtinsert->execute([$name, $password, $email, $city, $phonenumber]);
    if($result){
        echo 'Successfully saved.';
    }else{
        echo 'There were erros while saving the data.';
    }
}else{
	echo 'No data';
}