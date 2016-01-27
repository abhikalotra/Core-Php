 
 <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                  <?php 
								$users_profileSql = mysql_query("select * from users WHERE  `status` = 2");
								$users_profile_array = mysql_fetch_array($users_profileSql);							
								$id = $users_profile_array['id'];	
								$profile_photo = $users_profile_array['profile_photo'];
								 if($profile_photo != ''){ ?>
									<img src="profile_photo/<?php echo $profile_photo; ?>" alt="Avatar">
								  <?php   }else{ ?>
									<img src="images/img.jpg" alt="Avatar">
								   <?php    } ?>  
					  
                                    
                                     <?php if (! empty($_SESSION['id'])){ echo $firstname; } ?> 
                                    
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="profile_admin.php">  Profile</a>
                                    </li>
                                   
                                    <li><a href="logout_admin.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                          

                        </ul>
                    </nav>
                </div>

            </div>
           
		   <!-- /top navigation -->
