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
    <style type="text/css">
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
        
      <form class="d-flex" role="search" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">

     




      </form>
    </div>
  </div>
</nav>

</div>
<!--Second Child-->
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
           <a class='nav-link' href='./user_area/user_login.php'> Login</a>
       </li>" ;
      }

      else
      {
        echo "<li class='nav-item'>
           <a class='nav-link'  href='./user_area/logout.php'> Logout</a>
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
    <div class="col-md-2 bg-secondary p-0 text-center second">
     <ul class="navbar-nav me-auto">
    <li class="nav-item bg-danger">
        <a href="#" class="nav-link text-light"><h5>Shop by Category</h5></a>
    </li>
<?php
$select_cate = "select * from `categories`";
$result_cate = mysqli_query($con,$select_cate);
//$row_data = mysqli_fetch_assoc($result_cate );
//echo $row_data['Category_name'] ;

while ($row_data = mysqli_fetch_assoc($result_cate )) {
    $cate_name = $row_data['Category_name'] ;
    $cate_id = $row_data['Cat_id'] ;
    echo "  <li class='nav-item bg-secondary second'>
        <a href='index.php?category=$cate_id' class='nav-link text-light'>$cate_name</a>
    </li>";
}

?>





</ul>   
</div>




<div class="col-md-10">
    <!--Products-->
     <div class="row">
    <!--fetch product-->    
      <?php
         if (isset($_GET['search_data_product'])) {
        $searchdata = $_GET['search_data'];
    $search_query = "select * from `products` where product_keywords like '%$searchdata%'";
    $result = mysqli_query($con,$search_query);
    $rows = mysqli_num_rows( $result);

    if ($rows == 0) {
        echo"<h2 class='text-center my-3'>No Products Found</h2>";
    }

    
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

        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
            <img class='card-img-top' src='./Admin/product_images/$product_img1' alt='Card image cap'>
                    <div class='card-body'>
                    <h5 class='card-title'>$product_name</h5>
                    <p class='card-text'> $product_desc</p>
                    <h5 class='card-title'>LKR $product_price</h5>
                    <a href='index.php?add_to_cart= $product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-success'>View more</a>
                    </div>
            </div>
        </div>     ";



    }
}




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
  <div class="text-center p-4 bg-danger text-light back" >
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="http://localhost/Easy%20Website/index.php">Easy Super Market</a>
  </div>
  <!-- Copyright --> 


</footer>
</html>