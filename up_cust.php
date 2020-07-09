<?php
	include 'database_connect.php';
	session_start();
	if(!isset($_SESSION['email']) || !isset($_SESSION['password']))
	{
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		header("location: index.php");
	}

	?>
<!DOCTYPE html>
<html>
  <title>update_customer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<head>
  <link rel="stylesheet" type="text/css" href="up_cust.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body background="comb2.png">

<?php
					if(isset($_SESSION['email']))
					{
						$email=$_SESSION['email'];
						$sql2="SELECT * FROM `user` where `email`='$email'";
						$res2 = mysqli_query($conn,$sql2);
						$data = mysqli_fetch_array($res2);
						$type=$data['user_type'];
						if($type=="manager")
						{
							echo'';
						}
						else
						{
							header("location: index.php");
							
						}

					}
					else
					{
						header("location: index.php");
						
					}
					session_write_close();
?>
 
<center><h2 style="margin-top: 50px; color: black; font-size: 70px; font-style: italic; font-weight: bold; font-family: Verdana;">BIG CUT GENTS PARLOUR</h2></br></center>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    	<a class="navbar-brand" href="manager.php"><i class="fa fa-dashboard"></i> Dashboard</a>
		<a class="navbar-brand" href="customer.php"><i class="fa fa-address-book"></i>Customer Details</a>
		<a class="navbar-brand" href="#"><i class="glyphicon glyphicon-edit"></i>Update Customer</a></li>
      </ul>
	  </div>
	  <ul class="nav navbar-nav navbar-right">
		  <li><a href="Add_customer.php"><i class="fa fa-address-book"></i>Add Customer</a></li>
		  <li><a href="customer_remove.php"><i class="fa fa-trash"></i>Remove Customer</a></li>
      </ul>
  </div>
</nav>

<?php
				
					if(isset($_REQUEST['update']))
					{
						
						$customer_id= $_REQUEST["customer_id"];
						$edit_sql="SELECT * FROM `customer_info` WHERE `customer_id`='$customer_id'";
						$res = mysqli_query($conn,$edit_sql);
						$row = mysqli_fetch_array($res);
						$customer_name_1=$row['customer_name'];
						$edit_address=$row['address'];
						$mobile_no_1=$row['mobile_no'];
						$customer_name=$_REQUEST["customer_name"];
						$address=$_REQUEST["address"];
						$mobile_no=$_REQUEST["mobile_no"];
						if((null !== $customer_name)&&(null == $address)&&(null == $mobile_no))
						{
						    $edit_address=$row['address'];
							$mobile_no_1=$row['mobile_no'];
							$sql ="UPDATE `customer_info` SET `customer_name`='$customer_name',`address`='$edit_address',`mobile_no`='$mobile_no_1' WHERE `customer_id`='$customer_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $customer_name)&&(null !== $address)&&(null == $mobile_no))
						{
							$customer_name_1=$row['customer_name'];
							$mobile_no_1=$row['mobile_no'];
							$sql2 ="UPDATE `customer_info` SET `customer_name`='$customer_name_1',`address`='$address',`mobile_no`='$mobile_no_1' WHERE `customer_id`='$customer_id'";
							mysqli_query($conn,$sql2);
						}
						else if((null == $customer_name)&&(null ==$address)&&(null !== $mobile_no))
						{
							$customer_name_1=$row['customer_name'];
							$edit_address=$row['address'];
							$sql1 ="UPDATE `customer_info` SET `customer_name`='$customer_name_1',`address`='$edit_address',`mobile_no`='$mobile_no' WHERE `customer_id`='$customer_id'";
							mysqli_query($conn,$sql1);
						}
						else if((null !== $customer_name)&&(null !==$address)&&(null == $mobile_no))
						{
							$mobile_no_1=$row['mobile_no'];
							$sql1 ="UPDATE `customer_info` SET `customer_name`='$customer_name',`address`='$address',`mobile_no`='$mobile_no_1' WHERE `customer_id`='$customer_id'";
							mysqli_query($conn,$sql1);
						}
						else if((null !== $customer_name)&&(null ==$address)&&(null !== $mobile_no))
						{
							$edit_address=$row['address'];
							$sql1 ="UPDATE `customer_info` SET `customer_name`='$customer_name',`address`='$edit_address',`mobile_no`='$mobile_no' WHERE `customer_id`='$customer_id'";
							mysqli_query($conn,$sql1);
						}
						else if((null == $customer_name)&&(null !==$address)&&(null !== $mobile_no))
						{
							$customer_name_1=$row['customer_name'];
							$sql1 ="UPDATE `customer_info` SET `customer_name`='$customer_name_1',`address`='$address',`mobile_no`='$mobile_no' WHERE `customer_id`='$customer_id'";
							mysqli_query($conn,$sql1);
						}
						else if((null !== $customer_name)&&(null !==$address)&&(null !== $mobile_no))
						{
							$sql1 ="UPDATE `customer_info` SET `customer_name`='$customer_name',`address`='$address',`mobile_no`='$mobile_no' WHERE `customer_id`='$customer_id'";
							mysqli_query($conn,$sql1);
						}
						
					}
					?>

<div class="container w3-mobile">
    <div class="row">
    	<div class="entry">
	  <form action="up_cust.php">
		<label for="customer_id">Select Customer</label>
		<select name="customer_id" required/>
			<option value=""></option>
			<?php 
				$query = "SELECT * FROM `customer_info` ORDER BY `customer_id`";
				$result = mysqli_query($conn,$query);
				while ($row = mysqli_fetch_array($result))
				{
						echo "<option value='" . $row['customer_id']."'>". $row['customer_name'] .'->'. $row['address'] .'->'. $row['mobile_no'] ."</option>";
				}
			?>
			
			</select>
		<label for="customer_name">Customer Name</label>
		<input type="text" name="customer_name" placeholder="" >
		<label for="address">Address</label>
		<input type="text" name="address" placeholder="" pattern="[a-zA-Z0-9-_\.\,+\s]{5,}">
		<label for="number">Mobile No</label>
		<input type="tel" name="mobile_no" placeholder="" pattern="[0-9]{3}[0-9]{4}[0-9]{4}">
		<input type="submit" name="update" value="UPDATE">
	  </form>
	</div>
</div>
</div>
     

</body>
</html>