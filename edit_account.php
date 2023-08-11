<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Account</title>
	<style type="text/css">
		.img{
	width: 100px ;
	object-fit: contain;}
	</style>
</head>
<body>
	<h3 class="text-center text-success mb-4">EDIT ACCOUNT</h3>
	<form method="post" enctype="multipart/form-data" class="text-center">
		<div class="form-outline mb-4">

			<input type="text" name="username" value="<?php echo $user_name?>" class="form-control w-50 m-auto" required>
 
		</div>
		<div class="form-outline mb-4">

			<input type="text" value="<?php echo $user_email?>" name="email" class="form-control w-50 m-auto" required>
 
		</div>
		<div class="form-outline mb-4">

			<input type="file" name="image" class="form-control w-50 m-auto">
			 <img src="./Images/<?php echo $user_image?>" class="img" >
 
		</div>
		<div class="form-outline mb-4">

			<input type="text" value="<?php echo $user_address?>" name="address" class="form-control w-50 m-auto" required>
 
		</div>
		<div class="form-outline mb-4">

			<input type="text" value="<?php echo $user_mobile?>" name="mobile" class="form-control w-50 m-auto" required>
 
		</div>
		<input type="submit" name="update" class="bg-danger py-2 px-3 text-light border-0 m-auto" value="Update" required>
	</form>

	<?php
	if (isset($_POST['update'])) {
	if(!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
		$uid = $user_id;
		$uname = $_POST['username'];
		$uaddress=$_POST['address'];
		$umobile=$_POST['mobile'];
		
		$uemail=$_POST['email'];
		

		$update_q = "update `customer` set Name='$uname',Address='$uaddress',Email='$uemail',Mobile='$umobile' where Cus_id='$uid'";
		 $result=mysqli_query($con,$update_q);
		 if ($result) {
		 	echo"<script>alert('Upadte Successfull')</script>";
		 	  echo"<script>window.open('./user_profile.php','_self')</script>";
		 }
		 else
		 {
		 	echo"<script>alert('Update Failled')</script>";
		 }
	}
	else
	{
		$uid = $user_id;
		$uname = $_POST['username'];
		$uaddress=$_POST['address'];
		$umobile=$_POST['mobile'];
		$uimg=$_FILES['image']['name'];
		$uimg_tmp=$_FILES['image']['tmp_name'];
		$uemail=$_POST['email'];
		move_uploaded_file($uimg_tmp,"./images/$uimg");

		$update_q = "update `customer` set Name='$uname',Address='$uaddress',Email='$uemail',Mobile='$umobile',Cus_img='$uimg' where Cus_id='$uid'";
		 $result=mysqli_query($con,$update_q);
		 if ($result) {
		 	echo"<script>alert('Upadte Successfull')</script>";
		 	  echo"<script>window.open('./user_profile.php','_self')</script>";
		 }
		 else
		 {
		 	echo"<script>alert('Update Failled')</script>";
		 }
		

	}
	}

	?>

</body>
</html>