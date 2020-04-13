<?php 
	include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style_2.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>



.buttoninc {

  border: none;
  background-color:transparent;
  color: #ecf0f1;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  cursor: pointer;
  font-weight: bold;
}
  table,tr,td, th {  
   border: 1px solid #ddd;
   text-align: center;
  }

  table {
   border-collapse: collapse;
   width: 100%;
   font-family: "Segoe UI";
  }

   th, td {
    padding: 10px;
  }
</style>

<script>
function clickCounterplus() {
      

    var value = parseInt(document.getElementById("quant").value, 10);
    value = isNaN(value) ? 0 : value;
    value++
    document.getElementById("quant").value = value;
    document.getElementById("ttlprice").innerHTML = "Total : PHP " + document.getElementById("price").value * value ;
    document.getElementById("totalprice").value = document.getElementById("price").value * value;
}

function clickCounterminus() {

    var value = parseInt(document.getElementById("quant").value, 10);
      value = isNaN(value) ? 0 : value;
    if(value <= 1 ){

      }else{
  
        value--
    }
    document.getElementById("quant").value = value;
    document.getElementById("ttlprice").innerHTML = "Total : PHP " + document.getElementById("price").value * value ;
   	document.getElementById("quant").value = value;
   	document.getElementById("totalprice").value = document.getElementById("price").value * value;
 

}
</script>

</head>
<body>
<div class = 'main'>
	<div class = 'header'>
		<img width = "50%" src="image/logo/logo.png">
    <div class="bck_page">
      <a style = 'color: #2c3e50;font-size: 100%;text-align: center;' href="main_store.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
   </div>
	</div>
<div class="block2">
	<form action='insert_into_cart.php' method = 'POST'>
		<div style="padding: 10px;">
			
		
	<table>
		<tr><th>PRODUCT INFO</th></tr>

<?php 
	$prod_id =  $_GET['custId'];
	$sql = "SELECT * FROM tblproducts   WHERE product_id = '$prod_id' ";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
    					while($row = mysqli_fetch_assoc($result)) {
    						$prod_id = $row["product_id"];
 					    	$prodimage = $row["pic"];
 					    	$prodprice = $row["price"];
 					    	$prodname = $row["prod_name"];    	
 					    	$proddescription = $row["description"];
 					    	
 					    	echo "<tr><td><img width='80%' src='image/".$prodimage."'></td></tr>
								  <tr><td style ='text-align:center;font-size:15px;font-family:verdana;color:#2f3542'>" . $prodname. "</td>
								  </tr>

								  <tr>
								  <td style ='text-align:center;font-size:20px;font-family:verdana;color:#ff6348' >Price : PHP " . $prodprice . "</td>

								  <input type='hidden' id='custId' name='custId' value='". $prod_id ."'>
								  </tr>
								  </tr>
								
								 ";	

 					    		}}
?>
	
  </table>



  	</div>

  	<div style="box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.2), 0 0px 5px 0 rgba(0, 0, 0, 0.19);position:fixed;bottom: 0px;background-color: #c0392b;width: 100%;color: white;">
	
<table>
	<tr>
		<td width="30%" rowspan="2">
			Qty : <input  style = 'width:100%;border:0px;background-color: transparent;font-size:18px;color:#ecf0f1;font-weight:bold;text-align:center;text-decoration: none;' type = 'number' name = 'qty' id='quant' value="1"></td>
		 
		<td><button class = 'buttoninc' onclick='clickCounterplus()' type='button'>+</button></td>
		<td rowspan="2">

			<div id ='ttlprice'>Total : PHP <?php echo $prodprice ?></div>
			<input type = 'hidden' id ='price' name ='price' value= <?php echo "'".$prodprice."'"; ?> >
			<input type = 'hidden' id ='totalprice' name ='ttlprice' value= <?php echo "'".$prodprice."'"; ?> >
			<input style="font-size: 25px;color:#ecf0f1;background-color: transparent;border: 0px;text-decoration: none;" type = 'submit' name='addtocart' value='Add to Cart'>
				
		</td>
	</tr>
	<tr>
		<td><button class = 'buttoninc' onclick='clickCounterminus()' type='button'>-</button>
		</td>		
	</tr>
</table>

  </div>
</form>
</div>
</div>
</div>

</body>
</html>