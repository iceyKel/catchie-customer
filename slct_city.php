<?php
include 'config.php';
session_start();


?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<style>
	table, td, th {  
 	 border: 1px solid #ddd;
 	 text-align: left;
	}

	table {
 	 border-collapse: collapse;
 	 width: 90%;

	}

	th, td {
	  padding: 15px;
	}
</style>
</head>
<body>
<div class = 'main'>
	<div class = 'header'>
		<img width = "50%" src="image/logo/logo.png">
	</div>

	<div class = 'block1'></div>
	<div class = 'block2'>
		<div class = 'slct_city_body'>
			<center>
			<table>			
			<tr>
				<th>
					SELECT CITY
				</th>
			</tr>
			<form action="slct_store.php" method="POST">
			<?php 

				$sql = "SELECT * FROM tblcity";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
    					while($row = mysqli_fetch_assoc($result)) {
    					$city_id = $row['city_id'];
    					$city_name = $row['city_name'];	
						echo "<tr><td><input type='radio' name='city'  value='".$city_id."' required>".$city_name."</tr></td>";
							
						$cookie_name="city_id";
						$cookie_value = $city_id;
						setcookie($cookie_name,$cookie_value, time() + (86400 * 30), "/");
					
							}
						}
				?>
	
				<tr><td><input class = "button" type="submit" name="submit" value="Next"></td></tr>
            </form>
		</table>
	</center>
		</div>
	</div>
</div>
</body>
</html>