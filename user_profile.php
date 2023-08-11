<!--connect Database-->
<?php
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
   
h2,
h5,
.h2,
.h5 {
  font-family: inherit;
  font-weight: 600;
  line-height: 1.5;
  margin-bottom: .5rem;
  color: #32325d;
}

h2,
.h2 {
  font-size: 1.25rem;
}

h5,
.h5 {
  font-size: .8125rem;
}

.container-fluid {
  width: 100%;
  margin-right: auto;
  margin-left: auto;
  padding-right: 15px;
  padding-left: 15px;
}

.row {
  display: flex;
  margin-right: -15px;
  margin-left: -15px;
  flex-wrap: wrap;
}

.col,
.col-auto,
.col-lg-6,
.col-xl-3,
.col-xl-6 {
  position: relative;
  width: 100%;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}

.col {
  max-width: 100%;
  flex-basis: 0;
  flex-grow: 1;
}

.col-auto {
  width: auto;
  max-width: none;
  flex: 0 0 auto;
}

@media (min-width: 992px) {
  .col-lg-6 {
    max-width: 50%;
    flex: 0 0 50%;
  }
}

@media (min-width: 1200px) {
  .col-xl-3 {
    max-width: 25%;
    flex: 0 0 25%;
  }
  .col-xl-6 {
    max-width: 50%;
    flex: 0 0 50%;
  }
}

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  border: 1px solid rgba(0, 0, 0, .05);
  border-radius: .375rem;
  background-color: #fff;
  background-clip: border-box;
}

.card-body {
  padding: 1.5rem;
  flex: 1 1 auto;
}

.card-title {
  margin-bottom: 1.25rem;
}





.rounded-circle {
  border-radius: 50% !important;
}

.align-items-center {
  align-items: center !important;
}

@media (min-width: 1200px) {
  .justify-content-xl-between {
    justify-content: space-between !important;
  }
}

.shadow {
  box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
}

.mb-0 {
  margin-bottom: 0 !important;
}

.mr-2 {
  margin-right: .5rem !important;
}

.mt-3 {
  margin-top: 1rem !important;
}

.mb-4 {
  margin-bottom: 1.5rem !important;
}

.mb-5 {
  margin-bottom: 3rem !important;
}

.pt-5 {
  padding-top: 3rem !important;
}

.pb-8 {
  padding-bottom: 8rem !important;
}

.m-auto {
  margin: auto !important;
}

.second{
  background: linear-gradient(90deg, rgba(51,47,47,1) 15%, rgba(153,148,148,1) 99%);
}


  

figcaption,
main {
  display: block;
}

main {
  overflow: hidden;
}

.bg-yellow {
  background-color: #ffd600 !important;
}

a.bg-yellow:hover,
a.bg-yellow:focus,
button.bg-yellow:hover,
button.bg-yellow:focus {
  background-color: #ccab00 !important;
}



.bg-gradient-primary {
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(212,68,68,1) 57%);!important;
}
.back{
 background: radial-gradient(circle, rgba(30,31,38,1) 16%, rgba(252,70,70,1) 93%);!important;
}

.backs{
 background: linear-gradient(90deg, rgba(11,11,11,1) 19%, rgba(232,70,70,1) 71%);
}

[class*='shadow'] {
  transition: all .15s ease;
}

.text-sm {
  font-size: .875rem !important;
}

.text-white {
  color: #fff !important;
}

a.text-white:hover,
a.text-white:focus {
  color: #e6e6e6 !important;
}

[class*='btn-outline-'] {
  border-width: 1px;
}

.card-stats .card-body {
  padding: 1rem 1.5rem;
}

.main-content {
  position: relative;
}

@media (min-width: 768px) {
  .main-content .container-fluid {
    padding-right: 39px !important;
    padding-left: 39px !important;
  }
}

.footer {
  padding: 2.5rem 0;
  background: #f7fafc;
}

.footer .copyright {
  font-size: .875rem;
}

.header {
  position: relative;
}

.icon {
  width: 3rem;
  height: 3rem;
}

.icon i {
  font-size: 2.25rem;
}

.icon-shape {
  display: inline-flex;
  padding: 12px;
  text-align: center;
  border-radius: 50%;
  align-items: center;
  justify-content: center;
}

.icon-shape i {
  font-size: 1.25rem;
}


 

p {
  font-size: 1rem;
  font-weight: 300;
  line-height: 1.7;
}

}
  </style>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Dashboard</title>
	<!--Boostrap Css Link-->
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
     rel="stylesheet"
     integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
     crossorigin="anonymous">

     <!--Css Link-->
    <link rel="stylesheet" type="text/css" href="../style.css">
    <!--Font Awesome Link-->

    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />



     
   

    <style type="text/css">
        .logo{
    width: 10%;
    height: 10%;
}
    .Admin-img{
	width: 100px ;
	object-fit: contain;}

     body{
        overflow-x: hidden;
      }
    </style>

</head>
<body>
<!--navbar-->
<div class="container-fliud ">   
<nav class="navbar navbar-expand-lg bg-danger backs">

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
        <li class="nav-item">
          <a class="nav-link text-light" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"><sup><?php cart_item();  ?></sup></i></a>
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

<!--Second Child-->
<div class="bg-light">
    <h3 class="text-center">USER DASHBOARD</h3>
</div>

<!--Sidebar-->
<div class="row">
    <div class="col-md-2 bg-secondary p-0 text-center">
     <ul class="navbar-nav me-auto">
    <li class="nav-item bg-danger back">
        <?php
            $uname = $_SESSION['username'];
            $img="select * from customer where Username='$uname'";
            $result_img=mysqli_query($con,$img);
            $row=mysqli_fetch_array($result_img);
            $user_image=$row['Cus_img'];
            $user_name=$row['Name'];
            $user_address=$row['Address'];
            $user_mobile=$row['Mobile'];
            $user_id=$row['Cus_id'];
            $user_uname=$row['Username'];
            $user_email=$row['Email'];

            echo"<a href='#' class='nav-link text-light'><img src='./images/$user_image' class='Admin-img'></a>";

            echo "<p class='text-light text-center'>$user_name</p>";


        ?>
    	
    	
        <a href="#" class="nav-link text-light bg-secondary"><h5>Manage Details</h5></a>
        
    </li>
    	<li class="nav-item bg-dark my-1">
        <a href="user_profile.php?myorders" class="nav-link text-light ">My Orders</a>
    	</li>
    	<li class="nav-item bg-secondary my-1">
        <a href="user_profile.php?edit_account" class="nav-link text-light">Edit Account</a>
    	</li>

      <?php
      $uname = $_SESSION['username'];
      $img="select * from customer where Username='$uname'";
      $result_img=mysqli_query($con,$img);
      $row=mysqli_fetch_array($result_img);
      $cus_id=$row['Cus_id'];
        $query_countsub="SELECT * from subscription where Cus_id=$cus_id and status='Active'";
        $sub=mysqli_query($con,$query_countsub);
        $counts =mysqli_num_rows($sub);

        if ($counts==1) {

          echo" <li class='nav-item bg-dark my-1'>
        <a href='user_profile.php?subs' class='nav-link text-light'>Manage Easy Plus</a>
      </li>";
        
        }

        else
        {
         
       echo" <li class='nav-item bg-dark my-1'>
        <a href='./subscribtion.php' class='nav-link text-light'>Buy Easy Plus</a>
      </li>";
        }



      ?>
    	
    	<li class="nav-item bg-secondary my-1">
        <a href="./user_area/logout.php" class="nav-link text-light">Logout</a>
      </li>
    	</li>

    	</li>

    	</li>

    	</li>
    	 </ul>   
    <!--Sidebar-->
    </div>

<div class="col-md-10 ">
<?php
if (!isset($_GET['edit_account'])) {
 if (!isset($_GET['myorders'])) {
   if (!isset($_GET['subs'])) {
$uname = $_SESSION['username'];
$img="select * from customer where Username='$uname'";
            $result_img=mysqli_query($con,$img);
            $row=mysqli_fetch_array($result_img);
            $cus_id=$row['Cus_id'];
//total order
  $query_count="select * from order_manager where Cus_id=$cus_id";
  $pro=mysqli_query($con,$query_count);
  $count =mysqli_num_rows($pro);

//pending orders
  $query_count1="select * from order_manager where Cus_id=$cus_id and Status='processing'";
  $pro1=mysqli_query($con,$query_count1);
  $count1 =mysqli_num_rows($pro1);

//Shipped orders
 $query_count2="select * from order_manager where Cus_id=$cus_id and Status='shipped'";
  $pro2=mysqli_query($con,$query_count2);
  $count2 =mysqli_num_rows($pro2);

//rejected orders
   $query_count3="select * from order_manager where Cus_id=$cus_id and Status='rejected'";
  $pro3=mysqli_query($con,$query_count3);
  $count3 =mysqli_num_rows($pro3);
?>
   <div class="main-content">
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <h2 class="mb-5 text-white text-center">Overview</h2>
        <div class="header-body">
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Placed Orders</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $count ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pending Orders</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $count1 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Shipped Orders</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $count2 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Rejected Orders</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $count3 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<?php
}
}
}
?>


    <!--navbar-->
     <div class="container my-5 m-8">
      <?php
      if (isset($_GET['edit_account'])) {
        include('edit_account.php');
      }

      if (isset($_GET['myorders'])) {
        include('./user_area/user_orders.php');
      }


      if (isset($_GET['subs'])) {
        include('Manage_subscribtion.php');
      }


      ?>
     </div>
     </div>
   

 

<!--boostrap jss Link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
crossorigin="anonymous"></script>
</body>
<footer>
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    
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
  <div class="text-center p-4 bg-danger text-light backs" >
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="http://localhost/Easy%20Website/index.php">Easy Super Market</a>
  </div>
  <!-- Copyright --> 


</footer>
</html>