 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?> 			
 			<div class="top_nav">
                <?php include('header_nav_admin.php'); ?>			
			</div>

	 <script>
		function validateIndexMenuForm() {		
		
		var title = document.forms["myForm"]["title"].value;
		if (title == null || title == "") {
		alert("Title must be filled out");
		return false;
		}
		
		var description = document.forms["myForm"]["description"].value;
		if (description == null || description == "") {
		alert(" Description Link must be filled out");
		return false;
		}
		}
	</script>	
		
		
 <?php 
  if(isset($_REQUEST['submit'])){
    	
  	$ids 		    = $_REQUEST['ids'];
	$title		    = $_REQUEST['title'];
	$description    = $_REQUEST['description'];	
	 $manage_index_menuesSql = "UPDATE manage_index_menues SET title= '".$title."' , description	= '".$description	."' WHERE id = '".$ids."'";
	$updated = mysql_query($manage_index_menuesSql);
	header('Location: manage_index_menus.php');
  }
  ?>


			
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Edit Index Menu
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
                                    <h2> Edit Index Menu</h2>
                                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

									<?php 
									$id =$_GET['id'];
									$contactSql = mysql_query("select * from manage_index_menues where id = $id");
									$contact_array = mysql_fetch_array($contactSql);									
									$id = $contact_array['id'];
									$title = $contact_array['title'];
									$description = $contact_array['description'];
									?>
									 
                                    <form name="myForm" onsubmit="return validateIndexMenuForm()"  action ="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"  />
										
										
 										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">      
                                              <input type="hidden" class="form-control col-md-7 col-xs-12"  name="ids" value="<?php echo $id; ?>"  >  	                                           	
                                             
                                               <input type="text" class="form-control col-md-7 col-xs-12"  name="title" value="<?php echo $title; ?>"  required="required" >  	                                    		 
                                            </div>
                                        </div>                                        
                                                                          
                                         <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Description <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="description" class="form-control col-md-7 col-xs-12"><?php echo $description; ?></textarea>
                                              	 </div>
                                        </div>
                                        
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a href="manage_index_menus.php" class="btn btn-primary">Cancel</a>
                                                <input  type="submit" name="submit" class="btn btn-success" value ="Update Index Menu" />

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
   
<?php include('footer_admin.php'); ?>



 <style>
 span.urlexample {
    margin: 9px;
    float: left;
    color: #FF7F95;
}
 </style>