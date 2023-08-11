<?php
include('./includes/connect.php');
include('./functions/common_function.php');


session_start();






if (isset($_POST['remove'])){
  
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["Pro_id"] == $_POST['pro_id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }

if (isset($_POST['mod_quantity']))
{
    foreach ($_SESSION['cart'] as $key => $value)
    {
          if($value["Pro_id"] == $_POST['pro_id'])
          {

            $_SESSION['cart'][$key]['Pro_qty']=$_POST['mod_quantity'];

            echo "<script>window.location = 'cart.php'</script>";

        }
      }
}

if (isset($_POST['continue'])){
   echo "<script>window.location = 'products.php'</script>";
}
if (isset($_POST['checkout'])){
   echo "<script>window.location = 'checkout.php'</script>";
}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <link rel="stylesheet" type="text/css" href="style.css">
     <script src="jquery-2.0.3.js"></script>
     <script src="jquery-3.6.0.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <style type="text/css">
       .img{
        width: 150px;
       }
       .back{
 background: linear-gradient(90deg, rgba(11,11,11,1) 19%, rgba(232,70,70,1) 71%);
}
.second{
  background: linear-gradient(90deg, rgba(51,47,47,1) 15%, rgba(153,148,148,1) 99%);
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button {  

   opacity: 1;

}
     </style>
</head>
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
          <a class="nav-link text-light" href="products.php">Products</a>
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
        echo "<li class='nav-item'>
           <a class='nav-link text-light'  href='./user_area/logout.php'> Logout</a>
       </li>" ;
      }


      ?> 

    </ul>
</nav>
<body class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center border rounded bg-light mt-5">
        <h3>MY CART</h3>
      </div>
      
      <div class="col-lg-9 mt-3">
        <table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Image</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Sub Total</th>
      <th scope="col">Remove</th>

    </tr>
  </thead>
  <tbody class="text-center">
    <?php
    
     if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'Pro_id');
                      ;

$select_query = "select * from `products`";
$result = mysqli_query($con,$select_query);


                        
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($_SESSION['cart'] as $value){
                                if ($row['Pro_id'] == $value['Pro_id']){
                                    $productimg=$row['product_img1']; 
                                    $productname=$row['product_name'];
                                    $productprice=$row['product_price'];
                                    $productid=$row['Pro_id'];
                                    $productq=$row['product_quantity'];
                                    $product_qty=$value['Pro_qty'];

       

          echo" <tr>
      <th scope='row'>$productid</th>
      <td>$productname</td>
      <td><img src='./Admin/product_images/$productimg' class='img'></td>
      <td>$productprice<input type='hidden' class='iprice' value='$productprice'></td>

      <td>
      <form action='' method='POST'>
      <input type='number' value='$product_qty' onchange='this.form.submit()' min='1' max='$productq' class='w-50 text-center iquantity' name='mod_quantity'>
      <input type='hidden' name='pro_id' value='$productid'>
       </form>
      </td>

      <td class='itotal'></td>
      <td>
      <form action='' method='POST'>
      <button name='remove' class='btn btn-sm btn-outline-danger'>REMOVE</button>
      <input type='hidden' name='pro_id' value='$productid'>
      </form>
      </td>
    </tr>";
    

}
}
}
}
    ?>
   
  </tbody>
</table>
      </div>
       
      <div class="col-lg-3 mt-4 ">
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Total Price ($count items)</h6>";
                            }else{
                                echo "<h6>Total Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                       
                        
                    </div>
                    <div class="col-md-6">

                     <!--<label> LKR  <h6 id="gtotal"></h6></label>-->
                     <p id="gtotal" ></p>

                        <br>
                      <?php
      if(isset($_SESSION['username'])){
      $uname = $_SESSION['username'];
      $img="select * from customer where Username='$uname'";
      $result_img=mysqli_query($con,$img);
      $row=mysqli_fetch_array($result_img);
      $cus_id=$row['Cus_id'];
        $query_countsub="SELECT * from subscription where Cus_id=$cus_id and status='Active'";
        $sub=mysqli_query($con,$query_countsub);
        $counts =mysqli_num_rows($sub);

        if ($counts==1) {
          echo" <h6 class='text-success'>FREE</h6>";
        }
        else
        {
          echo" <h6 class='text-success'>500</h6>";
        }
      }
      else
      {
         echo" <h6 class='text-success'>0</h6>";
      }
        ?>

                        
                      
                        


                        
                    </div>

                </div>
                 <form  method='POST'>
            <?php 
        if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
          echo "
        <input type='submit' name='checkout' class='btn btn-primary btn-block' value='Checkout'>";
      }
      else
      {
        echo"";
      }
        ?>
         
          
          <input type="submit" name="continue"class="btn btn-danger btn-block" value="Continue Shopping" onclick="myFunction()">
        </form>
            </div>

        </div>
    </div>
</div>



<script type="text/javascript">

var gt =0;  
var iprice = document.getElementsByClassName('iprice');
var iquantity = document.getElementsByClassName('iquantity');
var itotal = document.getElementsByClassName('itotal');
var gtotal = document.getElementById('gtotal');

function subtotal()
{
  gt=0;
  for(i=0;i<iprice.length;i++)
  {
    itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
    gt=gt+(iprice[i].value)*(iquantity[i].value);

  }
  gtotal.innerText=gt;
}

subtotal();

</script>

<script type="text/javascript">
  $("[type='number']").keypress(function (evt) {
    evt.preventDefault();
});
</script>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>