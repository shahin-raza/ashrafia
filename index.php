<!DOCTYPE HTML>
<!--
	uBeasa by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ashrafia &mdash; A institute for learning</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<meta name="description" content="Free HTML5 Website Template by freshdesignweb.com" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freshdesignweb.com" />
-->
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
	<link rel="stylesheet" href="resources/mystyle.css">
	<!--<script src="http://localhost/ashrafia/resources/jquery.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://localhost/ashrafia/resources/bootstrap.min.js"></script>
	<script src="http://localhost/ashrafia/resources/jquery.validate.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>-->
  <script src="http://localhost/ashrafia/resources/myscript.js"></script>
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

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
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
					<div id="ubea-logo"><a href="index.php">AShrafia Institute Of Safety Management <em>.</em></a></div>
				</div>
				<div class="col-xs-12 text-right menu-1 main-nav">
					<ul>
						<li class="active"><a href="#" data-nav-section="home">Home</a></li>
						<li><a href="#" data-nav-section="courses">Courses</a></li>
						<li><a href="#" data-nav-section="portfolio">Portfolio</a></li>
            <li><a href="#" data-nav-section="about">About us</a></li>
						<li><a href="#" data-nav-section="contact">Contact</a></li>
						<?php
							if(!isset($_SESSION))
							{
									session_start();
							}
							if (isset($_SESSION['user_id'])) {
								echo '<li><a href="contact-view.php" class="external">View Contacts</a></li>';
								echo '<li><a href="logout.php" class="external">Logout</a></li>';
							} else {
									echo '<li><a href="login.php" class="external">Login</a></li>';
								}
							?>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<div id="ubea-hero" class="js-fullheight"  data-section="home">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/img_bg_1.jpg);">
		   		<div class="overlay"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h2>Explore the new template.</h2>
		   					<p><a href="http://twitter.com/freshdesignweb" target="_blank" class="btn btn-primary btn-lg">Follow @freshdesignweb</a></p>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img_bg_2.jpg);">
		   		<div class="overlay"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h2>Creative. Innovative.Intuitive.</h2>
		   					<p><a href="#" class="btn btn-primary btn-lg">Get started</a></p>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img_bg_3.jpg);">
		   		<div class="overlay"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h2>A new experience.</h2>
		   					<p><a href="#" class="btn btn-primary btn-lg">Get started</a></p>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</div>

	<div class="ubea-section-overflow">

		<div class="ubea-section" id="ubea-services" data-section="courses">
			<div class="ubea-container">
				<div class="row">
					<div class="col-md-12">
						<div class="ubea-heading">
							<h2 class="ubea-left">Courses</h2>
							<p> We provide full- time and part-time courses, like Safety Management , Higher Secondary (10+2) PCM, Secondary Education (STD V to Xth) , English Spoken etc.. and cover most of the popular computer technology.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="row">

							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<i class="icon-umbrella"></i>
									</span>
									<div class="feature-copy">
										<h3>Safety Management</h3>
										<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Nulla cursus pharetra massa at lacinia Fusce eleifhend Fusce in dapibus.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<i class="icon-monitor"></i>
									</span>
									<div class="feature-copy">
										<h3>Investment Banking</h3>
										<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Nulla cursus pharetra massa at lacinia Fusce eleifhend Fusce in dapibus.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<i class="icon-cup"></i>
									</span>
									<div class="feature-copy">
										<h3>Sales and Trading</h3>
										<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Nulla cursus pharetra massa at lacinia Fusce eleifhend Fusce in dapibus.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 animate-box" data-animate-effect="fadeIn">
						<div class="row">
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<i class="icon-pencil"></i>
									</span>
									<div class="feature-copy">
										<h3>Strategic Planning</h3>
										<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Nulla cursus pharetra massa at lacinia Fusce eleifhend Fusce in dapibus.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<i class="icon-cog"></i>
									</span>
									<div class="feature-copy">
										<h3>Turnaround Consulting</h3>
										<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Nulla cursus pharetra massa at lacinia Fusce eleifhend Fusce in dapibus.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<i class="icon-layers"></i>
									</span>
									<div class="feature-copy">
										<h3>Bonds & Commodities</h3>
										<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Nulla cursus pharetra massa at lacinia Fusce eleifhend Fusce in dapibus.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="ubea-section" id="ubea-portfolio" data-section="portfolio">
			<div class="ubea-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
						<h2>Portfolio</h2>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<a href="images/img_2.jpg" class="ubea-card-item image-popup" title="Project name here.">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="images/img_2.jpg" alt="Image" class="img-responsive">
							</figure>
						</a>
					</div>
					<div class="col-md-4">
						<a href="images/img_1.jpg" class="ubea-card-item image-popup" title="Project name here.">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="images/img_1.jpg" alt="Image" class="img-responsive">
							</figure>
						</a>
					</div>
					<div class="col-md-4">
						<a href="images/img_3.jpg" class="ubea-card-item image-popup" title="Project name here.">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="images/img_3.jpg" alt="Image" class="img-responsive">
							</figure>
						</a>
					</div>

					<div class="col-md-4">
						<a href="images/img_4.jpg" class="ubea-card-item image-popup" title="Project name here.">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="images/img_4.jpg" alt="Image" class="img-responsive">
							</figure>
						</a>
					</div>
					<div class="col-md-4">
						<a href="images/img_5.jpg" class="ubea-card-item image-popup" title="Project name here.">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="images/img_5.jpg" alt="Image" class="img-responsive">
							</figure>
						</a>
					</div>
					<div class="col-md-4">
						<a href="images/img_6.jpg" class="ubea-card-item image-popup" title="Project name here.">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="images/img_6.jpg" alt="Image" class="img-responsive">
							</figure>
						</a>
					</div>
				</div>
			</div>
		</div>
        
		<div class="ubea-section" id="ubea-faq" data-section="faq">
			<div class="ubea-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
						<h2>Frequently Ask Questions</h2>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">

						<div class="ubea-accordion">
							<div class="ubea-accordion-heading">
								<div class="icon"><i class="icon-cross"></i></div>
								<h3>What is uBeasa?</h3>
							</div>
							<div class="ubea-accordion-content">
								<div class="inner">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non sed sequi rerumar quasi repellat eum earum praesentium totam! Quia, voluptas eaque anim uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore pariatur.</p>
								</div>
							</div>
						</div>
						<div class="ubea-accordion">
							<div class="ubea-accordion-heading">
								<div class="icon"><i class="icon-cross"></i></div>
								<h3>I have technical problem, who do I email?</h3>
							</div>
							<div class="ubea-accordion-content">
								<div class="inner">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non sed sequi rerumar quasi repellat eum earum praesentium totam! Quia, voluptas eaque anim uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore pariatur. </p>
								</div>
							</div>
						</div>
						<div class="ubea-accordion">
							<div class="ubea-accordion-heading">
								<div class="icon"><i class="icon-cross"></i></div>
								<h3>How do I use uBeasa features?</h3>
							</div>
							<div class="ubea-accordion-content">
								<div class="inner">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non sed sequi rerumar quasi repellat eum earum praesentium totam! Quia, voluptas eaque anim uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore pariatur.</p>
								</div>
							</div>
						</div>

					</div>
					<div class="col-md-6">

						<div class="ubea-accordion">
							<div class="ubea-accordion-heading">
								<div class="icon"><i class="icon-cross"></i></div>
								<h3>What language are available?</h3>
							</div>
							<div class="ubea-accordion-content">
								<div class="inner">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non sed sequi rerumar quasi repellat eum earum praesentium totam! Quia, voluptas eaque anim uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore pariatur. </p>
								</div>
							</div>
						</div>
						<div class="ubea-accordion">
							<div class="ubea-accordion-heading">
								<div class="icon"><i class="icon-cross"></i></div>
								<h3>Can I have a username that is already taken?</h3>
							</div>
							<div class="ubea-accordion-content">
								<div class="inner">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non sed sequi rerumar quasi repellat eum earum praesentium totam! Quia, voluptas eaque anim uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore pariatur. </p>
								</div>
							</div>
						</div>
						<div class="ubea-accordion">
							<div class="ubea-accordion-heading">
								<div class="icon"><i class="icon-cross"></i></div>
								<h3>Is uBeasa free?</h3>
							</div>
							<div class="ubea-accordion-content">
								<div class="inner">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non sed sequi rerumar quasi repellat eum earum praesentium totam! Quia, voluptas eaque anim uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore pariatur. </p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
    
    <div id="ubea-blog" data-section="about">
		<div class="ubea-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
					<h2>About us</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non sed sequi rerumar quasi repellat eum earum praesentium totam! Quia, voluptas eaque anim uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore pariatur. </p>
				</div>
			</div>
	    </div>
    </div>
      
		<?php
		if (!empty($_POST['name'])) {
			$name  =  $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$city = $_POST['city'];
			$course = $_POST['course'];
			$message = $_POST['message'];
			require_once('db.php');
			// inserting to database
			$sql = "INSERT INTO contact_us (name,email,phone,city,course,message) 
			        VALUES ('$name','$email','$phone','$city','$course','$message')";
			$conn->query($sql);
			$conn->close();
			//$result =mysqli_query($conn, $query);

		}
		?>
		
		<div id="ubea-contact" data-section="contact" id="ubea-faq"">
		  <div class="overlay"></div>
			<div class="ubea-container">
				<div id="#enqtitle"><h3 style="color:black; text-align:center;"><b>Course Enquiry Form</b></h3></div>
				<div id="form-title">Fields marked with an <span class = "error">*</span> are required</div>
					<form action="" method ="POST" name="contactform">
					<div class="Row">
					  <div class="subform">
							<label>Name <span class = "error"> * </label><br />
							<input type="text" name="name" size="30" id="name">
						</div>
						<div class="subform">
							<label>Email <span class = "error"> * </span></label><br />
							<input type="text" name="email" size="30" id="email">
						</div>
						<div class="subform">
							<label>Phone <span class = "error"> * </span></label><br />
							<input type="text" name="phone" size="30" id="phone">
						</div>
					</div>
					<div class="Row">
						<div class="subform">
							<label>City <span class = "error"> * </span></label><br />
							<input type="text" name="city" size="30" id="city">
						</div>
						<div class="subform">
							<label>Course Name <span class = "error"> * </span></label> <br/>
							<input type="text" name="course" size="30" id="course">
						</div>
						<div class="subform">
							<label>Message <span class = "error"> * </span></label> <br />
							<textarea rows="2" cols="29" name="message" id="message"></textarea>
						</div>
	        </div>
						<input type="submit" class="btn btn-primary" value="submit">
					</form>
				</div>
		  </div>
	  </div>
		
	
<!--	<div id="ubea-contact" data-section="contact" class="ubea-cover ubea-cover-xs" style="background-image:url(images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="ubea-container">
			<div class="row text-center">
				<div class="display-t">
					<div class="display-tc">
						<div class="col-md-12">
							<h3>If you have inqueries please email us at <a href="#">info@yourdomain.com</a></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->

	<footer id="ubea-footer" role="contentinfo">
		<div class="ubea-container">
			
			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2018 freshDesignweb. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="https://www.freshdesignweb.com/" target="_blank">freshDesignweb.com</a></small>
					</p>
					<p class="pull-right">
						<ul class="ubea-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>
