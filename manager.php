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
<link rel="stylesheet" type="text/css" href="manager.css">
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
						if($type=="manager")
						{
							echo '<li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>';
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

<a href="voucher.php"><button class="butnone"><i class="fa fa-edit"></i><br>Daily<br> Voucher</button></a>
<a href="customer.php"><button class="butntwo"><i class="fa fa-address-book"></i><br>Customer<br> Details</button></a>
<a href="service.php"><button class="butn3"><i class="fa fa-sticky-note"></i><br>Service<br> Details</button></a>
<a href="Expenditure.php"><button class="butn4"><i class="fa fa-shopping-bag"></i><br>Total<br>Expenditure</button></a>


</body>
</html>