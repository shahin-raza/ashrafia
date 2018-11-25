<?php include 'nav_home.php' ?>
<div class="detail-banner">
	<div class="banner-text">
    <b>ASHRAFIA INSTITUTE OF SAFETY MANAGEMENT</b>
  </div>
</div>

<div class="lowermenu">
	<ul>
    <li><a href="">Description</a></li>
		<li><a href="">Contact</a></li>
		<li><a href="">reviews on “ASHRAFIA INSTITUTE OF SAFETY MANAGEMENT”</a></li>
	</ul>
</div>

<div class="lowercontent">
  <div id="cont-left">
    <div class="description">
			<div id="#distitle"><h3>Description</h3></div><hr>
			<div id="dis-content">
				Red hat safety Training & Consulting is an International safety Training Provider focusing in industrial safety training’s , safety <br />
				execution , Safety audits  and safety Man power solutions.<br /> <br />

        An Accredited NEBOSH Course Provider for offering NEBOSH Qualifications, which includes NEBOSH International general<br />
        certificate and NEBOSH International Diploma in OSH
			</div>
			<div id="#detailstitle"><h3>Details</h3></div><hr>
			<div id="dis-content">
				<table id="dettable" style="width:100%">
          <tr><td>Listing categories</td><td style="font-weight:bold; color: #0a83b6;">Health and Safety / Risk and Quality <br />Management / Fire & Safety / <br /> NEBOSH / OHSAS</td></tr>
          <tr><td>Location / Region</td><td style="font-weight:bold ; color: #0a83b6; ">Region India (IN)/ T. Nagar/ Chennai</td></tr>
          <tr><td>Payment Option</td><td style="font-weight:bold; color: #0a83b6;">Cash, Installment, Online Payment</td></tr>
          <tr><td>Education level</td><td style="font-weight:bold; color: #0a83b6;">Beginner, Intermediate, Professional</td></tr>
          <tr><td>Accredited by</td><td style="font-weight:bold; color: #363636;">NEBOSH</td></tr>
          <tr><td>Eligibility</td><td style="font-weight:bold; color: #363636;">H.S.C</td></tr>
          <tr><td>Education Subject</td><td style="font-weight:bold; color: #363636;">Health and Safety</td></tr>
          <tr><td>Education Type</td><td style="font-weight:bold; color: #363636;">Classroom</td></tr>
          <tr><td>Course Location:</td><td style="font-weight:bold; color: #363636;">Patna (India)</td></tr>
				</table>
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
  <div id="cont-right">
		<div id="#enqtitle"><h3 style="color:#bfb4b4">Course Enquiry Form</h3></div><hr>
		<div style="font-size:20px; color:#735a5a;">Course Contact Form</div>
		<div id="form-title">Fields marked with an <span class = "error">*</span> are required</div>
      <form action="" method ="POST" name="contactform">
				<label>Name <span class = "error"> * </label><br />
				<input type="text" name="name" size="30" id="name"><br /> <br />
				<label>Email <span class = "error"> * </span></label><br />
				<input type="text" name="email" size="30" id="email"></br> <br />
				<label>Phone <span class = "error"> * </span></label><br />
				<input type="text" name="phone" size="30" id="phone"></br> <br />
				<label>City <span class = "error"> * </span></label><br />
				<input type="text" name="city" size="30" id="city"></br> <br />
				<label>Course Name <span class = "error"> * </span></label><br />
				<input type="text" name="course" size="30" id="course"></br> <br />
				<label>Message <span class = "error"> * </span></label><br />
				<textarea rows="4" cols="29" name="message" id="message"></textarea> <br />
				<input type="submit" value="submit">
      </form>
  </div>
</div>
<?php include 'footer.php' ?>
