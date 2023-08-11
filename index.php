<!--connect Database-->
<?php
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Super Market</title>
    <!--Boostrap Css Link-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
     rel="stylesheet"
     integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
     crossorigin="anonymous">
    <!--Font Awesome Link-->

    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />

    <!--Css Link-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
      body{
        overflow-x: hidden;
      }

      .title{
  text-align: center;
  margin: 0 auto 40px;
  position: relative;
  line-height: 60px;
  color: #555;
}
.title::after{
  content: '';
  background: red;
  width: 80px;
  height: 5px;
  border-radius: 5px;
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
}
.back{
 background: linear-gradient(90deg, rgba(11,11,11,1) 19%, rgba(232,70,70,1) 71%);
}
.second{
  background: linear-gradient(90deg, rgba(51,47,47,1) 15%, rgba(153,148,148,1) 99%);
}
    </style>

</head>




<body>
 <!--Navbar-->   
<div class="container-fliud ">   
<nav class="navbar navbar-expand-lg bg-danger back">

  <div class="container-fluid">
        <img src=".\Images\Logo.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" style="font-size: 16;" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="products.php">Product</a>
        </li>

        <?php 
        if (!isset($_SESSION['username'])) {
        echo " <li class='nav-item'>
          <a class='nav-link text-light' href='./user_area/user_register.php'>Register</a>
        </li>" ;
      }

      else
      {
        echo "<li class='nav-item'>
          <a class='nav-link text-light' href='./user_profile.php'>My Account</a>
        </li>" ;
      }


         ?>
       
        <li class="nav-item">
          <a class="nav-link text-light" href="contact.php">Contact</a>
        </li>
        
        <li class='nav-item'>
          <a class='nav-link text-light' href='cart.php'><i class='fa fa-shopping-cart' aria-hidden='true'><sup><?php cart_item() ?></sup></i></a>
        </li>
     
        
         
        </ul>
        
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
</div>




<!--Second Child Navnar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary second">
    <ul class="navbar-nav me-auto">
       
        <?php
     if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
           <a class='nav-link text-light' href='#'> Welcome Guest</a>" ;
      }

      else
      {
         echo "<li class='nav-item'>
           <a class='nav-link text-light' href='./user_profile.php'> Welcome ".  $_SESSION['username']."</a>" ;
      }
   




      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
           <a class='nav-link text-light' href='./user_area/user_login.php'> Login</a>
       </li>" ;
      }

      else
      {
        echo "<li class='nav-item'>
           <a class='nav-link text-light'  href='./user_area/logout.php'> Logout</a>
       </li>" ;
      }


      ?>

    </ul>
</nav>



<!--Third Child-->
<div class="bg-light ">
    <h3 class="text-center">Easy Super Market</h3>
</div>


<!--carousel-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
    <ol class="carousel-indicators ">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 h-75" src="./Images/ban1.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block ">
                <h5>Easy Super Market</h5>
               
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 h-75 " src="./Images/ban2.png" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 h-75" src="./Images/banner3.png" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<h2 class="title">Latest product</h2>
<div class="col-md-12">
    <!--Products-->
     <div class="row">
<?php
 $select_query = "select * from `products` order by rand() limit 0,4";
    $result = mysqli_query($con,$select_query);
    while ($row = mysqli_fetch_assoc($result )) {
        $product_id =$row['Pro_id'];
        $product_name =$row['product_name'];
        $product_desc =$row['product_desc'];
        $product_brand =$row['product_brand'];
        $product_cate =$row['Cat_id'];
        $product_img1 =$row['product_img1'];
        $product_img2 =$row['product_img2'];
        $product_img3 =$row['product_img3'];
        $product_price =$row['product_price'];

        echo "<div class='col-md-3 mb-2 my-3 h-5 '>
            <div class='card' style='width: 18rem;'>
            <img class='card-img-top' src='./Admin/product_images/$product_img1' alt='Card image cap'>
                    <div class='card-body'>
                    <h5 class='card-title'>$product_name</h5>
                    <p class='card-text'> $product_desc</p>
                    <h5 class='card-title'>LKR $product_price</h5>
                    <a href='products.php?add_to_cart= $product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-success'>View more</a>
                    </div>
            </div>
        </div>     ";



    }


?>
</div>
</div>


   <div class="text-center">
            <button class="btn btn-danger my-3"type="button" ><a class="text-light text-decoration-none" href="products.php">View More</a></button>
            
        </div>



<div>
   <a href="http://localhost/Easy%20Website/products.php?category=8"><img src="./Images/banner4.png" class="img-fluid w-100 h-75" alt="Responsive image"></a>   
  
  </div>   

<!--category-->
<h2 class="title">Special</h2>
    <div class="d-flex justify-content-center mt-3 mb-3"> <span class="text text-center">Finding Best Products Now<br> in Your Fingertips</span> </div>

 <!--cate cards-->   
 <div class="card-group">
  <div class="card">
    <img src="./Images/veg.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Fresh vegitables</h5>
      <p class="card-text">We have the fresh vegitables at afordable price.</p>
      <a href="http://localhost/Easy%20Website/products.php?category=8" class="btn btn-primary">Explore</a>
    </div>
  </div>
  <div class="card">
    <img src="./Images/fru.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Fresh Fruits</h5>
      <p class="card-text">We have the fresh fruits at afordable price.</p>
       <a href="http://localhost/Easy%20Website/products.php?category=7" class="btn btn-primary">Explore</a>
    </div>
  </div>
  <div class="card">
    <img src="./Images/bak.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Exclusive Bakery</h5>
      <p class="card-text">You can find exclusive bakery item from our store</p>
       <a href="http://localhost/Easy%20Website/products.php?category=14" class="btn btn-primary">Explore</a>
    </div>
  </div>
</div>



<footer>
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-instagram"></i>
      </a>
     
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3 text-secondary"></i>Easy Super Market
          </h6>
          <p>
            Buy Best products from us at affordable price
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="http://localhost/Easy%20Website/products.php?category=6" class="text-reset">Milk Products</a>
          </p>
          <p>
            <a href="http://localhost/Easy%20Website/products.php?category=9" class="text-reset">Bevarages</a>
          </p>
          <p>
            <a href="http://localhost/Easy%20Website/products.php?category=1" class="text-reset">Rice</a>
          </p>
          <p>
            <a href="http://localhost/Easy%20Website/products.php?category=13" class="text-reset">Household</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3 text-secondary"></i> N0 21, Colombo rd, Avissawella</p>
          <p>
            <i class="fas fa-envelope me-3 text-secondary"></i>
            info@easy.com
          </p>
          <p><i class="fas fa-phone me-3 text-secondary"></i> +94 727000993 </p>
          <p><i class="fas fa-print me-3 text-secondary"></i> +94 364309585</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4 back text-light" >
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="http://localhost/Easy%20Website/index.php">Easy Super Market</a>
  </div>
  <!-- Copyright --> 
<script src="//code.tidio.co/1an4hnstqckzryeuox8d4siw0bxopprb.js" async></script>
</body>
</footer>
</html>