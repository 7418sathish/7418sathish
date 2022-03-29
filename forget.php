<?php 

include 'conn.php';


session_start();
if (isset($_SESSION['password'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$pass= md5($_POST['password']);
	$cpass = md5($_POST['cpassword']);

	if ($pass != $cpass) {
		$sql = "SELECT * FROM `users` WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = mysqli_query($conn,"UPDATE  users set `password`='" . ($pass) ."' where id =$id");
			$result = mysqli_query($conn, $sql);
            echo '<p>Congratulations! Your password has been updated successfully.</p>';
        }else{
        echo "<p>Something goes wrong. Please try again</p>";
        }
        }
        }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Forget password Form </title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">forget</p>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">forget</button>
			</div>
			<p class="login-forget-password">Have an account? <a href="index.php">forget</a>.</p>
		</form>
	</div>
</body>
</html>