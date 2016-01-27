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
		alert("Description must be filled out");
		return false;
		}
			
		var gallery_image = document.forms["myForm"]["gallery_image"].value;
		if (gallery_image == null || gallery_image == "") {
		alert("Gallery Image must be filled out");
		return false;
		}	
	
		}
</script>			
		
		
		
 <?php 
  if(isset($_REQUEST['submit'])){
  	
  	 $title 	= $_REQUEST['title'];	 
	$description 	= $_REQUEST['description'];
	$gallery_image 	= $_FILES['gallery_image']['name'];
	
	if($gallery_image){	
	move_uploaded_file($_FILES['gallery_image']['tmp_name'], 'gallery_images/'.$gallery_image);	
	
	$gallery_imageSql = "insert into gallery_images  (`title`,`description`,`gallery_image`) values ('".$title."','".$description."','".$gallery_image."')";
	$inserted = mysql_query($gallery_imageSql);
	header('Location: manage_gallery_images.php');
		
	}else{
		$gallery_imageSql = "insert into gallery_images (`title`,`description`) values ('".$title."','".$description."')";
		$inserted = mysql_query($gallery_imageSql);
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
                    Add Gallery Image 
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
                                    <h2>Gallery Image </h2>
                                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <form name="myForm" onsubmit="return validateGalleryImageForm()"  enctype="multipart/form-data"   action ="" method="post" class="form-horizontal form-label-left"/>
										
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Gallery Image<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" name="gallery_image"  class="form-control col-md-7 col-xs-12">
											 </div>
                                        </div>
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                               <a href="manage_gallery_images.php" class="btn btn-primary">Cancel</a>
                                                <input id="send" type="submit" name="submit" class="btn btn-success" value ="Add Gallery Image" />

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
   
<?php include('footer_admin.php'); ?>



