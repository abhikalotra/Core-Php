 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?>
 			
 			<div class="top_nav">

                <?php include('header_nav_admin.php'); ?>
			
			</div>
		
 <script>
		function validateSliderForm() {	
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
			
		var slider_image = document.forms["myForm"]["slider_image"].value;
		if (slider_image == null || slider_image == "") {
		alert("Slider Image must be filled out");
		return false;
		}	
	
		}
</script>			
		
		
		
 <?php 
  if(isset($_REQUEST['submit'])){
  	
  	 $title 	= $_REQUEST['title'];	 
	$description 	= $_REQUEST['description'];
	$slider_image 	= $_FILES['slider_image']['name'];
	
	$limit_size= 800148;   //800148 820kb  1614565  Too Small
	 $file_size = $_FILES['slider_image']['size'];		
	if($file_size >= $limit_size){
	
		if($slider_image){	
		move_uploaded_file($_FILES['slider_image']['tmp_name'], 'slider_fullwidth/'.$slider_image);	
	
		$slider_imageSql = "insert into slider_fullwidth (`title`,`description`,`slider_image`) values ('".$title."','".$description."','".$slider_image."')";
		$inserted = mysql_query($slider_imageSql);
		header('Location: manage_slider.php');
		
		}else{
			$slider_imageSql = "insert into slider_fullwidth (`title`,`description`) values ('".$title."','".$description."')";
			$inserted = mysql_query($slider_imageSql);
		header('Location: manage_slider.php');
		}
	}else{
		
		$small = "It's too Small Size of Image. Please Upload minmum 800KB Image Size";
	}	
  	
  }
  ?>


			
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Add Slider Image 
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
                                    <h2>Slider Image </h2>
                                      <?php 
										   if(isset($small)){ ?>
											 <h2 class="bg-red centersimtxt"><?php echo  $small ;  ?></h2>
										<?php   } ?> 
                                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <form name="myForm" onsubmit="return validateSliderForm()"  enctype="multipart/form-data"   action ="" method="post" class="form-horizontal form-label-left"/>
										
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Slider Image <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" name="slider_image"  class="form-control col-md-7 col-xs-12" >
											 </div>
                                        </div>
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                               <a href="manage_slider.php" class="btn btn-primary">Cancel</a>
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


<style>
.centersimtxt {
    text-align: center;
    width: 100%;
}
</style>