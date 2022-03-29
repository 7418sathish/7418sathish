<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INVENTORY</title>
</head>
<body>
     <?php echo "<h1>Welcome to inventory " . $_SESSION['username'] . "</h1>"; ?>
</body>
</html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- CSS only -->

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>

<div class="navbar">
  <a href="welcome.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">products 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add_product.php">add</a>
      <td><a href='view_products.php'>View </a></td>   
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">sales 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add_sales.php">add</a>
      <td><a href='view_sales.php'>View </a></td>  
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Customer 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add_customer.php">add</a>
      <td><a href='view_customer.php'>View </a></td>  
    </div>
  </div> 
  <a href="logout.php">logout</a>
</div>