<?php
include('./includes/connect.php');
 require_once('subscribtion.php');

\Stripe\Stripe::setVerifySslCerts(false);

$token=$_POST['stripeToken'];
//getting user
$uname = $_SESSION['username'];
$img="select * from customer where Username='$uname'";
            $result_img=mysqli_query($con,$img);
            $row=mysqli_fetch_array($result_img);
            $cus_id=$row['Cus_id'];

$data=\Stripe\Charge::create(array(
"amount"=> 1000,
"currency"=>"usd",
"source"=>$token,
"description"=>$token,




));
$Sdate = date('Y-m-d');
$Edate = date('Y-m-d', strtotime('+30 day'));

  if($data){
  	$insert_query = "insert into `subscription` (Sub_name,Cus_id,amount,status,start_date,end_date,token) values ('Easy plus Pro','$cus_id','1000','Active','$Sdate','$Edate','$token')";
	$result = mysqli_query($con,$insert_query);
	if ($result) {
		
	}
  	echo"<script>window.open('./success_sub.php','_self')</script>";
  }