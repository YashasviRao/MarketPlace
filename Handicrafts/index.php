<?php
if (!isset($_COOKIE['recently_viewed'])) {
  $recently_viewed = array();
  setcookie("recently_viewed", json_encode($recently_viewed), time() + 3600, '/');
  setcookie("Test-Cookie", "Hello world");
  echo "Array in cookie being set";
}
?>

<!Doctype html>
<html>

<head>
  <link rel="stylesheet" href="./style.css">
  <title>Handicrafts collection</title>
</head>

<body>

  <div class="topnav">
    <a class="active" href="./index2.php">Home</a>
    <a href="./about.html">About</a>
    <a href="./products.php">Products</a>
    <a href="./news.html">News</a>
    <!-- <a href="./login.html">Contact</a>
    <a href="./users.html">Users</a> -->
    <h1 class="company">Online Handicrafts Gallery</h1>

  </div>

  <img id="img1" src="./images/home_img.png" />

  <h1>Buy Original Handicrafts Online on our websites</h1>

</body>

</html>