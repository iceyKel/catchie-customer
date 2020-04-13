<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style_2.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <style>

.buttoninc {

  border: none;
  background-color:transparent;
  color: #2c3e50;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  font-weight: bold;
}

  table,tr, th {  
   border: 1px solid #ddd;
   text-align: left;
  }

  table {
   border-collapse: collapse;
   width: 100%;
   font-family: "Segoe UI";
   margin-bottom: 20%;
  }



  th, td {
    padding: 10px;
  }
  </style>


  <script>
function clickCounterplus(crt_id) {
      

    var value = parseInt(document.getElementById(crt_id).value, 10);
    value = isNaN(value) ? 0 : value;
    value++
      
   document.getElementById(crt_id).value = value;
 
}

function clickCounterminus(crt_id) {

    var value = parseInt(document.getElementById(crt_id).value, 10);
      value = isNaN(value) ? 0 : value;
    if(value <= 1 ){

      }else{
  
        value--
    }
    
      
   document.getElementById(crt_id).value = value;
 

}
</script>
</head>
<body>
<div class = 'main'>

<div class="icon-bar">
  <a href="main_store.php"><i class="fa fa-home"></i></a> 
  <a href="search_item.php"><i class="fa fa-search"></i></a> 
  <a style=" background-color: #e74c3c;" href="checkout.php" class="notification"><i class="fa fa-shopping-cart"><span class="badge">
    
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
  
 <a href="finish_order.php" class="notification"><i class="fa fa-bell">  <span class="badge">
    
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

  </div>
  <div class = 'block2'>
     <form action = 'customer_info.php' method = "POST">

    <table>
 <tr>
     <th colspan="4">My Cart</th>
     
  </tr>
  <?php
  $crt_code = $_COOKIE["user_id"];   
    $sql = "SELECT tblcart.cart_id,tblproducts.prod_name, tblcart.qty, tblcart.price, tblproducts.pic FROM tblcart INNER JOIN tblproducts ON tblproducts.product_id = tblcart.product_id WHERE crt_code ='$crt_code' ";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              $pic = $row['pic'];
              $product_name = $row['prod_name'];
              $crt_id = $row['cart_id'];
              $qty = $row['qty'];
              $price = $row['price'];
  
          echo "<tr>
                <td width='100px';>
                <image style='border: 1px solid #ddd;' width = '100px' src = 'image/". $pic ."''></td>
                <td><label style = 'color:#2c3e50;'>".$product_name."</label><br><label style = color:#c0392b;font-weight:bold;'>PHP ".$price."</label></td>
                <td width='25%'>

                <div  style = 'text-align:center;'>
                <div><button class = 'buttoninc' onclick='clickCounterplus(this.value)' type='button' value=".$crt_id.">+</button></div>
                <input type = 'number' style = 'border: 1px solid #ddd; width:100%;padding:5px;border-radius:10%;font-size=12px;color:#c0392b;font-weight:bold;text-align:center;' id='".$crt_id."' value = '".$qty."'>
                <div><button class = 'buttoninc' onclick='clickCounterminus(this.value)' type='button' value=".$crt_id.">-</button>
                </div>
                </div>
                </td>
                <td>
                  <a href='#''>
                  <i class='fa fa-trash'></i></a></td>
                </tr>

                ";
            
        }
      }
    ?>
<tr>
      <td></td>
      
      <td></td>
      <td>
     
      </td>
  
    
</tr>
<tr>
<td colspan="4">

     <?php
           $sql = "SELECT sum(price) FROM tblcart WHERE crt_code = '$crt_code'";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              $price = $row['sum(price)'];  

              if($price == 0){
                echo "<div style='text-align:center;'>Your Cart is empty.</div>";
              }else{
                echo "<input class='button' type='submit' name='submit' value='Check-Out | PHP ".$price."'>";  
              }
              
            
            }
          }
        ?>

</td>
</tr>

</table>

  
  </form>

  </div>
</div>



 


</body>
</html>


		


