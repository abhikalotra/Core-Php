 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?>
 			
 			<div class="top_nav">

                <?php include('header_nav_admin.php'); ?>
			
			</div>
		
	
		
  <script>
          jQuery(document).ready(function () {

    jQuery("select").on("change", function(){
      var msg = $("#msg");
    
      var count = 0;
    
      for (var i = 0; i < this.options.length; i++)
      {
        var option = this.options[i];
        
        option.selected ? count++ : null;
        
        if (count > 2)
        {
            option.selected = false;
            option.disabled = true;
            msg.html("Please select only two options.");
        }else{
            option.disabled = false;
            msg.html("");
        }
      }
    });
});
        </script>		
	
<?php 

  if(isset($_POST['submit'])){
  	
   	$seen_status_id 	= $_POST['ids'];
	
	$UPDATESql1 = "UPDATE food_menu SET seen_status= '0' ";
	$UPDATESql11 = mysql_query($UPDATESql1);
	
	foreach ($seen_status_id as $t) { 
 	//print_r($t) ;
 		$UPDATESql = "UPDATE food_menu SET seen_status= '1'  WHERE id = '".$t."'";
 		$inserted = mysql_query($UPDATESql);
  }
  
  
	
	
  }
  ?>


			
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Setting Foods Schedule  
                </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                   
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Setting Foods</h2>
                                
                                    <div class="clearfix"></div>
                                </div>
                              <div class="row">

                        <!-- form input mask -->
                       <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Food Activation Setting - ( It will Show Into the frontend Acc. to your Selection ) </h2>
                                   
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="" method="post" class="form-horizontal form-label-left">

										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Recent You Seleted </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               
												<?php 
												$food_menuSql = mysql_query("select * from food_menu where seen_status = 1");
												while($food_menu_array = mysql_fetch_array($food_menuSql))
												{
												$id = $food_menu_array['id'];
												$food_meals_catagory = $food_menu_array['food_meals_catagory'];
												?>
												<p class="form-control col-md-7 col-xs-12"><?php echo $food_meals_catagory; ?></p>
												<?php } ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Food Catagory Select Only 2</label>
                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                              	 <select multiple id="s" name="ids[]" class="form-control col-md-7 col-xs-12">
														 
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
                                       
                                        <div class="ln_solid"></div>

                                        <div class="form-group">
                                            <div class="col-md-9 col-md-offset-3">
                                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /form input mask -->
                        
                        <!-- form color picker -->
                      <!-- 
  <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Food Activation Setting 2nd </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="" method="post" class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Food Catagory</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                            
                                               <select name="food_meals_catagory_id">
														 <option value="1">Select Meal</option>
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
                                        <div class="ln_solid"></div>

                                        <div class="form-group">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
 -->
                        <!-- /form color picker -->

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