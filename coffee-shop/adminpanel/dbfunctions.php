<?php
ob_start();
// clean the variables 
function cleanVars($vars){
	
	$cleanVars = array();
	foreach($vars as $varname => $value){ 
		$clean = trim($value); 
		$clean = strip_tags($clean); 
		$clean = addslashes($clean); // use inplace of addslashes 
		$cleanVars[$varname] = $clean; //create sanitized array 
	}  	
	return($cleanVars);
}

// insert function use to insert new entry in database and get new generated id  
function insert($query){
	
	$queryResponse = MYSQL_QUERY($query)or die($query." ". mysql_error());
	if(is_resource($queryResponse)){		
		return  mysql_fetch_array($queryResponse);
	}else{		
		return mysql_insert_id();
	}
	
}
// get functions use check and get the data from database
function get($query,$fetchType) { 
	
	$queryResponse = mysql_query($query)or die($query.mysql_error());
	$dbReturnArray = array();	
	$i=0;
	$fetchCommand="mysql_fetch_$fetchType";

	while (@$queryResponseRow=$fetchCommand($queryResponse)) {
		$dbReturnArray[$i]=$queryResponseRow;
		$i++;
	}	
	return $dbReturnArray;
}
// set function use to update and insert data 
function set($query) {
	
	$queryResponse = MYSQL_QUERY($query)or die($query." ". mysql_error());	
	
	if(is_resource($queryResponse)) {		
		return mysql_fetch_array($queryResponse);
	}else{
		return $queryResponse;
	}
}

// delete method
function delete($query){	

	if(mysql_query($query)){		
		$success = "1";
	}else{		
		$success = "0";
	}
	return $success;	
}

//function for today date
function todaysDate(){
	
    $tdate = date("Y-m-d", mktime(0,0,0, date("m"), date("d"), date("y")));
    $tdate = $tdate." ".date('H:i:s');
    return $tdate;
}

//function to create random password
function randomPassword() {
	
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //declare $pass as an array
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 6; $i++) {
        $n 		= rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}


//function to create random password
function randomTwoDigits() {
	
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //declare $pass as an array
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 2; $i++) {
        $n 		= rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}
// method use for send mail
function newPasswordSend($useremail,$usermessage){
	
	$email_from = 'admin@gmail.com';
	$to   		= $useremail;
	$subject 	= "Password updated";
	$message 	= $usermessage;
	$headers  	= 'MIME-Version: 1.0' . "\r\n";
	$headers   .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers   .= 'From:'.$email_from ."\r\n";

	if(mail($to, $subject, $message, $headers)){
		return true;
	}else{
		return false;
	}
}

function sendMailtest($useremail,$message){
	
$email_from = 'admin@gmail.com';
	$to   		= $useremail;
	$subject 	= "Password updated";
	$message 	= $usermessage;
	$headers  	= 'MIME-Version: 1.0' . "\r\n";
	$headers   .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers   .= 'From:'.$email_from ."\r\n";

	if(mail($to, $subject, $message, $headers)){
		return true;
	}else{
		return false;
	}
}


function sendMail($email,$uniquecode,$emailEncrypt){
	
	
 ini_set("SMTP", "aspmx.l.google.com");
 
$link = "http://www.cluzterz.com/browse/cms/agreementForm.php?email=".$emailEncrypt;

$temp 	  = file_get_contents('mail_template.php');	

$temp 	  = str_replace('{{ link }}',$link,$temp);
$temp 	  = str_replace('{{ uniquecode }}',$uniquecode,$temp);
$temp 	  = str_replace('{{ emailEncrypt }}',$emailEncrypt,$temp);

$to       = $email;
$subject  = 'Business Code';
$mail_body = $temp."\r\n";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:donotreply@cluzterz.com' . "\r\n";

	if(mail($to,$subject,$mail_body,$headers)){
		$msg = array();
		$msg['status']=1;
		$msg['message']='Email has been delivered to admin';
		//echo json_encode($msg);
	}else{
		$msg = array();
		$msg['status']=0;
		$msg['message']='Failed to deliver the message';
		//echo json_encode($msg);
	}
}
// check email validation
function validateEmail($email) {
	
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// function to check user is validity
function isUserValid($id){
	
	 if($id >0){		 
		 // check users from table
		 $sql_check = "select * from users where userid ='".$id."'";
		 $res_check = get($sql_check,"array");
		 $row_check = count($res_check);
		 
		 if($row_check>0){
			 if($res_check[0]['isactive'] == 1){
				 return true;			 
			 }elseif($res_check[0]['isactive'] == 0){
				 return false;
			 }
		 }else{
			  return false;
		 }
	 }else{
		 return false;
	 }
}

// user details through user id
function user_details($userid,$fieldname){
	
	$fieldDetails = "";
	//$sql = "SELECT `username`,`user_image` FROM `users` WHERE `userid`='".$userid."' and 	isactive='1'";
	$sql = "SELECT $fieldname FROM `users` WHERE `userid`='".$userid."'";
	
	$fun = get($sql,"assoc");
	if(count($fun)>0){
	$fieldDetails =  $fun[0][$fieldname];
	}
	return $fieldDetails;
	
	
}

function deleteRow($query){	

		if(mysql_query($query)){		
			$success = "1";
		}else{		
			$success = "0";
		}
		return $success;	
	}




function upload_image($imagename,$temp_name){
	
	//$uploadDir = 'image_upload/'; //Uploading to same directory as PHP file
//$file = basename($_FILES['userfile']['name']);lookbook/images/thumbs/5582.jpg
$uploadDir = 'image_upload/';
$file = $imagename;


$ext = explode(".",$file);
$total = count($ext);
$ext   =  $ext[$total-1];
$newNameTime = time().".".$ext;

$newName = $uploadDir .$newNameTime;

/*$uploadFile = $file;
$randomNumber = rand(0, 99999);
$newName = $uploadDir . $randomNumber . $uploadFile;*/

if (is_uploaded_file($_FILES[$temp_name]['tmp_name'])) {
	//echo "Temp file uploaded.";
} else {
}
if (move_uploaded_file($_FILES[$temp_name]['tmp_name'], $newName)) {
	
	return $newNameTime;
	//$imageName = 'cms/image_upload/'.$newNameTime;
//$JsonRating = array ('message'=>'File Uploaded Successfully','success'=>'1','imagename'=>$newName);
/*$JsonRating = array ('message'=>'File Uploaded Successfully','success'=>'1','imagename'=>$imageName);
echo json_encode($JsonRating);*/
}else{
	
	$newNameTime = 0 ;
	return $newNameTime;
/*$JsonRating = array ('message'=>'File Upload Fail','success'=>'0');
echo json_encode($JsonRating);*/
}
}

?>