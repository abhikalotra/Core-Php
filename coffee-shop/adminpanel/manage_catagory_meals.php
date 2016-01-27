


  <?php include('header_admin.php'); ?>
  
   <link href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
     
      
     <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
      
 <script>
 
 $(document).ready(function() {
    $('#example').DataTable();
} );
 </script>
 
          <?php include('sidebar_admin.php'); ?>

            <!-- top navigation -->
            <div class="top_nav">

                <?php include('header_nav_admin.php'); ?>
			
			</div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Manage Meals Details 
                   
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
                                    <h2>Manage Meals</h2>
                               
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                 
                                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr No. </th>
                                                <th>Food Meals Category </th>
                                                <th>Title </th>
                                                <th>Food Start Timing</th>
                                                <th>Food End Timing </th>
                                                <th>Combo Name </th>
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Sr No. </th>
                                                <th>Food Meals Category </th>
                                                <th>Title </th>
                                                <th>Food Start Timing</th>
                                                <th>Food End Timing </th>
                                                <th>Combo Name </th>
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</tfoot>
										<tbody>
										<?php 
											$mg_food_select = mysql_query("select * from food_menu  ");
											while($mg_food_array = mysql_fetch_array($mg_food_select))
											{	
											$id = $mg_food_array['id']; 
											$food_meals_catagory = $mg_food_array['food_meals_catagory']; 
											$title = $mg_food_array['title']; 
											$food_start_timing = $mg_food_array['food_start_timing']; 
											$food_end_timing = $mg_food_array['food_end_timing']; 
											$combo_name = $mg_food_array['combo_name']; 
											?>
											<tr>
												<td><?php echo $id; ?></td>                                                
                                                <td><?php echo $food_meals_catagory; ?></td>
                                                <td><?php echo $title; ?></td>
                                                <td><?php echo $food_start_timing; ?></td>
                                                <td><?php echo $food_end_timing; ?></td>
                                                <td><?php echo $combo_name; ?></td>
                                                <td><a href="edit_manage_catagory.php?id=<?php echo $id;?>">Edit</a></td>
											</tr>
											<?php 	}   ?>
										</tbody>
									</table>
                                 
                                 </div>
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

                    </div>
                </div>
                
          <?php include('footer_admin.php'); ?>