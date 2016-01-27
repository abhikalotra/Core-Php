<?php
  include("dbconnection.php");
  include("dbfunctions.php");
  //include("dbfunctionsIndex.php");
  
  ?>  
   <?php 
  
    $id = $_REQUEST['id'];
   
   	$delete_food_Sql = "DELETE FROM booking WHERE  `bookingid` ='$id'";
	$loc = mysql_query($delete_food_Sql);
		if($loc){
			header('Location: booking_history.php');
		}
  
  ?>
  