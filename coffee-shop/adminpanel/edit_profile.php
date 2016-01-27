 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?> 			
 			<div class="top_nav">
                <?php include('header_nav_admin.php'); ?>			
			</div>

		
 <?php 
  if(isset($_REQUEST['submit'])){
  	
  	$ids 		= $_REQUEST['ids'];
	$firstname 	= $_REQUEST['firstname'];
	$lastname = $_REQUEST['lastname'];
	$email = $_REQUEST['email'];
	$DOB = $_REQUEST['DOB'];
	$phone_no = $_REQUEST['phone_no'];
	$profile_photo 	= $_FILES['profile_photo']['name'];
	
	
	if($profile_photo){	
	move_uploaded_file($_FILES['profile_photo']['tmp_name'], 'profile_photo/'.$profile_photo);	
	
	$profileSql = "UPDATE users SET firstname= '".$firstname."' , lastname	= '".$lastname	."' ,email	= '".$email	."' , DOB	= '".$DOB	."' ,phone_no	= '".$phone_no	."' , profile_photo= '".$profile_photo."'  WHERE id = '".$ids."'";
	$updated = mysql_query($profileSql);
	header('Location: profile_admin.php');
		
	}else{
		$profileSql = "UPDATE users SET firstname= '".$firstname."' , lastname	= '".$lastname	."' ,email	= '".$email	."' , DOB	= '".$DOB	."' ,phone_no	= '".$phone_no	."' WHERE id = '".$ids."'";
 		$updated = mysql_query($profileSql);
 		header('Location: profile_admin.php');
  	
	}
	
	
  }
  ?>


			
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Edit Profile  
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
                                    <h2> Edit Profile</h2>
                                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

									<?php 
									$id =$_GET['id'];
									$team_memberSql = mysql_query("select * from users  where id = $id");
									$team_member_array = mysql_fetch_array($team_memberSql);									
									$id = $team_member_array['id'];
									$firstname 	= $team_member_array['firstname'];
									$lastname = $team_member_array['lastname'];
									$email = $team_member_array['email'];
									$gender = $team_member_array['gender'];
									$DOB = $team_member_array['DOB'];
									$profile_photo = $team_member_array['profile_photo'];
									$phone_no = $team_member_array['phone_no'];
									?>
									 
                                    <form name="myForm"   action ="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"  />
										
										
 										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Firstname <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">  
                                              <input type="hidden" class="form-control col-md-7 col-xs-12"  name="ids" value="<?php echo $id; ?>" >  	   
                                               <input type="text" class="form-control col-md-7 col-xs-12"  name="firstname" value="<?php echo $firstname; ?>"  required="required" >  	                                    		 
                                            </div>
                                        </div>                                        
                                      
                                      <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Lastname <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                               <input type="text" class="form-control col-md-7 col-xs-12"  name="lastname" value="<?php echo $lastname; ?>"  required="required" >  	                                    		 
                                            </div>
                                        </div>                                        
                                      
                                      <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Email <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                               <input type="email" class="form-control col-md-7 col-xs-12"  name="email" value="<?php echo $email; ?>"  required="required" >  	                                    		 
                                            </div>
                                        </div>  
                                        
                                         <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >DOB <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                               <input type="date" class="form-control col-md-7 col-xs-12"  name="DOB" value="<?php echo $DOB; ?>"  required="required" >  	                                    		 
                                            </div>
                                        </div>    
                                           <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Phone No <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                               <input type="number" class="form-control col-md-7 col-xs-12"  name="phone_no" value="<?php echo $phone_no; ?>"  required="required" >  	                                    		 
                                            </div>
                                        </div>                                        
                                            
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Photo <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?php 
                                               if($profile_photo != ''){ ?>
                                             	<img src="profile_photo/<?php echo $profile_photo; ?>" style="width: 86px;height: 86PX;">
											  <?php   }else{ ?>
													<img src="images/img.jpg" alt="Avatar">
											   <?php    } ?>
                                            </br>
                                            	  <input  type="file"  class="form-control col-md-7 col-xs-12"  name="profile_photo" value="<?php echo $profile_image; ?>">
                                            </div>
                                        </div>
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a href="profile_admin.php" class="btn btn-primary">Cancel</a>
                                                <input  type="submit" name="submit" class="btn btn-success" value ="Update Profile" />

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
   
<?php include('footer_admin.php'); ?>



 