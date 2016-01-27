<?php
  include("dbconnection.php");
  include("dbfunctions.php");
  include("dbfunctionsIndex.php");
  
  ?>  
   <?php 
  
    $id = $_REQUEST['id'];
   
   	$DELETE_festival_logo_Sql = "DELETE FROM festival_logo WHERE  `id` ='$id'";
	$loc = mysql_query($DELETE_festival_logo_Sql);
		if($loc){
			header('Location: manage_festival.php');
		}
  
  ?>
  