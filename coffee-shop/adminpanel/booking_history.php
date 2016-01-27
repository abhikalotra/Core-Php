


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
                    Booking Details 
                   
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
                                    <h2>Booking Users</h2>
                               
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                 
                                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sr No. </th>
                                                <th>First Name </th>
                                                <th>Phone No. </th>
                                                <th>Email </th>
                                                <th>Date </th>
                                                <th>Time </th>
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>Sr No. </th>
                                                <th>First Name </th>
                                                <th>Phone No. </th>
                                                <th>Email </th>
                                                <th>Date </th>
                                                <th>Time </th>
                                                <th class=" no-link last"><span class="nobr">Action</span>
                                                </th>
											</tr>
										</tfoot>
										<tbody>
										<?php 
											$booking_select = mysql_query("select * from booking  where  status = '1' ORDER BY  `bookingid` DESC ");
											while($booking_array = mysql_fetch_array($booking_select))
											{	
											$id = $booking_array['bookingid']; 
											$bookingid = $booking_array['bookingid']; 
											$user_name = $booking_array['user_name']; 
											$phone_no = $booking_array['phone_no']; 
											$email = $booking_array['email']; 
											$date = $booking_array['date']; 
											$time = $booking_array['time']; 
											?>
											<tr>
												<td><?php echo $bookingid; ?></td>                                                
                                                <td><?php echo $user_name; ?></td>
                                                <td><?php echo $phone_no; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $date; ?></td>
                                                <td><?php echo $time; ?></td>
                                                <td><a href="delete_booking_history.php?id=<?php echo $id;?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
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
          
                                <script>
		function confirmDelete(id) {
			alert(id);
		  if (confirm("Are you sure you want to Delete the cancel_booking")) {
			document.location = id;
		  }
		}
		</script>