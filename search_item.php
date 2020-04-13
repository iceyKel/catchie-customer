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

<script>
	
	function showProd(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","srch_scpt.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

</head>
<body>
<div class = 'main'>

<div class="icon-bar">
	
  <a href="main_store.php"><i class="fa fa-home"></i></a> 
  <a class="active" href="#"><i class="fa fa-search"></i></a> 
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
 </i></a>
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
						<p class="p_clr">Search</p>
					</th>
				</tr>
				
				<tr>
					<td>
						<form>
							<input style="padding: 10px;border: 1px solid #ccc;border-radius: 10px;" type = 'text' onkeypress ="showProd(this.value)" name ='search' placeholder="Search">
						</form>
					</td>
				</tr>
				<tr>
					<td>
					   <div  id="txtHint" class="modal-body">
           
        </div>
				
					</td>	
	</tr>
		</table>
	</div>
	
</div>
</body>
</html>

