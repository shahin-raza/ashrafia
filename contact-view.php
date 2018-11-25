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
              <tr><th>NAME</th><th>EMAIL</th><th>PHONE</th><th>CITY</th><th>COURSE</th><th>MESSAGE</th><th>DATE</th><th>FOLLOWUP</th><th>DELETE</th></tr>
              </thead>
              <tbody>';
              require_once('db.php');
              $sql = "SELECT * FROM contact_us ORDER BY date ASC";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $date = strtotime($row['date']);
                  $mess.= '<tr><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td>'.$row['phone'].'</td><td>'.$row['city'].'</td><td>'.$row['course'].'</td><td>'.$row['message'].'</td><td>'.date('M Y , g:i A',$date).'</td><td>'.$row['followup'].'</td><td><a href="contact-delete.php?cid='.$row['cid'].'">Delete</a></td></tr>';
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
