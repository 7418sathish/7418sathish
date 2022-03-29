<?php 
require_once "header.php";
include 'conn.php';
?>
<!-- content comes -->


<?php
  echo '<b>Sales Table</b>';
  echo "<table border='1' style='width:75%'>
  <tr>
  <th>Date</th>
  <th>Customer ID</th>
  <th>Total</th>
  <th>View</th>

  </tr>";  
  $result = mysqli_query($conn,"SELECT * FROM `sales_header`");  
  while($row = mysqli_fetch_array($result)){
       $id = $row['id'];
   ?>
   <tr>
   <th><?php echo $row["date"];?></th>
   <th><?php echo $row["cus_id"];?></th>
   <th><?php echo $row["total"];?></th>
   <td><a href='sales_v.php?sales_id=<?php echo $id;?>'>View </a></td> 
   </tr>
<?php
 }
?>
<?php
require_once "footer.php";
?>