<?php 
            session_start();
            include 'connection.php';
?>
<!-- Header -->
<header class="">
    <script src="https://kit.fontawesome.com/d39f9b78eb.js" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <h2>Astonish</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <!-- <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Products</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="cleanser.php">Cleanser</a>
                            <a class="dropdown-item" href="toner.php">Toner</a>
                            <a class="dropdown-item" href="serum.php">Serum</a>
                            <a class="dropdown-item" href="moisturizer.php">Moisturizer</a>
                            <a class="dropdown-item" href="sunscreen.php">Sunscreen</a>
                            <a class="dropdown-item" href="products.php">All Products</a>

                        </div>
                    </li>


                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">More</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="about-us.php">About Us</a>
                            <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                            <a class="dropdown-item" href="terms.php">Terms</a>
                        </div>
                    </li>

                </ul>

            </div>
            <ul>
                <?php
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

          if($cart_rows_number>0)
          { ?>
                <li class="nav-item"><a class="nav-link" href="cart.php"
                        style="font-size:25px; margin-top:-15px;">&#128722</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php"
                        style="font-size:15px; margin-top:-45px; margin-left:31px; color:rgb(104, 109, 111);"><?php echo $cart_rows_number; ?></a>
                </li>

                <?php } else { ?>

                <li class="nav-item"><a class="nav-link" href="nocart.php"
                        style="font-size:25px; margin-top:-15px;">&#128722</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php"
                        style="font-size:15px; margin-top:-45px; margin-left:31px; color:rgb(104, 109, 111);"><?php echo $cart_rows_number; ?></a>
                </li>
                <?php  }       
        

             $wishlist_rows_number=0;  
             $select_wish_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
             $wishlist_rows_number = mysqli_num_rows($select_wish_number); 

             if($wishlist_rows_number>0)
             { ?>

                <li class="nav-item"><a class="nav-link" href="wishlist.php"
                        style=" font-size:24px; margin-top:-46px; margin-left:50px;"><i class="fa-regular fa-heart "
                            style="color: #b8b8b8;"></i></a></li>
                <li class="nav-item"><a class="nav-link"
                        style="font-size:15px; margin-top:-44px; margin-left:77px; color:rgb(104, 109, 111);"><?php echo $wishlist_rows_number; ?></a>
                </li>

                <?php } else { ?>

                  <li class="nav-item"><a class="nav-link" href="nowishlist.php"
                        style=" font-size:24px; margin-top:-46px; margin-left:50px;"><i class="fa-regular fa-heart "
                            style="color: #b8b8b8;"></i></a></li>
                <li class="nav-item"><a class="nav-link"
                        style="font-size:15px; margin-top:-44px; margin-left:77px; color:rgb(104, 109, 111);"><?php echo $wishlist_rows_number; ?></a>
                </li>

                <?php } ?>       
            
            <?php 
            include 'connection.php';
            if(isset($_SESSION['user_id']))
            { ?>
                <li class="nav-item"><a class="nav-link" href="profile.php"
                        style=" font-size:21px; margin-top:-44px; margin-left:95px;"><i class="fa-regular fa-user"
                            style="color: #b8b8b8;"></i></a></li>
                <?php } else { ?>
                <li class="nav-item"><a class="nav-link" href="login_form.php"
                        style=" font-size:21px; margin-top:-44px; margin-left:95px;"><i class="fa-regular fa-user"
                            style="color: #b8b8b8;"></i></a></li>
                <?php } ?>

            </ul>
        </div>

    </nav>
</header>