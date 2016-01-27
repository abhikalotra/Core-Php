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
		function validateTeamMemberForm() {		
		
		var title = document.forms["myForm"]["title"].value;
		if (title == null || title == "") {
		alert("Title must be filled out");
		return false;
		}
		
		var description = document.forms["myForm"]["description"].value;
		if (description == null || description == "") {
		alert(" Description must be filled out");
		return false;
		}
		
	
		}
	</script>	
		
		
 <?php 
  if(isset($_REQUEST['submit'])){
  	
  	$ids 		  = $_REQUEST['ids'];
	$title 		  = $_REQUEST['title'];
	$description = $_REQUEST['description'];
	$team_photo 	= $_FILES['team_photo']['name'];
	
	
	if($team_photo){	
	move_uploaded_file($_FILES['team_photo']['tmp_name'], 'team_photo/'.$team_photo);	
	
	$team_member_Sql = "UPDATE team_member SET title= '".$title."' , description	= '".$description	."' ,team_photo= '".$team_photo."'  WHERE id = '".$ids."'";
	$updated = mysql_query($team_member_Sql);
	header('Location: manage_team.php');
		
	}else{
		$team_member_Sql = "UPDATE team_member SET title= '".$title."' , description	= '".$description	."' WHERE id = '".$ids."'";
 		$updated = mysql_query($team_member_Sql);
  		header('Location: manage_team.php');
	}
	
	
  }
  ?>


			
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Edit Team Details 
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
                                    <h2> Edit Team</h2>
                                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

									<?php 
									$id =$_GET['id'];
									$team_memberSql = mysql_query("select * from team_member  where id = $id");
									$team_member_array = mysql_fetch_array($team_memberSql);									
									$id = $team_member_array['id'];
									$title = $team_member_array['title'];
									$description = $team_member_array['description'];
									$team_photo = $team_member_array['team_photo'];
									?>
									 
                                    <form name="myForm" onsubmit="return validateTeamMemberForm()"  action ="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"  />
										
										
 										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">      
                                              <input type="hidden" class="form-control col-md-7 col-xs-12"  name="ids" value="<?php echo $id; ?>"  >  	                                          	
                                             
                                               <input type="text" class="form-control col-md-7 col-xs-12"  name="title" value="<?php echo $title; ?>"  required="required" >  	                                    		 
                                            </div>
                                        </div>                                        
                                      
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="description" class="form-control col-md-7 col-xs-12" ><?php echo $description; ?></textarea>
                                            </div>
                                        </div>
                                          <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Team Photo <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <img src="team_photo/<?php echo $team_photo; ?>" style="width: 86px;height: 86PX;">
                                            </br>
                                            	  <input  type="file"  class="form-control col-md-7 col-xs-12"  name="team_photo" value="<?php echo $team_photo; ?>">
                                            </div>
                                        </div>
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a href="manage_team.php" class="btn btn-primary">Cancel</a>
                                                <input  type="submit" name="submit" class="btn btn-success" value ="Update Team" />

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
   
<?php include('footer_admin.php'); ?>



 