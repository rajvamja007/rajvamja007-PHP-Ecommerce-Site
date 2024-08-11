<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Astonish</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <style type="text/css">
    table, th, td {
      border: 2px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding-top: 10px;
      padding-bottom: 20px;
      padding-left: 30px;
      padding-right: 40px;
    }
    </style>
</head>
<body>
<!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->
    <div style="margin-top: -48px">
        <!-- Header -->
    <?php 
      include('header.php');
    ?>
    </div>
    <div class="container mt-5" style="padding-top:120px; padding-bottom:100px;">
                            <div class="d-flex justify-content-center row">
                                <div class="col-md-10">
                                    <div class="rounded">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="background-color: #212529; color:white;">Order #</th>
                                                        <th style="background-color: #212529; color:white;">Name</th>
                                                        <th style="background-color: #212529; color:white;">status</th>
                                                        <th style="background-color: #212529; color:white;">Address</th>
                                                        <th style="background-color: #212529; color:white;">Zip</th>
                                                        <th style="background-color: #212529; color:white;">Total</th>
                                                        <th style="background-color: #212529; color:white;">Payment Type</th>
                                                </thead>
                                                <tbody class="table-body">
                                                <?php 
                        include "connection.php";
                        $user_id=$_SESSION['user_id'];

                        $sql = "SELECT * FROM `orders` WHERE `user_id`=$user_id";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                        
                            while ($row = mysqli_fetch_assoc($result)) {
                                    $order_id=$row['order_id'];
                                    $name=$row['name'];
                                    $status=$row['status'];
                                    $address1=$row['address1'];
                                    $address2=$row['address2'];
                                    $zip=$row['zip'];
                                    $payment=$row['payment'];
                                    $total=$row['total'];
                                ?>
                                                    <tr class="cell-1">
                                                        <td><?php echo $order_id;?></td>
                                                        <td><?php echo $name;?></td>
                                                        <td><?php echo $status;?></td>
                                                        <td><?php echo $address1,',',$address2;?></td>
                                                        <td><?php echo $zip;?></td>
                                                        <td>₹<?php echo $total;?></td>
                                                        <td><?php echo $payment;?></td>
                                                    </tr>
                                                    <?php }
                        } else {
                                echo "No data found.";
                            }
                            mysqli_free_result($result);
                            mysqli_close($conn);
                        ?>     

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    <?php 
          include('footer.php');
       ?>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
</body>

</html>