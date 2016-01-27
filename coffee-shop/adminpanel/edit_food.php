 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?>
 			
 			<div class="top_nav">

                <?php include('header_nav_admin.php'); ?>
			
			</div>
		
		
			
		
 <?php 
  if(isset($_REQUEST['submit'])){
  
  	$ids = $_REQUEST['ids'];
  	$food_name = $_REQUEST['food_name'];
	$title = $_REQUEST['title'];
	$description = $_REQUEST['description'];
	$price = $_REQUEST['price'];	
	$image 	= $_FILES['image']['name'];	
  	if($image){  	
  	move_uploaded_file($_FILES['image']['tmp_name'], 'menu_lunch_image/'.$image);	
  		$UPDATESql = "UPDATE menu_lunch SET food_name= '".$food_name."' , description	= '".$description	."' ,image= '".$image."',price= '".$price."'  WHERE id = '".$ids."'";
 		$UPDATEed = mysql_query($UPDATESql);
  
  	header('Location: lunch.php');
  	}else{
  		$UPDATESql = "UPDATE menu_lunch SET food_name= '".$food_name."' , description	= '".$description	."' ,price= '".$price."'  WHERE id = '".$ids."'";
 		$UPDATEed = mysql_query($UPDATESql);
 	 	header('Location: lunch.php');
  	}
  	
  	
  }
  ?>


			
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                  Edit Food
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
                                    <h2> Edit Food</h2>
                                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
								<?php
								$id= $_GET['id'];
								$food_menuSql = mysql_query("select * from menu_lunch where id = $id ");
								$food_menu_array = mysql_fetch_array($food_menuSql);
								$id = $food_menu_array['id'];
								$food_name = $food_menu_array['food_name'];
								$description = $food_menu_array['description'];
								$image = $food_menu_array['image'];
								$price = $food_menu_array['price'];
								?>
		
		
                                    <form action ="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"  />
										                                        
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Food Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	 <input   type="hidden" name="ids"  value="<?php echo $id; ?>">
                                                <input  class="form-control col-md-7 col-xs-12"  name="food_name" value="<?php echo $food_name; ?>"  required="required" type="text"  />
                                            </div>
                                        </div>
                                         <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                           		 <textarea name="description" class="form-control col-md-7 col-xs-12" ><?php echo $description; ?></textarea>
                                             </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Image <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<img src="menu_lunch_image/<?php echo $image; ?>" style="width: 86px;height: 86PX;">
                                              </br>
                                                <input class="form-control col-md-7 col-xs-12"  name="image" value="<?php echo $image; ?>"  type="file" >
                                            </div>
                                        </div>
                                         <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Price  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <input type="text"  name="price" value="<?php echo $price; ?>" required="required" class="form-control col-md-7 col-xs-12" >
                                            </div>
                                        </div>
                                      
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a href="lunch.php" class="btn btn-primary">Cancel</a>
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




 