<?php
   include('includes/session.php');
?>
<!DOCTYPE html>
<html>
<header>
	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<div class="topnav">
	<a href="./index.php">Home</a>
	</div>
</header>
<body>
<?php

//UPDATE review set name = 'admin' where id = 14;
	extract($_GET);

	$select_review_sql = "SELECT * FROM review WHERE name = "."'".$username."' ". "AND item = "."'".$product_name."'";
	if ( !( $result = mysqli_query($conn, $select_review_sql))) {
		print("Could not execute query! <br />");
		die();
	}

	if (mysqli_num_rows($result) !== 0) {
		print("You have already submitted a review of this item. <br />");
		echo '<a href="./index.php"><button>Check out more of our products!</button></a>';
		die();
	}
	else {
		$insert_review_sql = "INSERT INTO review (name, item, content) VALUES ("."'".$username."', "."'".$product_name."', "."'".$review."'".")";
		if ( !( $result = mysqli_query($conn, $insert_review_sql))) {
			print("Could not execute query 1! <br />");
			die();
		}
	}


	$select_rating_sql = "SELECT id, numvotes, score FROM rating WHERE item = '".$product_name."'";
	if ( !( $result = mysqli_query($conn, $select_rating_sql))) {
		print("Could not execute query! <br />");
		die();
	}

	$assigned_rating = 0.0;
	if ($ratings == "one")
		$assigned_rating = 1.0;
	if ($ratings == "two")
		$assigned_rating = 2.0;
	if ($ratings == "three")
		$assigned_rating = 3.0;
	if ($ratings == "four")
		$assigned_rating = 4.0;
	if ($ratings == "five")
		$assigned_rating = 5.0;

	if (mysqli_num_rows($result) == 0) {
		$insert_rating_sql = "INSERT INTO rating (item, siteholder, numvotes, score) VALUES ("."'".$product_name."', "."'".$company_name."', 1, '".$assigned_rating."'".")";
		if ( !( $result = mysqli_query($conn, $insert_rating_sql))) {
            print("Could not execute query 22! <br />");
            die();
        }
	}
	else {
		foreach ($result as $x) {
			$id = $x['id'];
			$numvotes = $x['numvotes'];
			$current_score = $x['score'];
		  }
		$update_rating_sql = "UPDATE rating set numvotes = ?, score = ? where item = ?;";
		$stmt = $conn->prepare($update_rating_sql);
		$numvotes = $numvotes + 1;
		$new_score = round((($current_score * ($numvotes-1)) + $assigned_rating) / $numvotes, 2);
		$stmt->bind_param("ids", $numvotes, $new_score, $product_name);
		$stmt->execute();
		echo mysqli_error($conn)."<br>";
		$stmt->close();

	}

	echo "<h2>Thank you! Your review and rating have been successfully submitted!</h2>";
	echo '<a href="./index.php"><button>Check out more of our products!</button></a>';


?>