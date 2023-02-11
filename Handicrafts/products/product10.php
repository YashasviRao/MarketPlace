<?php
if (!isset($_COOKIE['recently_viewed'])) {
  $recently_viewed = array();
  setcookie("recently_viewed", json_encode($recently_viewed), time() + 60 * 60 * 24 * 30, '/');  //1 day expiry
}

$arr = json_decode($_COOKIE['recently_viewed'], true);
$title = "City sight 9031 Painting";
if (($key = array_search($title, $arr)) !== false) {
  unset($arr[$key]);
  array_unshift($arr, $title);
  setcookie("recently_viewed", json_encode($arr), time() + 3600, '/');
} else {
  $len = count($arr);
  if ($len < 5) {
    array_unshift($arr, $title);
    setcookie("recently_viewed", json_encode($arr), time() + 3600, '/');
  } else {
    array_pop($arr);
    array_unshift($arr, $title);
    setcookie("recently_viewed", json_encode($arr), time() + 3600, '/');
  }
} ?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../style.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

<title>Handicrafts collection</title>

<div class="topnav">
  <a href="../index2.php">Home</a>
  <a href="../about.html">About</a>
  <a class="active" href="../products.php">Products</a>
  <a href="../news.html">News</a>
  <!-- <a href="./login.html">Contact</a>
  <a href="./users.html">Users</a> -->
  <h1 class="company">Online Handicrafts Gallery</h1>
</div>

<div>
  <div class="container overview">
    <div class="row" style="margin-top: 20px">
      <div class="col-auto">
        <img src="../images/img10.png" alt="img" style="max-width: 700px" />
      </div>
      <div class="col-md-4 block">
        <h2 class="paintingtitle">City sight 9031 Painting</h2>
        <h3 class="author">Rishikesh Kamat</h3>
        <h4>India</h4>
        <h4 class="paintingtype">Craft work</h4>
        <h4>Size: 30 W x 24 H x 1.5 D in</h4>

        <h4 class="price">$ 2,500</h4>
        <h4>Buy now</h4>
        <h4 style="margin-top: 30px">7 day money back guarantee</h4>
      </div>
    </div>
  </div>
</div>

</html>