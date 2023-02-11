<?php
   include('includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>APY MarketPlace!</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Righteous&display=swap" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="header_main">
            <div class="mobile_menu">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <div class="logo_mobile"><a href="index.html"><img src="images/logo.png"></a></div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="most_viewed.php">Most Viewed</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="top_services.php">Top Services</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="reviews.php">Add a Review</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " href="login.php">Login/Register</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " href="logout.php">Logout</a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
            <div class="container-fluid">
               <div class="menu_main">
                  <ul>
                     <li><a href="index.php">Home</a></li>
                     <li><a href="most_viewed.php">Most Viewed</a></li>
                     <li class="active"><a href="top_services.php">Top Services</a></li>
                     <li><a href="reviews.php">Add a Review</a></li>
                     <li><a href="login.php">Login/Register</a></li>
                     <li><a href="logout.php">Logout</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <h1 class="banner_taital">APY MarketPlace</h1>
                        <p class="banner_text">Welcome to our website. This marketplace offer 3 services: tour packages, handicrafts and halographic products!</p>
                        <br>
                        <p class="banner_text">Welcome <?php echo $username; ?>!</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container-fluid">
            <div>
                <h2>Trending Services/Products</h2>
                <h5>Below are some of our top vendors and their top services/products. Check them out! </h5>
                <?php 

                        $sql = "SELECT item, score FROM(SELECT item, score FROM rating WHERE siteholder='Tour')a
                                ORDER BY score DESC LIMIT 5";
                        $sql2 = "SELECT item, score FROM(SELECT item, score FROM rating WHERE siteholder='Handicraft')a
                                ORDER BY score DESC LIMIT 5";
                        $sql3 = "SELECT item, score FROM(SELECT item, score FROM rating WHERE siteholder='Halo')a
                                ORDER BY score DESC LIMIT 5";

                        printf('<div class="row">');
                        if($result = $conn->query($sql)){

                        printf('<div class="col">');
                        printf('<ul>');
                        printf('<a target = "_blank" href="travel/index.php"><h2>Tour Packages</h2></a>');
                        while($row = $result->fetch_assoc()) {
                            $prod = $row["item"]; $rating = strval($row["score"]);
                            printRating($prod,$rating);
                            printReviews($conn, $prod);
                            printf('<br>');
                        }
                        printf('</ul>');
                        printf('</div>');
                        }
                        if($result = $conn->query($sql2)){

                        printf('<div class="col">');
                        printf('<ul>');
                        printf('<a target = "_blank" href="Handicrafts/index.php"><h2>Handicraft Products</h2></a>');
                        while($row = $result->fetch_assoc()) {
                            $prod = $row["item"]; $rating = strval($row["score"]);
                            printRating($prod,$rating);
                            printReviews($conn, $prod);
                            printf('<br>');
                        }
                        printf('</ul>');
                        printf('</div>');
                        }
                        if($result = $conn->query($sql3)){

                        printf('<div class="col">');
                        printf('<ul>');
                        printf('<a target = "_blank" href="Halo/index.html"><h2>SFDB Products</h2></a>');
                        while($row = $result->fetch_assoc()) {
                            $prod = $row["item"]; $rating = strval($row["score"]);
                            printRating($prod,$rating);
                            printReviews($conn, $prod);
                            printf('<br>');
                        }
                        printf('</ul>');
                        printf('</div>');
                        }
                        
                        printf('<div>');
                        $conn->close();
                    function printRating($prod, $rating){
                        printf('<h3>'.$prod.'</h3>');
                        printf('<h4>Overall Rating: '.$rating.'</h4>');
                    }
                    function printReviews($conn, $val){
                        //$rev = "SELECT name, content FROM(SELECT * FROM heroku_8c6c26a69cb9c50.review WHERE item=?)a ORDER BY RANd() LIMIT 3";
                        $stmt = $conn->prepare("SELECT name, content FROM(SELECT * FROM review WHERE item=?)a ORDER BY RANd() LIMIT 3");
                        $stmt -> bind_param("s", $val);
                        $stmt ->execute();
                        if($result=$stmt->get_result()){
                        printf('<div class="review"><ul>');
                        while($row= $result->fetch_assoc()){
                            printf('<li class="name">'.$row["name"].'</li>');
                            printf('<li class="comment">'.$row["content"].'</li>');
                        }
                        printf('</ul></div>');
                        }
                    }
                ?>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            </div>
            <div class="location_main">
               <div class="call_text"><img src="images/call-icon.png"></div>
               <div class="call_text"><a href="#">Call +1 1111111111</a></div>
               <div class="call_text"><img src="images/mail-icon.png"></div>
               <div class="call_text"><a href="#">demo@gmail.com</a></div>
            </div>
            <div class="social_icon">
               <ul>
                  <li><a href="#"><img src="images/fb-icon.png"></a></li>
                  <li><a href="#"><img src="images/twitter-icon.png"></a></li>
                  <li><a href="#"><img src="images/linkedin-icon.png"></a></li>
                  <li><a href="#"><img src="images/instagram-icon.png"></a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">Designed by Team APY</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>    
   </body>
</html>