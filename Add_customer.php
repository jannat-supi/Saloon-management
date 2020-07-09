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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>add_customer</title>
<head>
  <link rel="stylesheet" type="text/css" href="Add_customer.css">
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
    	<a class="navbar-brand" href="manager.php"><i class="fa fa-dashboard"></i>Dashboard</a>
		<a class="navbar-brand" href="customer.php"><i class="fa fa-address-book"></i>Customer Details</a>
		<a class="navbar-brand" href="Add_customer.php"><i class="glyphicon glyphicon-user"></i>Add Customer</a>
	  </div>
	  <ul class="nav navbar-nav navbar-right">
		  <li><a href="up_cust.php"><i class="fa fa-edit"></i>Update Customer</a></li>
		  <li><a href="customer_remove.php"><i class="fa fa-trash"></i>Remove Customer</a></li>
      </ul>
  </div>
</nav>

<?php
				
					if(isset($_REQUEST['add']))
					{
						$customer_name= $_REQUEST["customer_name"];
						$address=$_REQUEST["address"];
						$mobile_no=$_REQUEST["phone_num"];
						$sql = "INSERT INTO `customer_info`(`customer_name`, `address`, `mobile_no`) VALUES ('$customer_name','$address','$mobile_no')";
						mysqli_query($conn,$sql);
						
						
					}
					?>

<div class="container w3-mobile">
  <div class="row">
    <div class="entry">
      <form action="Add_customer.php">
    <label for="name">Customer Name</label>
    <input type="text" id="fname" name="customer_name" placeholder="...." pattern="[a-zA-Z+\s]{3,}" required />
    <label for="address">Address</label>
    <input type="text" id="address" name="address" placeholder="...." pattern="[a-zA-Z0-9-_\.\,+\s]{5,}" required />
    <label for="phone">Phone No.</label>
    <input type="tel" id="telNo" name="phone_num" placeholder="...." pattern="[0-9]{3}[0-9]{4}[0-9]{4}" required />
    
    <input type="submit" name="add" value="Add">
    </form>
  </div>
</div>
</div>
      

</body>
</html>