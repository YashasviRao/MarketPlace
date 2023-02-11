<!Doctype html>
<html>
    
<link rel="stylesheet" href="./style.css">

<div class="topnav">
  <a href="./index2.php">Home</a>
  <a href="./about.html">About</a>
  <a href="./products.php">Products</a>
  <a href="./news.html">News</a>
  <!-- <a class="active" href="./contacts.php">Contact</a>
  <a href="./users.html">Users</a> -->
  <h1 class="company">Online Handicrafts Gallery</h1>
</div>

<?php

$file = fopen("Contacts.txt","r");
$listPhones = array();

while(! feof($file))
  {
    array_push($listPhones, fgets($file));
  }
fclose($file);

echo '<ul>';
    echo '<li>' . implode( '</li><li>', $listPhones) . '</li>';
echo '</ul>';

?>

</html>