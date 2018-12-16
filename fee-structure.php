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
        <h2 class="text-center">Fee Structure</h2>
      </div>
    </div>
    <div class="table-responsive">
        <table class="table table-dark">
          <thead><tr><th>Course Name</th><th>Fee Amount</th><th>Duration</th><th></th></tr></thead>
          <tbody>
            <?php
              require_once('db.php');
              $sql = "SELECT * FROM course ORDER BY date ASC";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 echo "<tr><td>".$row['c_name']."</td><td>Rs. ".$row['c_fee']."</td><td>".$row['c_duration']." Months</td>";
                 echo '<td><a href="feest-edit.php?cid='.$row['cid'].'">Edit</a>&nbsp &nbsp';
                 echo '<a href="feest-delete.php?cid='.$row['cid'].'">Delete</a></td></tr>';
                }
              }
              $conn->close();
            ?>
          </tbody>
        </table>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>