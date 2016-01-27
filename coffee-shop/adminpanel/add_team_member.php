 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?>
 			
 			<div class="top_nav">

                <?php include('header_nav_admin.php'); ?>
			
			</div>
		
 <script>
		function validateTeamForm() {	
		var title = document.forms["myForm"]["title"].value;
		if (title == null || title == "") {
		alert("Title must be filled out");
		return false;
		}
		
		var description = document.forms["myForm"]["description"].value;
		if (description == null || description == "") {
		alert("Description must be filled out");
		return false;
		}
			
		var team_photo = document.forms["myForm"]["team_photo"].value;
		if (team_photo == null || team_photo == "") {
		alert("Team Pic / Photo must be filled out");
		return false;
		}	
	
		}
</script>			
		
		
		
 <?php 
  if(isset($_REQUEST['submit'])){
  	
  	 $title 	= $_REQUEST['title'];	 
	$description 	= $_REQUEST['description'];
	$team_photo 	= $_FILES['team_photo']['name'];
	
	if($team_photo){	
	move_uploaded_file($_FILES['team_photo']['tmp_name'], 'team_photo/'.$team_photo);	
	
	$team_memberSql = "insert into team_member (`title`,`description`,`team_photo`) values ('".$title."','".$description."','".$team_photo."')";
	$inserted = mysql_query($team_memberSql);
	header('Location: manage_team.php');
		
	}else{
		$team_memberSql = "insert into team_member (`title`,`description`) values ('".$title."','".$description."')";
		$inserted = mysql_query($team_memberSql);
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
                    Add Team 
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
                                    <h2>Team</h2>
                                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <form name="myForm" onsubmit="return validateTeamForm()"  enctype="multipart/form-data"   action ="" method="post" class="form-horizontal form-label-left"/>
										
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	 <input   type="hidden" name="food_name"  value="lunchMenu">
                                                <input  class="form-control col-md-7 col-xs-12"  name="title" type="text">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Description <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="description" class="form-control col-md-7 col-xs-12"></textarea>
                                            </div>
                                        </div>                                         
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Team Photo<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" name="team_photo"  class="form-control col-md-7 col-xs-12">
											 </div>
                                        </div>
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                               <a href="manage_team.php" class="btn btn-primary">Cancel</a>
                                                <input id="send" type="submit" name="submit" class="btn btn-success" value ="Add Team" />

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
   
<?php include('footer_admin.php'); ?>



