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
      .back{
 background: linear-gradient(90deg, rgba(11,11,11,1) 19%, rgba(232,70,70,1) 71%);
}
.second{
  background: linear-gradient(90deg, rgba(51,47,47,1) 15%, rgba(153,148,148,1) 99%);
}
    </style>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

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
           <a class='nav-link text-light' href='#'> Welcome ".  $_SESSION['username']."</a>" ;
      }
   
      
      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
           <a class='nav-link text-light' href='./user_area/user_login.php'> Login</a>
       </li>" ;
      }

      else
      {
        echo "<li class='nav-item '>
           <a class='nav-link text-light'  href='./user_area/logout.php'> Logout</a>
       </li>" ;
      }


      ?>

    </ul>
</nav>



<!--Third Child-->
<div class="bg-light">
    <h3 class="text-center">Products</h3>
</div>




  <!--Sidebar-->
<!--fourth Child-->
<div class="row">
    <div class="col-md-2 bg-secondary second p-0 text-center">
     <ul class="navbar-nav me-auto">
    <li class="nav-item bg-danger">
        <a href="#" class="nav-link text-light"><h5>Shop by Category</h5></a>
    </li>
<?php

//call get Selectcate function
selectcate()
?>
  
     </ul>   
    </div>
  
     

<!--fetch product-->    

<div class="col-md-10">
    <!--Products-->
     <div class="row">

<?php
//call get product function
  getproduct()
?>



<?php
//geting product by unique categories
//call get getcategory function
getcategory()
    
?>

<?php
//calling cart  
cart()

?>
          
    </div>
</div>   
        
    




<!--Boostrap js Link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
crossorigin="anonymous"></script>
</body>


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
            <a href="http://localhost/Easy%20Website/products.php?category=6" class="text-reset text-decoration-none">Milk Products</a>
          </p>
          <p>
            <a href="http://localhost/Easy%20Website/products.php?category=9" class="text-reset text-decoration-none">Bevarages</a>
          </p>
          <p>
            <a href="http://localhost/Easy%20Website/products.php?category=1" class="text-reset text-decoration-none">Rice</a>
          </p>
          <p>
            <a href="http://localhost/Easy%20Website/products.php?category=13" class="text-reset text-decoration-none">Household</a>
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
            <a href="#!" class="text-reset text-decoration-none">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-decoration-none">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-decoration-none">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-decoration-none">Help</a>
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


</footer>
</html>