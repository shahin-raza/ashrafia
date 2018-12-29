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
        <h2 class="text-center">Students</h2>
      </div>
      <div class="row">
        <div class="col-md-4 col-md-offset-10">
          <a href="students-add" class="add-button">Add Student</a>
        </div>
      </div>
    <div class="table-responsive">
      <table class="table table-dark">
        <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Fee Total</th><th>Fee Paid</th><th>Fee Remaining</th><th></th></tr></thead>
        <tbody>
        <?php
              require_once('db.php');
              $sql = "SELECT * FROM student ORDER BY date ASC";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."<td>".$row['course']."</td><td>".$row['feetotal']."</td></td>
                 <td>".$row['feepaid']."<td>".$row['feeremain']."</td>";
                 echo '<td><a href="student-edit.php?cid='.$row['sid'].'">Edit</a>&nbsp &nbsp';
                 echo '<a href="student-delete.php?cid='.$row['sid'].'">Delete</a></td></tr>';
                }
              }
              $conn->close();
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include 'footer.php';?>