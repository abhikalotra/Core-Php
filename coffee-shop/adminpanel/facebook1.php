


  <?php include('header_admin.php'); ?>
  
<!-- 
   <link href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
     
      
     <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
      

 <script>
 
 $(document).ready(function() {
    $('#example').DataTable();
} );
 </script>
  -->
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
                  Manage Facebook
                   
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
                                    <h2> Manage Facebook  </h2>
                               
                                    <div class="clearfix"></div>
                                </div>
                                
                                
                                <div class="x_content">                                 
                                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												
												  <th>Facebook  Posts</th>  
											</tr>
										</thead>
										<tfoot>
											<tr>
												
												 <th>Facebook  Posts</th>                              
                                               
											</tr>
										</tfoot>
										<tbody>
<!-- 										//145634995501895/posts?access_token= -->
										<?php /*
										$get_url1 = "https://graph.facebook.com/v2.5/145634995501895/posts&access_token=CAACEdEose0cBAKdAssmwwrzQoNzqdRjFDyGKCMIEzvSrItyky2dkiMj4CQnCgIEEc7SEewZALsbPHoWKWdHE2CpfQNJZCvneghcv7WD21a3dZB74LL2U52TaqcvMR9zQIEj2AZA3qils3GrZAU8TBCJvOyb8ZAKLVaZCTVOJRw6M3wxVYBLy3reW9kIDFE4Ul49NZBwH1Lt90EcICJdviUgN" ;
										$facebook_json1 = file_get_contents($get_url1);
										$results1 = json_decode($facebook_json1, true);
										echo "<pre>"; print_r($results1);
										die;
										
										 $a = 0;											
										foreach ($results1['data'] as $getData) { 
										if($a==5){
											break;
											}	else{
											$a++;
											}	
										 	@$message = $getData['message'];
										 	@$created_time1 = $getData['created_time'];
											@$created_time = substr($created_time1, 0, 10);		
										
										?>
											// <tr>											
//  											<td class="twitter-bubble"><?php echo $message ; ?>  --- 
//  											<span class="messagePosted"><?php echo $created_time ; ?>
//  											 </span></td> 
//  
//  											</tr>
										
										<?php }  */?>
										
										
										
										
									<?php 	$get_url = "https://graph.facebook.com/v2.5/me?fields=id%2Cname%2Cposts&access_token=CAACEdEose0cBAKdAssmwwrzQoNzqdRjFDyGKCMIEzvSrItyky2dkiMj4CQnCgIEEc7SEewZALsbPHoWKWdHE2CpfQNJZCvneghcv7WD21a3dZB74LL2U52TaqcvMR9zQIEj2AZA3qils3GrZAU8TBCJvOyb8ZAKLVaZCTVOJRw6M3wxVYBLy3reW9kIDFE4Ul49NZBwH1Lt90EcICJdviUgN" ;
										$facebook_json = file_get_contents($get_url);
										$results = json_decode($facebook_json, true);

										foreach ($results['posts'] as $getData) {
	
											 $a = 0;
											foreach ($getData as $getDatas) {
											if($a==5){
											break;
											}	else{
											$a++;
											}	
										 	@$message = $getDatas['message'];
										 	@$created_time1 = $getDatas['created_time'];
											@$created_time = substr($created_time1, 0, 10);		
										 	 ?>
										 	<tr>											
											<td class="twitter-bubble"><?php echo $message ; ?>  --- 
 											<span class="messagePosted"><?php echo $created_time ; ?>
 											 </span></td> 
 
											</tr>
										<?php } }	 ?>
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
  
  <style>
  td.twitter-bubble {
    margin: 8px;
}
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
  
                
          <?php include('footer_admin.php'); ?>
          
        <?php /*
$get_url = "https://graph.facebook.com/v2.5/me?fields=id%2Cname%2Cphotos%2Cposts&access_token=CAACEdEose0cBANXUSlduwWZBwp4prpsewDywBLK0yNUXBIoIBpZClHshkFyUyjtjFRTQR25eq6lZBsyqK0NPECipZAHBIRF0QYg3k6PeRQstWCfA42NbU4bAKg9vgBGDlEBnNrsBV8ZA9KPS2WkLJeDZCvRnYsMSHf3FZAZAM754W9Agn86mxMAgmrZCKWXPRF56PUgBZCum1zzaAPyquQhluz" ;
$facebook_json = file_get_contents($get_url);
$results = json_decode($facebook_json, true);

foreach ($results['posts'] as $getData) {
	
	 $a = 0;
	foreach ($getData as $getDatas) {
	if($a==6){
	break;
	}	else{
	$a++;
	}	
	@$aaaa = $getDatas['message'];
		echo "<pre>"; echo $aaaa ;
	}
	
	
	//echo $facebook_message =	$getData['message'] ;	
	*/	
		 ?>