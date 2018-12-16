<?php
$data = $_POST['cname'];
$cname = str_replace('_',' ',$data);
require_once('db.php');
$sql = "SELECT c_fee FROM course WHERE c_name ='$cname'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo $row['c_fee'];
  }
}
$conn->close();
?>