 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?>
 			
 			<div class="top_nav">

                <?php include('header_nav_admin.php'); ?>
			
			</div>
		
 <script>
		function validateFestival_logoForm() {	
		var title = document.forms["myForm"]["title"].value;
		if (title == null || title == "") {
		alert("Title must be filled out");
		return false;
		}
		
					
		var festival_logo = document.forms["myForm"]["festival_logo"].value;
		if (festival_logo == null || festival_logo == "") {
		alert("Festival Logo Image must be filled out");
		return false;
		}	
	
		}
</script>			
		
		
		
 <?php 
  if(isset($_REQUEST['submit'])){
  	
  	 $title 	= $_REQUEST['title'];	 
	$festival_logo 	= $_FILES['festival_logo']['name'];
	
	if($festival_logo){	
	move_uploaded_file($_FILES['festival_logo']['tmp_name'], 'festival_logo/'.$festival_logo);	
	
	$festival_logoSql = "insert into festival_logo  (`title`,`festival_logo`) values ('".$title."', '".$festival_logo."')";
	$inserted = mysql_query($festival_logoSql);
	header('Location: manage_festival.php');
		
	}else{
		$festival_logoSql = "insert into festival_logo (`title`) values ('".$title."')";
		$inserted = mysql_query($festival_logoSql);
		header('Location: manage_festival.php');
	}
  	
  }
  ?>


			
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Add Festival Logo
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
                                    <h2>Festival Logo </h2>
                                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <form name="myForm" onsubmit="return validateFestival_logoForm()"  enctype="multipart/form-data"   action ="" method="post" class="form-horizontal form-label-left"/>
										
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  class="form-control col-md-7 col-xs-12"  name="title" type="text">
                                            </div>
                                        </div>
                                                                             
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Festival Logo <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" name="festival_logo"  class="form-control col-md-7 col-xs-12">
											 </div>
                                        </div>
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                               <a href="manage_festival.php" class="btn btn-primary">Cancel</a>
                                                <input id="send" type="submit" name="submit" class="btn btn-success" value ="Add Festival Logo" />

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
   
<?php include('footer_admin.php'); ?>



