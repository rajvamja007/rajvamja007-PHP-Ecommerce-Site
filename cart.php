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

    <!-- Header -->
    <?php 
      include('header.php');
   
    if(!isset($_SESSION['user_id']))
          {
              $user_id="";
          }
          else
          {
            $user_id=$_SESSION['user_id'];
          }

        $cart_rows_number=0;  
        $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        $cart_rows_number = mysqli_num_rows($select_cart_number); 
        
    ?>

    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12" style="margin-top:60px;">
                    <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
                    <p class="mb-5 text-center">
                        <i class="text-dark font-weight-bold"><?php echo $cart_rows_number; ?></i> items in your cart
                    </p>


                    <?php
                            $sub_total=0;
    include('connection.php');
    if(isset($_SESSION['user_id'])){
        ?>
                    <table id="shoppingCart" class="table table-condensed table-responsive">
                        <thead>
                            <tr>
                                <th style="width:60%">Product</th>
                                <th style="width:12%">Price</th>
                                <th style="width:10%">Quantity</th>
                                <th style="width:16%"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

    $user_id=$_SESSION['user_id'];
    $sql = "SELECT * FROM `cart` WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row and print the product data
        while ($row = mysqli_fetch_assoc($result)) {
          $cart_id=$row['cart_id'];
          $p_id=$row["p_id"];
          $p_name=$row["p_name"];
          $p_img=$row["p_img"];
          $qty=$row['qty'];
          $p_price=$row["p_price"];
          $p_desc=$row["p_desc"];

          if(isset($_POST['update'])){
            $qty = $_POST['qty'];
            $cart_id=$_POST['cart_id'];
            mysqli_query($conn, "UPDATE `cart` SET `qty` = '$qty' WHERE `cart_id` = '$cart_id'") or die('query failed');
            echo "<script>alert('Quantity updated');";
            echo "window.location.href ='cart.php'</script>";
         }

         if(isset($_POST['remove'])){
            $cart_id=$_POST['cart_id'];
            mysqli_query($conn, "DELETE FROM `cart` WHERE `cart_id` = '$cart_id'") or die('query failed');
            echo "<script>alert('product remove form the cart');";
            echo "window.location.href ='cart.php'</script>";
            }
        
            ?>
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-md-3 text-left">
                                            <img src="assets\product-image\<?php echo $p_img;?>" alt=""
                                                class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                        </div>
                                        <div class="col-md-9 text-left mt-sm-2">
                                            <h4><?php echo $p_name; ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">₹<?php echo $p_price*$qty;?></td>
                                <?php $sub_total=$sub_total+($p_price*$qty); ?>
                                <td data-th="Quantity">
                                    <form action="" method="post">
                                        <input type="hidden" value="<?php echo $cart_id; ?>" name="cart_id">
                                        <input type="number" class="form-control form-control-lg text-center"
                                            value="<?php echo $qty; ?>" min="1" max="10" name="qty">
                                </td>
                                <td class="actions" data-th="">
                                    <div class="text-right">

                                        <button class="btn btn-white border-secondary bg-white btn-md mb-2"
                                            value="update" name="update">
                                            <i class="fas fa-sync"></i>
                                        </button>

                                        <button class="btn btn-white border-secondary bg-white btn-md mb-2"
                                            value="remove" name="remove">
                                            <i class="fas fa-trash"></i>
                                        </button>


                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <?php
                             }
    } else {
        echo "<script>window.location.href = 'nocart.php';</script>";
    }
}
?>

                        </tbody>
                    </table>
                    <div class="float-right text-right">
                        <h4>Subtotal:</h4>
                        <h1>₹<?php echo $sub_total; ?></h1>
                    </div>
                </div>
            </div>

            <form action="checkout.php" method="post">
            <div class="row mt-4 d-flex align-items-center">
                <div class="col-sm-6 order-md-2 text-right">
                    <a href="checkout.php" class="btn btn-dark mb-4 btn-lg pl-5 pr-5"><input type="submit" name="checkout" value="Checkout" style="border:none; background:none; color:white"></a>
                    <input type="hidden" name="sub_total" value="<?php echo $sub_total; ?>" >
                </div>
            </form>
                     

                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                    <a href="products.php" style="color:black">
                        <i class="fas fa-arrow-left mr-2" style="color:black"></i> Continue Shopping</a>
                </div>
            </div>
        </div>
    </section>

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