<?php
include "conn.php";
if(isset($_POST['add_product'])){
$proname = $_POST['proname'];
$proprice = $_POST['proprice'];
$stock = $_POST['stock'];
$quty = $_POST['quty'];
@$unit = $_POST['unit'];
// Create connection
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `insert_pro`(`proname`, `proprice`, `stock`, `quty`, `unit`) VALUES ('$proname','$proprice','$stock','$quty','$unit')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Iserted Sucessfully'); window.location='add_product.php'</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}
}
if(isset($_POST['add_customer'])){    
$cus_name = $_POST['cus_name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
// Create connection
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `insert_cus`( `cus_name`, `phone`, `address`) VALUES ('$cus_name','$phone','$address')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Iserted Sucessfully'); window.location='add_customer.php'</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}


if(isset($_POST['add_sales'])){
    $cus_id = $_POST['username'];
    $date = $_POST['date'];
    $total = $_POST['tot_value'];

    //insert here    
    $exec = mysqli_query($conn, "INSERT INTO `sales_header`(`date`, `cus_id`, `total`) VALUES ('$date','$cus_id','$total')");
    $sale_id = mysqli_insert_id($conn);

    $pro_id = $_POST['pro_id'];    
    $i = 0;
    foreach($pro_id as $val){
        //insert query for other table
        $qty = $_POST['qty'][$i];
        $price = $_POST['protot'][$i]; 
        if($val == ""){            
        }
        else{
            $ssql = "INSERT INTO `sales_detail`(`sale_id`, `pro_id`, `qty`, `price`) VALUES ('$sale_id','$val','$qty','$price')";                  
            $sed = mysqli_query($conn, $ssql);
        }
        $i++;
    }

    if ($exec== TRUE) {
        echo "<script>alert('Iserted Sucessfully'); window.location='add_sales.php'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>