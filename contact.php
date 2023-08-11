<?php
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Us</title>
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
    <script src="http://maps.google.com/maps/api/js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

    <!--Css Link-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
      .logo{
  width: 10%;
  height: 10%;
}
.back{
 background: linear-gradient(90deg, rgba(11,11,11,1) 19%, rgba(232,70,70,1) 71%);
}
.second{
  background: linear-gradient(90deg, rgba(51,47,47,1) 15%, rgba(153,148,148,1) 99%);
}



.button
{
    display: inline-block;
    background: #97cbfa;
    border-radius: 5px;
    height: 48px;
    -webkit-transition: all 200ms ease;
    -moz-transition: all 200ms ease;
    -ms-transition: all 200ms ease;
    -o-transition: all 200ms ease;
    transition: all 200ms ease;
}
.button a
{
    display: block;
    font-size: 18px;
    font-weight: 400;
    line-height: 48px;
    color: #FFFFFF;
    padding-left: 35px;
    padding-right: 35px;
}
.button:hover
{
    opacity: 0.8;
}

.contact_info
{
    width: 100%;
    padding-top: 70px;
}
.contact_info_item
{
    width: calc((100% - 60px) / 3);
    height: 100px;
    border: solid 1px #e8e8e8;
    box-shadow: 0px 1px 5px rgba(0,0,0,0.1);
    padding-left: 32px;
    padding-right: 15px;
}
.contact_info_image
{
    width: 35px;
    height: 35px;
    text-align: center;
}
.contact_info_image img
{
    max-width: 100%;
}
.contact_info_content
{
    padding-left: 17px;
}
.contact_info_title
{
    font-weight: 500;
}
.contact_info_text
{
    font-size: 12px;
    color: rgba(0,0,0,0.5);
}
#mymap {
      border:1px solid red;
      width: 100%;
      height: 500px;


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
    <h3 class="text-center">Contact Us</h3>
</div>


<?php
if(isset($_POST['send'])){

$name=$_POST['name'];
$mail=$_POST['email'];
$msg=$_POST['msg'];


mail($mail,$name,$msg);
echo"<script>alert('We Received your message, We will back soon')</script>";
}




	?>





	
<section class="vh-100 back">
   <div class="contact_info">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

                        <!-- Contact Item -->
                        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start bg-light">
                            <div class="contact_info_image"><img src="https://img.icons8.com/office/24/000000/iphone.png" alt=""></div>
                            <div class="contact_info_content">
                                <div class="contact_info_title">Phone</div>
                                <div class="contact_info_text">+94 761209321</div>
                            </div>
                        </div>

                        <!-- Contact Item -->
                        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start bg-light">
                            <div class="contact_info_image"><img src="https://img.icons8.com/ultraviolet/24/000000/filled-message.png" alt=""></div>
                            <div class="contact_info_content">
                                <div class="contact_info_title">Email</div>
                                <div class="contact_info_text">Easy@gmail.com</div>
                            </div>
                        </div>

                        <!-- Contact Item -->
                        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start bg-light">
                            <div class="contact_info_image"><img src="https://img.icons8.com/ultraviolet/24/000000/map-marker.png" alt=""></div>
                            <div class="contact_info_content">
                                <div class="contact_info_title">Address</div>
                                <div class="contact_info_text">No 21,Colombo rd, Avissawella</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


  
 <h1 class="text-center text-light mt-5">Find us in Google Map</h1>
<div id="mymap" class="mb-5"></div>


  <script type="text/javascript">

      
    var mymap = new GMaps({
      el: '#mymap',
      lat: 6.958561 ,
      lng: 80.198665,
      zoom:10
    });


    mymap.addMarker({
      lat: 6.958561 ,
      lng: 80.198665,
      title: 'Surat',
      click: function(e) {
        alert('This is Easy Super Market, Avissawella');
      }
    });


  </script>

</section>







<div class="text-center p-4 bg-danger text-light" >
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="http://localhost/Easy%20Website/index.php">Easy Super Market</a>
  </div>
</body>
</html>