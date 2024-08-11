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
   ?>

    <!-- Page Content -->
   
      <div class="container">
        <div class="row">
        </div>
      </div>
    
    <div class="services section-background" style="margin-top:50px;">
      <div class="container">
        <div class="row">
          
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

          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4><?php echo $name; ?></h4>
                <p class="n-m"><em><?php echo $testimonial_data; ?></em></p>
              </div>
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
