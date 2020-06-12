<?php
include 'config.php';
$cookie_name="user_id";
$cookie_value = rand(100000,900000);
if(isset($_COOKIE[$cookie_name])){
	header("location:slct_city.php");
	}else{
		
	setcookie($cookie_name,$cookie_value, time() + (86400 * 30), "/");
	header("location:slct_city.php");
	}




?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class = 'main'>
	<div class = 'header'>
		<table><tr><th>CATCHIECART</th></tr></table>
	</div>

	<div class = 'block1'></div>
	<div class = 'block2'>
		<div class = 'slct_city_body'>
			<form action="index.php" method="POST">
				<input type = "submit" name = "submit" value="Accept">
			</form>
		</div>
	</div>
</div>
</body>
</html>n