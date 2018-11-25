<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="resources/mystyle.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="http://localhost/ashrafia/resources/jquery.min.js"></script>
  <script src="http://localhost/ashrafia/resources/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
  <script src="http://localhost/ashrafia/resources/myscript.js"></script>
</head>
<body>

  <div class="uppermenu">
		<ul>
			<?php
			if(!isset($_SESSION))
			{
					session_start();
			}
			if (isset($_SESSION['user_id'])) {
				echo '<li style="float:right"><a href="logout.php">Logout</a></li>';
				echo '<li style="float:right"><a href="contact-view.php">View Contacts</a></li>';
			} else {
					echo '<li style="float:right"><a href="login.php">Login</a></li>';
				}
			?>
			<li style="float:right"><a href="">Write for Us</a></li>
			<li style="float:right"><a href="">List Your Institute</a></li>
		</ul>
	</div>

	<nav  class="navbar navbar-light" style="background-color: white;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php"><img src="resources/files/Course-Suggest-Logo.png" height="40px" width="140px"></a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="">PROFESSIONAL COURSES</a></li>
				<li><a href="">MBA</a></li>
				<li><a href="">DANCE</a></li>
				<li><a href="">MUSIC</a></li>
				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">OTHER COURSES<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Page 1-1</a></li>
						<li><a href="#">Page 1-2</a></li>
						<li><a href="#">Page 1-3</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
