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
  }
  ?>
  
<?php include("header_other.php"); ?>


<section id="menu-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="menu-inside">
          <div class="main-heading">
            <h2> Profile Detail</h2>
          </div>
          <?php
          if($sessionId){
          	$id =  $sessionId; 
          }else{
          	header('Location: index.php');
          }
          
          	
          	$sql="SELECT * FROM users WHERE id='$id'";
			$result=mysql_query($sql);
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
                  
                  <?php if($profile_photo != '' )
                  	{  ?>
                  	 <img src="profile_photo/<?php echo $profile_photo; ?>" class="profileImageWidth"> 
                  <?php	 }
                  	else{ ?>                  	
                  	 <img src="images/launch-img.png">                  	 
                  	<?php } ?>
                 	 
                  
                  </div>
                  <div class="menu-dis pro">
                   <h3><?php if($firstname != '' ){ echo $firstname;  }else{ echo "Firstname ( Please Update )"; } ?> - <span><?php if($lastname != '' ){ echo $lastname;  }else{ echo "Lastname ( Please Update )"; } ?> </span>
                   
                    <div class="editprofile"><a href="edit_profile.php?id=<?php echo $id; ?>"> Edit </a></div></h3>                   
                    
                    <p>Gender - <span><?php if($gender != '' ){ echo $gender;  }else{ echo "Gender ( Please Update )"; } ?></span></p>
                    <p>Email - <span><?php if($email != '' ){ echo $email;  }else{ echo "Email ( Please Update )"; } ?></span></p>
                    <p>Phone No. - <span><?php if($phone_no != '' ){ echo $phone_no;  }else{ echo "Phone No. ( Please Update )"; } ?></span></p>
                     <p>D.O.B. - <span><?php if($DOB != '' ){ echo $DOB;  }else{ echo "20-12-1990 ( Please Update )"; } ?></span></p>
                  </div>
                </div>	
         
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("footer.php"); ?>