 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?> 			
 			<div class="top_nav">
                <?php include('header_nav_admin.php'); ?>			
			</div>
		

	 <script>
		function validateFestivalForm() {		
		
		var title = document.forms["myForm"]["title"].value;
		if (title == null || title == "") {
		alert("Title must be filled out");
		return false;
		}
		
	
		}
	</script>	
		
		
 <?php 
  if(isset($_REQUEST['submit'])){
  	
  	$ids 		  = $_REQUEST['ids'];
	$title 		  = $_REQUEST['title'];
	$festival_logo 	= $_FILES['festival_logo']['name'];
	
	
	if($festival_logo){	
	move_uploaded_file($_FILES['festival_logo']['tmp_name'], 'festival_logo/'.$festival_logo);	
	
	$festival_logo_Sql = "UPDATE festival_logo SET title= '".$title."' ,festival_logo= '".$festival_logo."'  WHERE id = '".$ids."'";
	$updated = mysql_query($festival_logo_Sql);
	header('Location: manage_festival.php');
		
	}else{
		$festival_logo_Sql = "UPDATE festival_logo SET title= '".$title."'  WHERE id = '".$ids."'";
 		$updated = mysql_query($festival_logo_Sql);
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
                    Edit Festival Details
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
                                    <h2> Edit Festival</h2>
                                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

									<?php 
									$id =$_GET['id'];
									$festival_logoSql = mysql_query("select * from festival_logo  where id = $id");
									$festival_logo_array = mysql_fetch_array($festival_logoSql);									
									$id = $festival_logo_array['id'];
									$title = $festival_logo_array['title'];
									$festival_logo = $festival_logo_array['festival_logo'];
									?>
									 
                                    <form name="myForm" onsubmit="return validateFestivalForm()"  action ="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"  />
										
										
 										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">      
                                              <input type="hidden" class="form-control col-md-7 col-xs-12"  name="ids" value="<?php echo $id; ?>"  >  	                                          	
                                             
                                               <input type="text" class="form-control col-md-7 col-xs-12"  name="title" value="<?php echo $title; ?>" >  	                                    		 
                                            </div>
                                        </div>                                        
                                      
                                      
                                          <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Festival Logo <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                          <?php   if($festival_logo){	?>
													 <img src="festival_logo/<?php echo $festival_logo; ?>" style="width: 86px;height: 86PX;">
                                         			   </br>
													<?php } else {  ?>				   
 														</br>
													<?php   } ?>
                                            
                                            	  <input  type="file"  class="form-control col-md-7 col-xs-12"  name="festival_logo" value="<?php echo $festival_logo; ?>">
                                            </div>
                                        </div>
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a href="manage_festival.php" class="btn btn-primary">Cancel</a>
                                                <input  type="submit" name="submit" class="btn btn-success" value ="Update Festival" />

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
   
<?php include('footer_admin.php'); ?>



 