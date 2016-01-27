 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?>
 			
 			<div class="top_nav">

                <?php include('header_nav_admin.php'); ?>
			
			</div>
		
		
		
		
		
 <?php 
  if(isset($_REQUEST['submit'])){
  	
  	$food_meals_catagory_id 	= $_REQUEST['food_meals_catagory_id'];
	 $food_name 	= $_REQUEST['food_name'];	 
	$description 	= $_REQUEST['description'];
	$price 	= $_REQUEST['price'];
	$image 	= $_FILES['image']['name'];
	
	if($image){
	
	move_uploaded_file($_FILES['image']['tmp_name'], 'menu_lunch_image/'.$image);	
	
	$insertLunchSql = "insert into menu_lunch (`food_meals_catagory_id`,`food_name`,`description`,`image`,`price`) values ('".$food_meals_catagory_id."','".$food_name."','".$description."','".$image."','".$price."')";
	$inserted = mysql_query($insertLunchSql);
	
	header('Location: lunch.php');
	 //return array('status'=>'success','message'=>'Add Food sucessfully Added');
		
	}else{
		$insertLunchSql = "insert into menu_lunch (`food_meals_catagory_id`,`food_name`,`description`,`price`) values ('".$food_meals_catagory_id."','".$food_name."','".$description."','".$price."')";
		$inserted = mysql_query($insertLunchSql);	
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
                    Add Foods 
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
                                    <h2>Foods</h2>
                                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <form action ="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"  />
										
										
 										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Food Menu Schedule <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">                                            	
                                                	 <select name="food_meals_catagory_id">
														<?php 
														$food_menuSql = mysql_query("select * from food_menu ");
														while($food_menu_array = mysql_fetch_array($food_menuSql))
														{
														$id = $food_menu_array['id'];
														$food_meals_catagory = $food_menu_array['food_meals_catagory'];
														?>
														  <option value="<?php echo $id; ?>"><?php echo $food_meals_catagory; ?></option>
													 	  <?php } ?>
													</select>                                         		 
                                            </div>
                                        </div>
                                        
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Food Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	 <input   type="hidden" name="food_name"  value="lunchMenu">
                                                <input id="name" class="form-control col-md-7 col-xs-12"  name="food_name" placeholder="Like Chicken Tandoori etc." required="required" type="text">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Description <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="description" id="name" required="required" class="form-control col-md-7 col-xs-12"> </textarea>
                                            </div>
                                        </div>
                                         <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Price <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <input type="number" id="name" name="price" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Food Image<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" id="name" name="image" required="required" class="form-control col-md-7 col-xs-12">
											 </div>
                                        </div>
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                               <a href="lunch.php" class="btn btn-primary">Cancel</a>
                                                <input id="send" type="submit" name="submit" class="btn btn-success" value ="Add Food" />

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
   
<?php include('footer_admin.php'); ?>




   <!-- 
 <script src="js/validator/validator.js"></script>
    
    <script>
        validator.message['date'] = 'not a real date';

        $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required')
            .on('keyup blur', 'input', function () {
                validator.checkField.apply($(this).siblings().last()[0]);
            });

        $('form').submit(function (e) {
            e.preventDefault();
            var submit = true;
            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();
            return false;
        });

        $('#vfields').change(function () {
            $('form').toggleClass('mode2');
        }).prop('checked', false);

        $('#alerts').change(function () {
            validator.defaults.alerts = (this.checked) ? false : true;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    </script>
 -->