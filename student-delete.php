<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
  exit();
} else {
  $sid = $_GET['sid'];
  if (is_numeric($sid)) {
    require('db.php');
    $sql="DELETE FROM student WHERE sid={$sid}";
    $conn->query($sql);
    $conn->close();
  }
  header("Location: ../students-view");
  exit();
}
?>
