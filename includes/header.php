<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome | trip.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="icon" href="images/favicon.png" type="image/x-icon">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- <link rel="stylesheet" href="css/jquery-ui.css" /> -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- font -->
<!-- <link href='//fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'> -->
<!-- //font -->
<link href="css/bootstrap-dropdownhover.min.css" rel="stylesheet" type="text/css" media="all">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-dropdownhover.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>	
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->

					
</head>
<body>
	<!-- header -->
	<div class="header">
		<div class="top-header">
			<?php if(isset($_SESSION['login'])){?>
			<div class="container">
				<div class="top-header-info">
					<div class="top-header-left wow fadeInLeft animated" data-wow-delay=".5s">
						<p style="font-size: 12px; margin-left: 180px;"><a href="index.php" style="text-decoration: none; color: white; text-transform: capitalize"><i class="fa fa-home"></i></a>|
							<a href="client_profile.php" style="text-decoration: none; color: white; text-transform: capitalize"> My profile</a>|
						<a href="tour_history.php" style="text-decoration: none; color: white; text-transform: capitalize"> My tour history</a>|
						<a href="issues.php" style="text-decoration: none; color: white; text-transform: capitalize"> Write us</a>|
						</p>
					</div>
					<div class="top-header-right wow fadeInRight animated" data-wow-delay=".5s">
						<div class="social-icons">
							<ul>
								<li style="font-size: 12px; color: white">Welcome : <?php echo $_SESSION['login']; ?></li>
								<li><a href="logout.php" style="font-size: 12px; text-decoration: none; color: white; text-transform: capitalize"> / logout</a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<?php } else { ?>
			<div class="container">
				<div class="top-header-info">
					<div class="top-header-left wow fadeInLeft animated" data-wow-delay=".5s">
						<p style="font-size: 15px; margin-left: 180px;"><a href="admin/index.php" style="text-decoration: none; color: white; text-transform: capitalize"><i class="fa fa-user"></i> Admin</a>
						</p>
					</div>
					<div class="top-header-right wow fadeInRight animated" data-wow-delay=".5s">
						<div class="top-header-right-info" style="margin-left: 150px;">
							<ul>
								<li><a href="signup.php" style="text-decoration: none; color: white; text-transform: capitalize; font-size: 12px;">signup /</a>
								<a href="login.php" style="text-decoration: none; color: white; text-transform: capitalize; font-size: 12px;">signin</a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>

			<?php } ?>
		</div>
		<div class="bottom-header">
			<div class="container">
				<div class="logo wow fadeInDown animated" data-wow-delay=".5s">
					<h1><a href="index.php"><img src="images/trip.png" alt="" height="132" /></a></h1>
				</div>
				<div class="top-nav wow fadeInRight animated" data-wow-delay=".5s">
					<nav class="navbar navbar-default">
						<div class="container">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu						
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="index.php" class="active">Home</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="codes.php">Codes</a></li>
								<li><a href="packages.php">Packages</a></li>	
								<li><a href="blog.php">Blog</a></li>
								<li><a href="contact.php">Contact</a></li>
								<li>
									<?php

										if(!isset($_SESSION['login'])){

									?>
									<a href="enquery.php">Enquery</a>
									<?php } ?>
								</li>
							</ul>	
							<div class="clearfix"></div>
						</div>	
					</nav>		
				</div>
			</div>
		</div>
	</div>
	<!-- //header -->