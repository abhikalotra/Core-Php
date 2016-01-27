 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?> 			
 			<div class="top_nav">
                <?php include('header_nav_admin.php'); ?>			
			</div>
		


<?php 
	$id =$_GET['id'];
	$status =$_GET['status'];
	
	if($status == 0 ){
	
	$activate = "none";	
	
	$snow_setting_Sql = "UPDATE snow_setting SET activate= '".$activate."',status= '".$status."'  WHERE id = '".$id."'";
	$updated = mysql_query($snow_setting_Sql);
		header('Location: manage_snow_setting.php');
	
	} elseif($status == 1) {
	$activate = "block";		
	$snow_setting_Sql = "UPDATE snow_setting SET activate= '".$activate."',status= '".$status."'  WHERE id = '".$id."'";
	$updated = mysql_query($snow_setting_Sql);
		header('Location: manage_snow_setting.php');
	}
	
	?>


   
<?php include('footer_admin.php'); ?>



 