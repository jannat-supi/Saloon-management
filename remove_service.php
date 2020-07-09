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
  <title>remove_service</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="add_service.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
		<a class="navbar-brand" href="#"><i class="fa fa-trash"></i>Remove Services</a>
	  </div>
	  <ul class="nav navbar-nav navbar-right">
		  <li><a href="add_service.php"><i class="fa fa-edit"></i>Add Service</a></li>
		  <li><a href="update_service.php"><i class="fa fa-edit"></i>Update Service</a></li>
      </ul>
  </div>
</nav>

<?php

					if(isset($_REQUEST['remove']))
					{
						$service_id= $_REQUEST["sname"];
						$sql = "DELETE FROM `service` WHERE service_id='$service_id'" ;
						mysqli_query($conn,$sql);
						
						
					}
			?>

<div class="container w3-mobile">
  
    <div class="row">
    	<div class="entry">
    		 <form action="remove_service.php">
    	<label for="uname">Service Code</label>
		<select name="sname">
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
     
      <input type="submit" name="remove" value="Remove">
  </form>
    </div>
</div>
</div>

</body>
</html>