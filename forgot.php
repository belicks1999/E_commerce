<!--connect Database-->
<?php
include('./includes/connect.php');
include('./functions/common_function.php');



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
    </style>

</head>


<body>
<form method="post">
<section class="vh-100 back">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Reset Password</h3>

            <div class="form-outline mb-4">
              <input type="text" name="user_username" class="form-control form-control" placeholder="Username" required />
              
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="user_password" class="form-control form-control" placeholder="Password" required />
             
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="c_password" class="form-control form-control" placeholder="Confirm Password" required />
             
            </div>


            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start">
             
              
            </div>

            <div class="mb-3">
          <input type="submit" name="update" value="Update" class="bg-danger py-2 px-3 text-light border-0">
         
          
        </div>

            <hr class="my-4">

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </form>
    
</body>



<!--Boostrap js Link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
crossorigin="anonymous"></script>
</body>


 


</footer>
</html>

<?php
if (isset($_POST['update'])) {
$uname=$_POST['user_username'];
$password=$_POST['user_password'];
$cpassword=$_POST['c_password'];
$hash_pass=password_hash($password,PASSWORD_DEFAULT);


//login logic
if ($password==$cpassword) {
   
$update_q = "update `customer` set Password='$hash_pass' where Username='$uname'";
$result=mysqli_query($con,$update_q);
if(mysqli_affected_rows($con) >0){
echo"<script>alert('Password has been Updated')</script>";
echo"<script>window.open('./user_area/user_login.php','_self')</script>";
}
  else
    {
      echo"<script>alert('Failed Try Again')</script>";
    }
}
else
    {
      echo"<script>alert('Password Does Not Match')</script>";
    }
}



?>