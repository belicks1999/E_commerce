<?php
include('./includes/connect.php');
 require_once('checkout.php');
if (!empty($_POST['email']) && !empty($_POST['firstName']) && !empty($_POST['address']) && !empty($_POST['mobile']) && !empty($_POST['country']) && !empty($_POST['state']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

\Stripe\Stripe::setVerifySslCerts(false);

$token=$_POST['stripeToken'];
//getting user
$uname = $_SESSION['username'];
$img="select * from customer where Username='$uname'";
            $result_img=mysqli_query($con,$img);
            $row=mysqli_fetch_array($result_img);
            $cus_id=$row['Cus_id'];

$data=\Stripe\Charge::create(array(
"amount"=> $Grandtotal,
"currency"=>"usd",
"source"=>$token,
"description"=>$token,




));

  if($data){
$fname=$_POST['firstName'];
$lname=$_POST['lastName'];
$mail=$_POST['email'];
$add=$_POST['address'];
$mobile=$_POST['mobile'];
$zip=$_POST['zip'];
$country=$_POST['country'];
$state=$_POST['state'];
$Sdate = date('Y-m-d');
 $insert_query = "insert into `order_manager` (Cus_id,First_name,Last_name,Mail,Address,Mobile,Country,State,Zip,Grand_total,token,Status,date) values ($cus_id,'$fname','$lname','$mail','$add','$mobile','$country','$state','$zip','$Grandtotal','$token','Processing','$Sdate')";
  $result = mysqli_query($con,$insert_query);
  if ($result)
  {
        $order_id=mysqli_insert_id($con);               
        $insert=" INSERT INTO `orders`(`Order_id`,`Pro_id`, `Item_name`, `Item_quantity`, `Item_price`, `subtotal`) VALUES (?,?,?,?,?,?)";
        $stmt=mysqli_prepare($con,$insert);
        if ($stmt) 
        {
        	mysqli_stmt_bind_param($stmt,"iissss",$order_id,$Pro_id,$productname,$product_qty, $productprice,$total);
        	foreach($_SESSION['cart'] as $key => $values)
        	{
        		$Pro_id=$values['Pro_id'];
        		$select_query = "select * from `products` where Pro_id=$Pro_id";
				$result = mysqli_query($con,$select_query);
				$row = mysqli_fetch_assoc($result);
				 $productname=$row['product_name'];
				  $productprice=$row['product_price'];
        		$product_qty=$values['Pro_qty'];
        		$product_qtydatabase=$row['product_quantity'];
        		 $total=$product_qty*$productprice;

        		mysqli_stmt_execute($stmt);


        		$final_qty=$product_qtydatabase-$product_qty;
        		$update_q = "update `products` set product_quantity=$final_qty where Pro_id=$Pro_id";
				$results=mysqli_query($con,$update_q);

        		unset($_SESSION['cart']);
        		 echo"<script>window.open('./success.php','_self')</script>";

        	}
     }

      
    }
    else
    {
    	 echo"<script>alert('Order Failed')</script>";

    }
 }
    else
    {

    }

}
else
{
	 echo"<script>alert('Order Failed!! Try Again with Valid Order Information')</script>";
}
?>




