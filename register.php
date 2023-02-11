<?php
    require_once('includes/dbconnect.php');
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
    <style>
        body {
            background-image: url('assets/incLogin/img/backgrounds/1.jpg');
        }
    </style>
    
    <body>
        <!-- Top content -->
        <div >
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1 style="color: #FFFFFF"><strong>Welcome to the Registration Page!</strong></h1>
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
                        			<h3>Register here:</h3>
                            		<p>Enter your details to register:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="register.php" method="post" class="login-form">
                                    <div class="form-group">
			                    		<label class="sr-only" for="form-name">Name</label>
			                        	<input type="text" name="form-name" placeholder="Name..." class="form-username form-control" id="form-name" required>
			                        </div>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-email">Email</label>
			                        	<input type="text" name="form-email" placeholder="Email..." class="form-username form-control" id="form-email" required>
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password" required>
			                        </div>
                                    <div class="form-group">
			                    		<label class="sr-only" for="form-repassword">Re Enter Password</label>
			                        	<input type="password" name="form-repassword" placeholder="Re Enter Password..." class="form-password form-control" id="form-repassword" required>
			                        </div>
                                    <div class="form-group">
			                    		<label class="sr-only" for="form-city">City</label>
			                        	<input type="text" name="form-city" placeholder="City..." class="form-username form-control" id="form-city" required>
			                        </div>
                                    <div class="form-group">
			                    		<label class="sr-only" for="form-mobile">Mobile Number</label>
			                        	<input type="text" name="form-mobile" placeholder="Mobile Number..." class="form-username form-control" id="form-mobile" required>
			                        </div>
                                    <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
			                        <!-- <button type="submit" class="btn">Register</button> -->
			                    </form>
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
        <!-- <script src="assets/incLogin/js/scripts.js"></script> -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script type="text/javascript">
            $(function(){
		        $('#register').click(function(e){
                    var valid = this.form.checkValidity();
                    if(valid){
                        var name = $('#form-name').val();
                        var email = $('#form-email').val();
                        var city = $('#form-city').val();
                        var phonenumber = $('#form-mobile').val();
                        var password = $('#form-password').val();

                        e.preventDefault();	

                        $.ajax({
                            type: 'POST',
                            url: 'process.php',
                            data: {name: name,password: password,email: email,city: city,phonenumber: phonenumber},
                            success: function(data){
                            Swal.fire({
                                        'title': 'Successful',
                                        'text': data,
                                        'type': 'success'
                                        }).then(function() {
                                            window.location = "login.php"; 
                                        });
                            },
                            error: function(data){
                                Swal.fire({
                                        'title': 'Errors',
                                        'text': 'There were errors while saving the data. Try Again!',
                                        'type': 'error'
                                        })
                            }
                        });
                    }else {

                    }
                });
            });
        </script>
        

    </body>

</html>