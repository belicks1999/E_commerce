<?php

include('./includes/connect.php');
require_once('checkout.php');
 $uname = $_SESSION['username'];
            $img="select * from customer where Username='$uname'";
            $result_img=mysqli_query($con,$img);
            $row=mysqli_fetch_array($result_img);
            $cus_id=$row['Cus_id'];




if(isset($_POST['pay'])){
$fname=$_POST['firstName'];
$lname=$_POST['lastName'];
$mail=$_POST['email'];
$add=$_POST['address'];
$mobile=$_POST['mobile'];
$zip=$_POST['zip'];
$country=$_POST['country'];
$state=$_POST['state'];
 $insert_query = "insert into `order_manager` (Cus_id,First_name,Last_name,Mail,Address,Mobile,Country,State,Zip,Grand_total) values ($cus_id,'$fname','$lname','$mail','$add','$mobile','$country','$state','$zip','$Grandtotal')";
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
        		 $total=$product_qty*$productprice;

        		mysqli_stmt_execute($stmt);
        		 echo"<script>window.open('./payment.php','_self')</script>";

        	}

        	



        	  echo"<script>alert('Item is added to cart')</script>";
        }
        else
        {
        	echo"<h2>Failled</h2>";
        }



  }
  else
  {

  }
}


?>
