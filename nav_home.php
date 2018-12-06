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
			<li style="float:right"><a href="index.php">Home</a></li>
		</ul>
	</div>