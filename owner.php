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

<head>

<link rel="stylesheet" type="text/css" href="owner.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body background="salon1.png">

<center><h2 style="margin-top: 50px; color: black; font-size: 70px; font-style: italic; font-weight: bold; font-family: Verdana;">BIG CUT GENTS PARLOUR</h2></br></center>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><i class="fa fa-dashboard"></i>Dashboard</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="profile.php"><i class="fa fa-user"></i>User Profile</a></li>
      <?php
					if(isset($_SESSION['email']))
					{
						$email=$_SESSION['email'];
						$sql2="SELECT * FROM `user` where `email`='$email'";
						$res2 = mysqli_query($conn,$sql2);
						$data = mysqli_fetch_array($res2);
						$type=$data['user_type'];
						if($type=="owner")
						{
							echo '<li><a href="logout.php"><i class="fa fa-sign-out"></i>logout</a></li>';
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
    </ul>
  </div>
</nav> 

<div class="w3-container w3-mobile">
	<a href="record.php"><button class="butnone w3-mobile w3-teal"><i class="fa fa-edit"></i><br>Daily<br>Worklist</button></a>
	<a href="history.php"><button class="butntwo w3-mobile w3-teal"><i class="fa fa-history"></i><br>Accounting<br> History</button></a>
	<a href="employee.php"><button class="butn3 w3-mobile w3-teal"><i class="fa fa-address-book"></i><br>Employee<br> Details</button></a>
	<a href="owner_customer.php"><button class="butn4 w3-mobile w3-teal"><i class="fa fa-address-book"></i><br>Customer<br> Details</button></a>
	<a href="owner_service.php"><button class="butn5 w3-mobile w3-teal"><i class="fa fa-sticky-note"></i><br>Service<br> Details</button></a>
	<a href="user_info.php"><button class="butn6 w3-mobile w3-teal"><i class="glyphicon glyphicon-user"></i><br>User<br> Details</button></a>
</div>
</body>
</html>