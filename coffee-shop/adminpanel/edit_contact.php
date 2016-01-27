 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?> 			
 			<div class="top_nav">
                <?php include('header_nav_admin.php'); ?>			
			</div>
		
<script src="../js/jquery.timepicker.min.js"></script>
<link href="../css/jquery.timepicker.min.css" rel="stylesheet" type="text/css">
<script>
(function($) {
$(function() {
$('input.timepicker').timepicker();			
});
})(jQuery);
</script>
	 <script>
		function validateContactMessageForm() {		
		
		var title = document.forms["myForm"]["title"].value;
		if (title == null || title == "") {
		alert("Title must be filled out");
		return false;
		}
		
		var full_address = document.forms["myForm"]["full_address"].value;
		if (full_address == null || full_address == "") {
		alert(" Address must be filled out");
		return false;
		}
		
		var opening_hour = document.forms["myForm"]["opening_hour"].value;
		if (opening_hour == null || opening_hour == "") {
		alert("Opening Hour must be filled out");
		return false;
		}		
	
		var closing_hour = document.forms["myForm"]["closing_hour"].value;
		if (closing_hour == null || closing_hour == "") {
		alert("Closing Hour must be filled out");
		return false;
		}
		
		var closing_days = document.forms["myForm"]["closing_days"].value;
		if (closing_days == null || closing_days == "") {
		alert("Closing Days must be filled out");
		return false;
		}	
		var mobile_no = document.forms["myForm"]["mobile_no"].value;
		if (mobile_no == null || mobile_no == "") {
		alert("Mobile no. must be filled out");
		return false;
		}	
		var email = document.forms["myForm"]["email"].value;
		if (email == null || email == "") {
		alert("Email must be filled out");
		return false;
		}	
		
	
		}
	</script>	
		
		
 <?php 
  if(isset($_REQUEST['submit'])){
  	
  	$ids 		  = $_REQUEST['ids'];
	$title 		  = $_REQUEST['title'];
	$full_address = $_REQUEST['full_address'];
	$opening_hour = $_REQUEST['opening_hour'];
	$closing_hour = $_REQUEST['closing_hour'];
	$opening_days = $_REQUEST['opening_days'];
	$closing_days = $_REQUEST['closing_days'];
	$mobile_no = $_REQUEST['mobile_no'];
	$email = $_REQUEST['email'];
	
	$contact_message_Sql = "UPDATE contact_message SET title= '".$title."' , full_address	= '".$full_address	."' ,opening_hour= '".$opening_hour."' ,closing_hour= '".$closing_hour."',opening_days= '".$opening_days."',closing_days= '".$closing_days."', mobile_no = '".$mobile_no."', email= '".$email."'  WHERE id = '".$ids."'";
	$UPDATEED = mysql_query($contact_message_Sql);
  	header('Location: manage_contact.php');
  }
  ?>


			
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Edit Contact Details 
                </h3>
                        </div>

                        <div class="title_right">
                            
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Edit Contact</h2>
                                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

									<?php 
									$id =$_GET['id'];
									$contactSql = mysql_query("select * from contact_message where id = $id");
									$contact_array = mysql_fetch_array($contactSql);									
									$id = $contact_array['id'];
									$title = $contact_array['title'];
									$full_address = $contact_array['full_address'];
									$opening_hour = $contact_array['opening_hour'];
									$closing_hour = $contact_array['closing_hour'];
									$opening_days = $contact_array['opening_days'];
									$closing_days = $contact_array['closing_days'];
									$mobile_no = $contact_array['mobile_no'];
									$email = $contact_array['email'];
									?>
									 
                                    <form name="myForm" onsubmit="return validateContactMessageForm()"  action ="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"  />
										
										
 										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">      
                                              <input type="hidden" class="form-control col-md-7 col-xs-12"  name="ids" value="<?php echo $id; ?>"  >  	                                           	
                                             
                                               <input type="text" class="form-control col-md-7 col-xs-12"  name="title" value="<?php echo $title; ?>"  required="required" >  	                                    		 
                                            </div>
                                        </div>                                        
                                      
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Full Address <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="full_address" class="form-control col-md-7 col-xs-12"  required="required"><?php echo $full_address; ?></textarea>
                                            </div>
                                        </div>
                                          <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Opening Hour <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	  <input  type="text"  class="timepicker form-control col-md-7 col-xs-12"  name="opening_hour" value="<?php echo $opening_hour; ?>" required="required">
                                            </div>
                                        </div>
                                         <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Closing Hour <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <input type="text"  name="closing_hour" value="<?php echo $closing_hour; ?>"  class="timepicker form-control col-md-7 col-xs-12" required="required">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Opening Days<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="opening_days" value="<?php echo $opening_days; ?>" required="required" class="form-control col-md-7 col-xs-12">
											 </div>
                                        </div>
                                         <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Closing Days<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="closing_days" value="<?php echo $closing_days; ?>" required="required" class="form-control col-md-7 col-xs-12">
											 </div>
                                        </div>
                                         <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Mobile No.<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="mobile_no" value="<?php echo $mobile_no; ?>" required="required" class="form-control col-md-7 col-xs-12">
											 </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Email<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="email" value="<?php echo $email; ?>"  class="form-control col-md-7 col-xs-12">
											 </div>
                                        </div>
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a href="manage_contact.php" class="btn btn-primary">Cancel</a>
                                                <input  type="submit" name="submit" class="btn btn-success" value ="Update Contact" />

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
   
<?php include('footer_admin.php'); ?>



 