  <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="dashboard.php" class="site_title">
                        <img src="images/coffee_logo.png" alt="Coffee Shop" class="imgcoffee_logo">
                      <!--   <i class="fa fa-paw"></i> --> <span>Coffee Shop</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                             <?php 
								$users_profileSql = mysql_query("select * from users WHERE  `status` = 2");
								$users_profile_array = mysql_fetch_array($users_profileSql);							
								$id = $users_profile_array['id'];	
								$profile_photo = $users_profile_array['profile_photo'];
								 if($profile_photo != ''){ ?>
									<img src="profile_photo/<?php echo $profile_photo; ?>" alt="Avatar" style="width: 56px; height: 56px;">
								  <?php   }else{ ?>
									<img src="images/img.jpg" alt="Avatar">
								   <?php    } ?>  
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2> <?php if (! empty($_SESSION['id'])){ echo $firstname; } ?> </h2>
                            
                           			 <?php 
									$festival_logoSql = mysql_query("select * from festival_logo order by id desc limit 0, 1");
									$festival_logo_array = mysql_fetch_array($festival_logoSql);									
									$id = $festival_logo_array['id'];
									$title = $festival_logo_array['title'];
									$festival_logo = $festival_logo_array['festival_logo'];
									 if($festival_logo){									
									?>
                          	  	<img src="festival_logo/<?php echo $festival_logo; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" style="width: 76px;height: 78px;position: absolute;right: 17px;top: 31px;transform: rotate(33deg);">
							   <?php } else {  ?>				   
					   
							<?php   } ?>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="dashboard.php">Dashboard</a>
                                        </li>                                       
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Booking History <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="booking_history.php">Booking Details</a>
                                        </li>
                                        <li><a href="booking_cancel_history.php">Cancel Booking</a>
                                        </li>
                                        <li><a href="newsletter_details.php">News Letter</a>
                                        </li>
                                          <li><a href="manage_noofpeoples.php">No. of peoples</a>
                                        </li>
                                      
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> Coffee Menu <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                 	   <li><a href="manage_catagory_meals.php">Manage Catagory Meals</a></li>
                                        <li><a href="lunch.php">Food Catagory Meals</a></li>
                                         <li><a href="setting_menu_bld.php">Setting menu</a>
                                        </li>
                                     
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i>Manage Index Page<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="manage_index_menus.php">Manage Index Page Menu</a></li>
                                    </ul>
                                </li>
                                 <li><a><i class="fa fa-laptop"></i> Slider Image <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="manage_slider.php">Manage Slider</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-bug"></i> Team Details <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="manage_team.php">Manage Team</a></li>
                                    </ul>
                                </li>
 								<li><a><i class="fa fa-bar-chart-o"></i> Sponsors <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="manage_sponsors.php">Manage Sponsors</a>
                                        </li>                                    
                                    </ul>
                                </li>
                                 <li><a><i class="fa fa-table"></i> Gallery Details <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="manage_gallery_images.php">Manage Gallery</a></li>
                                    </ul>
                                </li>
                                
                                <li><a><i class="fa fa-table"></i> Contact Details <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="manage_contact.php">Manage Contact</a></li>
                                    </ul>
                                </li>
                                 <li><a><i class="fa fa-eye"></i> Social Reviews <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="instagram1.php"><i class="fa fa-instagram"></i>Instagram Reviews</a></li>
                                        <li><a href="twitter.php"><i class="fa fa-twitter"></i>Twitter Reviews</a></li>
<!--                                         <li><a href="facebook1.php"><i class="fa fa-facebook"></i>Facebook Reviews</a></li>  -->
                                  
                                    </ul>
                                </li>
                            <li><a><i class="fa fa-smile-o"></i> Festival Logo <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="manage_festival.php"><i class="fa fa-instagram"></i>Festival</a></li>
                                          <li><a href="manage_snow_setting.php"><i class="fa fa-sun-o"></i>Snow Setting</a></li>
                                  
                                    </ul>
                                </li>
                                


                            </ul>
                        </div>
                      <!-- 
  <div class="menu_section">
                            <h3>Live On</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="e_commerce.html">E-commerce</a>
                                        </li>
                                        <li><a href="projects.html">Projects</a>
                                        </li>
                                        <li><a href="project_detail.html">Project Detail</a>
                                        </li>
                                        <li><a href="contacts.html">Contacts</a>
                                        </li>
                                        <li><a href="profile.html">Profile</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="page_404.html">404 Error</a>
                                        </li>
                                        <li><a href="page_500.html">500 Error</a>
                                        </li>
                                        <li><a href="plain_page.html">Plain Page</a>
                                        </li>
                                        <li><a href="login.html">Login Page</a>
                                        </li>
                                        <li><a href="pricing_tables.html">Pricing Tables</a>
                                        </li>

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a>
                                </li>
                            </ul>
                        </div>
 -->

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
