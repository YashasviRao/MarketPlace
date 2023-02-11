<?php
   include("includes/dbconnect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conn,$_POST['form-username']);
      $mypassword = sha1(mysqli_real_escape_string($conn,$_POST['form-password'])); 
      
      $sql = "SELECT id FROM `user_table` WHERE email = '$myusername' AND password = '$mypassword'";
      $result = mysqli_query($conn,$sql);

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location: index.php");
         exit;
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>APY MarketPlace!</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/incLogin/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/incLogin/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/incLogin/css/form-elements.css">
        <link rel="stylesheet" href="assets/incLogin/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/incLogin/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/incLogin/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/incLogin/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/incLogin/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/incLogin/ico/apple-touch-icon-57-precomposed.png">

    </head>
    <!-- <style>
        body {
            background-image: url('assets/incLogin/img/backgrounds/1.jpg');
        }
    </style> -->

    <body>
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Welcome to <strong>APY MarketPlace!</strong></h1>
                            <div class="description">
                            	<p>
	                            	
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our site:</h3>
                            		<p>Enter your email and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Email</label>
			                        	<input type="text" name="form-username" placeholder="Email..." class="form-username form-control" id="form-username" required>
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password" required>
			                        </div>
			                        <button type="submit" name="button" id="login" class="btn">Sign in!</button>
                                    <!-- <input class="btn btn-primary" type="submit" name="button" id="login" value="Sign In"> -->
			                    </form>
                                <br>
                                <p>Don't have an account yet? <a href="register.php">Click here </a> to register</p>
		                    </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/incLogin/js/jquery-1.11.1.min.js"></script>
        <script src="assets/incLogin/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/incLogin/js/jquery.backstretch.min.js"></script>
        <script src="assets/incLogin/js/scripts.js"></script>
        <!-- <script src="http://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
        
        <!-- <script>
            $(function(){
                $('#login').click(function(e){

                    var valid = this.form.checkValidity();

                    if(valid){
                        var username = $('#form-username').val();
                        var password = $('#form-password').val();

                        e.preventDefault();
                        $.ajax({
                            type: 'POST',
                            url: 'jslogin.php',
                            data:  {username: username, password: password},
                            success: function(data){
                                alert(data);
                                if($.trim(data) === "1"){
                                    setTimeout(' window.location.href = "home.php"', 1000);
                                }
                            },
                            error: function(data){
                                alert('there were erros while doing the operation.');
                            }
                        });
                    }
                });
            });
        </script> -->

    </body>

</html>