 <?php include('header_admin.php'); ?>
  
      <?php include('sidebar_admin.php'); ?>
 			
 			<div class="top_nav">

                <?php include('header_nav_admin.php'); ?>
			
			</div>
		
		
	 <script>
		function validateSponsorsForm() {		
		
		var title = document.forms["myForm"]["title"].value;
		if (title == null || title == "") {
		alert("Title must be filled out");
		return false;
		}
		
		var sponsors_link = document.forms["myForm"]["sponsors_link"].value;
		if (sponsors_link == null || sponsors_link == "") {
		alert(" Sponsors Link must be filled out");
		return false;
		}
		
	 	var sponsors_logo = document.forms["myForm"]["sponsors_logo"].value;
 		if (sponsors_logo == null || sponsors_logo == "") {
 		alert("Sponsors Logo  must be filled out");
 		return false;
 		}		
	
	
		}
	</script>		
		
		
 <?php 
  if(isset($_REQUEST['submit'])){
  	
  	$title 	= $_REQUEST['title'];
	 $sponsors_link 	= $_REQUEST['sponsors_link'];	
	$sponsors_logo 	= $_FILES['sponsors_logo']['name'];
	
	if($sponsors_logo){		
	move_uploaded_file($_FILES['sponsors_logo']['tmp_name'], 'sponsors_images/'.$sponsors_logo);	
	
	 $sponsorsSql = "insert into sponsors (`title`,`sponsors_link`,`sponsors_logo`) values ('".$title."','".$sponsors_link."','".$sponsors_logo."')";
	$inserted = mysql_query($sponsorsSql);
		
	}else{
		$sponsorsSql = "insert into sponsors (`title`,`sponsors_link`) values ('".$title."','".$sponsors_link."')";
		$inserted = mysql_query($sponsorsSql);
	
	}
  	
  }
  ?>


			
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Add Sponsors 
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
                                    <h2>Sponsors </h2>
                                
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <form  name="myForm" onsubmit="return validateSponsorsForm()" action ="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"  />
																				
 										
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Title<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="title"   class="form-control col-md-7 col-xs-12"  >
                                            </div>
                                        </div>
                                         <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Sponsors Link <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <input type="url"  name="sponsors_link"  class="form-control col-md-7 col-xs-12">
                                           </br><span class="urlexample">URL Like :- https://www.example.com/</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Sponsors Logo<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file"  name="sponsors_logo" class="form-control col-md-7 col-xs-12">
											 </div>
                                        </div>
                                     
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                              <a href="manage_sponsors.php" class="btn btn-primary">Cancel</a>
                                                <input  type="submit" name="submit" class="btn btn-success" value ="Add Sponsors" />

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
   
<?php include('footer_admin.php'); ?>



 <style>
 span.urlexample {
    margin: 9px;
    float: left;
    color: #FF7F95;
}
 </style>

 