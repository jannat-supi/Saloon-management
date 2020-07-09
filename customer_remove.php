<?php
	include 'database_connect.php';
?>
<!DOCTYPE html>
<html>
  <title>remove_customer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel="stylesheet" type="text/css" href="customer_remove.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body background="comb2.png">
<?php
					session_start();
					if(isset($_SESSION['email']))
					{
						echo '';
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
		<a class="navbar-brand" href="customer_remove.php"><i class="fa fa-trash"></i>Remove Customer</a>
	  </div>
	  
	  <div>
	    <ul class="nav navbar-nav navbar-right">
			<li><a href="Add_customer.php"><i class="fa fa-user"></i>Add Customer</a></li>
			<li><a href="up_cust.php"><i class="fa fa-edit"></i>Update Customer</a></li>
		</ul>	
	  </div>
	  
  </div>
</nav>

<?php

					if(isset($_REQUEST['delete']))
					{
						$Customer_id= $_REQUEST["customer_id"];
						$sql = "DELETE FROM `customer_info` WHERE customer_id='$Customer_id'" ;
						mysqli_query($conn,$sql);
						
						
					}
			?>

<div class="container w3-mobile">
    <div class="row">
    	<div class="entry">
    		<form action="customer_remove.php">
    	<label for="uname">Customer ID</label>
		<select name="customer_id">
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

      <input type="submit" name="delete" value="Remove">
      </form>
    </div>
  
    </div>
</div>
</body>
</html>