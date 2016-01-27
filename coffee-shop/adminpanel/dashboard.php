 
<link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="css/icheck/flat/green.css" rel="stylesheet" />
    <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min.js"></script>
    <script src="js/nprogress.js"></script>
    <script>
        NProgress.start();
    </script>
    
    
 
 
 
  <?php include('header_admin.php'); ?>
  

          <?php include('sidebar_admin.php'); ?>
		  
            <!-- top navigation -->
            <div class="top_nav">

        		  <?php include('header_nav_admin.php'); ?>
			
			</div>
	
	
<?php
$result1 =mysql_query("SELECT count(*) as total from users where status = 1");
$data1=mysql_fetch_array($result1);
$totalUser =  $data1['total'];

$result2 =mysql_query("SELECT count(*) as total from team_member ");
$data2=mysql_fetch_array($result2);
$totalteam_member =  $data2['total'];

$result3 =mysql_query("SELECT count(*) as total from sponsors ");
$data3=mysql_fetch_array($result3);
$totalsponsors =  $data3['total'];

$result4 =mysql_query("SELECT count(*) as total from gallery_images ");
$data4=mysql_fetch_array($result4);
$totalgallery_images =  $data4['total'];

$result5 =mysql_query("SELECT count(*) as total from booking where status = 1");
$data5=mysql_fetch_array($result5);
$totalbooking =  $data5['total'];

$result6 =mysql_query("SELECT count(*) as total from menu_lunch ");
$data6=mysql_fetch_array($result6);
$totalmenu_lunch =  $data6['total'];

?>		
            <!-- page content -->
            <div class="right_col" role="main">

                <!-- top tiles -->
                <div class="row tile_count" style=" height: 123px;">
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                            <div class="count"><?php echo $totalUser; ?></div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-clock-o"></i> Total Team Member</span>
                            <div class="count"><?php echo $totalteam_member; ?></div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i>Sponsors</span>
                            <div class="count green"><?php echo $totalsponsors; ?></div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i>Gallery Images</span>
                            <div class="count"><?php echo $totalgallery_images; ?></div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i> Total Booking</span>
                            <div class="count"><?php echo $totalbooking; ?></div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i> Total Menu</span>
                            <div class="count"><?php echo $totalmenu_lunch; ?></div>
                        </div>
                    </div>

                </div>
                <!-- /top tiles -->
				<div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="dashboard_graph">

                            <div class="row x_title">
                                <div class="col-md-6">
                                    <h3>Welcome to Dashboard :)</h3>
                                </div>                              
                            </div>

                          
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
             

             
           <?php include('footer_admin.php'); ?>


