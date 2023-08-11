<!--connect Database-->
<?php
include('./includes/connect.php');


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!--Boostrap Css Link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
     rel="stylesheet"
     integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
     crossorigin="anonymous">

     <!--Css Link-->
    <link rel="stylesheet" type="text/css" href="../style.css">
    <!--Font Awesome Link-->

    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <style type="text/css">
        .cols {
           background: linear-gradient(90deg, rgba(6,0,0,1) 9%, rgba(204,5,5,1) 77%);
 
}

.progress {
  height: 8px;
}

.progress-info {
  font-size: 14px;
}

.access-data {
  font-size: 11px;
}

.progress-bar {
  background-color: #3656DC;
}

.btn-primary, .btn-primary:active, .btn-primary:visited, .btn-primary:focus {
  background-color: #3656DC;
  border-color: #3656DC;
}

.btn-primary:hover {
  background-color: #2a43ad;
  border-color: #2a43ad;
}

.second{
  background: linear-gradient(90deg, rgba(51,47,47,1) 15%, rgba(153,148,148,1) 99%);
}
    </style>
</head>
<body class="">
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="subscription text-left ">
                    <h5>Subscription</h5>
                </div>
                <div class="plan p-3 cols text-light"><span>Your plan</span>
                    <div class="d-flex justify-content-between align-items-baseline align-content-center mt-2">
                        <h5>Easy Plus Pro</h5></div>
    <?php

    $uname = $_SESSION['username'];
      $img="select * from customer where Username='$uname'";
      $result_img=mysqli_query($con,$img);
      $row=mysqli_fetch_array($result_img);
      $cus_id=$row['Cus_id'];
        $query_countsub="SELECT * from subscription where Cus_id=$cus_id and status='Active'";
        $sub=mysqli_query($con,$query_countsub);
        $row_data = mysqli_fetch_assoc($sub);
        $sdate = $row_data['start_date'];
        $edate = $row_data['end_date'];
        $token=$row_data['token'];
        $today=date('Y-m-d');

        $date1 = strtotime("$today");
        $date2 = strtotime("$edate");
        $date3 = strtotime("$sdate");

        $duration = $date2 - $date3;
        $timePast = $date1-$date3;
        $completed  = floor(($timePast/$duration)*100);
        $bal=floor($completed);
        



    echo"

        <div><span class='progress-info mb-2'> $bal% Completed </span>
        <div class='progress'>
    <div class='progress-bar' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:$bal%;'>
    </div>
</div>
<span class='progress-info' mt-4>Your Subscription will be end on $edate
</span>
</div> ";





    ?>



                    
                </div>
                <div class="plan p-3 bg-light mt-2"><span class="d-block">End Subscription</span><span class="access-data d-block mb-4">Upon cancelling you will lose accesss to Easy Plus Pro and its benifits</span>
                    <form method="post">
                    <input type="submit" name="cancel" class="btn btn-danger btn-sm px-4" value="Cancel your subscription">
                    </form>


                </div>
            </div>
        </div>
    </div>
</body>

<?php
if (isset($_POST['cancel'])) {
$uname = $_SESSION['username'];
      $img="select * from customer where Username='$uname'";
      $result_img=mysqli_query($con,$img);
      $row=mysqli_fetch_array($result_img);
      $cus_id=$row['Cus_id'];

      $select_query = "update `subscription` set status='deactive' where Cus_id=$cus_id";
        $Select = mysqli_query($con,$select_query);
    if( $Select){
        echo"<script>alert('Your Subscription Has been Canceled')</script>";
        echo"<script>window.open('user_profile.php','_self')</script>";
    }
    else
    {
        echo"<script>alert('Failed Try Again')</script>";
    }


}



?>
</html>