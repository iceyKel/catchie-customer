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
	<img width = "35%" src="image/logo/logo.png">
	</div>

	<div class = 'block1'></div>
	<div class = 'block2'>
	<div class = 'slct_city_body'>
		<center>
		<table>	
			<tr>
				<th>
					SELECT STORE
				</th>
			</tr>
		
	
			<form action="main_store.php" method="POST">
				<?php 
				$city = $_POST['city'];
				$sql = "SELECT * FROM tblstore where city_id = '$city'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
    					while($row = mysqli_fetch_assoc($result)) {
    					$store_id = $row['store_id'];
    					$store_name = $row['store_name'];
    				echo "<input type='hidden' name='storeid'  value='".$store_id."'>";
					echo "<tr><td><input type='radio' name='storename'  value='".$store_name."' required>".$store_name."</tr></td>";

					$cookie_name="store_id";
					$cookie_value = $store_id;
					setcookie($cookie_name,$cookie_value, time() + (86400 * 30), "/");
					
							}
						}
				?>
				<tr><td><input class = "button" type="submit" name="submit" value="Shop now"> </tr></td> 
            </form>
		</table>
		<center>

		</div>
	</div>
</div>
</body>
</html>