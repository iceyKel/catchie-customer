<?php
include 'config.php';
session_start();

$lname	= $_POST["lname"];
$fname	= $_POST["fname"];
$zipcode = $_POST["zipcode"];
$houseno = $_POST["houseno"];
$city = $_POST["city"];
$province	= $_POST["province"];
$streetno	= $_POST["strtno"];
$crt_code = $_COOKIE["user_id"];

$sql_delete = "DELETE FROM tblcustomer WHERE crt_code = '$crt_code'";
	mysqli_query($conn, $sql_delete);

$sql = "INSERT INTO tblcustomer (lname,fname,zipcode,houseno,city,province,contact,crt_code) VALUES ('$lname','$fname','$zipcode','$houseno','$city','$province','$streetno','$crt_code')";
			
if(mysqli_query($conn, $sql)){
    		header('location:insert_order.php');

}



?>