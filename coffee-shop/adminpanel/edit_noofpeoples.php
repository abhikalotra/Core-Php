 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?> 			
 			<div class="top_nav">
                <?php include('header_nav_admin.php'); ?>			
			</div>
		

	 <script>
		function validatenoofpeoplesForm() {		
		
		var no_peoples = document.forms["myForm"]["no_peoples"].value;
		if (no_peoples == null || no_peoples == "") {
		alert("No Peoples must be filled out");
		return false;
		}
		
		
		
	
		}
	</script>	
		
		
 <?php 
  if(isset($_REQUEST['submit'])){
  	
  	$ids 		  = $_REQUEST['ids'];
	$no_peoples 		  = $_REQUEST['no_peoples'];
		
		$no_peoples_Sql = "UPDATE booking_noofpeoples SET no_peoples= '".$no_peoples."'  WHERE id = '".$ids."'";
 		$updated = mysql_query($no_peoples_Sql);
  		header('Location: manage_noofpeoples.php');

	
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
									$no_peoplesSql = mysql_query("select * from booking_noofpeoples  where id = $id");
									$no_peoples_array = mysql_fetch_array($no_peoplesSql);									
									$id = $no_peoples_array['id'];
									$no_peoples = $no_peoples_array['no_peoples'];
									?>
									 
                                    <form name="myForm" onsubmit="return validatenoofpeoplesForm()"  action ="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"  />
										
										
 										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >No of Peoples are Shown:-<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">      
                                              <input type="hidden" class="form-control col-md-7 col-xs-12"  name="ids" value="<?php echo $id; ?>"  >  	                                          	
                                             
                                               <input type="text" class="form-control col-md-7 col-xs-12" name="no_peoples" value="<?php echo $no_peoples; ?>"  required="required" >  	                                    		 
                                            </div>
                                        </div>                                        
                                  
 										
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a href="manage_noofpeoples.php" class="btn btn-primary">Cancel</a>
                                                <input  type="submit" name="submit" class="btn btn-success" value ="Update No. Of Peoples" />

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
   
<?php include('footer_admin.php'); ?>



 