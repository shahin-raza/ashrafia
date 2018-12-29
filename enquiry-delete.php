<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: home');
} else {
  $cid = $_GET['cid'];
	require('db.php');
	$sql="DELETE FROM contact_us WHERE cid={$cid}";
  $conn->query($sql);
  $conn->close();
  header("Location: ../enquiry");
  exit();
}
?>