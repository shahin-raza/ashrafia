<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
  exit();
} else {
  include 'nav_admin.php';
}

if (!empty($_POST["course"])) {
  require_once('db.php');
  // inserting to database
  $course      = $_POST["course"];
  $fee         = $_POST["fee"];
  $duration    = $_POST["duration"];
  $sql = "INSERT INTO course (c_name,c_fee,c_duration) 
          VALUES ('$course','$fee','$duration')";
  $conn->query($sql);
  $conn->close();
  header('Location: fee-structure.php');
}
?>
<br /> <br /> <br /><br />
<div class="ubea-section" id="ubea-contact-view" data-section="">
  <div class="ubea-container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center ubea-heading">
        <h2 class="text-center">Add Course</h2>
      </div>
    </div>
    <form action="" method ="POST" name="courseform">
      <div class="row">
        <div class="col-md-4">
          <label>Course <span class = "error"> * </label><br />
          <input type="text" name="course" size="30" id="course" required>
        </div>
        <div class="col-md-4">
          <label>Fee <span class = "error"> * </label><br />
          <input type="text" name="fee" size="30" id="fee" required>
        </div>
        <div class="col-md-4">
          <label>Course Duration (Months) <span class = "error"> * </label><br />
          <input type="text" name="duration" size="30" id="duration" required>
        </div>
        <div class="col-md-4">
          <input type="submit" class="btn btn-primary" id="submit-button" value="submit">
        </div>
      </div>
    </form>
  </div>
</div>

<?php include 'footer.php'; ?>