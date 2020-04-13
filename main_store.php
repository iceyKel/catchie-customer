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
<link rel="stylesheet" href="css/style_2.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<style>
	table, td, th {  
 	 border: 1px solid #ddd;
 	 text-align: left;
	}

	table {
 	 border-collapse: collapse;
 	 width: 100%;
	}

	th, td {
	  padding: 5px;
	}
</style>
</head>
<body>
<div class = 'main'>

<div class="icon-bar">
	
  <a class="active" href="#"><i class="fa fa-home"></i></a> 
  <a href="search_item.php"><i class="fa fa-search"></i></a> 
  <a href="checkout.php" class="notification"><i class="fa fa-shopping-cart"><span class="badge">
  	
				<?php 

					$crt_code = $_COOKIE["user_id"];
					$sql = "SELECT count(*) FROM tblcart WHERE crt_code = '$crt_code' ";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
    					while($row = mysqli_fetch_assoc($result)) {
    						 $count= $row["count(*)"];
 					   
 					    	echo $count;	

 					    		}
		}
				?>

  </span></i>


  </a> 
  <a href="customer_info.php"><i class="fa fa-user"></i></a>
 <a href="finish_order.php"  class="notification"><i class="fa fa-bell">
 	<span class="badge">
  	
				<?php 

					$crt_code = $_COOKIE["user_id"];
					$sql = "SELECT count(*) FROM tblorders WHERE crt_code = '$crt_code' AND status = 'Ongoing'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
    					while($row = mysqli_fetch_assoc($result)) {
    						 $count= $row["count(*)"];
 					   
 					    	echo $count;	

 					    		}
		}
				?>
 </span></i></a>
</div>



	<div class = 'header'>
		<img width = "50%" src="image/logo/logo.png">
		<!--<div class="topnav">
 
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
	</div>-->
</div>






	<div class = 'block2'>
		

	

		<!--<div class = 'slct_box'>
			<div class="p_clr"><p>SELECT STORE</p></div>
			<div>Calamba Cabuyao </div>
		</div>-->

		
		
	
		<div class = 'slct_prod' align="center">
			<table>
				<tr >
					<th colspan='2'>
						<p class="p_clr">PRODUCTS</p>
					</th>
				</tr>
				<tr><td>
				<?php 
					$store_id = $_COOKIE['store_id'];
					$sql = "SELECT * FROM tblproducts WHERE store_id = '$store_id' ";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
    					while($row = mysqli_fetch_assoc($result)) {
    						$prod_id = $row["product_id"];
 					    	$prodimage = $row["pic"];
 					    	$prodprice = $row["price"];
 					    	$prodname = $row["prod_name"];
 					    	
 					    	echo "<div class = 'pic_prod'>
								  <div><img width='100%' src='image/".$prodimage."'></div>
								  <div style ='text-align:left;font-size:12px;font-family:verdana;color:#2f3542'>" . $prodname . "</div>
								  <div style ='text-align:left;font-size:15px;font-family:verdana;color:#ff6348' >Price: " . $prodprice . "</div>
								  <div>
								  	<form action='add_cart.php' method = 'GET'>
								  	 <input type='hidden' id='custId' name='custId' value='". $prod_id ."'>
								  	<input class = 'button' type = 'submit' name='addtocart' value='View'>
								  	</form>
								  </div>
								  </div>";}}
				?>
		</td>	
	</tr>
		</table>
	</div>
	
</div>
</body>
</html>