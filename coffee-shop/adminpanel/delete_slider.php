<?php
  include("dbconnection.php");
  include("dbfunctions.php");
  include("dbfunctionsIndex.php");
  
  ?>  
   <?php 
  
    $id = $_REQUEST['id'];
   
   	$DELETE_slider_fullwidth_Sql = "DELETE FROM slider_fullwidth WHERE  `id` ='$id'";
	$loc = mysql_query($DELETE_slider_fullwidth_Sql);
		if($loc){
			header('Location: manage_slider.php');
		}
  
  ?>
  