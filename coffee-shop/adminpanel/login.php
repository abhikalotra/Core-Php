<!DOCTYPE html>
<html lang="en">

<?php 
include("dbconnection.php");
include("dbfunctions.php");
include("dbfunctionsadmin.php");		
		
?>


  <?php 
  if(isset($_REQUEST['submit'])){
  	
  	if($_REQUEST['type'] == 'adminlogIn'){	
  		$adminlogInUserMessage = adminlogIn();
  	}
  	
  }
  ?>
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coffee Shop Admin Panel </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>

</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">  
        
        <?php 
		 if(isset($PasswordRecovered)){ ?>
			 <h1 style="color: red;"><?php echo  $PasswordRecovered ;  ?></h1>
		<?php   } ?> 
              
            <div id="login" class="animate form">            
                <section class="login_content">
                <img src="http://122.160.233.58/abhi/coffee-shop/images/team-img.png" style="width:150px; height:150px;">
                    <form action="#" method="POST">   
                     <?php if(isset($adminlogInUserMessage['status']) && $adminlogInUserMessage['status'] =='success'){ ?>
					<p class="success" style=" color: #FFB606; text-transform: capitalize;font-size: 14px;"><?php echo $adminlogInUserMessage['message']; ?></p>
					<?php }elseif(isset($adminlogInUserMessage['status']) && $adminlogInUserMessage['status'] =='fail'){  ?>
					 <p class="error_fail" style=" color: red; text-transform: capitalize;font-size: 14px;"><?php echo $adminlogInUserMessage['message']; ?></p>
					<?php } ?>                 
                        <h1>Login Form</h1>
                        <div>
                         <input type="hidden"  name="type" value="adminlogIn">
                            <input type="text" name="firstname" class="form-control" placeholder="Firstname" required="required" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="required" />
                        </div>
                        <div>
                       <input type="submit" name="submit" value="Log In" class="btn btn-default submit">
                       
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <p class="change_link">New to site?
                                <a href="#toregister" class="to_register"> Lost your password? </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><!-- <i class="fa fa-paw" style="font-size: 26px;"></i> --><img src="images/coffee_logo.png" alt="Coffee Shop" class="imgcoffee_logo"> Coffee Shop</h1>

                                <p>©2015 All Rights Reserved. Coffee Shop! </p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        			 
					<div id="register" class="animate form">
					
					
						<section class="login_content">


					<form name="myForm" onsubmit="return validateRecoveryForm()"   action = "" method="post" >
                        <h1>Recovery Password</h1>
                          
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Please Enter Your Valid Email"  />
                        </div>
						<div>
						<input type="submit" name="recovery" value="Recovery" class="btn btn-default submit">
                         
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="#tologin" class="to_register"> Log in </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><!-- <i class="fa fa-paw" style="font-size: 26px;"></i> --> <img src="images/coffee_logo.png" alt="Coffee Shop" class="imgcoffee_logo">Coffee Shop</h1>

                                <p>©2015 All Rights Reserved. Coffee Shop! </p>
                            </div>
                        </div>
                    </form>

 </section>
              
            </div>

        </div>
    </div>

</body>

</html>

<?php 
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}




  if(isset($_REQUEST['recovery'])){
  	
  	  $email = $_REQUEST['email'];	
		$usersSql = mysql_query("SELECT *  FROM `users` WHERE `email` LIKE '%$email%' and status = 2 ");
		$users_array = mysql_fetch_array($usersSql);						
		$emails = $users_array['email'];
		$idss = $users_array['id'];
		
		$password = random_password(8); 
		$encript_password =  md5($password);
		
		if($emails){
		$to = $email;	
		$subject = "Recovery Password - Your Password has been Sucessfully Genrated";
		$message = '<html>
		<body>
		<div style="font-family:arial,sans-serif;font-size:14px;background:#e6f1f5;padding:22px;margin-top:15px">
					<h2><em>Recovery Password !! </em></h2> 
						<img src="http://122.160.233.58/abhi/coffee-shop/images/team-img.png" style="margin-right:15px;margin-bottom:15px;width: 115px;height: 123px;" border="0" align="left" class="CToWUd">
						 Your subscription to our list has been confirmed in our Coffee shop <br><br>
					Email Id : '.$email.'
						<br><br>
						Recovery Password : '.$password.'
						<br><br>
					<h2><em>Thanks For Your Subscribing !!  , In our Coffee Shop. </em></h2> 
					</div>
					</body>
					</html>
					';
		$txt = "Hello '".$email."'! \r\n\r\n   '".$message."'";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "From: coffee_shop_recovery@example.com" . "\r\n" ;
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
		$sentmail  = mail($to,$subject,$txt,$headers);
			if($sentmail){
			$recovery_passwordSql = "UPDATE `users` SET  `password` =  '$encript_password' WHERE  `id` ='$idss'";
			$ok  = mysql_query($recovery_passwordSql);
			  $PasswordRecovered = "Sucessfully Updated Your Password. Please Check your mail";	
			  header('Location: login.php');		
			}else{
				$PasswordRecovered = "Not Update Your Password";
			}
			
		}else{
		$PasswordRecovered = "Your Email Address is Wrong Please enter your valid email";
		}
  	
  }
  ?>
<script>
		function validateRecoveryForm() {	
		var email = document.forms["myForm"]["email"].value;
		if (email == null || email == "") {
		alert("Email must be filled out");
		return false;
		}
		
	
		}
</script>	