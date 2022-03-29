<?php
// error_reporting(0);
include "conn.php";
if(isset($_POST['up_sales'])){
    
    $id =$_POST['sale_id']; 
    $date = $_POST['date'];
    $cus_id = $_POST['username'];
    $total = $_POST['tot_value'];

    //update here
    $sql = "UPDATE `sales_header` SET `date`='$date',`cus_id`='$cus_id',`total`='$total' WHERE id = '$id'";
    $exec = mysqli_query($conn, $sql);    

    $pro_id = $_POST['pro_id'];    
    $i = 0;
    //delete query for the sale_id
    foreach($pro_id as $val){
        //update query for other table
        $qty = $_POST['qty'][$i];
        $price = $_POST['protot'][$i]; 
        if($val == ""){            
        }
        else{                           

            $qry =mysqli_query($conn,"UPDATE `sales_detail` SET `pro_id`='$val',`qty`='$qty',`price`='$price' WHERE sale_id = '$id'");  
        }
        $i++;
    }
    if ($exec == TRUE) {
        echo "<script>alert('updated Sucessfully');window.location='add_sales.php';</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if(isset($_POST['up_update'])){ 
    $id =$_POST['cus_id']; 
    $cus_name = $_POST['cus_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
$sql = "UPDATE `insert_cus` SET `cus_name`='$cus_name',`phone`='$phone',`address`='$address' WHERE id ='$id'";
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('updated Sucessfully');window.location='add_customer.php';</script>";
} else {
  echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>