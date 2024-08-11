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
   ?>

    <!-- Page Content -->

    <div class="container">
        <div class="row">
        </div>
    </div>

    <?php 

          if(!isset($_SESSION['user_id']))
          {
              $user_id="";
          }
          else
          {
            $user_id=$_SESSION['user_id'];
          }

          
          $wishlist_rows_number=0;  
          $select_wish_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
          $wishlist_rows_number = mysqli_num_rows($select_wish_number); 
    ?>
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12" style="margin-top:60px;">
                    <h3 class="display-5 mb-2 text-center">Wishlist</h3>
                    <p class="mb-5 text-center">
                        <i class="text-dark font-weight-bold"><?php echo $wishlist_rows_number; ?></i> items in your Wishlist
                    </p>


                    <?php
    include('connection.php');
    if(isset($_SESSION['user_id'])){
        ?>
                    <table id="shoppingCart" class="table table-condensed table-responsive" style="">
                        <thead>
                            <tr>
                                <th style="width:60%">Product</th>
                                <th style="width:12%">Price</th>
                                <th style="width:16%"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

    $user_id=$_SESSION['user_id'];
    $sql = "SELECT * FROM `wishlist` WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row and print the product data
        while ($row = mysqli_fetch_assoc($result)) {
          $wish_id=$row['wish_id'];
          $p_id=$row["p_id"];
          $p_name=$row["p_name"];
          $p_img=$row["p_img"];
          $qty=$row['qty'];
          $p_price=$row["p_price"];
          $p_desc=$row["p_desc"];

         
          if(isset($_POST['cart'])){
            $sql = "SELECT * FROM products where p_id='$p_id';";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
        
            while ($row = mysqli_fetch_assoc($result)) {
                $user_id=$_SESSION['user_id'];
                $p_id=$row["p_id"];
                $p_name=$row["p_name"];
                $p_img=$row["p_img"];
                $qty=$row['qty'];
                $p_price=$row["p_price"];
                $p_desc=$row["p_desc"];
       
                $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE p_id = '$p_id' AND user_id = '$user_id'") or die('query failed');
            }
        }
        if(mysqli_num_rows($check_cart_numbers) > 0){
                mysqli_query($conn, "INSERT INTO `cart`(user_id, p_id, p_name, p_img, qty, p_price, p_desc) VALUES
                ('$user_id', '$p_id', '$p_name', '$p_img', '$qty', '$p_price' ,' $p_desc')") or die('query failed');
                echo '<script>alert("product added to cart");';
                echo "window.location.href ='wishlist.php'</script>";
            }
     }

         if(isset($_POST['remove'])){
            $wish_id=$_POST['wish_id'];
            mysqli_query($conn, "DELETE FROM `wishlist` WHERE `wish_id` = '$wish_id'") or die('query failed');
            echo "<script>alert('product remove form the wishlist');";
            echo "window.location.href ='wishlist.php'</script>";
            }

            ?>
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-md-3 text-left">
                                        <a href="product-details.php?p_id=<?php echo $p_id; ?>"><img src="assets\product-image\<?php echo $p_img;?>" alt=""
                                                class="img-fluid d-none d-md-block rounded mb-2 shadow "></a>
                                        </div>
                                        <div class="col-md-9 text-left mt-sm-2">
                                        <a href="product-details.php?p_id=<?php echo $p_id; ?>"><h4 style="color:black;"><?php echo $p_name; ?></h4></a>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">₹<?php echo $p_price; ?></td>

                                <td class="actions" data-th="">
                                    <div class="text-right">
                                        <form action="" method="post">
                                        <input type="hidden" value="<?php echo $wish_id; ?>" name="wish_id">
                                            <!-- <button class="btn btn-white border-secondary bg-white btn-md mb-2"
                                                name="cart" value="cart">
                                                <i class="fa fa-shopping-cart"></i>
                                            </button> -->
                                            <button class="btn btn-white border-secondary bg-white btn-md mb-2"
                                                name="remove" value="remove">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>


                            <?php }
    } else {
        echo "<script>window.location.href = 'nowishlist.php';</script>";
    }
    mysqli_free_result($result);
    mysqli_close($conn);  
}
?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left" style="margin-left: 450px;">
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