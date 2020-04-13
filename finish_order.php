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

</head>
<body>
<div class = 'main'>


<div class="icon-bar">
  
  <a href="main_store.php"><i class="fa fa-home"></i></a> 
  <a href="#"><i class="fa fa-search"></i></a> 
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
  <a style=" background-color: #e74c3c;" href="finish_order.php"  class="notification"><i class="fa fa-bell">
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
  </div>
<div class="block2">
  <form action='insert_into_cart.php' method = 'POST'>
    <div style="padding: 10px;">
      
    
  <table>
    <tr><th colspan="5">Order list</th></tr>

    <tr><td>Product name</td><td>Qty</td><td>Price</td><td>Status</td></tr>
    <?php
     $crt_code = $_COOKIE["user_id"];
     $sql_order = "SELECT tblproducts.prod_name, tblorders.qty, tblorders.price,tblorders.status FROM tblorders 
      INNER JOIN tblproducts ON tblproducts.product_id = tblorders.product_id 
      WHERE crt_code ='$crt_code'";
          $result1 = mysqli_query($conn, $sql_order);
          if (mysqli_num_rows($result1) > 0) {
              while($row = mysqli_fetch_assoc($result1)) {
              $product_name = $row['prod_name'];
              $qty = $row['qty'];
              $price = $row['price'];
              $status = $row['status'];
        
        if($status == 'Ongoing'){

          echo "<tr>
                <td>".$product_name."</td>
                <td>".$qty."</td>
                <td>PHP ".$price."</td>

                <td style = 'font-weight:bold;color:#ffeaa7'>".$status."</td>
               
               
                </tr>";
              }elseif ($status == 'Recieved') {
               echo "<tr>
                <td>".$product_name."</td>
                <td>".$qty."</td>
                <td>PHP ".$price."</td>

                <td style = 'font-weight:bold;color:#00b894'>".$status."</td>
               
                </tr>";

              }elseif ($status == "Canceled") {
              echo "<tr>
                <td>".$product_name."</td>
                <td>".$qty."</td>
                <td>PHP ".$price."</td>

                <td style = 'font-weight:bold;color:#d63031'>".$status."</td>
               
                </tr>";
              }
  
            
        }
      }
    ?>

  </table>



    </div>
</form>
</div>
</div>
</div>

</body>
</html>