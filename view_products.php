<?php 
require_once "header.php";
include 'conn.php';
?>
<!-- content comes -->


<?php
  echo '<b>Product Table</b>';
  echo "<table border='1' style='width:75%'>
  <tr>
  <th>product name</th>
  <th>product price</th>
  <th>stock</th>
  <th>quty</th>
  <th>unit</th>
  <th>view</th>

  </tr>";  
 $result = mysqli_query($conn,"SELECT * FROM `insert_pro`");  
 while($row = mysqli_fetch_array($result)){
  $id = $row['id'];
  ?>
  <tr>
  <th><?php echo $row["proname"];?></th>
  <th><?php echo $row["proprice"];?></th>
  <th><?php echo $row["stock"];?></th>
  <th><?php echo $row["quty"];?></th>
  <th><?php echo $row["unit"];?></th>
  <td><a href='product_v.php?pro_id=<?php echo $id;?>'>View </a></td> 
  </tr>
  <?php
 }
?>

<?php
require_once "footer.php";
?>