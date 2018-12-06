<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
} else {
  include 'nav_home.php';
  $mess = ' ';
  $mess.= ' 
          <div class="container">
            <table class="table table-striped">
              <thead>
              <tr><th>NAME</th><th>EMAIL</th><th>PHONE</th><th>CITY</th><th>COURSE</th><th>MESSAGE</th><th>DATE</th><th>FOLLOWUP</th><th></th></tr>
              </thead>
              <tbody>';
              require_once('db.php');
              $rec_limit = 2;
              $sql = "SELECT * FROM contact_us ORDER BY date ASC";
              $result = $conn->query($sql);
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
                                window.location= "contact-view.php";
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
                  $mess.= '<tr><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td>'.$row['phone'].'</td><td>'.$row['city'].'</td><td>'.$row['course'].'</td><td>'.$row['message'].'</td><td>'.date('M Y , g:i A',$date).'</td><td>';
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
          ';
  echo $mess;
}
?>
<?php include 'footer.php'?>