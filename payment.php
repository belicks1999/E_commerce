<?php
include('./includes/connect.php');
session_start();
require('confique.php');

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>Payment</h1>

            <form method="post" action="submit.php">

            
        <script src="https://Checkout.Stripe.com/checkout.js" class="Stripe-button" 

             data-key="<?php echo $publish ?>"
             data-amount="<?php echo $Grandtotal * 100 ?>"
             data-currency="lkr"
             data-name="Easy Super Market"
           
             



             >
               
             </script>
             </form>
</body>
</html>