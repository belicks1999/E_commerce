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

<style type="text/css">

	body{margin-top:10px;}
  .price-innerdetail h5 {
        font-weight: 400;
        letter-spacing: 2px;
        font-size: 15px;
    }
    
    .price-innerdetail p {
        font-size: 40px;
    }
    
    .detail-pricing {
        border-bottom: 1px solid;
        padding: 30px 0 30px 0;
    }
    
    .detail-pricing .float-left {
        padding: 0 0 0 40px;
    }
    
    .detail-pricing .float-left i {
        position: absolute;
        left: 0;
        font-size: 20px;
    }
    
    .detail-pricing span {
        display: inline-block;
        position: relative;
        font-weight: 400;
    }
    
    .wrap-price {
        background: rgba(32, 33, 36, .1);
        padding: 50px 20px 50px;
        border-radius: 10px;
    }
    
    .center-wrap {
        background: #070707;
        color: #fff;
    }
    .back{
 background: linear-gradient(90deg, rgba(11,11,11,1) 19%, rgba(232,70,70,1) 71%);
}
</style>
</head>
<body class="back">
<section id="price-sectionv " align="center">
    <div class="container" align="center">
        
        <div class="row pt-5 d-flex  justify-content-center">
            
            <div class="col-lg-4 col-md-offset-3 pb-5 pb-lg-0" align="center">
                <div class="wrap-price center-wrap">
                    <div class="price-innerdetail text-center">
                        <h4>Easy Plus Pro</h4>
                        <p class="prices">LKR 1000/Month</p>
                        <div class="detail-pricing">
                            <span class="float-left"> <i class="bi bi-check2-circle"></i> Get Free Delivery for All Orders </span>
                            
                        </div>
                        <div class="detail-pricing">
                            <span class="float-left"> <i class="bi bi-check2-circle text-center"></i> Easy Free Return</span>
                            
                        </div>
                        <div class="detail-pricing">
                            <span class="float-left"> <i class="bi bi-check2-circle text-center"></i> Priority Service</span>
                            
                        </div>

                   			<form method="post" action="sub_pay.php" class="mt-5">
           <script src="https://Checkout.Stripe.com/checkout.js" class="stripe-button " 

             data-key="<?php echo $publish ?>"
             data-amount="100000"
             data-currency="lkr"
             data-name="Easy Super Market"
           
             >
               
             </script>
       </form>
</body>
                    </div>
                </div>
            </div>
            
                           
                        
                
       
</section>
     
</html>