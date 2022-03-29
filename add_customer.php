<?php 
  require_once "header.php";
?>
<style>
    .container{
        border:2px solid green;
        width:350px;
        padding:5%;
        margin-left:20%;
    }
    form {
        width : 100%;
    }
    input, textarea {
        width:100%;
        margin:5%
    }
    select{
        width:100%;  
        margin:5%;
    }

</style>
	<div class="container">
		<form action="insert.php" method="POST" class="login-email">
			<p class="" style="font-size: 2rem; font-weight: 10000;">Add Customer products</p>
			<div class="input-group">
                <lable>Customer Name : </label>
				<input type="input" placeholder="Product Name" name="cus_name" required>
			</div>
			<div class="input-group">
                <lable>Customer Phone : </label>
				<input type="input" placeholder="Product Price" name="phone"required>
			</div>
            <div class="input-group">
                <lable>Customer Address : </label>
				<textarea type="input" placeholder="Customer Address" name="address"  required></textarea>
			</div>
	
			<div class="input-group">
                <input type="submit" name="add_customer" value="Submit">
			</div>
	
			
		</form>
	</div>



<!-- content ends here -->
<?php
  require_once "footer.php";
?>
