<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
  exit();
} else {
  $cid = $_GET['cid'];
	require('db.php');
	$sql="DELETE FROM course WHERE cid={$cid}";
  $conn->query($sql);
  $conn->close();
  header("Location: ../fee-structure");
  exit();
}
?>
