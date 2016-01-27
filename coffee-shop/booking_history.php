<?php
  include("dbconnection.php");
  include("dbfunctions.php");
  include("dbfunctionsIndex.php");
 
  if(isset($_REQUEST['submit'])){
  
  }
  ?>
<?php include("header_other.php"); ?>

<section id="menu-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="menu-inside">
          <div class="main-heading">
            <h2>Booking History</h2>
          </div>
          <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
             <?php
                 if($sessionId){
					$id =  $sessionId; 
					}else{
					header('Location: index.php');
					} 
					
				$users = mysql_query("select * from users  where id = '$id'");
				$users_fetch = mysql_fetch_array($users);
				$email = $users_fetch['email'];
				$phone_no = $users_fetch['phone_no'];
				   
					
                 $booking_select = mysql_query("select * from booking where email = '$email' && phone_no = '$phone_no' && status = '1' ORDER BY  `bookingid` DESC ");
				 while($booking_array = mysql_fetch_array($booking_select))
				 {
				   $bookingid = $booking_array['bookingid'];
				   $date = $booking_array['date'];
				   $time = $booking_array['time'];
				   $user_name = $booking_array['user_name'];
				   $people = $booking_array['people'];
				   $phone_no = $booking_array['phone_no'];
				   $email = $booking_array['email'];
				?>		
					 <div class="menu-table-list">
					  <div class="menu-img"><img src="images/launch-img.png"></div>
					  <div class="menu-dis">
						<h3><?php echo $user_name; ?> - <span><?php echo $date; ?> - <?php echo $time; ?></span> 
							<div class="editprofile"><a href="cancel_booking.php?bookingid=<?php echo $bookingid; ?>" onclick="return confirm('Are you sure you want to delete?')"> Cancel Booking </a></div>
						</h3>
						<p></p>
						<p>No of peoples - <span><?php echo $people; ?></span></p>
						<p>Email - <span><?php echo $email; ?></span></p>
						<p>Phone No. - <span><?php echo $phone_no; ?></span></p>
					  </div>
					</div>	
			<?php } ?>			 
               
			
         
          </div>
      </div>
    </div>
  </div>
</section>

<script>
function confirmDelete(bookingid) {
	alert(bookingid);
  if (confirm("Are you sure you want to Cancel the Booking")) {
    document.location = bookingid;
  }
}
</script>
<?php include("footer.php"); ?>