<?php 
  require_once "header.php";
  include "conn.php";
  error_reporting(0);
  //sel from header 
  $sales_id = $_GET['sales_id'];
  $sql_sales = "select * from sales_header where id = $sales_id";
  $result_sales = mysqli_query($conn,$sql_sales);
  $row_sales = mysqli_fetch_array($result_sales);

?>
<style>
    .container{
        border:2px solid green;
        width:70%;
        padding:5%;        
    }
    form {
        width : 100%;
    }
    input {
        width:25%;
        margin:2%
    }
    select{
        width:50%;  
        margin:2%;
    }

</style>
	<div class="container">
		<form action="update.php" method="POST" class="login-email">
      <input type="hidden"  name="sale_id" value="<?php echo $sales_id;?>"/>
			<p class="" style="font-size: 2rem; font-weight: 10000;"> Sales</p>
			<div class="input-group">
                <lable>Customer Name : </label>
                <select name="username" id="username" class="form-control-label">
                                   <option value="">Select </option>
                                   <?php
                                        $qry = mysqli_query($conn,"SELECT * FROM `insert_cus`");
                                             while ($row = mysqli_fetch_assoc($qry)) { 
                                               if($row['id'] == $row_sales['cus_id']){
                                                 $sel = "selected";
                                               }
                                               else{
                                                 $sel = "";
                                               }
                                                ?>
                                                <option value="<?php echo $row['id'];?>" <?php echo $sel;?>><?php echo $row['cus_name'];?></option>
                                                <?php
                                              }
                                                ?>
                                               </select> 	
      <lable>date : </label>
				<input type="date" placeholder="date" name="date"required="" value="<?php echo $row_sales['date'];?>">
			</div>            
            <div class="input-group">                
                <table style="width:100%">
                    <thead><b>Product Details</b></br></thead>
                    <tr>
                        <td>Product Name</td>
                        <td>Product Price</td>
                        <td>Qy</td>
                        <td>Total</td>                        
                    </tr>
                    <?php 
                    //
                    $dql_sql = "select * from sales_detail where sale_id = $sales_id";
                    $result_dtl = mysqli_query($conn,$dql_sql);                    
                    for($i=0;$i<=5;$i++){
                    $row_dtl = mysqli_fetch_array($result_dtl);
                    ?>
                    <tr>
                        <td>
                            <select name="pro_id[]" id="pro_id_<?php echo $i;?>" onchange="get_price(<?php echo $i;?>)">                            
                                <option value="">Select Product</option>
                                <?php
                                //seelct id, pro name, pro price                                
                                $pro_id = $row_dtl['pro_id'];
                                if($pro_id != ""){
                                  $where = "where id = $pro_id";
                                }
                                
                                else{
                                  $where = "";
                                }
                                $result = mysqli_query($conn,"SELECT `id`, `proname`, `proprice` FROM `insert_pro` $where");
                                while($row = mysqli_fetch_array($result)){   
                                  $pro_price =   $row['proprice'];                             
                                    if($row['id'] == $pro_id){
                                      $sel = "selected";
                                    }
                                    else{
                                      $sel = "";
                                    }
                                    ?>
                                    <option value="<?php echo $row['id'];?>" <?php echo $sel;?> data_pro="<?php echo $row['proprice'];?>"><?php echo $row['proname'];?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </td>
                        <td><input type="text" id="price_<?php echo $i;?>" placeholder="Price" name="price[]" value="<?php echo $pro_price;?>"   disabled=""></td>
                        <td><input type="number" id="qty_<?php echo $i;?>" placeholder="Qty" name="qty[]" value="<?php echo $row_dtl['qty'];?>"  onchange="calc(<?php echo $i;?>)"></td>
                        <td><input type="text" id="tot_<?php echo $i;?>" placeholder="Total" name="protot[]"  value="<?php echo $row_dtl['price'];?>"></td>
                    </tr>
                    <?php 
                    }                  
                    ?>
                </table>                
				
			</div>            			                
                <h3>Total:<p id="total"><?php echo $row_sales['total'];?></p></h3>
                <input type="hidden" name="tot_value" id="tot_value" value="<?php echo $row_sales['total'];?>"/>
                <input type="submit" name="up_sales" value="Submit">
			
		</form>
	</div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    const sum_total = [];
    
    function get_price(id){
        var price = $('#pro_id_'+id).find('option:selected').attr('data_pro');
        $("#price_"+id).val(price);
    }

    function calc(id){
        var price = $("#price_"+id).val();
        var qty = $("#qty_"+id).val();
        var total = price * qty;
        $("#tot_"+id).val(total);
        sum_total.push(total);
        var sum_tot = sum_total.reduce(function(a, b){
            return a + b;
        }, 0);
        $("#total").html(sum_tot);  
        $("#tot_value").val(sum_tot);
    }
</script>
<!-- content ends here -->
<?php
  require_once "footer.php";
?>
