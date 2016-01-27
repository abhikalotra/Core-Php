<?php
  include("dbconnection.php");
  include("dbfunctions.php");
  include("dbfunctionsIndex.php");
  
  ?>  
   <?php 
  
    $id = $_REQUEST['id'];
   
   	$delete_sponsors_Sql = "DELETE FROM sponsors WHERE  `id` ='$id'";
	$loc = mysql_query($delete_sponsors_Sql);
		if($loc){
			header('Location: manage_sponsors.php');
		}
  
  ?>
  