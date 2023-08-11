<!--connect Database-->
<?php
include('./includes/connect.php');
session_start();
require('confique.php');

?>

<?php
$subtotal=0;
$Grandtotal=0;
$easy=500;
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


<?php
if (isset($_POST['return'])){
   echo "<script>window.location = 'cart.php'</script>";
}
?>


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
        echo "" ;
      }


         ?>
        <li class="nav-item">
          <a class="nav-link text-light" href="contact.php">Contact</a>
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
<form method="post" action="submit.php">

 <!--Main layout-->

  <main class=" pt-4 m-auto container-fliud">

    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout</h2>

      <!--Grid row-->
      <div class="row ">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card ">

            <!--Card content-->
            <form class="card-body ">

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 ">

                  
                  <!--firstName-->
                  <div class="md-form ">
                    <label for="firstName" class="">First name</label>
                    <input type="text" name="firstName" class="form-control " required>
                    
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 ">

                  <!--lastName-->
                  <div class="md-form">
                     <label for="lastName" class="">Last name</label>
                    <input type="text" name="lastName" class="form-control" required>
                   
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->
              <div class="md-form input-group pl-0 mb-5">
               
                  
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <label for="email" class="">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="youremail@example.com" required>
                
              </div>

              <!--address-->
              <div class="md-form mb-5">
                <label for="address" class="">Address</label>
                <input type="text" name="address" class="form-control" placeholder="1234 Main St" required>
                
              </div>

               <!--mobile-->
              <div class="md-form mb-5">
                 <label for="address" class="">Mobile No</label>
                <input type="number" name="mobile" maxlength="10" class="form-control" placeholder="0760000000"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                 required>
               
              </div>

              

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4">

                  <label for="country">Country</label>
                  <select class="custom-select d-block w-100 form-select" name="country" required>
                    <option value="">Choose...</option>
                    <option>Sri Lanka</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                  <label for="state">Province</label>
                  <select class="custom-select d-block w-100 form-select" name="state" required>
                    <option value="">Choose...</option>
                    <option>Western</option>
                    <option>Eastern</option>
                    <option>Northern</option>
                    <option>Uva</option>
                    <option>Southern</option>
                    <option>Sabaragamuwa</option>
                    <option>Central</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                  <label for="zip">Zip</label>
                  <input type="text" class="form-control" name="zip" placeholder="" required>
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <hr>

             
              

             
             
              
             <script src="https://Checkout.Stripe.com/checkout.js" class="Stripe-button" 

             data-key="<?php echo $publish ?>"
             data-amount="<?php echo $Grandtotal * 100 ?>"
             data-currency="lkr"
             data-name="Easy Super Market"
           
             



             >
               
             </script>
               
            </form>








          

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3 text-center">
            <span class="text-muted text-center">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>

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
          $easy=0;
        }
        else
        {
          $easy=500;
        }
 
    if (isset($_SESSION['cart'])){
           $product_id = array_column($_SESSION['cart'], 'Pro_id');
                      ;

$select_query = "select * from `products`";
$result = mysqli_query($con,$select_query);


                        
                        while ($row = mysqli_fetch_assoc($result)){

                            foreach ($_SESSION['cart'] as $value){
                                if ($row['Pro_id'] == $value['Pro_id']){
                                   
                                    $productname=$row['product_name'];
                                    $productprice=$row['product_price'];
                                    $productid=$row['Pro_id'];
                                    $product_qty=$value['Pro_qty'];
                                    $total=$product_qty*$productprice;
                                    $subtotal= $subtotal+(int)$total;
                                    $Grandtotal= (int)$easy + (int)$subtotal; 


    


    echo"<ul class='list-group mb-3 z-depth-1'>
            <li class='list-group-item d-flex justify-content-between lh-condensed'>
              <div>
                <h6 class='my-0'>$productname</h6>
              <h6>Quantity :   <small class='text-muted'> $product_qty</small><h6>

              
              </div>
              
              <span class=''>$total</span>

            </li>
            </ul>";



}
}


}
}
echo"<ul class='list-group mb-3 z-depth-1'>
<li class='list-group-item d-flex justify-content-between lh-condensed'>
              <div>
                <h6 class='my-0'>Subtotal :</h6>
              

              
              </div>
              
              <h6> $subtotal</h6>

            </li>
            <li class='list-group-item d-flex justify-content-between lh-condensed'>
              <div>
                <h6 class='my-0'>Delivery Charges :</h6>
              

              
              </div>
              
              <h6>$easy</h6>

            </li>
            <li class='list-group-item d-flex justify-content-between lh-condensed'>
              <div>
                <h6 class='my-0'>Total :</h6>
              

              
              </div>
              
              <h6>$Grandtotal</h6>

            </li>
            </ul>";

        
          ?>

    <form method="post">

     &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input class="btn btn-secondary btn-lg btn-block" type="submit" value="Return to Cart" name="return">    
     </form>


          <!-- Cart -->
          

         

        </div>
        <!--Grid column-->

      </div>

    </div>

  </main>
  
    




<!--Boostrap js Link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
crossorigin="anonymous"></script>
</body>


<footer>
  <div class="bg-danger p-3 text-center back text-light">
    <p>All Rights Reserved @ Easy Supermarket 2022</p>  

  </div>  


</footer>
</html>