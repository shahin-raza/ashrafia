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
          <a href="admin" class="add-button"><span class="icon-back"></span> Admin</a>
        </div>
      </div>
    <div class="table-responsive">
      <table class="table table-dark">
        <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Fee Total</th><th>Fee Paid</th><th>Fee Remaining</th><th></th></tr></thead>
        <tbody>
        <?php
              require_once('db.php');
              $perPage = 5;
              $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
              $startAt = $perPage * ($page - 1);
              $query = "SELECT *  FROM student";
              $result = $conn->query($query);
              $r = $result->num_rows;
              $totalPages = ceil($r / $perPage);
              $links = "";

              $sql = "SELECT * FROM student ORDER BY date ASC LIMIT $startAt, $perPage";
              $result = $conn->query($sql);
              $pageUrl = "";
              if (!empty($_GET['page'])){
                  $pageUrl = "?page=".$_GET['page'];
              }

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."<td>".$row['course']."</td><td>".$row['feetotal']."</td></td>
                 <td>".$row['feepaid']."<td>".$row['feeremain']."</td>";
                 echo '<td> <a href="students-edit/'.$row['sid'].'">Edit</a>&nbsp &nbsp';
                 echo '<a href="student-delete/'.$row['sid'].'">Delete</a></td></tr>';
                }
              }
              $conn->close();
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="contact-pager">
<ul class="pagination pagination-sm">
<?php
for ($i = 1; $i <= $totalPages; $i++) {
  echo "<li class='page-item'><a class='page-link' href='students-view?page=$i'>$i</a></li>";
}
?>
</ul></div>
<?php include 'footer.php';?>