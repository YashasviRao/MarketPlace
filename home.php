<?php
   include('includes/session.php');
   echo $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The MarketPlace!</title>
</head>
<body>
    <a href="index.php">Home</a>
    <a href="travel/index.php">Travel</a>
    <a href="Halo/index.html">Halo</a>
    <a href="Handicrafts/index.php">Handicraft</a>

    <h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>