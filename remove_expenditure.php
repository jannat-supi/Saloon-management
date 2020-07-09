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
  <title>remove_expn</title>
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
<center><h2 style="margin-top: 50px; color: black; font-size: 70px; font-style: italic; font-weight: bold; font-family: Verdana;">BIG CUT GENTS PARLOUR</h2></br></center>
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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    	<a class="navbar-brand" href="manager.php"><i class="fa fa-dashboard"></i>Dashboard</a>
		<a class="navbar-brand" href="Expenditure.php"><i class="fa fa-shopping-bag"></i>Expenditure</a>
		<a class="navbar-brand" href="#"><i class="fa fa-trash"></i>Remove Expenditure</a>
	  </div>
	  
	  <div>
	    <ul class="nav navbar-nav navbar-right">
			<li><a href="Add_expn.php"><i class="fa fa-shopping-bag"></i>Add Expenditure</i></a></li>
			<li><a href="up_expn.php"><i class="fa fa-edit"></i>Update Expenditure</a></li>
		</ul>	
	  </div>
	  
  </div>
</nav>

<?php

					if(isset($_REQUEST['delete']))
					{
						$date= $_REQUEST["date"];
						$sql = "DELETE FROM `expenditure` WHERE date='$date'" ;
						mysqli_query($conn,$sql);
						
						
					}
			?>




<div class="container w3-mobile">
  
    <div class="row">
    	<div class="entry">
    		<form action="remove_expenditure.php">
    			<label for="date">Date</label>
    <select name="date">
			<option value=""></option>
			<?php 
				$query = "SELECT * FROM `expenditure`ORDER BY `date`";
				$result = mysqli_query($conn,$query);
				while ($row = mysqli_fetch_array($result))
				{
						$date=$row['date'];
						$month = date("F",strtotime($date));
						echo "<option value='" . $row['date']."'>". $row['date'] .'->'. $month ."</option>";
				}
			?>
			
			</select>

      <input type="submit" name="delete" value="Delete">
    </div>
 
    </div>
</body>
</html>