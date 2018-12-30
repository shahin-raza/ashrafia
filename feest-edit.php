<?php
session_start();
$cid = $_GET['cid'];
if (!isset($_SESSION['user_id'])) {
  header('Location: ../home');
  exit();
} else {
  include 'nav_admin-edit.php';
  if (empty($cid) || !is_numeric($cid)) {
    header('Location: ../admin');
    exit();
  }
}

if (!empty($_POST["course"])) {
  require_once('db.php');
  // inserting to database
  $course      = $_POST["course"];
  $fee         = $_POST["fee"];
  $duration    = $_POST["duration"];
  $sql = "UPDATE course
          SET c_name='$course',c_fee='$fee', c_duration='$duration'
          WHERE cid={$cid} ";
  $conn->query($sql);
  $conn->close();
  header('Location: ../fee-structure');
  exit();
}

require_once('db.php');
$sql = "SELECT * FROM course WHERE cid={$cid}";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $eCname = $row['c_name'];
    $eCfee  = $row['c_fee'];
    $eCduration = $row['c_duration'];
  }
}
$conn->close();
?>
<br /> <br /> <br /><br />
<div class="ubea-section" id="ubea-contact-view" data-section="">
  <div class="ubea-container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center ubea-heading">
        <h2 class="text-center">Edit Course</h2>
      </div>
    </div>
    <form action="" method ="POST" name="courseform">
      <div class="row">
        <div class="col-md-4">
          <label>Course <span class = "error"> * </label><br />
          <input type="text" name="course" size="30" id="course" value="<?php if(!empty($eCname)) {echo $eCname;}?>" required>
        </div>
        <div class="col-md-4">
          <label>Fee <span class = "error"> * </label><br />
          <input type="text" name="fee" size="30" id="fee" value="<?php if(!empty($eCfee)) {echo $eCfee;}?>" required>
        </div>
        <div class="col-md-4">
          <label>Course Duration (Months) <span class = "error"> * </label><br />
          <input type="text" name="duration" size="30" id="duration" value="<?php if(!empty($eCduration)) {echo $eCduration;}?>" required>
        </div>
        <div class="col-md-4">
          <input type="submit" class="btn btn-primary" id="submit-button" value="submit">
          <a href="../fee-structure" class="add-button">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include 'footer-edit.php'; ?>