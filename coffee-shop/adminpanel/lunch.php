


  <?php include('header_admin.php'); ?>
  
   <link href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
     
      
<!--     <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->
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
                    Food Details 
                   
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
                                    <h2>Food Food</h2>
                               
                                    <div class="clearfix"></div>
                                </div>
                               
                                <div class="ADDMenu"> 
                                	<a href="add_lunch.php" class="btn btn-primary">ADD Menu Food</a>
                                </div>
                                
                                <div class="x_content">
                                 
                                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr No. </th>
												<th>Image </th>
                                                <th>Food Name </th>
                                                <th>Description </th>                                                
                                                <th>Price</th>
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Sr No. </th>
												<th>Image </th>
                                                <th>Food Name </th>
                                                <th>Description </th>                                                
                                                <th>Price</th>
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</tfoot>
										<tbody>
										<?php 
											 $food_menu = mysql_query("select * from menu_lunch  ORDER BY `id` DESC ");
											 while($food_menu_array = mysql_fetch_array($food_menu))
											 {
												$id = $food_menu_array['id'];
												$food_name = $food_menu_array['food_name'];
												$description = $food_menu_array['description'];
												$image = $food_menu_array['image'];
												$price = $food_menu_array['price'];
											?>	
											<tr>
												<td><?php echo $id; ?></td>                                                
                                                <td><img src="menu_lunch_image/<?php echo $image; ?>" style="width: 67px; height: 63px;" ></td>
                                                <td><?php echo $food_name; ?></td>
                                                <td><?php echo $description; ?></td>
                                                <td><?php echo $price; ?></td>
                                                <td>
                                                <a href="edit_food.php?id=<?php echo $id; ?>">Edit</a> |
                                                <a href="delete_food.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a> |
					
                                                </td>
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
                <script>
function confirmDelete(id) {
	alert(id);
  if (confirm("Are you sure you want to Cancel the Booking")) {
    document.location = id;
  }
}
</script>
                
          <?php include('footer_admin.php'); ?>