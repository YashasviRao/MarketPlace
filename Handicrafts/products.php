<!DOCTYPE html>
<html>
<link rel="stylesheet" href="./style.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

<title>Handicrafts collection</title>

<div class="topnav">
  <a href="./index2.php">Home</a>
  <a href="./about.html">About</a>
  <a class="active" href="./products.php">Products</a>
  <a href="./news.html">News</a>
  <!-- <a href="./login.html">Contact</a>
  <a href="./users.html">Users</a> -->
  <h1 class="company">Online Handicrafts Gallery</h1>
</div>

<h1>Handicrafts Gallery</h1>

<div class="container">
  <div class="row">
    <p id="recent">
      Recently viewed products:
      <?php

      if (isset($_COOKIE['recently_viewed'])) {
        $recently_viewed_arr = json_decode($_COOKIE['recently_viewed'], true);
        if (count($recently_viewed_arr) > 0) {
          echo '<ul>';
          echo '<li>' . implode('</li><li>', $recently_viewed_arr) . '</li>';
          echo '</ul>';
        }
        
      }
      ?>
    </p>
  </div>
  <div class="row" style="margin-top: 50px;">
    <div class="col-md-4">
      <a href="./products/product1.php">
        <img src="./images/img1.png" alt="Gallery image 1" class="gallery__img" />
      </a>
      <div class="price_id">Price: $ 1,500</div>
    </div>
    <div class="col-md-4">
      <a href="./products/product2.php">
        <img src="./images/img2.png" alt="Gallery image 2" class="gallery__img" />
      </a>
      <div class="price_id">Price: $ 1,700</div>
    </div>
    <div class="col-md-4">
      <a href="./products/product3.php">
        <img src="./images/img3.png" alt="Gallery image 3" class="gallery__img" />
      </a>
      <div class="price_id">Price: $ 500</div>
    </div>
  </div>
  <div class="row" style="margin-top: 50px">
    <div class="col-md-4">
      <a href="./products/product4.php">
        <img src="./images/img4.png" alt="Gallery image 3" class="gallery__img" />
      </a>
      <div class="price_id">Price: $ 900</div>
    </div>
    <div class="col-md-4">
      <a href="./products/product5.php">
        <img src="./images/img5.png" alt="Gallery image 5" class="gallery__img" />
      </a>
      <div class="price_id">Price: $ 800</div>
    </div>
    <div class="col-md-4">
      <a href="./products/product6.php">
        <img src="./images/img6.png" alt="Gallery image 6" class="gallery__img" />
      </a>
      <div class="price_id">Price: $ 300</div>
    </div>
    <div class="row"></div>
  </div>
  <div class="row" style="margin-top: 50px">
    <div class="col-md-4">
      <a href="./products/product7.php">
        <img src="./images/img7.png" alt="Gallery image 1" class="gallery__img" />
      </a>
      <div class="price_id">Price: $ 500</div>
    </div>
    <div class="col-md-4">
      <a href="./products/product8.php">
        <img src="./images/img8.png" alt="Gallery image 2" class="gallery__img" />
      </a>
      <div class="price_id">Price: $ 1,500</div>
    </div>
    <div class="col-md-4">
      <a href="./products/product9.php">
        <img src="./images/img9.png" alt="Gallery image 1" class="gallery__img" />
      </a>
      <div class="price_id">Price: $ 1000</div>
    </div>
  </div>
  <div class="row" style="margin-top: 50px">
    <div class="col-md-4">
      <a href="./products/product10.php">
        <img src="./images/img10.png" alt="Gallery image 2" class="gallery__img" />
      </a>
      <div class="price_id">Price: $ 900</div>
    </div>
  </div>
</div>

</html>