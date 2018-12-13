<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
} else {
  include 'nav_admin.php';
  $mess = ' <br /> <br /> <br /><br />
  <div class="ubea-section" id="ubea-contact-view" data-section="">
	<div class="ubea-container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
				<h2 class="text-center">Students Enquiry List</h2>
			</div>
    </div>
      <div class="table-responsive">
        <table class="table table-dark">
          <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>City</th><th>Course</th><th>Message</th><th>Date</th><th>Followup</th><th></th></tr></thead>
          <tbody>';
            require_once('db.php');
            $perPage = 5;
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $startAt = $perPage * ($page - 1);
            $query = "SELECT *  FROM contact_us";
            $result = $conn->query($query);
            $r = $result->num_rows;
            $totalPages = ceil($r / $perPage);
            $links = "";

            $sql = "SELECT * FROM contact_us ORDER BY date ASC LIMIT $startAt, $perPage";
            $result = $conn->query($sql);
            $pageUrl = "";
            if (!empty($_GET['page'])){
                $pageUrl = "?page=".$_GET['page'];
            }
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $fid = "followup-".$row['cid'];
                echo '
                  <script>
                    $(document).ready(function() {
                      $("#'.$fid.'").click(function() {
                        if (this.checked) {
                          var x = $(this).val();
                          $.ajax({
                            type: "POST",
                            data: {cid:x},
                            url: "contact-update.php",
                            success: function(data) {
                              window.location= "contact-view.php'.$pageUrl.'";
                            },
                            error: function(data) {
                            }
                          });
                        }
                      });
                    });
                  </script>
                ';
              $date = strtotime($row['date']);
              $mess.= '<tr><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td>'.$row['phone'].'</td><td>'.$row['city'].'</td><td>'.$row['course'].'</td><td>'.$row['message'].'</td><td>'.date('M d Y , g:i A',$date).'</td><td>';
              if ($row['followup']=='NO') {
                $fup = $row['followup'];
                $mess.= ''.$fup.'<div style="margin-left:2px;"><input type="checkbox" value="'.$row['cid'].'" id="'.$fid.'"> Done</div></td>';
              } else {
                $fup = $row['followup'];
                $mess.= ''.$fup.'';
              }
              $mess .='</td><td><a href="contact-delete.php?cid='.$row['cid'].'">Delete</a></td></tr>';
            }
        }
        $conn->close();
        $mess.= '   </tbody>
                  </table>
                </div>
              </div>
          </div>    
            ';
            $links.= '<div class="contact-pager">
            <ul class="pagination pagination-sm">';
            for ($i = 1; $i <= $totalPages; $i++) {
              $links.= "<li class='page-item'><a class='page-link' href='contact-view.php?page=$i'>$i</a></li>";
            }
            $links.= '</ul></div>';
  }
  echo $mess;
  echo "<br />";
  echo $links;
?>
<?php include 'footer.php'?>