<?php
require_once('db.php');
if(!empty($_POST['stdnt'])) {
  $stdnt = $_POST['stdnt'];
  $sql = "SELECT name FROM student WHERE name LIKE '%$stdnt%' ORDER BY date ASC LIMIT 10";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) { ?>
  <?php  while($row = $result->fetch_assoc()) { ?>
      <li id="stdnt-li" onClick="selectStudent('<?php echo $row["name"]; ?>');"><?php echo $row["name"]; ?></li>
    <?php }
    }?>
<?php }?>