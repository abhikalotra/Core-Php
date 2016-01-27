


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
                  Manage Team Details
                   
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
                                    <h2> Manage Team  </h2>
                               
                                    <div class="clearfix"></div>
                                </div>
                                <div class="ADDMenu"> 
                                	<a href="add_team_member.php" class="btn btn-primary">ADD Team</a>
                                </div>
                                
                                <div class="x_content">                                 
                                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr No. </th>
												 <th>Team Logo</th>
                                                <th>Title </th>
                                                <th>Description  </th>	
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Sr No. </th>
												<th>Team Logo</th>
                                                <th>Title </th>
                                                <th>Description  </th>	                                             
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</tfoot>
										<tbody>
										<?php 
											$team_memberSql = mysql_query("select * from team_member ");
											while($team_member_array = mysql_fetch_array($team_memberSql)){								
											$id = $team_member_array['id'];
											$team_photo = $team_member_array['team_photo'];
											$title = $team_member_array['title'];
											$description = $team_member_array['description'];
											?>
											<tr>
												<td><?php echo $id; ?></td> 
												<td><img src="team_photo/<?php echo $team_photo; ?>" style="width: 86px;height: 86PX;"></td>
                                                 <td><?php echo $title; ?></td>
                                                <td><?php echo $description; ?></td>
                                                <td>
                                                <a href="edit_team_member.php?id=<?php echo $id;?>">Edit</a> |
                                                <a href="delete_team_member.php?id=<?php echo $id;?>" onclick="return confirm('Are you sure you want to delete?')" >Delete</a>
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
		  if (confirm("Are you sure you want to Delete the Team Member")) {
			document.location = id;
		  }
		}
		</script>