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
  <title>update_expenditure</title>
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
<center><h2 style="margin-top: 20px; color: black; font-size: 70px; font-style: italic; font-weight: bold; font-family: Verdana;">BIG CUT GENTS PARLOUR</h2></br></center>
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
		<a class="navbar-brand" href="expenditure.php"><i class="fa fa-address-book"></i>Expenditure</a>
		<a class="navbar-brand" href="#"><i class="fa fa-edit"></i>Update Expenditure</a></li>
      </ul>
	  </div>
	  <ul class="nav navbar-nav navbar-right">
		  <li><a href="Add_expn.php"><i class="fa fa-address-book"></i>Add Expenditure</a></li>
		  <li><a href="remove_expenditure.php"><i class="fa fa-trash"></i>Remove Expenditure</a></li>
      </ul>
  </div>
</nav>
<?php
				
					if(isset($_REQUEST['update']))
					{
						
						$date= $_REQUEST["date"];
						$edit_sql="SELECT * FROM `expenditure` where `date`='$date'";
						$res = mysqli_query($conn,$edit_sql);
						$row = mysqli_fetch_array($res);
						$rent_1=$row['rent'];
						$electricity_bill_1=$row['electricity_bill'];
						$blade_1=$row['blade'];
						$rezar_1=$row['rezar'];
						$medicine_1=$row['medicine'];
						$total=$row['total'];
						$rent=$_REQUEST["rent"];
						$electricity_bill=$_REQUEST["electricity_bill"];
						$blade= $_REQUEST["blade"];
						$rezar= $_REQUEST["rezar"];
						$medicine= $_REQUEST["medicine"];
						if((null !== $rent)&&(null == $electricity_bill)&&(null == $blade)&&(null == $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1;
							$total_2=$total_1+$rent;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill_1',`blade`='$blade_1',`rezar`='$rezar_1',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null !== $electricity_bill)&&(null == $blade)&&(null == $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$electricity_bill_1;
							$total_2=$total_1+$electricity_bill;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill',`blade`='$blade_1',`rezar`='$rezar_1',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null == $electricity_bill)&&(null !== $blade)&&(null == $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$blade_1;
							$total_2=$total_1+$blade;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill_1',`blade`='$blade',`rezar`='$rezar_1',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null == $electricity_bill)&&(null == $blade)&&(null !== $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rezar_1;
							$total_2=$total_1+$rezar;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill_1',`blade`='$blade_1',`rezar`='$rezar',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null == $electricity_bill)&&(null == $blade)&&(null == $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$medicine_1;
							$total_2=$total_1+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill_1',`blade`='$blade_1',`rezar`='$rezar_1',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null !== $electricity_bill)&&(null == $blade)&&(null == $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$electricity_bill_1;
							$total_2=$total_1+$rent+$electricity_bill;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill',`blade`='$blade_1',`rezar`='$rezar_1',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null == $electricity_bill)&&(null !== $blade)&&(null == $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$blade_1;
							$total_2=$total_1+$rent+$blade;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill_1',`blade`='$blade',`rezar`='$rezar_1',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null == $electricity_bill)&&(null == $blade)&&(null !== $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$rezar_1;
							$total_2=$total_1+$rent+$rezar;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill_1',`blade`='$blade_1',`rezar`='$rezar',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null == $electricity_bill)&&(null == $blade)&&(null == $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$medicine_1;
							$total_2=$total_1+$rent+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill_1',`blade`='$blade_1',`rezar`='$rezar_1',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null !== $electricity_bill)&&(null !== $blade)&&(null == $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$electricity_bill_1-$blade_1;
							$total_2=$total_1+$electricity_bill+$blade;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill',`blade`='$blade',`rezar`='$rezar_1',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null !== $electricity_bill)&&(null == $blade)&&(null !== $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$electricity_bill_1-$rezar_1;
							$total_2=$total_1+$electricity_bill+$rezar;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill',`blade`='$blade_1',`rezar`='$rezar',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null !== $electricity_bill)&&(null == $blade)&&(null == $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$electricity_bill_1-$medicine_1;
							$total_2=$total_1+$electricity_bill+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill',`blade`='$blade_1',`rezar`='$rezar_1',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null == $electricity_bill)&&(null !== $blade)&&(null !== $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$blade_1-$rezar_1;
							$total_2=$total_1+$blade+$rezar;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill_1',`blade`='$blade',`rezar`='$rezar',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null == $electricity_bill)&&(null !== $blade)&&(null == $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$blade_1-$medicine_1;
							$total_2=$total_1+$blade+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill_1',`blade`='$blade',`rezar`='$rezar_1',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null == $electricity_bill)&&(null == $blade)&&(null !== $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rezar_1-$medicine;
							$total_2=$total_1+$rezar+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill_1',`blade`='$blade_1',`rezar`='$rezar',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null !== $electricity_bill)&&(null !== $blade)&&(null == $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$electricity_bill_1-$blade_1;
							$total_2=$total_1+$rent+$electricity_bill+$blade;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill',`blade`='$blade',`rezar`='$rezar_1',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null !== $electricity_bill)&&(null == $blade)&&(null !== $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$electricity_bill_1-$rezar_1;
							$total_2=$total_1+$rent+$electricity_bill+$rezar;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill',`blade`='$blade_1',`rezar`='$rezar',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null !== $electricity_bill)&&(null == $blade)&&(null == $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$electricity_bill_1-$medicine_1;
							$total_2=$total_1+$rent+$electricity_bill+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill',`blade`='$blade_1',`rezar`='$rezar_1',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null == $electricity_bill)&&(null !== $blade)&&(null !== $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$blade_1-$rezar_1;
							$total_2=$total_1+$rent+$blade+$rezar;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill_1',`blade`='$blade',`rezar`='$rezar',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null == $electricity_bill)&&(null !== $blade)&&(null == $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$blade_1-$medicine_1;
							$total_2=$total_1+$rent+$blade+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill_1',`blade`='$blade',`rezar`='$rezar_1',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null == $electricity_bill)&&(null == $blade)&&(null !== $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$rezar_1-$medicine_1;
							$total_2=$total_1+$rent+$rezar+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill_1',`blade`='$blade_1',`rezar`='$rezar',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null !== $electricity_bill)&&(null !== $blade)&&(null !== $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$electricity_bill_1-$blade_1-$rezar_1;
							$total_2=$total_1+$electricity_bill+$blade+$rezar;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill',`blade`='$blade',`rezar`='$rezar',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null !== $electricity_bill)&&(null !== $blade)&&(null == $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$electricity_bill_1-$blade_1-$medicine;
							$total_2=$total_1+$electricity_bill+$blade+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill',`blade`='$blade',`rezar`='$rezar_1',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null !== $electricity_bill)&&(null == $blade)&&(null !== $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$electricity_bill_1-$rezar_1-$medicine_1;
							$total_2=$total_1+$electricity_bill+$rezar+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill',`blade`='$blade_1',`rezar`='$rezar',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null == $electricity_bill)&&(null !== $blade)&&(null !== $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$blade_1-$rezar_1-$medicine_1;
							$total_2=$total_1+$blade+$rezar+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill_1',`blade`='$blade',`rezar`='$rezar',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null !== $electricity_bill)&&(null !== $blade)&&(null !== $rezar)&&(null == $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$electricity_bill_1-$blade_1-$rezar_1;
							$total_2=$total_1+$rent+$electricity_bill+$blade+$rezar;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill',`blade`='$blade',`rezar`='$rezar',`medicine`='$medicine_1',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null !== $electricity_bill)&&(null !== $blade)&&(null == $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$electricity_bill_1-$blade_1-$medicine_1;
							$total_2=$total_1+$rent+$electricity_bill+$blade+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill',`blade`='$blade',`rezar`='$rezar_1',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null !== $electricity_bill)&&(null == $blade)&&(null !== $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$electricity_bill_1-$rezar_1-$medicine_1;
							$total_2=$total_1+$rent+$electricity_bill+$rezar+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill',`blade`='$blade_1',`rezar`='$rezar',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null == $electricity_bill)&&(null !== $blade)&&(null !== $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$blade_1-$rezar_1-$medicine_1;
							$total_2=$total_1+$rent+$blade+$rezar+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill_1',`blade`='$blade',`rezar`='$rezar',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null == $rent)&&(null !== $electricity_bill)&&(null !== $blade)&&(null !== $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$electricity_bill_1-$blade_1-$rezar_1-$medicine_1;
							$total_2=$total_1+$electricity_bill+$blade+$rezar+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent_1',`electricity_bill`='$electricity_bill',`blade`='$blade',`rezar`='$rezar',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $rent)&&(null !== $electricity_bill)&&(null !== $blade)&&(null !== $rezar)&&(null !== $medicine))
						{
							$rent_1=$row['rent'];
							$electricity_bill_1=$row['electricity_bill'];
							$blade_1=$row['blade'];
							$rezar_1=$row['rezar'];
							$medicine_1=$row['medicine'];
							$total=$row['total'];
							$total_1=$total-$rent_1-$electricity_bill_1-$blade_1-$rezar_1-$medicine_1;
							$total_2=$total_1+$rent+$electricity_bill+$blade+$rezar+$medicine;
							$sql ="UPDATE `expenditure` SET `rent`='$rent',`electricity_bill`='$electricity_bill',`blade`='$blade',`rezar`='$rezar',`medicine`='$medicine',`total`='$total_2' WHERE `date`='$date'";
							mysqli_query($conn,$sql);
						}
						
					
						
					}
?>

<div class="container w3-mobile">
    <div class="row">
    	<div class="entry">
	  <form action="up_expn.php">
			 <label for="date">Date</label>
		<select name="date" required/>
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
			<label for="rent">Rent</label>
    <input type="number" name="rent" placeholder="" pattern="[0-9]">
       <label for="number">Electricity Bill</label>
    <input type="number" name="electricity_bill" placeholder="" pattern="[0-9]">
           <label for="number">Blade</label>
    <input type="number" name="blade" placeholder="" pattern="[0-9]">
           <label for="number">Rezar</label>
    <input type="number" name="rezar" placeholder="" pattern="[0-9]">
           <label for="number">Medicine</label>
    <input type="number" name="medicine" placeholder="" pattern="[0-9]">
		<input type="submit" name="update" value="UPDATE">
	  </form>
	</div>
</div>
</div>
     

</body>
</html>