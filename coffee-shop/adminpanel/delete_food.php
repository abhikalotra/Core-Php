<?php
  include("dbconnection.php");
  include("dbfunctions.php");
  include("dbfunctionsIndex.php");
  
  ?>  
   <?php 
  
    $id = $_REQUEST['id'];
   
   	$delete_food_Sql = "DELETE FROM menu_lunch WHERE  `id` ='$id'";
	$loc = mysql_query($delete_food_Sql);
		if($loc){
			header('Location: lunch.php');
		}
  
  ?>
  