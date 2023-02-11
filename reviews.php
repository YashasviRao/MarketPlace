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
                           <a class="nav-link" href="most_viewed.php">Recently Viewed</a>
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
                     <li><a href="most_viewed.php">Recently Viewed</a></li>
                     <li><a href="top_services.php">Top Services</a></li>
                     <li class="active"><a href="reviews.php">Add a Review</a></li>
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
                <h2>Add a Review!</h2>
                <h3>Click on a link below add a review to any of the products offered on our marketplace!</h3>
                <?php 
                    /**
                    * One SQL query for each company 
                    */
                    $sql = "SELECT company, product FROM products WHERE company='Tour'";
                    $sql2 = "SELECT company, product FROM products WHERE company='Handicraft'";
                    $sql3 = "SELECT company, product FROM products WHERE company='Halo'";

                    /**
                    * Code divided into Row/Col Each company has indiv. column for products
                    * printF to generate base layout 
                    * fetch_assoc() handles query by row useful if we need a print of every element
                    */
                    printf('<div class="row">');
                    if($result = $conn->query($sql)){
                    printf('<div class="col">');
                    printf('<ul>');
                    printf('<h2>Tour Packages</h2>');
                    while($row = $result->fetch_assoc()) {
                        $comp = $row["company"]; $prod = $row["product"];
                        handleQuery($comp, $prod);
                    }
                    printf('</ul>');
                    printf('</div>');
                    }
                    if($result = $conn->query($sql2)){
                    printf('<div class="col">');
                    printf('<ul>');
                    printf('<h2>Handicraft Products</h2>');
                    while($row = $result->fetch_assoc()) {
                        $comp = $row["company"]; $prod = $row["product"];
                        handleQuery($comp, $prod);
                    }
                    printf('</ul>');
                    printf('</div>');
                    }
                    if($result = $conn->query($sql3)){
                    printf('<div class="col">');
                    printf('<ul>');
                    printf('<h2>Halographic Products</h2>');
                    while($row = $result->fetch_assoc()) {
                        $comp = $row["company"]; $prod = $row["product"];
                        handleQuery($comp, $prod);
                    }
                    printf('</ul>');
                    printf('</div>');
                    }
                    printf('<div>');
                    $conn->close();

                    /**
                    *@param $comp is the company name
                    *@param $prod is the product name
                    *uses base64_encode(serialize()) for safe serialization 
                    * without this it creates byte inconsistency errors 
                    */
                    function handleQuery($comp, $prod){
                    $prod_info = array($comp,$prod);
                        $prod_info =  base64_encode(serialize($prod_info));
                        printf('<a href="./reviewForm.php?prod='.$prod_info.'"><li>'.$prod.'</li></a>');
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