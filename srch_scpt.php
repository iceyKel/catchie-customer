<?php 

					include 'config.php';
					$store_id = $_COOKIE['store_id'];
					$q = $_GET['q'];
					echo "<i>Searching for ".$q."</i><br><br>";
					$sql = "SELECT * FROM tblproducts WHERE store_id = '$store_id' AND prod_name LIKE '$q%' ";
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
								  </div>";}}else{
								  	echo "<i>0 Result..</i>";
								  }
?>