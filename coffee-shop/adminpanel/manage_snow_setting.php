


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
                  Manage Snow Setting
                   
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
                                    <h2> Manage Snow Setting  </h2>
                               
                                    <div class="clearfix"></div>
                                </div>
                                
                                
                                <div class="x_content">                                 
                                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr No. </th>
												 <th>Snow Status</th>
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Sr No. </th>
												 <th>Snow Status</th>                                         
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</tfoot>
										<tbody>
										<?php 
											$snow_settingSql = mysql_query("select * from snow_setting ");
											$snow_setting_array = mysql_fetch_array($snow_settingSql);							
											$id = $snow_setting_array['id'];											
											$activate = $snow_setting_array['activate'];
											$status = $snow_setting_array['status'];
											?>
											<tr>
												<td><?php echo $id; ?></td> 
												  <td><?php echo $activate; ?></td>                                                	
												<?php if ($status == 1){ ?>
												 <td> <a href="edit_snow_setting.php?id=<?php echo $id;?>&status=0" class="btn btn-success">Activate Snow  To Deactivate Click Here !!</a></td>											
												<?php	} elseif($status == 0) {  ?>   
                                                 <td> <a href="edit_snow_setting.php?id=<?php echo $id;?>&status=1"  class="btn btn btn-warning">Deactivate Snow To Activate Click Here !!</a></td>
                                                <?php } ?>
                                              
                                               
                                               
                                             
											</tr>
										
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
		  if (confirm("Are you sure you want to Delete the Festival Images")) {
			document.location = id;
		  }
		}
		</script>