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
        <div class="col-md-4 col-md-offset-9">
          <a href="students-add" class="add-button"><i class="ti-user"></i> Add Student</a>
          <a href="admin" class="add-button"><span class="ti-back-left" style="font-weight:bold;"></span> Admin</a>
        </div>
        <form action="" method="GET">
          <div class="col-md-3">
            <div class="frmSearch">
              <input type="text" name="stdnt" id="search-box">
              <ul id="suggesstion-box"></ul>
            </div>
          </div>
          <div class="col-md-3 search-refresh">
            <button type="submit" class="btn btn-primary">
              <i class="ti-search" style="font-weight:bold;"></i> Search
            </button>
            <a href="students-view" class="add-button"><span class="icon-reload"></span> Refresh</a>
          </div>
        </form>
      </div>
      <script>
        $(document).ready(function(){
          $("#search-box").keyup(function(){
            var stdnt = this.value;
            $.ajax({
              type: "POST",
              url: "get-student.php",
              data: {stdnt:stdnt},
              beforeSend: function(){
                $("#search-box").css({"background-image":"url(images/Loading_icon.gif)", "background-repeat":"no-repeat"});
              },
              success: function(data){
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background","#FFF");
              }
            });
          });
        });
      //To select country name
      function selectStudent(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
      }
      </script>
    <div class="table-responsive">
      <table class="table table-dark">
        <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Fee Total</th><th>Fee Paid</th><th>Fee Remaining</th><th></th></tr></thead>
        <tbody>
        <?php
              require_once('db.php');
              if(!empty($_GET['stdnt'])) {
                $stdnt = $_GET['stdnt'];
              }
              $perPage = 5;
              $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
              $startAt = $perPage * ($page - 1);
              $query = "SELECT *  FROM student";
              $result = $conn->query($query);
              $r = $result->num_rows;
              $totalPages = ceil($r / $perPage);
              $links = "";

              $sql = "SELECT * FROM student ORDER BY name,date DESC LIMIT $startAt, $perPage";
              if(!empty($stdnt)) {
                $sql = "SELECT * FROM student WHERE name LIKE '%$stdnt%' ORDER BY date ASC LIMIT $startAt, $perPage";
              }
              $result = $conn->query($sql);
              $pageUrl = "";
              if (!empty($_GET['page'])){
                  $pageUrl = "?page=".$_GET['page'];
              }

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."<td>".$row['course']."</td><td>".$row['feetotal']."</td></td>
                 <td>".$row['feepaid']."<td>".$row['feeremain']."</td>";
                 echo '<td> <a href="students-edit/'.$row['sid'].'" class="action-links">Edit</a><span class="pipe">|</span>';
                 echo '<a href="student-delete/'.$row['sid'].'" class="action-links">Delete</a></td></tr>';
                }
              }
              if ($result->num_rows <= 0) {
                echo '<tr><td colspan="4">There are no any data</td></tr>';
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
  </ul>
</div>
<?php include 'footer.php';?>