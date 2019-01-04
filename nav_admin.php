<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ashrafia &mdash;institute</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> -->
	<link rel="icon" href="resources/files/ashrafia-fav.jpg" type="image/x-icon"/>
	<link rel="stylesheet" href="resources/mystyle.css">
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	</head>
	<body>
	<div class="ubea-loader"></div>
	<div id="page">
	<nav class="ubea-nav" role="navigation">
		<div class="ubea-container">
			<div class="row">
				<div class="col-sm-8 col-xs-12">
					<div id="ubea-logo"><a href="home">AShrafia Institute Of Safety Management <em>.</em></a></div>
				</div>
				<div class="col-xs-12 text-right menu-1 main-nav">
					<ul>
						<li class="active"><a href="home" class="external">Home</a></li>
						<?php
							if(!isset($_SESSION))
							{
									session_start();
							}
							if (isset($_SESSION['user_id'])) {
								echo '<li><a href="admin" class="external">Admin</a></li>';
								echo '<li><a href="logout" class="external">Logout</a></li>';
							} else {
									echo '<li><a href="login" class="external">Login</a></li>';
								}
							?>
					</ul>
				</div>
			</div>
		</div>
	</nav>