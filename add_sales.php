<?php 
  require_once "header.php";
  include "conn.php";
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
		<form action="insert.php" method="POST" class="login-email">
			<p class="" style="font-size: 2rem; font-weight: 10000;"> Sales</p>
			<div class="input-group">
                <lable>Customer Name : </label>
                <select name="username" id="username" class="form-control-label">
                                   <option value="">Select </option>
                                   <?php
                                        $qry = mysqli_query($conn,"SELECT * FROM `insert_cus`");
                                             while ($row = mysqli_fetch_assoc($qry)) { 
                                                ?>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['cus_name'];?></option>
                                                <?php
                                            }
                                                ?>
						
                   <lable>date : </label>
				<input type="date" placeholder="date" name="date"required>
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
                    for($i=0;$i<=5;$i++){
                    ?>
                    <tr>
                        <td>
                            <select name="pro_id[]" id="pro_id_<?php echo $i;?>" onchange="get_price(<?php echo $i;?>)">                            
                                <option value="">Select Product</option>
                                <?php
                                //seelct id, pro name, pro price
                                $result = mysqli_query($conn,"SELECT `id`, `proname`, `proprice` FROM `insert_pro`");
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?php echo $row['id'];?>" data_pro="<?php echo $row['proprice'];?>"><?php echo $row['proname'];?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </td>
                        <td><input type="text" id="price_<?php echo $i;?>" placeholder="Price" name="price[]"  disabled=""></td>
                        <td><input type="number" id="qty_<?php echo $i;?>" placeholder="Qty" name="qty[]"  onchange="calc(<?php echo $i;?>)"></td>
                        <td><input type="text" id="tot_<?php echo $i;?>" placeholder="Total" name="protot[]"  ></td>
                    </tr>
                    <?php 
                    }
                    
                    ?>
                </table>                
				
			</div>            			                
                <h3>Total:<p id="total"></p></h3>
                <input type="hidden" name="tot_value" id="tot_value"/>
                <input type="submit" name="add_sales" value="Submit">
			
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
