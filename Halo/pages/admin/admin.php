

<!DOCTYPE html>
<html>

<head>
  <!-- <link rel="stylesheet" href="jquery-ui.min.css"> -->
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Permanent+Marker" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../../lib/materialize/css/materialize.min.css" media="screen,projection" />
  <!-- My CSS -->
  <link type="text/css" rel="stylesheet" href="../../css/comms.css" />
  <link type="text/css" rel="stylesheet" href="../../pages/about/about.css" />
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <?php include '../../nav/nav-standard.php';?>

  <div class="container">
    <h4 class="my-title text-center">Admin Corner</h4>
      <?php
        session_start();
        if (!isset($_SESSION['is-logged-in'])) {
          ?>
            <form name="login-form" method="post" action="auth.php">
              <div class="row">
                <input class="input-field col s12" type="text" name="user">
                <input class="input-field col s12" type="password" name="pass">
                <button class="btn col s12" name="btn-login">Login</button>
              </div>
            </form>
          <?php
        } else {
          ?>
          <ul class="collection">
            <?php
            $myfile = fopen("../../assets/contacts-admin.txt", "r") or die("Unable to open file!");
            while (!feof($myfile)) {
              $arr = explode(",", fgets($myfile));
            ?>
              <li class="collection-item avatar">
                <i class="material-icons circle">folder</i>
                <span class="title"><?php echo $arr[0] ?></span>
                <p><?php echo $arr[1] ?><br>
                  <?php echo $arr[2] ?>
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
              </li>
            <?php
            }
            fclose($myfile);
            ?>
          </ul>
          <form name="logout-form" method="post" action="auth.php">
            <button class="btn" name="btn-logout">Logout</button>
          </form>
          <?php
        }
      ?>
  </div>

  <!-- <script src="external/jquery/jquery.js"></script>
  <script src="jquery-ui.min.js"></script> -->
  <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
</body>

</html>