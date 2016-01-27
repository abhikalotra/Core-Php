


  <?php include('header_admin.php'); ?>
  
  
 
          <?php include('sidebar_admin.php'); ?>

            <!-- top navigation -->
            <div class="top_nav">

                <?php include('header_nav_admin.php'); ?>
			
			</div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                  Profile Details 
                   
                </h3>
                        </div>

                        <div class="title_right">
     
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Admin Profile </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <?php 
								$users_profileSql = mysql_query("select * from users WHERE  `status` = 2");
								$users_profile_array = mysql_fetch_array($users_profileSql);							
								$id = $users_profile_array['id'];											
								$firstname = $users_profile_array['firstname'];
								$lastname = $users_profile_array['lastname'];
								$email = $users_profile_array['email'];
								$profile_photo = $users_profile_array['profile_photo'];
								$DOB = $users_profile_array['DOB'];
								$phone_no = $users_profile_array['phone_no'];								
								$gender = $users_profile_array['gender'];
								?>
                                <div class="x_content">

                                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                                        <div class="profile_img">

                                            <div id="crop-avatar">
                                               <div class="avatar-view" title="Change the avatar">
                                               <?php 
                                               if($profile_photo != ''){ ?>
                                                <img src="profile_photo/<?php echo $profile_photo; ?>" alt="Avatar">
											  <?php   }else{ ?>
													<img src="images/img.jpg" alt="Avatar">
											   <?php    } ?>
                                                   
                                                </div>

                                                
                                            </div>
                                           
                                        </div>
                                        <h3>
                                       <?php if($firstname){  echo $firstname ;  } else { echo "Admin";  } ?>   <?php if($lastname){  echo $lastname ;  } else { echo "Jon";  } ?>
									</h3>
                                        <ul class="list-unstyled user_data">
                                            <li><i class="fa fa-map-marker user-profile-icon"></i>  <?php if($phone_no){  echo $phone_no ;  } else { echo "123456";  } ?>
                                            </li>

                                            <li>
                                                <i class="fa fa-briefcase user-profile-icon"></i>  <?php if($email){  echo $email ;  } else { echo "admin@gmail.com";  } ?>
                                            </li>

                                          
                                        </ul>

                                        <a class="btn btn-success" href="edit_profile.php?id=<?php echo $id; ?>"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                                        <br />

                                       	
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                
          <?php include('footer_admin.php'); ?>