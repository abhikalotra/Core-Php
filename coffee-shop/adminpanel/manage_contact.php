


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
                  Contact Details 
                   
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
                                    <h2>Contact Message </h2>
                               
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                 
                                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr No. </th>
                                                <th>Title </th>
                                                <th>Full Address </th>
                                                <th>Opening Hour</th>
                                                <th>Closing Hour </th>
                                                <th>Opening Days</th>
                                                <th>Closing Days </th>
                                                <th>Mobile No.</th>
                                                <th>Email</th>
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Sr No. </th>
                                                <th>Title </th>
                                                <th>Full Address </th>
                                                <th>Opening Hour</th>
                                                <th>Closing Hour </th>
                                                <th>Opening Days</th>
                                                <th>Closing Days </th>
                                                <th>Mobile No.</th>
                                                <th>Email</th>
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</tfoot>
										<tbody>
										<?php 
											$contactSql = mysql_query("select * from contact_message ");
											$contact_array = mysql_fetch_array($contactSql);									
											$id = $contact_array['id'];
											$title = $contact_array['title'];
											$full_address = $contact_array['full_address'];
											$opening_hour = $contact_array['opening_hour'];
											$closing_hour = $contact_array['closing_hour'];
											$opening_days = $contact_array['opening_days'];
											$closing_days = $contact_array['closing_days'];
											$mobile_no = $contact_array['mobile_no'];
											$email = $contact_array['email'];
											?>
											<tr>
												<td><?php echo $id; ?></td>                                                
                                                <td><?php echo $title; ?></td>
                                                <td><?php echo $full_address; ?></td>
                                                <td><?php echo $opening_hour; ?></td>
                                                <td><?php echo $closing_hour; ?></td>
                                                <td><?php echo $opening_days; ?></td>
                                                <td><?php echo $closing_days; ?></td>
                                                <td><?php echo $mobile_no; ?></td>                                                
                                                <td><?php echo $email; ?></td>
                                                <td><a href="edit_contact.php?id=<?php echo $id;?>">Edit</a></td>
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