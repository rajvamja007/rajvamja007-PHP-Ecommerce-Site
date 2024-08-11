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
      $user_name;
      if(!isset($_SESSION['user_name']))
      {
          $user_name="";
      }
      else
      {
        $user_name=$_SESSION['user_name'];
      }
   ?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Hey <?php echo $user_name; ?>!</h4>
            <h2>An invisible, sweat & water-resistant sunscreen<br/> that leaves absolutely 0 white cast on application. <br/>It’s a lightweight, moisturizing, antioxidant-rich SPF<br/> with very effective UV filters to provide<br/> protection from UVA & UVB rays.</h2>
            <button class="btn btn-dark" style="margin-top:15px;"><a href="products.php" style="color:white;">Shop Now</a></button> 
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Featured Products</h2>
              <a href="products.php">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

  <?php
    include('connection.php');
    $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 3";
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
                <p><?php echo $p_desc; ?></p>
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

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Us</h2>
            </div>
          </div> 
          <div class="col-md-6">
            <div class="left-content">
              <p style=" font-size:14px;">Founded in 2023 with the belief that beauty industry requires a revolution with respect to TRANSPARENCY. There is lot of inaccurate advice & incorrect claims being made by beauty brands which results in fear mongering, <br>misconceptions and eventually consumers making wrong decisions.</p>
              
              <p style="font-weight:500; font-size:16px; color:black;">"Everything is a chemical – water is a chemical – therefore,<br/> chemical-free products don’t exist."</p>

              <h3 style="text-align:center;">HideNothing.</h3>
              <br>
              <p  style=" font-size:14px;">We wanted to address this issue of lack of transparency through a range of products that are straightforward, honest and do what they claim to do. No unnecessary marketing fluff. And this is how Astonish was born.</p>            
              <a href="about-us.php" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/about-1-570x350.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="services" style="background-image: url(assets/images/other-image-fullscren-1-1920x900.jpg);" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest blog posts</h2>
              <a href="blog.php">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="cleanser.php" class="services-item-image"><img src="assets/images/blog-1-370x270.jpg" class="img-fluid" alt=""></a>
              <div class="down-content">
                <h3><a href="cleanser.php" style="color: black;">Cleanse</a></h3>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="serum.php" class="services-item-image"><img src="assets/images/blog-2-370x270.jpg" class="img-fluid" alt=""></a>
              <div class="down-content">
                <h3><a href="serum.php" style="color: black;">Treat</a></h3>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="sunscreen.php" class="services-item-image"><img src="assets/images/blog-3-370x270.jpg" class="img-fluid" alt=""></a>
              <div class="down-content">
                <h3><a href="sunscreen.php" style="color: black;">Protect</a></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Happy Clients</h2>
              <a href="testimonials.php">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          <div class="col-md-12">
            <div class="owl-clients owl-carousel text-center">

  <?php
     include('connection.php');
    $sql = "SELECT * FROM testimonial";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row and print the product data
        while ($row = mysqli_fetch_assoc($result)) {
            $testimonial_id=$row["testimonial_id"];
            $name=$row["name"];
            $testimonial_data=$row["testimonial_data"];
            ?>

              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4><?php echo $name; ?></h4>
                  <p class="n-m"><em><?php echo $testimonial_data; ?></em></p>
                </div>
                </div>
               <?php } 
    } else {
        echo "No data found.";
    }
    mysqli_free_result($result);
    mysqli_close($conn);
  ?>
             
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Astonish</h4>
                  <p>We are self care products brand , our products helps you to work against your concern.</p>
                </div>
                <div class="col-lg-4 col-md-6 text-right">
                  <a href="contact.php" class="filled-button">Contact Us</a>
                </div>
              </div>
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