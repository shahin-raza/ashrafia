<?php
$conn = new mysqli('localhost','root','root','ashrafia');
if (mysqli_connect_error()) {
 die("Database connection failed: " . mysqli_connect_error());
}
?>