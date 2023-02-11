<!Doctype html>
<html>
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="../allusers.css">

<title>Handicrafts collection</title>

<div class="topnav">
    <a class="active" href="./index2.php">Home</a>
    <a href="./about.html">About</a>
    <a href="./products.php">Products</a>
    <a href="./news.html">News</a>
    <a href="./login.html">Contact</a>
    <a href="./users.html">Users</a>
    <h1 class="company">Online Handicrafts Gallery</h1>

</div>

<br><br>
<h1>Users of our website</h1>
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

extract($_POST);

$sql = "SELECT * FROM " . "UserProfile";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo '<table id="customers">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Home Address</th>
    <th>Home Phone</th>
    <th>Cell Phone</th>
  </tr>
  ';

    while ($row = $result->fetch_assoc()) {
        echo '
    <tr>
    <td>' . $row["firstName"] . ' ' . $row["lastName"] . '</td>' .
            '<td>' . $row["email"] . '</td>' .
            '<td>' . $row["homeAddress"] . '</td>' .
            '<td>' . $row["homePhone"] . '</td>' .
            '<td>' . $row["cellPhone"] . '</td>
    </tr>';
    }
} else {
    echo "<h1>No users registered</h1>";
}
echo "</table> <hr class='solid'/> <br><br>";

?>

<div class="row people">
<h1 class="text-center">Users from Roshan's Electron website</h1>
<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    $cURLConnection = curl_init();

    //replace the URL
    curl_setopt($cURLConnection, CURLOPT_URL, 'http://roshanchokshi.000webhostapp.com/users.php');
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $userList = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    $jsonArrayResponse = json_decode($userList);
    echo '<table id="customers">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Home Address</th>
    <th>Home Phone</th>
    <th>Cell Phone</th>
  </tr>
  ';
  
   foreach ($jsonArrayResponse as $user) {
        echo '
    <tr>
    <td>' . $user->firstname . ' ' . $user->lastname . '</td>' .
            '<td>' . $user->email . '</td>' .
            '<td>' . $user->homeaddress . '</td>' .
            '<td>' . $user->homephone . '</td>' .
            '<td>' . $user->cellphone . '</td>
    </tr>';
    }
    echo "</table> <hr class='solid'/> <br><br>";
?>


<div class="row people">
<h1 class="text-center">Users from Hanyu's's Fishtecho website</h1>
<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    $cURLConnection = curl_init();
     
 //replace the URL
    curl_setopt($cURLConnection, CURLOPT_URL, 'https://fishtecho.com/html/json_users.php');
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $userList = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    
    $jsonArrayResponse = json_decode($userList);
    echo '<table id="customers">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Home Address</th>
    <th>Home Phone</th>
    <th>Cell Phone</th>
  </tr>
  ';
  
   foreach ($jsonArrayResponse as $user) {
        echo '
    <tr>
    <td>' . $user->fname . ' ' . $user->lname . '</td>' .
            '<td>' . $user->email . '</td>' .
            '<td>' . $user->address . '</td>' .
            '<td>' . $user->hphone . '</td>' .
            '<td>' . $user->cphone . '</td>
    </tr>';
    }
    echo "</table>";
?>

</html>