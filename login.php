<?php include 'nav_admin.php'; ?>
<?php
  if(!isset($_SESSION)) {
        session_start();
		}
	if (isset($_SESSION['user_id'])) {
		header('Location: admin');
		exit();
	}

	if (!empty($_POST['uname'])) {
		if(($_POST['uname']=='admin') && ($_POST['pwd']=='admin1234')) {
				$_SESSION['user_id'] = $_POST['uname'];
				header('Location: admin');
				exit();
	  }
	}
	
  if (!isset($_SESSION['user_id'])) {
		echo '<script>
						addEventListener("load", function () {
							setTimeout(hideURLbar, 0);
						}, false);

						function hideURLbar() {
							window.scrollTo(0, 1);
						}

						function myFunction() {
							var x = document.getElementById("myInput");
							if (x.type === "password") {
								x.type = "text";
							} else {
								x.type = "password";
							}
						}
					</script>';
		echo '<br /> <br /> <br /> <br /> <br /> <br /> <br />
		      <link href="css/style-login.css" rel="stylesheet" type="text/css" />
					<div class="w3ls-login box box--big" id="login-form">
						<form action="" method="post">
							<div class="agile-field-txt">
								<label><b> Username</b></label>
								<input type="text" name="uname" placeholder="Enter User Name" required="" />
							</div>
							<div class="agile-field-txt">
								<label> <b>password </b></label>
								<input type="password" name="pwd" placeholder="Enter Password" required="" id="myInput" />
								<div class="agile_label">
									<input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
									<label class="check" for="check3"><b>Show password</b></label>
								</div>
								<div class="agile-right">
									<a href="#"><b>forgot password?</b></a>
								</div>
							</div>
							<div class="w3ls-bot">
								<div class="switch-agileits">
									<label class="switch">
										<input type="checkbox">
										<span class="slider round"></span>
										<b>keep me signed in</b>
									</label>
								</div>
							</div>
								<input type="submit" value="SIGN IN">
						</form>
					</div><br /> <br/>';

	/*		echo '<div class="copy-wthree">
				<p>© 2018 Tool Sign In Form . All Rights Reserved | Design by
					<a href="http://w3layouts.com/" target="_blank">W3layouts</a>
				</p>
			</div>';*/
			echo '<style>
			 small, .small {
						font-size: 123%;
				}
		      </style>';
	}
?>
<?php include 'footer.php'; ?>