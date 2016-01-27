<?php
  include("dbconnection.php");
  include("dbfunctions.php");
  include("dbfunctionsIndex.php");
  
  if(isset($_REQUEST['submit'])){
  
  	if($_REQUEST['type'] == 'booknow'){	
  		$booking = booknow();	

  	}
  
  	if($_REQUEST['type'] == 'email'){	
  		$sendEamilMessage =  sendEamil();
  	}
  
  	if($_REQUEST['type'] == 'newsLetter'){	
  		$newsLetterMessage =  newsLetter();
  	}
  
  
  	
  }
  ?>


    <?php include("header.php"); ?>
	  
 	  
      <section id="newsletter-section">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="search-bar-main">
               <?php if(isset($newsLetterMessage['status']) && $newsLetterMessage['status'] =='success'){ ?>
                <h2 class="success" style=" color: #FFB606; text-transform: capitalize;font-size: 28px;"><?php echo $newsLetterMessage['message']; ?></h2>
                <?php }elseif(isset($newsLetterMessage['status']) && $newsLetterMessage['status'] =='fail'){  ?>
                 <h2 class="error_fail" style=" color: Red; text-transform: capitalize;font-size: 28px;"><?php echo $newsLetterMessage['message']; ?></h2>
                <?php }elseif(isset($newsLetterMessage['status']) && $newsLetterMessage['status'] =='already_subscribe'){  ?>
                 <h2 class="already_subscribe" style=" color: yellow; text-transform: capitalize;font-size: 28px;"><?php echo $newsLetterMessage['message']; ?></h2>
                 <?php } ?>
                <h2>SIGN UP FOR THE NEWSLETTER</h2>
                <form  action="#" method="POST" >
				<input type="hidden"  name="type" value="newsLetter">				
                <input  type="email" name="email" class="enter-email" placeholder="Enter Your Email">
                <input class="search-btn" value="Sign Up" name="submit" type="submit">
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="menu-section">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="menu-inside">
                <div class="main-heading">
                <?php 
				$index_menuesSql1 = mysql_query("select * from manage_index_menues where id = 1 or page_id= 1");
				$index_menues_array1 = mysql_fetch_array($index_menuesSql1);									
				$id1 = $index_menues_array1['id'];
				$title_menues1 = $index_menues_array1['title'];
				$description_menues1 = $index_menues_array1['description'];
				?>
                <h2><?php echo $title_menues1; ?></h2>
                </div>
                <p>
                <?php echo $description_menues1; ?>
                 </p>
                <div class="menu-table">
                  <?php 
                  
						 $food_menu_query = mysql_query("select * from food_menu  where seen_status = 1 limit 0,1 ");
						 $food_menu_array = mysql_fetch_array($food_menu_query);
						 $food_id = $food_menu_array['id']; 						
						$title = $food_menu_array['title']; 
						$food_start_timing = $food_menu_array['food_start_timing']; 
						$food_start_timing = $food_menu_array['food_start_timing']; 
						$combo_name = $food_menu_array['combo_name']; 
						
						?>
                
                  <div class="lunch-menu menu-list">
                    <div class="menu-tital-main">
                      <h2><?php echo $title; ?></h2>
                      <p class="timing"><?php echo $food_start_timing; ?> - <?php echo $food_start_timing; ?></p>
                    </div>
                    <div class="menu-items-main">
                      <h4><?php echo $combo_name; ?></h4>
                      
                      
                      <?php 
						$booking_select = mysql_query("select * from menu_lunch  where  food_meals_catagory_id = '".$food_id."' ORDER BY  `id` DESC  limit 0,3 ");
						while($booking_array = mysql_fetch_array($booking_select))
						{	
						$food_name = $booking_array['food_name']; 
						$description = $booking_array['description']; 
						$image = $booking_array['image']; 
						$price = $booking_array['price']; 
					
						?>
                      
                      <div class="menu-table-list">
                        <div class="menu-img"><img src="adminpanel/menu_lunch_image/<?php echo $image; ?>" style="width: 86px;height: 86PX;"></div>
                        <div class="menu-dis">
                          <h3><?php echo $food_name; ?> - <span>$ <?php echo $price; ?></span></h3>
                          <p><?php echo $description; ?></p>
                        </div>
                      </div>
                      	<?php 	}   ?>
                      	
                    </div>
                  </div>
                  
                  
                  
                  
                  
                  
                   <?php                   
						 $food_menu_query2 = mysql_query("select * from food_menu  where seen_status = 1 limit 1,2 ");
						 $food_menu_array2 = mysql_fetch_array($food_menu_query2);
						 $food_id2 = $food_menu_array2['id']; 						
						$title2 = $food_menu_array2['title']; 
						$food_start_timing2 = $food_menu_array2['food_start_timing']; 
						$food_start_timing2 = $food_menu_array2['food_start_timing']; 
						$combo_name2 = $food_menu_array2['combo_name']; 
						
						?>
                  <div class="dinner-menu menu-list">
                    <div class="menu-tital-main">
                      <h2><?php echo $title2; ?></h2>
                      <p class="timing"><?php echo $food_start_timing2; ?> - <?php echo $food_start_timing2; ?></p>
                    </div>
                    <div class="menu-items-main">
                      <h4><?php echo $combo_name2; ?> </h4> 
                                                               
                        <?php 
						$booking_select2 = mysql_query("select * from menu_lunch  where  food_meals_catagory_id = '".$food_id2."' ORDER BY  `id` DESC  limit 0,3 ");
						while($booking_array2 = mysql_fetch_array($booking_select2))
						{	
						$food_name2 = $booking_array2['food_name']; 
						$description2 = $booking_array2['description']; 
						$image2 = $booking_array2['image']; 
						$price2 = $booking_array2['price']; 
					
						?>
						                      
                      <div class="menu-table-list">
                        <div class="menu-img"><img src="http://122.160.233.58/abhi/coffee-shop/adminpanel/menu_lunch_image/<?php echo $image2; ?>" style="width: 86px;height: 86PX;"></div>
                        <div class="menu-dis">
                          <h3><?php echo $food_name2; ?> - <span>$ <?php echo $price2; ?></span></h3>
                          <p><?php echo $description2; ?></p>
                        </div>
                      </div>
                     	
                     	<?php 	}   ?>
                     	
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      
      <form role="form" method="post" action ='#table-book-section' enctype="multipart/form-data">
<?php
if (! empty($_SESSION['id'])){
  $sessionId =  $_SESSION['id'];  
   $sessionEmail =  $_SESSION['email']; 
	if ($sessionId)
	{	
		 $sqlForm="SELECT * FROM users WHERE id ='$sessionId'"; 
		$resultForm=mysql_query($sqlForm);
		$fetchResultForm = mysql_fetch_array($resultForm);
		$id = $fetchResultForm['id'];
		$emails = $fetchResultForm['email'];
		 $firstname = $fetchResultForm['firstname'];
		$phone_nos = $fetchResultForm['phone_no'];
	
	}
 }
    ?>
        <section id="table-book-section">
          <div class="container">
            <div class="row">
              <div class="book-table-inside">
                <?php 
				$index_menuesSql2 = mysql_query("select * from manage_index_menues where id = 2 or page_id= 2");
				$index_menues_array2 = mysql_fetch_array($index_menuesSql2);									
				$id2 = $index_menues_array2['id'];
				$title_menues2 = $index_menues_array2['title'];
				$description_menues2 = $index_menues_array2['description'];
				?>
                <div class="main-heading">	
                  <h2><?php echo $title_menues2; ?></h2>
                </div>
                
                <?php if(isset($booking['status']) && $booking['status'] =='success'){ ?>
                <p class="success" style=" color: #FFB606; text-transform: capitalize;font-size: 28px;"><?php echo $booking['message']; ?></p>
                <?php }elseif(isset($booking['status']) && $booking['status'] =='fail'){  ?>
                 <p class="error_fail" style=" color: Red; text-transform: capitalize;font-size: 28px;"><?php echo $booking['message']; ?></p>
                <?php } ?>
                
                 
                <p><?php echo $description_menues2; ?></p>
                <div class="table-form">
                  <div class="row">
                    <div class="col-sm-4 form-book">
                      <p> 
                        <input  value="booknow" name="type" type="hidden">										
<!--                         <input class="table-form" type="text" id="datepicker" placeholder="Which Date" name="datepicker" required/> -->
                        <input id="txtdate" type="text"  name="datepicker" required  placeholder="Which Date" class="table-form"> 
                    
                      </p>
                    </div>
                    <div class="col-sm-4 form-book">
<!--                       <input class="table-form timepicker" type="text" name="time" placeholder="What Time ?" required/> -->
                       <select class="table-form"  name="datepicker" required>
                       <option value="12:00 PM" selected="selected">Select Time</option>
                       <option value="12:00 PM" >12:00 PM</option>
                       <option value="02:00 PM" >02:00 PM</option>
                       <option value="04:00 PM">04:00 PM</option>
                       <option value="06:00 PM" >06:00 PM</option>
                       <option value="08:00 PM" >08:00 PM</option>
                       <option value="10:00 PM">10:00 PM</option>
                       <option value="12:00 AM" >12:00 AM</option>
                       <option value="02:00 AM">02:00 AM</option>
                       <option value="04:00 AM" >04:00 AM</option>
                       <option value="06:00 AM" >06:00 AM</option>
                   	   <option value="08:00 AM">08:00 AM</option>
                       <option value="10:00 AM" >10:00 AM</option>
                      </select>
                    </div>
                    <div class="col-sm-4 form-book">
                      <select class="table-form" placeholder="No. of Peoples ?" name="people" required>
                       <option value="" selected="selected">No. of Peoples ?</option>
                       <?php 
						$no_peoplesSql = mysql_query("select * from booking_noofpeoples");
						$no_peoples_array = mysql_fetch_array($no_peoplesSql);									
						$no_peoples = $no_peoples_array['no_peoples'];
						for ($x = 1; $x <= $no_peoples; $x++) { ?>
						   <option value="<?php echo $x; ?>"><?php echo $x; ?></option>						
					<?php	} 	?>                    
                      </select>
                    </div>
                  </div>
                  
                  <div class="row">
                  <?php  
                 if (! empty($_SESSION['id']))
                  { ?>
	                 <div class="col-sm-4 form-book"><input class="table-form" type="text" placeholder="Your Name" name="name" value="<?php if($firstname != '' ){ echo $firstname;  }?>" required></div>
                    <div class="col-sm-4 form-book"><input class="table-form" type="text" placeholder="Phone" name="phone" value="<?php echo $phone_nos; ?>" required></div>
                    <div class="col-sm-4 form-book"><input class="table-form" type="text" placeholder="Email" name="email" value="<?php echo $emails; ?>" required></div>
	             
	              <?php  } else { ?>  
	               <div class="col-sm-4 form-book"><input class="table-form" type="text" placeholder="Your Name" name="name" required></div>
                    <div class="col-sm-4 form-book"><input class="table-form" type="text" placeholder="Phone" name="phone" required></div>
                    <div class="col-sm-4 form-book"><input class="table-form" type="text" placeholder="Email" name="email" required></div>
	              <?php }  ?>
                   
                  </div>
                  <div class="book-mow">
                  <input type="submit" name="submit" value="Book Now" class="bookNoww"/>
					<!-- <a href="#">Book Now</a> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </form>
      
      
      <section id="team-section">
        <div class="container">
          <div class="row">
            <div class="team-inside">
             	<?php 
				$index_menuesSql3 = mysql_query("select * from manage_index_menues where id = 3 or page_id= 3");
				$index_menues_array3 = mysql_fetch_array($index_menuesSql3);									
				$id3 = $index_menues_array3['id'];
				$title_menues3 = $index_menues_array3['title'];
				$description_menues3 = $index_menues_array3['description'];
				?>
              <div class="main-heading white-heading">
                <h2><?php echo $title_menues3; ?></h2>
              </div>
              <p><?php echo $description_menues3; ?></p>
               <div class="row">
               <?php 
					$team_memberSql = mysql_query("select * from team_member order by id desc limit 0,3");
					while($team_member_array = mysql_fetch_array($team_memberSql)){								
					$id = $team_member_array['id'];
					$team_photo = $team_member_array['team_photo'];
					$title = $team_member_array['title'];
					$description = $team_member_array['description'];
					?>
               	 <div class="col-sm-4 team-clm">
                  <img src="adminpanel/team_photo/<?php echo $team_photo; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" style="width: 250px;    height: 290px;">
                  <h4><?php echo $title; ?></h4>
                </div>
               <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="Gallery-section">
        <div class="gallery-bg">
          <div class="container">
            <div class="row">
              <div class="gallery-bg-inside">
              <?php 
				$index_menuesSql4 = mysql_query("select * from manage_index_menues where id = 4 or page_id= 4");
				$index_menues_array4 = mysql_fetch_array($index_menuesSql4);									
				$id4 = $index_menues_array4['id'];
				$title_menues4 = $index_menues_array4['title'];
				$description_menues4 = $index_menues_array4['description'];
				?>
                <div class="Gallery-heding">
                  <h2><?php echo $title_menues4; ?></h2>
                </div>
                <p><?php echo $description_menues4; ?></p>
                <img class="gallery-arrow" src="images/gallery-arrow.png">
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="gallery-image-sec">
              <div class="glry-tabs">
                <ul>
                  <li><a href="#Gallery-section">Gallery Images</a></li>
                </ul>
              </div>
              <div class="image-glry">
               <link href="css/popup.css" rel="stylesheet">
               <script src="js/jquery.popup.js"></script>
<!--                <script src="https://code.jquery.com/jquery-1.8.0.js"></script> -->
               
              <?php 
				$gallery_imageSql = mysql_query("select * from gallery_images order by id desc limit 0, 6");
				while($gallery_image_array = mysql_fetch_array($gallery_imageSql)){									
				$id = $gallery_image_array['id'];
				$title = $gallery_image_array['title'];
				$description = $gallery_image_array['description'];
				$gallery_image = $gallery_image_array['gallery_image'];
				?>
                <div class="imageOuter">
                  <a  class="default_popup"  href="adminpanel/gallery_images/<?php echo $gallery_image; ?>" title="<?php echo $title; ?>" style="width: 370px;  height: 303px;">
                  <span class="roll" ></span>
                 		 <img class="imgborder" src="adminpanel/gallery_images/<?php echo $gallery_image; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" style="width: 367px;  height: 301px;">			
                  </a>
                </div>
                <?php } ?>
              <style>
              .popup_content img {
					width: 370px !important;
					height: 301px !important;
				}
              </style>
              <script>
				  $(function(){      
					$('.default_popup').popup();      
				  });
	  
				</script>
              <!-- 
                
              
  <div class="imageOuter">
                  <a class="image"  href="#">
                  <span class="roll" ></span>
                  <img class="imgborder" alt="" src="images/glry-pic.png">			
                  </a>
                </div>
 -->
               
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="contact-section">
        <div class="contact-bg">
          <div class="container">
           <?php 
				$index_menuesSql5 = mysql_query("select * from manage_index_menues where id = 5 or page_id= 5");
				$index_menues_array5 = mysql_fetch_array($index_menuesSql5);									
				$id5 = $index_menues_array5['id'];
				$title_menues5 = $index_menues_array5['title'];
				$description_menues5 = $index_menues_array5['description'];
				?>
            <div class="row">
              <h2><?php echo $title_menues5; ?></h2>
              <p style="font-size: 30px; color: #FFF; text-transform: uppercase;"><?php echo $description_menues5; ?></p>
              <img class="gallery-arrow" src="images/gallery-arrow.png">
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-6 get-in-touch cntct-main">
              <div class="cntct-heading">
                <h2>GET IN <span>TOUCH</span></h2>
              </div>
              <?php 
				$contactSql = mysql_query("select * from contact_message ");
				$contact_array = mysql_fetch_array($contactSql);									
				$id = $contact_array['id'];
				$title = $contact_array['title'];
				$full_address = $contact_array['full_address'];
				$opening_hour = $contact_array['opening_hour'];
				$closing_hour = $contact_array['closing_hour'];
				$opening_days = $contact_array['opening_days'];
				$closing_days = $contact_array['closing_days'];
				$mobile_no = $contact_array['mobile_no'];
				$email = $contact_array['email'];
				?>
              <p><?php echo $title; ?></p>
              <div class="cntct-adress cntct-side">
                <span class="glyphicon glyphicon-map-marker"></span>
                <p><?php echo $full_address; ?></p>
              </div>
              <div class="cntct-timing cntct-side">
                <span class="glyphicon glyphicon-time"></span>
                <p>Opening Hour <span><?php echo $opening_hour; ?> - <?php echo $closing_hour; ?></span> <br><?php echo $opening_days; ?> - <?php echo $closing_days; ?></p>
              </div>
              <div class="cntct-phone cntct-side">
                <p><a title="phone" href="tel:<?php echo $mobile_no; ?>"><?php echo $mobile_no; ?></a><br>Email. <?php echo $email; ?></p>
              </div>
            </div>
            <div class="col-sm-6 send-msg cntct-main">
              <div class="cntct-heading">
              <?php 
				$index_menuesSql6 = mysql_query("select * from manage_index_menues where id =6  or page_id=6 ");
				$index_menues_array6 = mysql_fetch_array($index_menuesSql6);									
				$id6 = $index_menues_array6['id'];
				$title_menues6 = $index_menues_array6['title'];
				$description_menues6 = $index_menues_array6['description'];
					?>
                <h2>SEND A <span><?php echo $title_menues6; ?></span></h2>
              </div>
                <?php if(isset($sendEamilMessage['status']) && $sendEamilMessage['status'] =='success'){ ?>
                <p class="success" style=" color: #FFB606; text-transform: capitalize; font-size: 14px;"><?php echo $sendEamilMessage['message']; ?></p>
                <?php }elseif(isset($sendEamilMessage['status']) && $sendEamilMessage['status'] =='fail'){  ?>
                 <p class="error_fail" style=" color: red; text-transform: capitalize; font-size: 14px;"><?php echo $sendEamilMessage['message']; ?></p>
                <?php } ?>
              <p><?php echo $description_menues6; ?></p>
              
              <div class="contact-form">
                <form action = "#contact-section" method="POST">
                  <input class="cntct-name cntct-form" value="email" name="type" type="hidden">
                  <input class="cntct-name cntct-form" placeholder="Full Name" name="firstname" type="text">
                  <input class="cntct-email cntct-form" placeholder="Your Email" name="email" type="email">
                  <input class="cntct-sub cntct-form" placeholder="Subject" name="subject" type="text">
                  <textarea class="cntct-msg cntct-form" name="message" placeholder="Your Message"></textarea>
                  <input type ="submit" value = "Send Message" name="submit" class="send-msg-btn" >
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="map-section">
<!--         <iframe style="pointer-events:none;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109750.75089989202!2d76.6963736530677!3d30.726524966129595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed0be66ec96b%3A0xa5ff67f9527319fe!2sChandigarh%2C+India!5e0!3m2!1sen!2snl!4v1448543099926" width="100%" height="580" frameborder="0" style="border:0" allowfullscreen></iframe> -->
      <div class='embed-container  maps'>
<!-- 				<iframe frameborder='0' src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109750.75089989202!2d76.6963736530677!3d30.726524966129595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed0be66ec96b%3A0xa5ff67f9527319fe!2sChandigarh%2C+India!5e0!3m2!1sen!2snl!4v1448543099926" width="100%" height="580" frameborder="0" style="border:0" allowfullscreen>  </iframe> -->
			<iframe frameborder='0' src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2275.3464571688833!2d31.218630824705336!3d30.07056894534919!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145840fd1a5c0a0d%3A0x7739274b02f70ec!2sClub+33!5e0!3m2!1sen!2sin!4v1449668252896" width="100%" height="580" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div> 
			<script>
			 $(document).ready(function() {
				$('.maps').click(function () {
					$('.maps iframe').css("pointer-events", "auto");
				});
	
				$( ".maps" ).mouseleave(function() {
				  $('.maps iframe').css("pointer-events", "none"); 
				});
			 });                  
			</script>   
			<style>
			.maps iframe{
				pointer-events: none;
			}
			</style>
      
      </section>
      <section id="twitter-section">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 instagram-sec media-sec">
              <div class="istagram-inside">
                <span><i class="fa fa-instagram"></i></span>
                <div class="insta-galerry">
                  <ul>
                    	<?php											 
					 /*  Generated By Me 
					 CLIENT ID	49d1d7e0bec94e3fbbdd7b07041e54b6
						CLIENT SECRET	87117eb307834fb9b770ff5d637945a7
						WEBSITE URL	http://www.oremtechnologies.com/abhishek/hotel/
						REDIRECT URI	http://122.160.233.58/abhi/coffee-shop/adminpanel/instagram1.php 
						*/
					  
					  /* Auto Generated Generated By Me 
						auto genrate Client ID:-   2275375072
						token Key:-    2275375072.ab103e5.2a9165d63bc74149b2129e62bad01a13
						https://api.instagram.com/v1/users/2275375072/media/recent/?access_token=2275375072.ab103e5.2a9165d63bc74149b2129e62bad01a13 
					  */
					  $result = 'https://api.instagram.com/v1/users/2275375072/media/recent/?access_token=2275375072.ab103e5.2a9165d63bc74149b2129e62bad01a13';
					  $instagram_json = file_get_contents($result);
					  $results = json_decode($instagram_json, true);
					 $a = 0;
					  foreach ($results['data'] as $getData) {
						if($a==2){
						break;
						}	else{
						$a++;
						}	
						$instagram_images =	$getData['images']['thumbnail']['url'] ;				
						?>
                    <li>
						 <img class="insta-image" src="<?php echo $instagram_images; ?>">
						
                    </li>
                    <?php }	?>
                 
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-6 twitter-sec media-sec">
              <div class="twitter-inside">
                <span><i class="fa fa-twitter"></i></span>
                <div class="social-desc">
                  
					   <?php
					include_once('twitteroauth/twitteroauth.php');

					$twitter_customer_key           = 'HzZSNKZla3prPeKG54VhvHz3y';
					$twitter_customer_secret        = 'Q0CrQHpARSnF5a2SnG6kIhVXJLgoKMihW1JYirUOVYkVFUQhJi';
					$twitter_access_token           = '4158524007-4PhwLiXbDhA0lMcOml6IxQGwGcEvIurTvOf4MFw';
					$twitter_access_token_secret    = '857aBY2OLS7GXfYbg0Pi15PA0MgUmgn4WzgroX5EAmY2B';

					$connection = new TwitterOAuth($twitter_customer_key, $twitter_customer_secret, $twitter_access_token, $twitter_access_token_secret);

					$my_tweets = $connection->get('statuses/user_timeline', array('screen_name' => 'Cafelluca_Egypt', 'count' => 1));

					echo '<div class="twitter-bubble">';
					if(isset($my_tweets->errors))
					{           
						echo 'Error :'. $my_tweets->errors[0]->code. ' - '. $my_tweets->errors[0]->message;
					}else{
					?>

					<p><?php echo makeClickableLinks($my_tweets[0]->text);  ?><p>
					<?php	}
					echo '</div>';

					//function to convert text url into links.
					function makeClickableLinks($s) {
					  return preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a target="blank" rel="nofollow" href="$1" target="_blank">$1</a>', $s);
					}
					?>
				
                </div>
              </div>
              <div class="facebook-inside">
<!--                 <span><i class="fa fa-facebook"></i></span> -->
                <div class="social-desc facebookGet">
                 
<!--                   <a TARGET="_blank" href="https://www.facebook.com/cafelluca/" style="color: #FFF;font-family: Roboto-Light;width: 100%;">Visited us on facebook</a> -->
               
 									  <?php /*
										$get_url1 = "https://graph.facebook.com/v2.5/145634995501895/posts?access_token=CAACEdEose0cBAKdAssmwwrzQoNzqdRjFDyGKCMIEzvSrItyky2dkiMj4CQnCgIEEc7SEewZALsbPHoWKWdHE2CpfQNJZCvneghcv7WD21a3dZB74LL2U52TaqcvMR9zQIEj2AZA3qils3GrZAU8TBCJvOyb8ZAKLVaZCTVOJRw6M3wxVYBLy3reW9kIDFE4Ul49NZBwH1Lt90EcICJdviUgN" ;
										$facebook_json1 = file_get_contents($get_url1);
										$results1 = json_decode($facebook_json1, true);
										//echo "<pre>"; print_r($results1['data']);
										 $a = 0;											
										foreach ($results1['data'] as $getData) { 
										if($a==5){
											break;
											}	else{
											$a++;
											}	
										 	@$message = $getData['message'];
										 	@$created_time1 = $getData['created_time'];
											@$created_time = substr($created_time1, 0, 10);		
										
										?>
						// <label class="postsFacebookMessage">Post Message </label> 
// 						<p class="messagefab"><?php echo $message ; ?> --- 
// 						<span class="messagePosted"><?php echo $created_time ; ?>
// 						 </span>
// 						 </p> 
										
						<?php }  */ ?>
               
               
<!--            running     -->
               	 <?php /* 	$get_url = "https://graph.facebook.com/v2.5/me?fields=id%2Cname%2Cposts&access_token=CAACEdEose0cBAKdAssmwwrzQoNzqdRjFDyGKCMIEzvSrItyky2dkiMj4CQnCgIEEc7SEewZALsbPHoWKWdHE2CpfQNJZCvneghcv7WD21a3dZB74LL2U52TaqcvMR9zQIEj2AZA3qils3GrZAU8TBCJvOyb8ZAKLVaZCTVOJRw6M3wxVYBLy3reW9kIDFE4Ul49NZBwH1Lt90EcICJdviUgN" ;
										$facebook_json = file_get_contents($get_url);
										$results = json_decode($facebook_json, true);

										foreach ($results['posts'] as $getData) {
	
											 $a = 0;
											foreach ($getData as $getDatas) {
											if($a==5){
											break;
											}	else{
											$a++;
											}	
										 	@$message = $getDatas['message'];
										 	@$created_time1 = $getDatas['created_time'];
											@$created_time = substr($created_time1, 0, 10);		
										 	 ?>
										//  <label class="postsFacebookMessage">Post Message </label> 
// 						<p class="messagefab"><?php echo $message ; ?> --- 
// 						<span class="messagePosted"><?php echo $created_time ; ?>
// 						 </span>
// 						 </p> 
										<?php } }	 */ ?>
					
					
					

<style>
label.postsFacebookMessage {
width: 25%;
color: rgb(255, 182, 6);
font-size: large;
float: left;
}
p.messagefab {
float: left;
width: 72%;
}

label.postsFacebookPosted {
font-size: large;
color: #4BB9DB;
width: 42%;
float: left;
}

    </style>               
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="sponsers-section">
        <div id="demo">
          <div class="container">
            <div class="row">
              <div class="span12">
                <h2>SPONS0RS</h2>
                <div id="owl-demo" class="owl-carousel">
                 <?php 
					$sponsorsSql = mysql_query("select * from sponsors order by id desc");
					while($sponsors_array = mysql_fetch_array($sponsorsSql)){								
					 $id = $sponsors_array['id'];
					 $title = $sponsors_array['title'];
					 $sponsors_link = $sponsors_array['sponsors_link'];
					$sponsors_logo = $sponsors_array['sponsors_logo'];
				?>				
					<div class="item">
						<a href = "<?php echo $sponsors_link; ?>" TARGET="_blank">
							<img src="adminpanel/sponsors_images/<?php echo $sponsors_logo; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>"  class="sponserLogo">
						</a>
					</div>
				<?php } ?>                 			    
                </div>
                <div class="customNavigation">
                  <a class="btn prev"><img src="images/prev-icon.png"></a>
                  <a class="btn next"><img src="images/next-icon.png"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <?php include("footer.php"); ?>
<style>
img.sponserLogo {
width: 170px;
height: 170px;
}
      </style>