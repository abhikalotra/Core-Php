 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?> 			
 			<div class="top_nav">
                <?php include('header_nav_admin.php'); ?>			
			</div>
		

	 <script>
		function validateGalleryImageForm() {		
		
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
	$gallery_image 	= $_FILES['gallery_image']['name'];
	
	
	if($gallery_image){	
	move_uploaded_file($_FILES['gallery_image']['tmp_name'], 'gallery_images/'.$gallery_image);	
	
	$gallery_image_Sql = "UPDATE gallery_images SET title= '".$title."' , description	= '".$description	."' ,gallery_image= '".$gallery_image."'  WHERE id = '".$ids."'";
	$updated = mysql_query($gallery_image_Sql);
	header('Location: manage_gallery_images.php');
		
	}else{
		$gallery_image_Sql = "UPDATE gallery_images SET title= '".$title."' , description	= '".$description	."' WHERE id = '".$ids."'";
 		$updated = mysql_query($gallery_image_Sql);
 		header('Location: manage_gallery_images.php');
  	
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
									$gallery_imageSql = mysql_query("select * from gallery_images  where id = $id");
									$gallery_image_array = mysql_fetch_array($gallery_imageSql);									
									$id = $gallery_image_array['id'];
									$title = $gallery_image_array['title'];
									$description = $gallery_image_array['description'];
									$gallery_image = $gallery_image_array['gallery_image'];
									?>
									 
                                    <form name="myForm" onsubmit="return validateGalleryImageForm()"  action ="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"  />
										
										
 										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">      
                                              <input type="hidden" class="form-control col-md-7 col-xs-12"  name="ids" value="<?php echo $id; ?>"  >  	                                          	
                                             
                                               <input type="text" class="form-control col-md-7 col-xs-12"  name="title" value="<?php echo $title; ?>" >  	                                    		 
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
                                            <img src="gallery_images/<?php echo $gallery_image; ?>" style="width: 86px;height: 86PX;">
                                            </br>
                                            	  <input  type="file"  class="form-control col-md-7 col-xs-12"  name="gallery_image" value="<?php echo $gallery_image; ?>">
                                            </div>
                                        </div>
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a href="manage_gallery_images.php" class="btn btn-primary">Cancel</a>
                                                <input  type="submit" name="submit" class="btn btn-success" value ="Update Gallery" />

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
   
<?php include('footer_admin.php'); ?>



 