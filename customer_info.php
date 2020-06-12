<?php 
	include 'config.php';
	session_start();
       $crt_code = $_COOKIE["user_id"];
          $lname = "";
             $fname = "";
              $contact = "";
               $zipcode = "";
                $city = "";
                 $houseno = "";
                  $province = "";




     $sql = "SELECT * FROM tblcustomer WHERE crt_code = '$crt_code'";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
            
      // header('location:insert_order.php');
            $lname = $row['lname'];
             $fname = $row['fname'];
              $contact = $row['contact'];
               $zipcode = $row['zipcode'];
                $city = $row['city'];
                 $houseno = $row['houseno'];
                  $province = $row['province'];
              }
            }
          
 
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

table, td, th {  

   text-align: left;
  }

  table {
   border-collapse: collapse;
   width: 100%;
   font-family: "Segoe UI";
  }

  th, td {
    padding: 15px;
  }


.label {
  font-size: 12px;
  font-family: "Segoe UI"
  color:#34495e;
}
input[type=text], select {
  width: 100%;
  display: inline-block;
  border: none;
  color: #2d3436;
  border-bottom: 1px solid #ccc;
  background-color: transparent;
  font-size: 18px;
  font-family: "Segoe UI";


}

input[type=submit] {
  width: 100%;
  text-decoration: none;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.reg_frm {
  border-radius: 5px;
  background-color: #f2f2f2;
  margin-top: 20%;
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
  <a  class="active" href="#"><i class="fa fa-user"></i></a>
  
 <a href="finish_order.php"><i class="fa fa-bell"></i></a>
</div>

    <div class = 'header'>
   <img width = "50%" src="image/logo/logo.png">
   
  </div>

<div class="reg_frm">
  <form action = "insert_customer_info.php" method = "POST">
    <table>
       <tr>
          <th colspan="2">Customer Info</th>
    </tr>
 	 <tr>
   		 <td><label class="label">Lastname</label>
   		 <input type = 'text' name = "lname" value = <?php echo "'" . $lname . "'" ?> required>
      </td>
 
   		 <td><label class="label">Firstname</label>
   		 <input type = 'text' name = "fname" value = <?php echo "'" . $fname . "'" ?> required>
      </td>
 	 </tr>

	<tr>
   		 <td colspan="2"><label class="label">Houseno.</label>
   		 <input type = 'text' name=  "houseno" value = <?php echo "'" . $houseno . "'" ?> required>
      </td>
 	 </tr>

 	 <tr>
   		 <td colspan="2"><label class="label">Phone number</label>
   		 <input type = 'text' name = "strtno" value = <?php echo "'" . $contact . "'" ?> required>
      </td>
 	 </tr>	 

	<tr>
   		 <td><label class="label">City</label>
   		 <input type = 'text' name = "city" value = <?php echo "'" . $city . "'" ?> required>
      </td>
 	
   		 <td><lable class="label">Province</label>
   		 <input type = 'text' name = "province" value = <?php echo "'" . $province . "'" ?> required>
      </td>
 	 </tr>

 	 <tr>
       <td><lable class="label">Country</lable>
       <input type = 'text' name = "zipcode" value = "Philippines" required>
      </td>
   		 <td><lable class="label">zipcode</lable>
   		 <input type = 'text' name = "zipcode" value = <?php echo "'" . $zipcode . "'" ?> required>
      </td>
 	 </tr>
 	 <tr>
 
 	 	<td colspan="2">
 	 		<input style="width: 100%; background-color:#c0392b;" class = "button" type="submit" name = "submit" value = "Submit">
 	 	</td>
 	 </tr>
	</table>
</form>
</div>
</div>
</body>
</html>