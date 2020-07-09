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

  <title>view_work</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
<head>
  <link rel="stylesheet" type="text/css" href="record.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body background="comb3.png">
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
    	  <a class="navbar-brand" href="owner.php"><i class="fa fa-dashboard"></i> Dashboard</a>
      <a class="navbar-brand" href="d_record.php"><span class="fa fa-edit"></span>Daily Record</a>
	  <a class="navbar-brand" href="#"><span class="fa fa-edit"></span>View Services</a>
    </div>
  </div>
</nav>


<div class="w3-container w3-mobile">
  <!-- table start -->
  <table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-teal">
        <th>Date</th>
		<th>Employee Name</th>
		<th>Customer Name</th>
		<th>Service Name</th>
		<th>Price Rate</th>
		<th>Payable Amount</th>
		<th>Discount</th>
		<th>Owner's Income</th>
		<th>Employee's Income</th>
      </tr>
    </thead>
    <tbody>
				<?php
					if(isset($_GET['date']))
					{		
						$date=$_GET['date'];
					}
					$sql="SELECT * FROM `customer_service_info` NATURAL JOIN`Service_provider` NATURAL JOIN`service` WHERE `date`='$date'";
					$res = mysqli_query($conn,$sql);
					$sql1="SELECT * FROM `voucher` NATURAL JOIN`customer_service_info` NATURAL JOIN`customer_info` WHERE `date`='$date'";
					$res2 = mysqli_query($conn,$sql1);
					$total_emp_inc=0;
					$total_emp=0;
					$total_income=0;
					$total_own=0;
					$total_own_inc=0;
					$total_pay=0;
					while(($row = mysqli_fetch_array($res))&&($data = mysqli_fetch_array($res2)))
					{
					 $price_rate=$row['price_rate'];
					 $discount=$data['discount'];
					 if($discount==0)
					 {
						$payment=$price_rate;
					 }
					 else if($discount!=0)
					 {
						$temp=$price_rate/100;
						$tem=$temp * $discount;
						$temp2=round($tem);
						$payment=$price_rate-$temp2;
					 }
					  ?>
						<tr>
							<td>
								<?php echo $row['date'];?>
							</td>
							<td>
								<?php echo $row['service_provider_name'];?>
							</td>
							<td>
								<?php echo $data['customer_name'];?>
							</td>
							<td>
								<?php echo $row['service_name'];?>
							</td>
							<td>
								<?php echo $row['price_rate'];?>
							</td>
							<td>
								<?php echo $payment;?>
							</td>
							<td>
								<?php echo $row['discount'];?>%
							</td>
							<td>
								<?php
									$totw=$payment*0.5;
									$total_own=round($totw);
									echo "$total_own"; ?>
							</td>
							<td>
								<?php
									$totp=$payment*0.5;
									$total_emp=round($totp);
									echo "$total_emp"; ?>
							</td>
						</tr>
						<?php
						$total_emp_inc+=$total_emp;
						$total_own_inc+=$total_own;
						$total_income+=$price_rate;
						$total_pay+=$payment;
					}
					?>
						
	</tbody>
	<tfoot>
				<tr>
					<th><th><th><th>Total</th></th></th></th>
					<th><?php echo "$total_income";?></th>
					<th><?php echo "$total_pay";?></th>
					<th><th><?php echo "$total_own_inc";?></th></th>
					<th><?php echo "$total_emp_inc";?></th>
	</tfoot>

   </table>
</div>

</body>
</html>