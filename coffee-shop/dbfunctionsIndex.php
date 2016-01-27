<?php
ob_start();
// clean the variables 
session_start();


function registerUser(){

	$password 	= md5($_REQUEST['password']);
	$email 	= $_REQUEST['email'];
	$phone_no 	= $_REQUEST['phone_no'];
	
	$sqlCheck="SELECT * FROM  `users` WHERE  `email` LIKE  '%$email' && phone_no  LIKE  '%$phone_no'  ";
	$resultCheck=mysql_query($sqlCheck);
	$resultCheckget = mysql_fetch_array($resultCheck);
	$emails = $resultCheckget['email'];
	$phone_nos = $resultCheckget['phone_no']; 
	
	
	if($emails == $email &&  $phone_nos == $phone_no){		
	return array('status'=>'already','message'=>'Already Exist');	
	}else{
	
	$to = $email;	
	$subject = "Welcome To Coffee Shop";
	$message = '<html>
<body>
	<div style="font-family:arial,sans-serif;font-size:14px;background:#e6f1f5;padding:22px;margin-top:15px">
				<h2><em>Your Account Has Been Register Successfully !! </em></h2> 
					<img src="http://122.160.233.58/abhi/coffee-shop/images/team-img.png" style="margin-right:15px;margin-bottom:15px;width: 115px;height: 123px;" border="0" align="left" class="CToWUd">
					 Coffee shop for the young and the young at heart. We are part of Coffee Day Global Limited. We source our coffees from thousands of small coffee planters. They and the many plantation workers have truly made us who we are today and we are glad to be a part of their lives.
 					<br><br>
				Email Id : '.$email.'
					<br><br>
				Phone No. : '.$phone_no.'
				</br></br>
				<h2><em>Thanks For Your Interest In our Coffee Shop. </em></h2> 
				</div>
				</body>
				</html>
				';
	$txt = "Hello '".$email."'! \r\n\r\n   '".$message."'";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= "From: coffee_shop@example.com" . "\r\n" ;
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	$sentmail  = mail($to,$subject,$txt,$headers);
	
	$userRegisterSql = "insert into users (`password`,`email`,`phone_no`, `status`) values ('$password', '$email',  '$phone_no', '1' )";
	$insertQuery = mysql_query($userRegisterSql);
	if($insertQuery){
	 $lastId =mysql_insert_id();	
	$lastIdsql="SELECT * FROM users WHERE id='$lastId'";
	$lastIdresult=mysql_query($lastIdsql);
	$lastIdfetchResult = mysql_fetch_array($lastIdresult);
		if($lastIdfetchResult){
		$id = $lastIdfetchResult['id'];
		$email = $lastIdfetchResult['email'];	
		 $_SESSION['id']= $id;  
		 $_SESSION['email']= $email;
	
		}
	
	return array('status'=>'success','message'=>'Register sucessfully');
	}
	}
	
}


function logIn(){

	$email 	= $_REQUEST['email']; 
	$password 	= md5($_REQUEST['password']);
	$sql="SELECT * FROM users WHERE email='$email' and password='$password' and status = 1 ";
	$result=mysql_query($sql);
	$fetchResult = mysql_fetch_array($result);
	if($fetchResult){
	$id = $fetchResult['id'];
	$email = $fetchResult['email'];	
	 $_SESSION['id']= $id;  
	 $_SESSION['email']= $email;  
	 
	 return array('status'=>'success','message'=>'Login sucessfully');
	}else{
	  return array('status'=>'fail','message'=>'Wrong Username or Password');
	
	}
	
}



function newsLetter(){

	$email 	= $_REQUEST['email'];
	
	$sqlCheck="SELECT * FROM  `newsletter` WHERE  `email` LIKE  '%$email' ";
	$resultCheck=mysql_query($sqlCheck);
	$resultCheckget = mysql_fetch_array($resultCheck);
	$emails = $resultCheckget['email'];
	
	if($emails == $email ){		
	return array('status'=>'already_subscribe','message'=>'Already Subscribe');	
	}else{
	
		$to = $email;	
		$subject = "News Letter - Welcome To Coffee Shop";
		$message = '<html>
	<body>
		<div style="font-family:arial,sans-serif;font-size:14px;background:#e6f1f5;padding:22px;margin-top:15px">
					<h2><em>Subscription Successfully !! </em></h2> 
						<img src="http://122.160.233.58/abhi/coffee-shop/images/team-img.png" style="margin-right:15px;margin-bottom:15px;width: 115px;height: 123px;" border="0" align="left" class="CToWUd">
						 Your subscription to our list has been confirmed in our Coffee shop <br><br>
					Email Id : '.$email.'
						<br><br>
					<h2><em>Thanks For Your Subscribing !!  , In our Coffee Shop. </em></h2> 
					</div>
					</body>
					</html>
					';
		$txt = "Hello '".$email."'! \r\n\r\n   '".$message."'";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "From: coffee_shop@example.com" . "\r\n" ;
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
		$sentmail  = mail($to,$subject,$txt,$headers);
		if($sentmail){ 
			$newsletterSql = "insert into newsletter (`email`,`subscribe_status`) values ('$email', '1' )";
			$newsletterQuery = mysql_query($newsletterSql);
			if($newsletterQuery){
			return array('status'=>'success','message'=>'NewsLetter sucessfully Subscribe');
			}else{
			return array('status'=>'fail','message'=>'NewsLetter Subscription Fail');
			}
		}
	
	}
	
	
	
}



function booknow(){
	$email 	= $_REQUEST['email'];
	$phone 	= $_REQUEST['phone'];
	
	

	$sqlCheck="SELECT * FROM  `users` WHERE  `email` LIKE  '%$email' && phone_no  LIKE  '%$phone'  ";
	$resultCheck=mysql_query($sqlCheck);
	$resultCheckget = mysql_fetch_array($resultCheck);
	$phone_no = $resultCheckget['phone_no'];
	
	$time 	= $_REQUEST['time'];
	$people = $_REQUEST['people'];
	$name 	= $_REQUEST['name'];
	
	$dateTime 			= (date("Y-m-d H:i:s",time()));
	$bookingDate 		= $_REQUEST['datepicker'];
	$middle 			= strtotime($bookingDate); 
	$bookingDateFormat 	= date('Y-m-d', $middle);
	$currentDateTime 	= $dateTime;
	$currentDateTime  	= strtotime($currentDateTime);   
	$currentDate 		= date('m/d/Y', $currentDateTime);	
	$currentDate  		= strtotime($currentDate);   
	
	if($phone_no){ 
	
	if($middle<$currentDate){
		//echo "less";
	  }else{
		$insertSql = "insert into booking (`date`,`time`,`user_name`,`people`,`phone_no`,`email`,`status`)values('".$bookingDateFormat."','".$time."','".$name."','".$people."','".$phone."','".$email."','1')";
		$insertFun = insert($insertSql,'array');
		if($insertFun>0){
			return array('status'=>'success','message'=>'Booked sucessfully');
		}else{
			return array('status'=>'fail','message'=>'Booked fail');
		}
	 }	
	
	}else{
		return array('status'=>'fail','message'=>'Booked fail - Please register your account for booking ');
	}

}




function sendEamil(){
		
	$firstname 	= $_REQUEST['firstname'];
	$email = $_REQUEST['email'];
	$subject 	= $_REQUEST['subject'];
	$message 	= $_REQUEST['message'];
	
	$to = $email;	
	$txt = "Hello '".$firstname."'! \r\n\r\n   '".$message."'";
	$headers = "From: coffee_shop@example.com" . "\r\n" ;

	$sentmail  = mail($to,$subject,$txt,$headers);
	if($sentmail){		
		$insertsendEamilSql = "insert into send_message (`firstname`,`email`,`subject`,`message`,`status`) values ('".$firstname."','".$email."','".$subject."','".$message."','1')";
		$insertFun = mysql_query($insertsendEamilSql);
		return array('status'=>'success','message'=>'Mail Send sucessfully');
		
	}else{
	return array('status'=>'fail','message'=>'Mail fail');
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


?>