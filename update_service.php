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
  <title>update_service</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>
  <link rel="stylesheet" type="text/css" href="update_service.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body background="salon1.png">
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
		<a class="navbar-brand" href="service.php"><i class="fa fa-address-book"></i>Service Details</a>
		<a class="navbar-brand" href="#"><i class="fa fa-edit"></i>Update Services</a>
	  </div>
	  <ul class="nav navbar-nav navbar-right">
		  <li><a href="add_service.php"><i class="fa fa-edit"></i>Add Service</a></li>
		  <li><a href="remove_service.php"><i class="fa fa-trash"></i>Remove Service</a></li>
      </ul>
  </div>
</nav>

<?php
				
					if(isset($_REQUEST['update']))
					{
						
						$service_id= $_REQUEST["scode"];
						$edit_sql="SELECT * FROM `service` where `service_id`='$service_id'";
						$res = mysqli_query($conn,$edit_sql);
						$row = mysqli_fetch_array($res);
						$service_code_1=$row['service_code'];
						$service_type_1=$row['service_type'];
						$service_name_1=$row['service_name'];
						$price_rate_1=$row['price_rate'];
						$service_code=$_REQUEST["sercode"];
						$service_type=$_REQUEST["stype"];
						$service_name=$_REQUEST["sname"];
						$price_rate=$_REQUEST["price"];
						if((null !== $service_code)&&(null == $service_type)&&(null == $service_name)&&(null == $price_rate))
						{
						    $service_type_1=$row['service_type'];
							$service_name_1=$row['service_name'];
							$price_rate_1=$row['price_rate'];
							$sql ="UPDATE `service` SET `service_code`='$service_code',`service_type`='$service_type_1',`service_name`='$service_name_1',`price_rate`='$price_rate_1' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $service_code)&&(null !== $service_type)&&(null == $service_name)&&(null == $price_rate))
						{
						    $service_type_1=$row['service_code'];
							$service_name_1=$row['service_name'];
							$price_rate_1=$row['price_rate'];
							$sql ="UPDATE `service` SET `service_code`='$service_code_1',`service_type`='$service_type',`service_name`='$service_name_1',`price_rate`='$price_rate_1' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $service_code)&&(null == $service_type)&&(null !== $service_name)&&(null == $price_rate))
						{
							$service_code_1=$row['service_code'];
							$service_type_1=$row['service_type'];
						    $price_rate_1=$row['price_rate'];
							$sql2 ="UPDATE `service` SET `service_code`='$service_code_1',`service_type`='$service_type_1',`service_name`='$service_name',`price_rate`='$price_rate_1' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql2);
						}
						else if((null == $service_code)&&(null == $service_type)&&(null == $service_name)&&(null !== $price_rate))
						{
							$service_code_1=$row['service_code'];
							$service_type_1=$row['service_type'];
						    $service_name_1=$row['service_name'];
							$sql2 ="UPDATE `service` SET `service_code`='$service_code_1',`service_type`='$service_type_1',`service_name`='$service_name_1',`price_rate`='$price_rate' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql2);
						}
						else if((null !== $service_code)&&(null !== $service_type)&&(null == $service_name)&&(null == $price_rate))
						{
							$service_name_1=$row['service_name'];
							$price_rate_1=$row['price_rate'];
							$sql2 ="UPDATE `service` SET `service_code`='$service_code',`service_type`='$service_type',`service_name`='$service_name_1',`price_rate`='$price_rate_1' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql2);
						}
						else if((null == $service_code)&&(null !== $service_type)&&(null !== $service_name)&&(null == $price_rate))
						{
							$service_code_1=$row['service_code'];
							$price_rate_1=$row['price_rate'];
							$sql2 ="UPDATE `service` SET `service_code`='$service_code_1',`service_type`='$service_type',`service_name`='$service_name',`price_rate`='$price_rate_1' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql2);
						}
						else if((null !== $service_code)&&(null == $service_type)&&(null !== $service_name)&&(null == $price_rate))
						{
							$service_type_1=$row['service_type'];
							$price_rate_1=$row['price_rate'];
							$sql2 ="UPDATE `service` SET `service_code`='$service_code',`service_type`='$service_type_1',`service_name`='$service_name',`price_rate`='$price_rate_1' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql2);
						}
						else if((null !== $service_code)&&(null == $service_type)&&(null == $service_name)&&(null !== $price_rate))
						{
							$service_type_1=$row['service_type'];
							$service_name_1=$row['service_name'];
							$sql2 ="UPDATE `service` SET `service_code`='$service_code',`service_type`='$service_type_1',`service_name`='$service_name_1',`price_rate`='$price_rate' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql2);
						}
						else if((null == $service_code)&&(null !== $service_type)&&(null == $service_name)&&(null !== $price_rate))
						{
							$service_code_1=$row['service_code'];
							$service_name_1=$row['service_name'];
							$sql2 ="UPDATE `service` SET `service_code`='$service_code_1',`service_type`='$service_type',`service_name`='$service_name'_1,`price_rate`='$price_rate' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql2);
						}
						else if((null == $service_code)&&(null == $service_type)&&(null !== $service_name)&&(null !== $price_rate))
						{
							$service_code_1=$row['service_code'];
							$service_type_1=$row['service_type'];
							$sql2 ="UPDATE `service` SET `service_code`='$service_code_1',`service_type`='$service_type_1',`service_name`='$service_name',`price_rate`='$price_rate' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql2);
						}
						else if((null !== $service_code)&&(null !== $service_type)&&(null !== $service_name)&&(null == $price_rate))
						{
							$price_rate_1=$row['price_rate'];
							$sql2 ="UPDATE `service` SET `service_code`='$service_code',`service_type`='$service_type',`service_name`='$service_name',`price_rate`='$price_rate_1' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql2);
						}
						else if((null !== $service_code)&&(null !== $service_type)&&(null == $service_name)&&(null !== $price_rate))
						{
							$service_name_1=$row['service_name'];
							$sql2 ="UPDATE `service` SET `service_code`='$service_code',`service_type`='$service_type',`service_name`='$service_name_1',`price_rate`='$price_rate' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql2);
						}
						else if((null == $service_code)&&(null !== $service_type)&&(null !== $service_name)&&(null !== $price_rate))
						{
							$service_code_1=$row['service_code'];
							$sql2 ="UPDATE `service` SET `service_code`='$service_code_1',`service_type`='$service_type',`service_name`='$service_name',`price_rate`='$price_rate' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql2);
						}
						else if((null !== $service_code)&&(null !== $service_type)&&(null !== $service_name)&&(null !== $price_rate))
						{
							$sql2 ="UPDATE `service` SET `service_code`='$service_code',`service_type`='$service_type',`service_name`='$service_name',`price_rate`='$price_rate' WHERE `service_id`='$service_id'";
							mysqli_query($conn,$sql2);
						}
					
						
					}

					?>

<div class="container w3-mobile">
	<div class="row">
    	<div class="entry">
	  <form action="update_service.php">
			<label for="scode">Select Service-</label>
			<select name="scode" required/>
			<option value=""></option>
			<?php 
				$query = "SELECT * FROM `service`ORDER BY `service_code`";
				$result = mysqli_query($conn,$query);
				while ($row = mysqli_fetch_array($result))
				{
						echo "<option value='" . $row['service_id']."'>". $row['service_code'] .'->'. $row['service_name'] .'->'. $row['service_type'] .'->'. $row['price_rate'] ."</option>";
				}
			?>
			
			</select>
			<label for="scode">Service-Code</label>
		<input type="number" id="code" name="sercode" placeholder="">
		<label for="stype">Service-Type</label>
		<select><option value=""></option></select>
		<label for="sname">Service-Name</label>
		<input type="text" id="sname" name="sname" placeholder="" pattern="[a-zA-Z+\s]{3,}">
		   <label for="price">Price-rate</label>
		<input type="number" id="price" name="price" placeholder="" pattern="[0-9]">
		<center><input type="submit" name="update" value="Update"></center>
	  </form>
	</div>
	 </div>
	</div>

</body>
</html>