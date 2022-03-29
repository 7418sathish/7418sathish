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
    input {
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
			<p class="" style="font-size: 2rem; font-weight: 10000;">Add products</p>
			<div class="input-group">
                <lable>Poduct Name : </label>
				<input type="input" placeholder="Product Name" name="proname" required>
			</div>
			<div class="input-group">
                <lable>Poduct Price : </label>
				<input type="input" placeholder="Product Price" name="proprice"required>
			</div>
            <div class="input-group">
                <lable>Poduct Stock : </label>
				<input type="input" placeholder="stock" name="stock"  required>
			</div>
            <div class="input-group">
                <lable>Poduct QTTY : </label>
				<input type="input" placeholder="quantity" name="quty" required>
			</div>
            <div class="input-group">
                <lable>Poduct Unit : </label>
                <select name="unit">
                    <option  value="">Select</option>
                    <option  value="ml">ML</option>
                    <option  value="kg">Kg</option>
                    <option  value="gm">Gm</option>
                    <option  value="ltr">Ltr</option>
                </select>
            </div>
			<div class="input-group">
                <input type="submit" name="add_product" value="Submit">
			</div>
	
			
		</form>
	</div>



<!-- content ends here -->
<?php
  require_once "footer.php";
?>
