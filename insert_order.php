<?php

include 'config.php';
session_start();

$city_id = $_COOKIE['city_id'];
$crt_code = $_COOKIE["user_id"];
$store_id = $_COOKIE['store_id'];


$sql = "INSERT INTO tblorders (customer_id,product_id,driver_id,qty,status,remarks,store_id,city_id,price,date_now,crt_code) 
		SELECT customer_id,product_id,'',qty,'Not Yet Delivered','','$store_id','$city_id',price,now(),'$crt_code'
		FROM tblcart WHERE crt_code	= '$crt_code';
			";
			
if(mysqli_query($conn, $sql)){


			$sql_remove_cart = "DELETE FROM tblcart WHERE crt_code = '$crt_code'";
			mysqli_query($conn, $sql_remove_cart);

    		header('location:finish_order.php');

}

?>