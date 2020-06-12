<?php
$servername = "den1.mysql1.gear.host";
$username = "catchiecartdb";
$password = "Gi1V162Hi7~~";
$dbase= "catchiecartdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbase);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
