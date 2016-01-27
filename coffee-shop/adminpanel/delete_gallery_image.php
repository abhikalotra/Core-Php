<?php
  include("dbconnection.php");
  include("dbfunctions.php");
  include("dbfunctionsIndex.php");
  
  ?>  
   <?php 
  
    $id = $_REQUEST['id'];
   
   	$DELETE_gallery_images_Sql = "DELETE FROM gallery_images WHERE  `id` ='$id'";
	$loc = mysql_query($DELETE_gallery_images_Sql);
		if($loc){
			header('Location: manage_gallery_images.php');
		}
  
  ?>
  