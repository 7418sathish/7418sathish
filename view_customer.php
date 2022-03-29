<?php 
require_once "header.php";
include 'conn.php';
?>
<!-- content comes -->

<?php 
  echo '<b>Customer Table</b>';
  echo "<table border='1' style='width:75%'>
  <tr>
  <th>customer name</th>
  <th>phone</th>
  <th>address</th>
  <th>Edit</th>
  </tr>";  
  $result = mysqli_query($conn,"SELECT * FROM `insert_cus`");  
  while($row = mysqli_fetch_array($result)){
  $id = $row['id'];
  ?>
  <tr>
  <th><?php echo $row["cus_name"];?></th>
  <th><?php echo $row["phone"];?></th>
  <th><?php echo $row["address"];?></th>
  <td><a href='customer_v.php?cus_id=<?php echo $id;?>'>Edit </a></td> 
  </tr>
<?php
 }
?>

<?php
require_once "footer.php";
?>