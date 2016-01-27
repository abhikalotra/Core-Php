<?php
  include("dbconnection.php");
  include("dbfunctions.php");
  include("dbfunctionsIndex.php");
  
  ?>  
   <?php 
  if(isset($_REQUEST['submit'])){
   	
 	  	
  	if($_REQUEST['type'] == 'logIn'){	
  		logIn();
  	}
  
  	if($_REQUEST['type'] == 'updateProfiles'){	
  		updateProfile();
  	}
  }
  ?>
  
<?php include("header_other.php"); ?>


<section id="menu-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="menu-inside">
          <div class="main-heading">
            <h2>Edit Profile Detail</h2>
          </div>
          <?php
          if($sessionId){
          	$id =  $sessionId; 
          }else{
          	header('Location: index.php');
          }
          
          	$Id = $_GET['id'];
          	$sql1 ="SELECT * FROM users WHERE id ='$Id'";
			$result=mysql_query($sql1);
			$fetchResult = mysql_fetch_array($result);
			$id = $fetchResult['id'];
			$firstname = $fetchResult['firstname'];
			$lastname = $fetchResult['lastname'];
			$email = $fetchResult['email'];
			$gender = $fetchResult['gender'];
			$phone_no = $fetchResult['phone_no'];
			$DOB = $fetchResult['DOB'];
			$profile_photo = $fetchResult['profile_photo'];
			
			
          ?>
           		<div class="menu-table-list">
                  <div class="menu-img">
                  
                  </div>                  
                  <div class="menu-dis proEdit">
                  <form action = "" method= "POST"  enctype="multipart/form-data">
					<input type="hidden" name="type" value="updateProfiles">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<label class="editProfile">Email</label><input type="email" name="email" class="text-field fieldHight" value="<?php echo $email; ?>" placeholder="Email" readonly />
					<label class="editProfile">First Name</label><input type="text" name="firstname" value="<?php echo $firstname; ?>" class="text-field fieldHight" placeholder="firstname">
					<label class="editProfile">Last Name</label><input type="text" name="lastname"  value="<?php echo $lastname; ?>" class="text-field fieldHight" placeholder="lastname">
					<label class="editProfile" >Gender</label>
					 <select name="gender" class="text-field fieldHight">
					 	<?php  if($gender == 'male'){ ?> 
					 	 <option value="<?php echo $gender; ?>">Male</option>
						<option value="female">Female</option> 
						 <?php }elseif($gender == 'female'){ ?>
						  <option value="male">Male</option>
						<option value="<?php echo $gender; ?>">Female</option>	 
						<?php }else{ ?>
						 <option value="">Select</option>
						<option value="male">Male</option>
						<option value="female">Female</option>	
						<?php  }  ?>					 						
					</select>
					
					<label class="editProfile">D.O.B</label><input type="date" name="DOB" value="<?php echo $DOB; ?>"  class="text-field fieldHight" placeholder="D.O.B.">
					<label class="editProfile">Phone No </label><input type="text" name="phone_no" value="<?php echo $phone_no; ?>"  class="text-field fieldHight" placeholder="phone_no">
					<label class="editProfile">Profile Photo </label> </br>
						 
					<?php if($profile_photo != '' )
                  	{  ?>
                  	 <img src="profile_photo/<?php echo $profile_photo; ?>" class="profileImageWidth"> 
                  <?php	 }
                  	else{ ?>                  	
                  	 <img src="images/launch-img.png">                  	 
                  	<?php } ?>
                  	
					<input type="file" name="profile_photo" value="<?php echo $profile_photo; ?>"  class="text-field fieldHight" >
					<div id="buttons" class="updateProfile"> 
					<input type="submit" name="submit" value="Update Profile" class="signUp updateBtn">	
					
					<a href="user_profile.php" class="orangeSignUp"> Back </a>				
					</div>
				 </form> 
                 
             
                  </div>
                </div>	
         
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("footer.php"); ?>