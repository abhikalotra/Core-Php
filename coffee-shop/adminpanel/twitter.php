


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
                   Twitter  Reviews
                   
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
                                    <h2> Show Twitter  Reviews</h2>
                               
                                    <div class="clearfix"></div>
                                </div>
                                
                                
                                <div class="x_content">                                 
                                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												
												  <th>twitter  Reviews</th>  
											</tr>
										</thead>
										<tfoot>
											<tr>
												
												 <th>twitter  Reviews</th>                              
                                               
											</tr>
										</tfoot>
										<tbody>
										
											<tr>											
											<td> 
											<style>
.twitter-bubble {
	position: relative;
	width: 98%;
	padding: 19px;
	background: #96DDFF;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	color: #474747;
	display: inline-block;
}

.twitter-bubble:after 
{
	content: '';
	position: absolute;
	border-style: solid;
	border-width: 15px 11px 0;
	border-color: #96DDFF transparent;
	display: block;
	width: 0;
	z-index: 1;
	bottom: -15px;
	left: 111px;
}
</style>
<?php

include_once('twitteroauth/twitteroauth.php');

$twitter_customer_key           = 'HzZSNKZla3prPeKG54VhvHz3y';
$twitter_customer_secret        = 'Q0CrQHpARSnF5a2SnG6kIhVXJLgoKMihW1JYirUOVYkVFUQhJi';
$twitter_access_token           = '4158524007-4PhwLiXbDhA0lMcOml6IxQGwGcEvIurTvOf4MFw';
$twitter_access_token_secret    = '857aBY2OLS7GXfYbg0Pi15PA0MgUmgn4WzgroX5EAmY2B';

$connection = new TwitterOAuth($twitter_customer_key, $twitter_customer_secret, $twitter_access_token, $twitter_access_token_secret);

$my_tweets = $connection->get('statuses/user_timeline', array('screen_name' => 'Cafelluca_Egypt', 'count' => 1));

echo '<div class="twitter-bubble">';
if(isset($my_tweets->errors))
{           
    echo 'Error :'. $my_tweets->errors[0]->code. ' - '. $my_tweets->errors[0]->message;
}else{

    echo makeClickableLinks($my_tweets[0]->text);
}
echo '</div>';

//function to convert text url into links.
function makeClickableLinks($s) {
  return preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a target="blank" rel="nofollow" href="$1" target="_blank">$1</a>', $s);
}
?>
											</td> 

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
          
        