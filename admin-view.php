<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
  exit();
} else {
  include 'nav_admin.php';
}
?>
<br /> <br /> <br /><br />
<div class="ubea-section" id="ubea-contact-view" data-section="">
  <div class="ubea-container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center ubea-heading">
        <h2 class="text-center">Welcome to Admin Section</h2>
      </div>
    </div>
    <div class="row">
			<div class="col-md-3">
        <div class="admin-section">
          <a href="students-enquiry.php" target="_blank"><img src ="images/enquiry.png" width="253px" height="200px"></a><br />
          <center><a href="students-enquiry.php" class="image-footer" target="_blank"><b>Students Ꮛnquiry</b></a></center>
        </div>
      </div>
      <div class="col-md-3">
        <div class="admin-section">
          <a href="fee-structure.php" target="_blank"><img src ="images/school_fees.jpg" width="253px" height="200px"></a><br />
          <center><a href="fee-structure.php" class="image-footer" target="_blank"><b>View Courses</b></a></center>
        </div>
      </div>
      <div class="col-md-3">
        <div class="admin-section">
          <a href="students-add.php" target="_blank"><img src ="images/student_add.png" width="253px" height="200px"></a><br />
          <center><a href="students-add.php" class="image-footer" target="_blank"><b>Add Student</b></a></center>
        </div>
      </div>
      <div class="col-md-3">
        <div class="admin-section">
          <a href="students-view.php" target="_blank"><img src ="images/student_view.jpg" width="253px" height="200px"></a><br />
          <center><a href="students-view.php" class="image-footer" target="_blank"><b>View Students</b></a></center>
        </div>
      </div>
      <div class="col-md-3">
        <div class="admin-section">
          <a href="course-add.php" target="_blank"><img src ="images/student_course.jpg" width="253px" height="200px"></a><br />
          <center><a href="course-add.php" class="image-footer" target="_blank"><b>Add Course</b></a></center>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
