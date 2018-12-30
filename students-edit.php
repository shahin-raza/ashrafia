<?php
$sid = $_GET['sid'];
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: ../home');
  exit();
} else {
    if (empty($sid) || !is_numeric($sid)) {
      header('Location: ../admin');
      exit();
    }
    include 'nav_admin-edit.php';
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
        $sql = "UPDATE student
                SET name='$name',email='$email',phone='$phone',course='$course',feetotal='$feetotal',feepaid='$feepaid',feeremain='$feeremain'
                WHERE sid={$sid}";
        $conn->query($sql);
        $conn->close();
        header('Location: ../students-view');
        exit();
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
        url: "../get-fee.php",
        success: function(feetotal) {
          $("input[name='feetotal']").val(feetotal);
          var feep = 0;
          if($('#feepaid').val()) {
            feep   = $('#feepaid').val();
          }
          var x = Number(feetotal);
          var y = Number(feep);
          $("input[name='feeremain']").val(x-y);
        },
        error: function() {
        }
      });
    }
  });

  $("#feepaid").on('input', function()  {
    var feep = Number(this.value);
    var feet = Number($('#feetotal').val());
    $("input[name='feeremain']").val(feet-feep);
  });
});
</script>
<br /> <br /> <br /><br />
<?php
  require_once('db.php');
  $sql = "SELECT * FROM student WHERE sid={$sid}";
  $eResult = $conn->query($sql);
  if ($eResult->num_rows > 0) {
    while($row = $eResult->fetch_assoc()) {
     $eName      = $row['name'];
     $eEmail     = $row['email'];
     $ePhone     = $row['phone'];
     $eCourse    = $row['course'];
     $eFeetotal  = $row['feetotal'];
     $eFeepaid   = $row['feepaid'];
     $eFeeremain = $row['feeremain'];
    }
  }
?>
<script>
$(document).ready(function() {
  if ("<?php if(isset($_POST['course'])) echo $_POST['course']?>") {
    $("#course-select").val("<?php if(isset($_POST['course'])) echo $_POST['course']?>");
  } else {
     if ("<?php echo $eCourse?>") {
      $("#course-select").val("<?php echo $eCourse?>").change();
     }
  }
});
</script>
<div class="ubea-section" id="ubea-contact-view" data-section="">
  <div class="ubea-container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center ubea-heading">
        <h2 class="text-center">Edit Student</h2>
        <p id="form-title">Fields marked with an <span class = "error">*</span> are required</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-md-offset-10">
        <a href="../admin" class="add-button"><span class="icon-back"></span> Admin</a>
      </div>
    </div>
    <form action="" method ="POST" name="studentform">
      <div class="row">
        <div class="col-md-4">
          <label>Name <span class = "error">* <?php  if(isset($errors['nameErr'])) echo $errors['nameErr'] ?></span> </label><br />
          <input type="text" name="name" size="30" id="name" value="<?php if(isset($_POST['name'])) {echo $_POST['name'];} else{echo $eName;}?>">
        </div>
        <div class="col-md-4">
          <label>Email <span class = "error">* <?php  if(isset($errors['emailErr'])) echo $errors['emailErr'] ?></span></label><br />
          <input type="text" name="email" size="30" id="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} else{echo $eEmail;}?>">
        </div>
        <div class="col-md-4">
          <label>Phone <span class = "error">* <?php  if(isset($errors['phoneErr'])) echo $errors['phoneErr'] ?></span></label><br />
          <input type="text" name="phone" size="30" id="phone" value="<?php if(isset($_POST['phone'])) {echo $_POST['phone'];} else{echo $ePhone;}?>" maxlength="10">
        </div>
        <div class="col-md-4">
          <label>Course Name <span class = "error">* <?php  if(isset($errors['courseErr'])) echo $errors['courseErr'] ?></span></label> <br/>
          <select class="form-control" id="course-select" name="course">
          <option value="none">--Please Select--</option>
           <?php
            $sql = "SELECT c_name FROM course ORDER BY date ASC";
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
              while($row = $results->fetch_assoc()) {
                $cname = $row['c_name'];
                echo '<option value="'.$cname.'">'.$row['c_name'].'</option>';
              }
            }
            $conn->close();
           ?>
          </select>
        </div>
        <div class="col-md-4">
          <label>Fee Total<span class = "error">* <?php  if(isset($errors['feetErr'])) echo $errors['feetErr'] ?></span></label><br />
          <input type="text" name="feetotal" size="30" id="feetotal" value="<?php if(isset($_POST['feetotal'])) {echo $_POST['feetotal'];}?>" readonly>
        </div>
        <div class="col-md-4">
          <label>Fee Paid <span class = "error">* <?php  if(isset($errors['feepErr'])) echo $errors['feepErr'] ?></span></label><br />
          <input type="text" name="feepaid" size="30" id="feepaid" value="<?php if(isset($_POST['feepaid'])) {echo $_POST['feepaid'];} else{echo $eFeepaid;}?>">
        </div>
        <div class="col-md-4">
          <label>Fee Remaining <span class = "error"> * </span></label><br />
          <input type="text" name="feeremain" size="30" id="feeremain" value="<?php if(isset($_POST['feeremain'])) {echo $_POST['feeremain'];}?>"  readonly>
        </div>
        <div class="col-md-4">
          <br />
          <input type="submit" class="btn btn-primary" id="submit-button" value="submit">
          <a href="../students-view" class="add-button"><span class="icon-cancel"></span> Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include 'footer-edit.php'; ?>