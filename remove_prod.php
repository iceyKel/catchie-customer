<?php
include 'config.php';

$streetno	= $_POST["strtno"];
$crt_code = $_COOKIE["user_id"];
$sql = "DELETE from tblcart where cart_id = ";
			
if(mysqli_query($conn, $sql)){
    		header('location:insert_order.php');

}



?>