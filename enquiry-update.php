<?php
$data = $_POST['cid'];
$cid = json_decode($data);
require_once('db.php');
$sql = "UPDATE contact_us SET followup = 'YES' WHERE cid = {$cid}";
$conn->query($sql);
$conn->close();
?>