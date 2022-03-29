<?php 
require_once "header.php";
include 'conn.php';
?>


<?php
  echo '<b>Customer Table</b>';
  echo "<table border='1' style='width:75%'>
  <tr>
  <th>customer name</th>
  <th>phone</th>
  <th>address</th>
  <th>Edit</th>
  </tr>";
 $cus_id = $_GET['cus_id'];  
 $result = mysqli_query($conn,"SELECT * FROM `insert_cus` WHERE  id = '$cus_id'");  
  while($row = mysqli_fetch_array($result)){
       $id = $row['id'];
   ?>
   <tr>
   <form action="update.php" method="POST">
   <input type="hidden"  name="cus_id" value="<?php echo $cus_id;?>"/>
  <th><input type="text" name="cus_name" value="<?php echo $row["cus_name"];?>"><br><br></th>
  <th><input type="text" name="phone" value="<?php echo $row["phone"];?>"><br><br></th>
  <th><input type="text" name="address" value="<?php echo $row["address"];?>"><br><br></th>
  <td> <input type="submit" name="up_update" value="Update"></td>
   </tr>
<?php
 }
?>
<?php
require_once "footer.php";
?>