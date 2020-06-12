<?php
include 'config.php';
session_start();

if(isset($_POST["addtocart"])){

$product_id = $_POST['custId'];
$date_order = 'now';
$status = 'status';
$remarks = 'remarks';

$qty = $_POST['qty'];

echo $qty;
$price = $_POST['ttlprice'];



$city_id = $_COOKIE["city_id"];
$store_id =$_COOKIE["store_id"];
$crt_code = $_COOKIE["user_id"];
$sql = "INSERT INTO tblcart (product_id,customer_id,store_id,city_id, date_order, status, remarks, qty, price,crt_code)
			SELECT product_id,'0','$store_id','$city_id', now(), '', '','$qty','$price','$crt_code'
			FROM tblproducts WHERE product_id = '$product_id'";			
   if(mysqli_query($conn, $sql)){echo "cart added";header("location:checkout.php");}
	}

	?>
