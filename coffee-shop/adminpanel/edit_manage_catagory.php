 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?>
 			
 			<div class="top_nav">

                <?php include('header_nav_admin.php'); ?>
			
			</div>
		
		
	  <script src="js/jquery.timepicker.min.js"></script>
     <link href="css/jquery.timepicker.min.css" rel="stylesheet" type="text/css">
    <script>
	(function($) {
		$(function() {
			$('input.timepicker').timepicker();			
		});
	})(jQuery);
	</script>
		
		
		
 <?php 
  if(isset($_REQUEST['submit'])){
  
  	$ids = $_REQUEST['ids'];
  	$food_meals_catagory = $_REQUEST['food_meals_catagory'];
	$title = $_REQUEST['title'];
	$food_start_timing = $_REQUEST['food_start_timing'];
	$food_end_timing = $_REQUEST['food_end_timing'];
	$combo_name = $_REQUEST['combo_name'];
	
	$UPDATESql = "UPDATE food_menu SET food_meals_catagory= '".$food_meals_catagory."' , title= '".$title."' ,food_start_timing= '".$food_start_timing."',food_end_timing= '".$food_end_timing."', combo_name= '".$combo_name."'   WHERE id = '".$ids."'";
 	$UPDATEed = mysql_query($UPDATESql);
  	if($UPDATEed){
  	header('Location: manage_catagory_meals.php');
  	}
  }
  ?>


			
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                 		 Edit Manage Meals
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
                                    <h2> Edit Meals</h2>
                                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
								<?php
								$id= $_GET['id'];
								$food_menuSql = mysql_query("select * from food_menu where id = $id ");
								$food_menu_array = mysql_fetch_array($food_menuSql);
								$id = $food_menu_array['id'];
								$food_meals_catagory = $food_menu_array['food_meals_catagory'];
								$title = $food_menu_array['title'];
								$food_start_timing = $food_menu_array['food_start_timing'];
								$food_end_timing = $food_menu_array['food_end_timing'];
								$combo_name = $food_menu_array['combo_name'];
								?>
		
		
                                    <form action ="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"  />
										                                        
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Food Meals Category <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	 <input   type="hidden" name="ids"  value="<?php echo $id; ?>">
                                                <input  class="form-control col-md-7 col-xs-12"  name="food_meals_catagory" value="<?php echo $food_meals_catagory; ?>"  required="required" type="text"  />
                                            </div>
                                        </div>
                                         <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	 <input   type="hidden" name="food_name"  value="lunchMenu">
                                                <input class="form-control col-md-7 col-xs-12"  name="title" value="<?php echo $title; ?>" required="required" type="text" >
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Food Start Timing <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="timepicker form-control col-md-7 col-xs-12"  name="food_start_timing" value="<?php echo $food_start_timing; ?>" required="required" type="text" >
                                            </div>
                                        </div>
                                         <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Food End Timing  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <input type="text"  name="food_end_timing" value="<?php echo $food_end_timing; ?>" required="required" class="timepicker form-control col-md-7 col-xs-12" >
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Combo Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="combo_name" value="<?php echo $combo_name; ?>" required="required" class="form-control col-md-7 col-xs-12">
											 </div>
                                        </div>
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a href="manage_catagory_meals.php" class="btn btn-primary">Cancel</a>
                                                <input id="send" type="submit" name="submit" class="btn btn-success" value ="Update" />

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
   
<?php include('footer_admin.php'); ?>




 