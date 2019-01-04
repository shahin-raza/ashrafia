<?php
require_once('db.php');
if(!empty($_POST['stdnt'])) {
  $stdnt = $_POST['stdnt'];
  $sql = "SELECT name FROM student WHERE name LIKE '%$stdnt%' ORDER BY date ASC LIMIT 10";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) { ?>
  <style>
    #student-ul  {
      list-style: none;
    }
    #stdnt-li {
      border: 0.02px solid mediumaquamarine;
      background-color:#f9830969;
      width: 207px;
    }
  </style>
  <div class="ubea-container">
    <div class="row">
      <div class="col-md-3">
        <ul id="student-ul">
        <?php  while($row = $result->fetch_assoc()) { ?>
            <li id="stdnt-li" onClick="selectStudent('<?php echo $row["name"]; ?>');"><?php echo $row["name"]; ?></li>
          <?php }
          }?>
        </ul>
      </div>
    </div>
  </div>
<?php }?>
<!--if(!empty($data)){
    $jsonData = json_encode($data);
  }
  print_r($jsonData);
  $conn->close();
}
*/-->