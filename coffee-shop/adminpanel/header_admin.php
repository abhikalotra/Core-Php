<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coffee Shop Admin Panel </title>

    <!-- Bootstrap core CSS -->

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


</head>

<?php 
include("dbconnection.php");
include("dbfunctions.php");
include("dbfunctionsadmin.php");		
		

if (! empty($_SESSION['id']))
{	
   $sessionId =  $_SESSION['id'];  
   $firstname =  $_SESSION['firstname'];     
}else{
 header('Location: login.php');
}
?>






<body class="nav-md">



<!-- snow Start -->
<style>
canvas {
	display: block;
	position: absolute;
}
canvas#canvas {
     width: 100%; 
}
</style>
<script>
window.onload = function(){
	
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	
	var W = window.innerWidth;
	var H = window.innerHeight;
	canvas.width = W;
	canvas.height = H;
	
	var mp = 150; 
	var particles = [];
	for(var i = 0; i < mp; i++)
	{
		particles.push({
			x: Math.random()*W, 
			y: Math.random()*H, 
			r: Math.random()*4+1, 
			d: Math.random()*mp 
		})
	}	
	
	function draw()
	{
		ctx.clearRect(0, 0, W, H);
		
		ctx.fillStyle = "rgba(255, 255, 255, 0.8)";
		ctx.beginPath();
		for(var i = 0; i < mp; i++)
		{
			var p = particles[i];
			ctx.moveTo(p.x, p.y);
			ctx.arc(p.x, p.y, p.r, 0, Math.PI*2, true);
		}
		ctx.fill();
		update();
	}	
	var angle = 0;
	function update()
	{
		angle += 0.01;
		for(var i = 0; i < mp; i++)
		{
			var p = particles[i];
			p.y += Math.cos(angle+p.d) + 1 + p.r/2;
			p.x += Math.sin(angle) * 2;
			
			if(p.x > W+5 || p.x < -5 || p.y > H)
			{
				if(i%3 > 0)
				{
					particles[i] = {x: Math.random()*W, y: -10, r: p.r, d: p.d};
				}
				else
				{
					
					if(Math.sin(angle) > 0)
					{
						
						particles[i] = {x: -5, y: Math.random()*H, r: p.r, d: p.d};
					}
					else
					{
						
						particles[i] = {x: W+5, y: Math.random()*H, r: p.r, d: p.d};
					}
				}
			}
		}
	}
	setInterval(draw, 33);
}
</script>
<?php 
$snow_settingSql = mysql_query("select * from snow_setting ");
$snow_setting_array = mysql_fetch_array($snow_settingSql);							
$id = $snow_setting_array['id'];											
$activate = $snow_setting_array['activate'];
$status = $snow_setting_array['status'];
?>
<canvas id="canvas" style="display: <?php echo $activate; ?>;"></canvas>
<!-- snow End -->

    <div class="container body">


        <div class="main_container">