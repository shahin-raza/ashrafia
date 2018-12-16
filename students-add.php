<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
  exit();
} else {
    include 'nav_admin.php';
    $errors = array();
    $name = $email = $phonenum = $coursefee = $feePaid = $feeRemain ="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    
      //validating name
      if (empty($_POST["name"])) {
        $errors['nameErr']= "Name is required";
      } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $errors['nameErr']= "Only letters and white space allowed";
        }
      }

      // validating email
      if (empty($_POST["email"])) {
        $errors['emailErr']   = "Email is required";
      } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['emailErr'] = "Invalid email format";
        }
      }
      // validation phone
      if (empty($_POST["phone"])) {
        $errors['phoneErr']   = "Phone number is required";
      }
      // validating course
      if (!empty($_POST["course"])) {
        $course = test_input($_POST["course"]);
        if ($course=="none") {
          $errors['courseErr']   = "Course is required";
        }
      }
      // fee error
      if (empty($_POST["feetotal"])) {
        $errors['feetErr']   = "Fee is required";
      }
      if (empty($_POST["feepaid"])) {
        $errors['feepErr']   = "Fee paid is required";
      } else {
        $feep = $_POST['feepaid'];
        if (!is_numeric($feep)) {
          $errors['feepErr']   = "Please enter numeric value";
        } else {
          if ((int)$_POST['feetotal']< (int)$_POST['feepaid']) {
            $errors['feepErr']   = "Fee paid must be less than total fee";
          }
        }
      }
      if (empty($errors)) {
        $name       =  $_POST['name'];
        $email      = $_POST['email'];
        $phone      = $_POST['phone'];
        $course     = $_POST['course'];
        $feetotal   = $_POST['feetotal'];
        $feepaid    = $_POST['feepaid'];
        $feeremain  = $_POST['feeremain'];
        require_once('db.php');
        // inserting to database
        $sql = "INSERT INTO student (name,email,phone,course,feetotal,feepaid,feeremain) 
                VALUES ('$name','$email','$phone','$course','$feetotal','$feepaid','$feeremain')";
        $conn->query($sql);
        $conn->close();
        echo '
		<div id="myModal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<p><span class="contact-name">'.$name.'</span> is added successfully. </p>
		</div>
	
	</div>
	<script src="js/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#myModal").show();
		});

		var modal = document.getElementById("myModal");
		var span = document.getElementsByClassName("close")[0];
		span.onclick = function() {
				modal.style.display = "none";
		}
		window.onclick = function(event) {
				if (event.target == modal) {
						modal.style.display = "none";
				}
		}
	</script>
		';
      }
    }
  }
?>
<script>
$(document).ready(function() {
  $('#course-select').on('change', function() {
    var cname = this.value;
      cname = cname.replace(' ','_');
    if (cname) {
      $.ajax({
        type: "POST",
        data: {cname:cname},
        url: "get-fee.php",
        success: function(feetotal) {
          $("input[name='feetotal']").val(feetotal);
          var feep = 0;
          feep   = $('#feepaid').val();
          var x = Number(feetotal);
          var y = Number(feep);
          $("input[name='feeremain']").val(x-y);
        },
        error: function() {
        }
      });
    }
  });

  $("#feepaid").on('change', function() {
    var feep = Number(this.value);
    var feet = Number($('#feetotal').val());
    $("input[name='feeremain']").val(feet-feep);
  });
});
</script>
<br /> <br /> <br /><br />
<div class="ubea-section" id="ubea-contact-view" data-section="">
  <div class="ubea-container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center ubea-heading">
        <h2 class="text-center">Add Student</h2>
        <p id="form-title">Fields marked with an <span class = "error">*</span> are required</p>
      </div>
    </div>
    <form action="" method ="POST" name="studentform">
      <div class="row">
        <div class="col-md-4">
          <label>Name <span class = "error">* <?php  if(isset($errors['nameErr'])) echo $errors['nameErr'] ?></span> </label><br />
          <input type="text" name="name" size="30" id="name" value="<?php if(isset($_POST['name'])) {echo $_POST['name'];}?>">
        </div>
        <div class="col-md-4">
          <label>Email <span class = "error">* <?php  if(isset($errors['emailErr'])) echo $errors['emailErr'] ?></span></label><br />
          <input type="text" name="email" size="30" id="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];}?>">
        </div>
        <div class="col-md-4">
          <label>Phone <span class = "error">* <?php  if(isset($errors['phoneErr'])) echo $errors['phoneErr'] ?></span></label><br />
          <input type="text" name="phone" size="30" id="phone" value="<?php if(isset($_POST['phone'])) {echo $_POST['phone'];}?>" maxlength="10">
        </div>
        <div class="col-md-4">
          <label>Course Name <span class = "error">* <?php  if(isset($errors['courseErr'])) echo $errors['courseErr'] ?></span></label> <br/>
          <select class="form-control" id="course-select" name="course">
          <option value="none">--Please Select--</option>
           <?php
            require_once('db.php');
            $sql = "SELECT c_name FROM course ORDER BY date ASC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $cname = $row['c_name'];
                echo '<option value="'.$cname.'">'.$row['c_name'].'</option>';
              }
            }
           ?>
          </select>
        </div>
        <div class="col-md-4">
          <label>Fee Total<span class = "error">* <?php  if(isset($errors['feetErr'])) echo $errors['feetErr'] ?></span></label><br />
          <input type="text" name="feetotal" size="30" id="feetotal" value="<?php if(isset($_POST['feetotal'])) {echo $_POST['feetotal'];}?>" readonly>
        </div>
        <div class="col-md-4">
          <label>Fee Paid <span class = "error">* <?php  if(isset($errors['feepErr'])) echo $errors['feepErr'] ?></span></label><br />
          <input type="text" name="feepaid" size="30" id="feepaid" value="<?php if(isset($_POST['feepaid'])) {echo $_POST['feepaid'];}?>">
        </div>
        <div class="col-md-4">
          <label>Fee Remaining <span class = "error"> * </span></label><br />
          <input type="text" name="feeremain" size="30" id="feeremain" value="<?php if(isset($_POST['feeremain'])) {echo $_POST['feeremain'];}?>"  readonly>
        </div>
        <div class="col-md-4">
          <br />
          <input type="submit" class="btn btn-primary" id="submit-button" value="submit">
        </div>
      </div>
    </form>
  </div>
</div>

<?php include 'footer.php'; ?>