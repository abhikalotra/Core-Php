


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
                  Manage Slider
                   
                </h3>
                        </div>

                        <div class="title_right">
     
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Slider Images </h2>
                               
                                    <div class="clearfix"></div>
                                </div>
                                <div class="ADDMenu"> 
                                	<a href="add_slider.php" class="btn btn-primary">Add Image Slider</a>
                                </div>
                                <div class="x_content">
                                 
                                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr No. </th>
												<th>Banner Image </th>
                                                <th>Title </th>
                                                <th>Description  </th>
                                                 <th>Created Date  </th>                                                	
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Sr No. </th>
												<th>Banner Image </th>
                                                <th>Title </th>
                                                <th>Description  </th>	
                                                 <th>Created Date  </th>	
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</tfoot>
										<tbody>
										<?php 
											$sliderSql = mysql_query("select * from slider_fullwidth ");
											while($slider_array = mysql_fetch_array($sliderSql)){									
											$id = $slider_array['id'];
											$title = $slider_array['title'];
											$description = $slider_array['description'];
											$slider_image = $slider_array['slider_image'];
											$date_create = $slider_array['date_create'];
											?>
											<tr>
												<td><?php echo $id; ?></td>    
												<td><img src="slider_fullwidth/<?php echo $slider_image; ?>" style="width: 86px;height: 86PX;"></td>
                                                <td><?php echo $title; ?></td>
                                                <td><?php echo $description; ?></td>
                                                <td><?php echo $date_create; ?></td>
                                                
                                                <td><a href="edit_slider.php?id=<?php echo $id;?>">Edit</a> | 
                                                <a href="delete_slider.php?id=<?php echo $id;?>" onclick="return confirm('Are you sure you want to delete?')" >Delete</a>                                                
                                                </td>
											</tr>
										<?php } ?>
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
          
                <script>
		function confirmDelete(id) {
			alert(id);
		  if (confirm("Are you sure you want to Delete the Slider")) {
			document.location = id;
		  }
		}
		</script>