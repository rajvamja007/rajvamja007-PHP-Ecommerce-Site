<?php
  include 'connection.php';
 
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

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
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   -->
    <!-- ***** Preloader End ***** -->
    
    <!-- Header -->
    <?php 
      include('header.php');
   ?>

    <!-- Page Content -->
   
      <div class="container">
        <div class="row">
        </div>
      </div>> 

    <div class="products">
      <div class="container">
        <div class="row">

        <?php
    include('connection.php');
    $p_id=$_GET['p_id'];
    $sql = "SELECT * FROM products where p_id=$p_id;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row and print the product data
        while ($row = mysqli_fetch_assoc($result)) {
            $p_id=$row["p_id"];
            $p_name=$row["p_name"];
            $p_img=$row["p_img"];
            $p_mrp=$row["p_mrp"];
            $p_price=$row["p_price"];
            $p_desc=$row["p_desc"];
            $c_id=$row["c_id"];
            ?>

          <div class="col-md-4 col-xs-12">
            <div>
              <img src="assets\product-image\<?php echo $p_img;?>" alt="" class="img-fluid wc-image">
            </div>
            <br>
          </div>

          <div class="col-md-8 col-xs-12">
            <form action="#" method="post" class="form">
              <h2><?php echo $p_name ?></h2><br/>

              <div class="star" style="color:#FFD700;">
	                        <span class="fa fa-star checked"></span>
	                        <span class="fa fa-star checked"></span>
	                        <span class="fa fa-star checked"></span>
	                        <span class="fa fa-star checked"></span>
	                        <span class="fa fa-star checked"></span>
                          <span style="color:black; font-size:13px;">Reviews</span>
	            </div>
              <br>

              <p class="lead" style="font-weight:500">
              <?php echo $p_desc; ?>
              </p> <br>           

              <p>Fragrance free • Non-comedogenic</p>
              <br>
              <p class="lead">
                <small><del>₹<?php echo $p_mrp; ?></del></small><strong class="text-dark" style="font-weight: 500;"><?php echo " ₹",$p_price;?></strong>
              </p> <br> 
                          
              <p style="margin-top:-20px; font-size:13px; font-weight:normal bold;">Inclusive of all taxes</p>
              <br> <hr/>

              <div class="row">
                <div class="col-sm-8">
                  <label class="control-label" style="font-weignt:bold">Quantity</label>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="number" class="form-control form-control-lg text-center" name="qty" value="1" min="1" max="10" style="width: 85px;">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <form action="" method="post">
                      <?php
                        if(!isset($_SESSION['user_id']))
                         { ?>
                            <input type="submit" style="margin-top:5.5px; margin-left: 25px; height: 35px;" name="noWish" value="❤️">
                        <?php  } else { ?>
                            <input type="submit" style="margin-top:5.5px; margin-left: 25px; height: 35px;" name="wishlist" value="❤️">
                        <?php } ?>

                      <?php
                         if(!isset($_SESSION['user_id']))
                         { ?>
                          <input type="submit" class="btn btn-dark btn-block" style="margin-top:-36px; margin-left: -130px; width: 150px;" name="noLogin" value="Add To Cart">
                        <?php  } else { ?>
                          <input type="submit" class="btn btn-dark btn-block" style="margin-top:-36px; margin-left: -130px; width: 150px;" name="addtocart" value="Add To Cart">
                          <?php } ?>
                        </form>
                    </div>
                  </div>
                </div>
              </div>

               <?php }
    } else {
        echo "No products found.";
    }
    mysqli_free_result($result);
    mysqli_close($conn);

      include 'connection.php';
      if(isset($_POST['noWish'])){
        echo '<script>alert("Please login to add product in wishlist");';
        echo "window.location.href ='login_form.php'</script>";
    }

      if(isset($_POST['noLogin'])){
          echo '<script>alert("Please login to purchase product");';
          echo "window.location.href ='login_form.php'</script>";
      }

      if(isset($_POST['addtocart'])){
      $p_id=$_GET['p_id'];
      $sql = "SELECT * FROM products where p_id=$p_id;";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // Loop through each row and print the product data
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id=$_SESSION['user_id'];
            $p_id=$row["p_id"];
            $p_name=$row["p_name"];
            $p_img=$row["p_img"];
            $qty=$_POST['qty'];
            $p_price=$row["p_price"];
            $p_desc=$row["p_desc"];
       
        $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE p_id = '$p_id' AND user_id = '$user_id'") or die('query failed');
        }
      }
        if(mysqli_num_rows($check_cart_numbers) > 0){
          echo '<script>alert("already added to cart!");</script>';
        }else{
           mysqli_query($conn, "INSERT INTO `cart`(user_id, p_id, p_name, p_img, qty, p_price, p_desc) VALUES
           ('$user_id', '$p_id', '$p_name', '$p_img', '$qty', '$p_price' ,' $p_desc')") or die('query failed');
           echo '<script>alert("product added to cart");';
           echo "window.location.href ='cart.php'</script>";
        }
     }
     
     if(isset($_POST['wishlist'])){
      $p_id=$_GET['p_id'];
      $sql = "SELECT * FROM products where p_id=$p_id;";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // Loop through each row and print the product data
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id=$_SESSION['user_id'];
            $p_id=$row["p_id"];
            $p_name=$row["p_name"];
            $p_img=$row["p_img"];
            $qty=1;
            $p_price=$row["p_price"];
            $p_desc=$row["p_desc"];
       
        $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE p_id = '$p_id' AND user_id = '$user_id'") or die('query failed');
        }
      }
        if(mysqli_num_rows($check_cart_numbers) > 0){
          echo '<script>alert("already added to your wishlist");</script>';
        }else{
           mysqli_query($conn, "INSERT INTO `wishlist`(user_id, p_id, p_name, p_img, qty, p_price, p_desc) VALUES
           ('$user_id', '$p_id', '$p_name', '$p_img', '$qty', '$p_price' ,' $p_desc')") or die('query failed');
           echo '<script>alert("product added to your wishlist!");';
           echo "window.location.href ='wishlist.php'</script>";
        }
     }

      ?>

            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Similar Products</h2>
              <a href="products.php">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          <?php
    include('connection.php');
    $sql = "SELECT * FROM products WHERE c_id=$c_id ORDER BY RAND() LIMIT 3";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row and print the product data
        while ($row = mysqli_fetch_assoc($result)) {
            $p_id=$row["p_id"];
            $p_name=$row["p_name"];
            $p_img=$row["p_img"];
            $p_mrp=$row["p_mrp"];
            $p_price=$row["p_price"];
            $p_desc=$row["p_desc"];
            ?>

          <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.php?p_id=<?php echo $p_id; ?>"><img src="assets\product-image\<?php echo $p_img;?>" alt=""></a>
              <div class="down-content">
                <a href="product-details.php?p_id=<?php echo $p_id; ?>"><h4><?php echo $p_name; ?></h4></a>
                <h6><small><del>₹<?php echo $p_mrp; ?></del></small>₹<?php echo $p_price;?></h6>
              </div>
            </div>
          </div>


               <?php }
    } else {
        echo "No products found.";
    }
    mysqli_free_result($result);
    mysqli_close($conn);
  ?>
     
          
        </div>
      </div>
    </div>

    <?php 
      include('footer.php');
   ?>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
