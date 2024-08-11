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

    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12" style="margin-top:60px;">
                    <h3 class="display-5 mb-2 text-center">Wishlist</h3>
                    <p class="mb-5 text-center">
                        <i class="text-dark font-weight-bold">0</i> items in your Wishlist
                    </p>

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