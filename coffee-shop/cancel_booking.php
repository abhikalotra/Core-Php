<?php
  include("dbconnection.php");
  include("dbfunctions.php");
  include("dbfunctionsIndex.php");
  
  ?>  
   <?php 
  
    $cancelBooking = $_REQUEST['bookingid'];
   	$cancelBookingSql = "UPDATE `booking` SET  `status` =  '0' WHERE  `bookingid` ='$cancelBooking'";
	$loc = mysql_query($cancelBookingSql);
		if($loc){
			header('Location: booking_history.php');
		}
  
  ?>
  