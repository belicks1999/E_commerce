<div class="container-fluid mt-3">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php

                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'Pro_id');

$select_query = "select * from `products`";
$result = mysqli_query($con,$select_query);


                        
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['Pro_id'] == $id){
                                    cartElement($row['product_img1'], $row['product_name'],$row['product_price'], $row['Pro_id']);
                                   
                                    $total = $total + (int)$row['product_price'];



                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Total Amount</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>LKR <?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>LKR <?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

function selectcate(){


global $con;
$select_cate = "select * from `categories`";
$result_cate = mysqli_query($con,$select_cate);
//$row_data = mysqli_fetch_assoc($result_cate );
//echo $row_data['Category_name'] ;

while ($row_data = mysqli_fetch_assoc($result_cate )) {
    $cate_name = $row_data['Category_name'] ;
    $cate_id = $row_data['Cat_id'] ;
    echo "  <li class='nav-item bg-secondary'>
        <a href='products.php?category=$cate_id' class='nav-link text-light'>$cate_name</a>
    </li>";
}



}





//cart function
function cart(){

if (isset($_GET['add_to_cart'])) {
    if (isset($_SESSION['username'])) {
if(isset($_SESSION['cart'])) {
$pid=array_column($_SESSION['cart'], 'Pro_id');
if (!in_array($_GET['add_to_cart'], $pid)) {
    $index=count($_SESSION['cart']);
    $item = array(
        'Pro_id'=>$_GET['add_to_cart'],
       
        
);
    $_SESSION['cart'][$index]=$item;
    echo"<script>alert('Item is added to cart')</script>";


}
else{
    echo"<script>alert('Item already added')</script>";
}



}
else
{
    $item = array(
        'Pro_id'=>$_GET['add_to_cart'],
        
       
);
    $_SESSION['cart'][0]=$item;
    echo"<script>alert('Item is added to cart')</script>";

}

}
else{
    echo"<script>alert('Please Login')</script>";
    echo"<script>window.open('./user_area/user_login.php','_self')</script>";
}
}

}




//get cart number
function cart_item(){

if (isset($_SESSION['username'])) {


    if(isset($_SESSION['cart'])) {


 if (isset($_GET['add_to_cart'])) {
    $count=count($_SESSION['cart']);
    echo '<meta http-equiv=Refresh content="0;url=products.php?reload=1">';

  
 echo"$count";



 }
 else
 {
    $count=count($_SESSION['cart']);

   echo"$count"; 
 }


}
else
{
    echo"";
}


}
}


// total cart price function
function total_cart(){
    global $con;
     $total = 0;
     
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'Pro_id');

$select_query = "select * from `products`";
$result = mysqli_query($con,$select_query);

                        
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['Pro_id'] == $id)
                                    {  $row['product_price'];
                                   
                                    $total = $total + (int)$row['product_price'];
                                }
                                  
                            }
                        }
    echo $total;

}
}





function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=./Admin/product_images/$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller:Easy Super Market </small>
                                <h5 class=\"pt-2\">LKR $productprice</h5>
                                <button type=\"submit\" class=\"btn btn-warning\" name=\"update\">Update</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>


                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    
                                    <input type=\"number\" value=\"1\" class=\"form-control w-50 d-inline\" name=\"quantity\"id=\"number\"min=\"1\" >
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;

}

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
                        $product_qty=$value['Pro_qty'];
                        $total=$product_qty*$productprice;