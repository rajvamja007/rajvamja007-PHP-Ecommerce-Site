<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="assets/css/track-order.css">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

</head> 
<body>
 
<?php 
include "connection.php";
session_start();
$user_id=$_SESSION['user_id'];

$sql = "SELECT * FROM `orders` WHERE `user_id`=$user_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   
    $row = mysqli_fetch_assoc($result); {
        $order_id=$row['order_id'];
        $name=$row['name'];
        $status=$row['status'];
        $address1=$row['address1'];
        $address2=$row['address2'];
        $zip=$row['zip'];
        $payment=$row['payment'];
        $total=$row['total'];
        ?>

<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4 mt-3">
       <div class="first d-flex justify-content-between align-items-center mb-3">
         <div class="info">
             <span class="d-block name">Thank you, <?php echo $name; ?></span><br/>
             <span class="order">Order -<?php echo $order_id; ?></span>
             
         </div>
       
          <img src="https://i.imgur.com/NiAVkEw.png" width="50"/>

       </div>
           <div class="detail">
       <span class="d-block summery"><?php echo $status; ?></span>
           </div>
       <hr>
       <div class="text">
     <span class="d-block new mb-1" style="text-transform: capitalize;"><?php echo $name; ?></span>
      </div>
     <span class="d-block address mb-3" style="text-transform: capitalize;"><?php echo $address1." ". $address2." ".$zip; ?></span>
     <h4>Amount : ₹<?php echo $total ?></h4>
     <hr>
       <div class="money">    
         <span class="ml-2"><?php echo $payment; ?></span>
            </div><br/>
            <a href="index.php" style="font-size: 15px; margin-top: 50px; color:black;"><span style="text-decoration:underline;">Home</span></a>
            <p style="font-size:14px;">Note : once the previous orders are shipped than<br> you can allows to track recent orders.</p>
     </div>
 </div> 

 <?php }
} else {
        echo "No data found.";
    }
    mysqli_free_result($result);
    mysqli_close($conn);
  ?>
 </body>  
 </html>