<?php
ob_start();
// clean the variables 
session_start();


function adminlogIn(){

	$firstname 	= $_REQUEST['firstname']; 
	$password 	= md5($_REQUEST['password']);
	 $sql="SELECT * FROM users WHERE firstname='$firstname' and password='$password' and status= 2";
	$result=mysql_query($sql);
	$fetchResult = mysql_fetch_array($result);
	if($fetchResult){
	$id = $fetchResult['id'];
	$firstname = $fetchResult['firstname'];	
	 $_SESSION['id']= $id;  
	 $_SESSION['firstname']= $firstname;  
	  $_SESSION['email']= $email; 
	  header('Location: dashboard.php');
	// return array('status'=>'success','message'=>'Login sucessfully');
	
	}else{
	  return array('status'=>'fail','message'=>'Wrong Username or Password');
	
	}
	
}

	

function updateProfile(){
		
	$id 	= $_REQUEST['id'];
	$firstname 	= $_REQUEST['firstname'];
	$lastname 	= $_REQUEST['lastname'];
	$email = $_REQUEST['email'];
	$gender 	= $_REQUEST['gender'];
	$DOB 	= $_REQUEST['DOB'];
	$phone_no 	= $_REQUEST['phone_no'];
	$profile_photo 	= $_FILES['profile_photo']['name'];
	
	if($profile_photo){
	move_uploaded_file($_FILES['profile_photo']['tmp_name'], 'profile_photo/'.$profile_photo);
	
	$updateProfileSql = "UPDATE `users` SET  `firstname` =  '$firstname',`lastname` =  '$lastname',`email` =  '$email',`gender` =  '$gender',`profile_photo` =  '$profile_photo', `DOB` =  '$DOB',`phone_no` =  '$phone_no' WHERE  `id` ='$id'";
	 mysql_query($updateProfileSql);
	 return array('status'=>'success','message'=>'Update Profile sucessfully');
		
	}else{
	$updateProfileSql = "UPDATE `users` SET  `firstname` =  '$firstname',`lastname` =  '$lastname',`email` =  '$email',`gender` =  '$gender',`DOB` =  '$DOB',`phone_no` =  '$phone_no' WHERE  `id` ='$id'";
	 mysql_query($updateProfileSql);
	 return array('status'=>'success','message'=>'Update Profile sucessfully');
	}
			
}




function addLunchMenu(){

	$food_name 	= $_REQUEST['food_name'];
	$description 	= $_REQUEST['description'];
	$food_image 	= $_FILES['image']['name'];
	
	if($food_image){
	move_uploaded_file($_FILES['food_image']['tmp_name'], 'menu_lunch_image/'.$food_image);
	
		$insertLunchSql = "insert into menu_lunch (`food_name`,`description`,`food_image`) values ('".$food_name."','".$description."','".$food_image."')";
		$inserted = mysql_query($insertLunchSql);
	 return array('status'=>'success','message'=>'Add Food sucessfully Added');
		
	}else{
		$insertLunchSql = "insert into menu_lunch (`food_name`,`description`) values ('".$food_name."','".$description."')";
		$inserted = mysql_query($insertLunchSql);
	 return array('status'=>'success','message'=>'No Food Added');
	}
	
	
	
}


?>