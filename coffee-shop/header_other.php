<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coffee Shop</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    <link href="css/css" rel="stylesheet" type="text/css">
	<link href="css/style-review.css" rel="stylesheet" type="text/css">
    
   
  <script src="js/jquery.timepicker.min.js"></script>
     <link href="css/jquery.timepicker.min.css" rel="stylesheet" type="text/css">
   
 
     
    <script>
	(function($) {
		$(function() {
			$('input.timepicker').timepicker();			
		});
	})(jQuery);
	</script>
	
	
	
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script language="javascript">
        $(document).ready(function () {
            $("#txtdate").datepicker({
                minDate: 0
            });
        });
    </script>

	
  <!-- 
  <script>
      $(function() {
        $( "#datepicker" ).datepicker({
          showOn: "button",
          buttonImage: "images/calender-pick.png",
          buttonImageOnly: true,
          buttonText: "Select date"
        });
      });
    </script>
 -->
    <script>
      $(function() {
      // OPACITY OF BUTTON SET TO 0%
      $(".roll").css("opacity","0");
      
      // ON MOUSE OVER
      $(".roll").hover(function () {
      
      // SET OPACITY TO 70%
      $(this).stop().animate({
      opacity: .7
      }, "slow");
      },
      
      // ON MOUSE OUT
      function () {
      
      // SET OPACITY BACK TO 50%
      $(this).stop().animate({
      opacity: 0
      }, "slow");
      });
      });
    </script>
    <!-- Optional theme -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="js/owl.carousel.min.js"></script>
    <script>
      $(window).bind('scroll', function() {
          var navHeight = 130; // custom nav height
          ($(window).scrollTop() > navHeight) ? 
              $('nav').addClass('navbar-fixed-top') :
              $('nav').removeClass('navbar-fixed-top');
      });
    </script>
    <script>
      $(document).ready(function(){
      var $root = $('html, body');
      $('#myNavbar a').click(function() {
          var href = $.attr(this, 'href');
      	$('#myNavbar a').removeClass('active');
          $(this).addClass('active');
      	$root.animate({
              scrollTop: $(href).offset().top
          }, 1500, function () {
              window.location.hash = href;
          });
          return false;
      });
      
      });
      
    </script>
    <style>
      #nav.affix {
      position: fixed;
      top: 0;
      width: 100%;
      transition:ease all 0.5s;
      z-index:2222;
      }
/* abhi css */
 label.signUP {
    float: left;
    width: 38%;
    font-size: 13px;
}
.box {
    width: 31% !important;
 }
    </style>
    
	<script>
		function validateForm() {
		
		/*var x = document.forms["myForm"]["firstname"].value;
		alert(x);
		if (x == null || x == "") {
		alert("Firstname must be filled out");
		return false;
		}
		
		var lastname = document.forms["myForm"]["lastname"].value;
		if (lastname == null || lastname == "") {
		alert("Last Name must be filled out");
		return false;
		}*/	
		
		var email = document.forms["myForm"]["email"].value;
		if (email == null || email == "") {
		alert("Email Address must be filled out");
		return false;
		}
		
		var phone_no = document.forms["myForm"]["phone_no"].value;
		if (phone_no == null || phone_no == "") {
		alert("Phone No. must be filled out");
		return false;
		}
		
		var pass = document.forms["myForm"]["password"].value;
		if (pass == null || pass == "") {
		alert("Passwords must be filled out");
		return false;
		}	
		
		var pass1 = document.forms["myForm"]["password"].value;
   		var pass2 = document.forms["myForm"]["confirm_password"].value;
    	var ok = true;
    	if (pass1 != pass2) {
        alert("Passwords Do not match");
        ok = false;
  	 	}
    return ok;
		}
		
		
	function validateLoginForm() {
		var x = document.forms["myLoginForm"]["email"].value;
		if (x == null || x == "") {
		alert("Email must be filled out");
		return false;
		}
		
		var pass = document.forms["myLoginForm"]["password"].value;
		if (pass == null || pass == "") {
		alert("Password must be filled out");
		return false;
		}	
	
		}
	</script>
  </head>
  
  
  <?php 
  if(isset($_REQUEST['submit'])){
   	
 	 if($_REQUEST['type'] == 'signUp'){	
  		$registerUserMessage = registerUser();
  		  
  		
  	}
  	
  	if($_REQUEST['type'] == 'logIn'){	
  		$logInUserMessage = logIn();
  	}
  	
  	
  }
  
 
  ?>


  <?php

  
if (! empty($_SESSION['id']))
{	
   $sessionId =  $_SESSION['id'];  
   $sessionEmail =  $_SESSION['email']; 
}
 
    ?>

  <body>
    <div id="fullpage" class="wrapper">
      <header id="header-section">
        <div class="head-main">
          <div class="container">
            <div class="row">
              <div class="col-xs-4 top-clm-lft">
                <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
              </div>
              <div class="col-xs-8 top-clm-rgt">
                <div class="top-rgt-side">
                  <div class="top-phone">
                    <span aria-hidden="true" class="glyphicon glyphicon-earphone"></span>
                     <?php 
						$contactSql = mysql_query("select * from contact_message ");
						$contact_array = mysql_fetch_array($contactSql);									
						$id = $contact_array['id'];
						$mobile_no = $contact_array['mobile_no'];
					?>
					<p><a title="phone" href="tel:<?php echo $mobile_no; ?>"><?php echo $mobile_no; ?></a></p>
                  </div>
                  <div class="top-main-btm">
                   <?php if(isset($registerUserMessage['status']) && $registerUserMessage['status'] =='already'){ ?>
					<p class="already_exist" style=" color: #E46ACD; text-transform: capitalize;font-size: 14px;font-weight: bold;"><?php echo $registerUserMessage['message']; ?></p>					
					<?php } ?>
					
                  
                   <?php if(isset($registerUserMessage['status']) && $registerUserMessage['status'] =='success'){ ?>
					<p class="success" style=" color: #FFB606; text-transform: capitalize;font-size: 14px;"><?php echo $registerUserMessage['message']; ?></p>					
					<?php } ?>
					
					 <?php if(isset($logInUserMessage['status']) && $logInUserMessage['status'] =='success'){ ?>
					<p class="success" style=" color: #FFB606; text-transform: capitalize;font-size: 14px;"><?php echo $logInUserMessage['message']; ?></p>
					<?php }elseif(isset($logInUserMessage['status']) && $logInUserMessage['status'] =='fail'){  ?>
					 <p class="error_fail" style=" color: red; text-transform: capitalize;font-size: 14px;"><?php echo $logInUserMessage['message']; ?></p>
					<?php } ?>
					
                
                  
                    <div class="login-links-tp">
                      <ul>
                      <?php  if (! empty($_SESSION['id'])){ ?>
                       <li>
                       <a href="#" ><?php echo $sessionEmail; ?></a>
						<ul class="dropdown-menu user-dd" role="menu">
						<li><a href="user_profile.php">Profile</a></li>

						<li><a href="booking_history.php">Booking History</a></li>
						</ul>
                       </li>
                         <li class="devider">|</li>
                        <li><a href="logout.php" id="logintop">Logout</a></li>
                        
                         <?php  }else{ ?>
                       <li><a href="#signup_form" id="jointop">CREATE ACCOUNTS</a></li>
                        <li class="devider">|</li>
                        <li><a href="#login_form" id="logintop">Login</a></li>
                     <?php }
                      ?>
                                             
                      </ul>
                    </div>
                    <div class="search-social-main">
                      <!-- <div class="top-serch">
                        <form action="" class="search-form">
                          <div class="form-group has-feedback">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" class="form-control" name="search" id="search" placeholder="search">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                          </div>
                        </form>
                      </div> -->
                      <div class="social-section">
                        <div class="top-social-main">
                           <a class="rotate" href="https://twitter.com/Cafelluca_Egypt" title="twitter"><i class="fa fa-twitter"></i> </a>
                          <a class="rotate" href="https://www.facebook.com/cafelluca/" title="facebook"><i class="fa fa-facebook"></i> </a>
                          <a class="rotate" href="https://www.instagram.com/cafelluca/" title="instagram"><i class="fa fa-instagram"></i> </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="my-nav">
                    <nav class="navbar navbar-inverse">
                      <div class="scrol-logo"><a href="index.php"><img src="images/logo.png"></a></div>
                      <div class="navbar-header">
                        <button aria-expanded="false" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                      </div>
                      <div style="height: 1px;" aria-expanded="false" class="navbar-collapse collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                         <li><a href="index.php">Home</a></li>
                          <li><a href="index.php">Menu </a></li>
                          <li><a href="index.php">Book Now</a></li>
                          <li><a href="index.php">Team</a></li>
                          <li><a href="index.php">Gallery </a></li>
                          <li><a href="index.php">Contact </a></li>
                        </ul>
                      </div>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="head-slider">
       
<!--         <img src="images/head-slider.png"> -->
        
<!--     Slider Start     --> 

<!--    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>  -->
  
  <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
            <?php 
				$sliderSql = mysql_query("select * from slider_fullwidth order by id desc limit 0,5");
				while($slider_array = mysql_fetch_array($sliderSql)){									
					$id = $slider_array['id'];
					$title = $slider_array['title'];
					$description = $slider_array['description'];
					$slider_image = $slider_array['slider_image'];
					$date_create = $slider_array['date_create'];
				?>
            <div data-p="225.00" style="display: none;">
                <img data-u="image" src="adminpanel/slider_fullwidth/<?php echo $slider_image; ?>" />
					<div style="position: absolute; top: 70px; left: 40px; width: 100%; height: 120px; font-size: 50px; color: #ffffff; line-height: 60px;">
					<?php echo $title; ?>
					</div>
                <div style="position: absolute; top: 300px; left: 40px; width: 95%; height: 120px; font-size: 20px; color: #ffffff; line-height: 38px;">
                	<?php echo $description; ?>
                </div>  
            </div>

         <?php   } ?>
            
          <!-- 
  			<div data-p="225.00" style="display: none;">
                  <img data-u="image" src="http://www.innatlagunabeach.com/wp-content/uploads/2013/10/banner-specialtycoffee.jpg" />
                <div style="position: absolute; top: 30px; left: 30px; width: 480px; height: 120px; font-size: 50px; color: #ffffff; line-height: 60px;">
					TOUCH SWIPE SLIDER 2
					</div>
                <div style="position: absolute; top: 300px; left: 30px; width: 480px; height: 120px; font-size: 30px; color: #ffffff; line-height: 38px;">
                	Build your slider with anything, includes image, content, text, html, photo, picture
                </div>  
            </div>
          
            <div data-p="225.00" style="display: none;">
                <img data-u="image" src="http://revelwallpapers.net/d/77496D506859796F797144596B6252376F5A71533362766934704F6961513D3D/close-up-coffee-grains-cup-saucer.jpg" />
                <div style="position: absolute; top: 30px; left: 30px; width: 480px; height: 120px; font-size: 50px; color: #ffffff; line-height: 60px;">
					TOUCH SWIPE SLIDER 3
					</div>
                <div style="position: absolute; top: 300px; left: 30px; width: 480px; height: 120px; font-size: 30px; color: #ffffff; line-height: 38px;">
                	Build your slider with anything, includes image, content, text, html, photo, picture
                </div>  
            </div>
            
            <div data-p="225.00" style="display: none;">
                <img data-u="image" src="http://www.lsfptcoffee.co.uk/wp-content/uploads/2014/05/lsfpt_coffee_banner1.jpg" />
                <div style="position: absolute; top: 30px; left: 30px; width: 480px; height: 120px; font-size: 50px; color: #ffffff; line-height: 60px;">
					TOUCH SWIPE SLIDER 4
					</div>
                <div style="position: absolute; top: 300px; left: 30px; width: 480px; height: 120px; font-size: 30px; color: #ffffff; line-height: 38px;">
                	Build your slider with anything, includes image, content, text, html, photo, picture
                </div>  
            </div>
 -->
            
        </div>
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
        <a href="http://www.jssor.com" style="display:none">Bootstrap Carousel</a>
    </div>

<!--      Slider End    -->
        
        </div>
      
      
      
      </header>
   
   
   
   
      
<!--    popup start     -->

			<a href="#" class="overlay" id="login_form"></a>
		<div class="box">
			<h2>LOG IN</h2>
			<form action="#" name="myLoginForm" onsubmit="return validateLoginForm()"  method="POST">
			   <input type="hidden"  name="type" value="logIn">
			   <label class="signUP">Email</label><input type="text" name="email" class="text-field" placeholder="Email">
			   <label class="signUP">Password</label><input type="password" name="password" class="text-field" placeholder="Password">
				<div id="buttons"> 
				 <input type="submit" name="submit" value="Login" class="signUp">
				<a href="#signup_form">
					<input type="button" value="Sign up" class="orangeSignUp">
				</a>
					</div>
			</form>	

			<a class="close" href="#"></a>
		   <div class="error">
		   <div class="errortext">Incorrect login or password</div>
		   </div>
		
		</div>
		<a href="#" class="overlay" id="signup_form"></a>
		<div class="box">

			<h2>SIGN UP</h2>
			<form name="myForm" onsubmit="return validateForm()"  action="#" method="POST" >
				<input type="hidden"  name="type" value="signUp">				
				<label class="signUP">Email</label><input type="email" class="text-field" name="email" placeholder="Email">
				<label class="signUP">Password</label><input type="password" class="text-field" name="password" placeholder="Password">
				<label class="signUP">Confirm Password</label><input type="password" class="text-field" name="confirm_password" placeholder="Confirm Password">
				<label class="signUP">Phone No.</label><input type="number" class="text-field" name="phone_no" placeholder="Phone No.">
								
				<br>
					<input type="submit" name="submit" value="signup" class="signUp"><br>
			</form>	
				<br>
				<p>Already have account? <a href="#login_form" class="orangeSignUpA">Log In</a></p>
				<a class="close" href="#"></a>

		</div> 
		
<!--      pop end  -->
   
   
   
   
<!--  Slider Full width   -->
      
    <script type="text/javascript" src="js/jssor.slider.min.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_SlideoTransitions = [
              [{b:5500.0,d:3000.0,o:-1.0,r:240.0,e:{r:2.0}}],
              [{b:-1.0,d:1.0,o:-1.0,c:{x:51.0,t:-51.0}},{b:0.0,d:1000.0,o:1.0,c:{x:-51.0,t:51.0},e:{o:7.0,c:{x:7.0,t:7.0}}}],
              [{b:-1.0,d:1.0,o:-1.0,sX:9.0,sY:9.0},{b:1000.0,d:1000.0,o:1.0,sX:-9.0,sY:-9.0,e:{sX:2.0,sY:2.0}}],
              [{b:-1.0,d:1.0,o:-1.0,r:-180.0,sX:9.0,sY:9.0},{b:2000.0,d:1000.0,o:1.0,r:180.0,sX:-9.0,sY:-9.0,e:{r:2.0,sX:2.0,sY:2.0}}],
              [{b:-1.0,d:1.0,o:-1.0},{b:3000.0,d:2000.0,y:180.0,o:1.0,e:{y:16.0}}],
              [{b:-1.0,d:1.0,o:-1.0,r:-150.0},{b:7500.0,d:1600.0,o:1.0,r:150.0,e:{r:3.0}}],
              [{b:10000.0,d:2000.0,x:-379.0,e:{x:7.0}}],
              [{b:10000.0,d:2000.0,x:-379.0,e:{x:7.0}}],
              [{b:-1.0,d:1.0,o:-1.0,r:288.0,sX:9.0,sY:9.0},{b:9100.0,d:900.0,x:-1400.0,y:-660.0,o:1.0,r:-288.0,sX:-9.0,sY:-9.0,e:{r:6.0}},{b:10000.0,d:1600.0,x:-200.0,o:-1.0,e:{x:16.0}}]
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
          
        });
    </script>

    <style>
      
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            width: 16px;
            height: 16px;
            background: url('img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }
       
        .jssora22l, .jssora22r {
            display: block;
            position: absolute;
            width: 40px;
            height: 58px;
            cursor: pointer;
            background: url('img/a22.png') center center no-repeat;
            overflow: hidden;
        }
        .jssora22l { background-position: -10px -31px; }
        .jssora22r { background-position: -70px -31px; }
        .jssora22l:hover { background-position: -130px -31px; }
        .jssora22r:hover { background-position: -190px -31px; }
        .jssora22l.jssora22ldn { background-position: -250px -31px; }
        .jssora22r.jssora22rdn { background-position: -310px -31px; }
    </style>
    
    <!--  Slider Full width   -->