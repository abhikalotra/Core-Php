<?php
  include("dbconnection.php");
  include("dbfunctions.php");
  include("dbfunctionsIndex.php");
  
  ?>  
   <?php 
  
    $id = $_REQUEST['id'];
   
   	$DELETE_newsletter_Sql = "DELETE FROM newsletter WHERE  `id` ='$id'";
	$loc = mysql_query($DELETE_newsletter_Sql);
		if($loc){
			header('Location: newsletter_details.php');
		}
  
  ?>
  