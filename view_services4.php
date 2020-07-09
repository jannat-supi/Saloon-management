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
      <a class="navbar-brand" href="show_voucher.php"><i class="fa fa-edit"></i>Show Voucher</a>
	  <a class="navbar-brand" href="voucher_list.php"><i class="fa fa-edit"></i>Voucher List</a>
	  <a class="navbar-brand" href="#"><i class="fa fa-edit"></i>Voucher Details</a>
    </div>
  </div>
</nav>

<div class="date">
		<label>Date:</label>
	<?php
	$today =  date("Y-m-d");
	echo "$today"; 
	?><br></div>
<div class="w3-container w3-mobile">
  <!-- table start -->
  <table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-teal">
		<th>Customer Name</th>
		<th>Address</th>
		<th>Mobile-number</th>
		<th>Service Name</th>
		<th>Price Rate</th>
		<th>Payable Amount</th>
		<th>Discount</th>
		<th>Employee Name</th>
      </tr>
    </thead>
    <tbody>
				<?php
					if(isset($_GET['voucher_no']))
					{		
						$voucher_no=$_GET['voucher_no'];
					}
					$sql="SELECT * FROM `customer_service_info` NATURAL JOIN`Service_provider` NATURAL JOIN`service` WHERE `date`='$today' AND `voucher_no`='$voucher_no'";
					$res = mysqli_query($conn,$sql);
					$sql1="SELECT * FROM `voucher` NATURAL JOIN`customer_service_info` NATURAL JOIN`customer_info` WHERE `date`='$today' AND `voucher_no`='$voucher_no'";
					$res2 = mysqli_query($conn,$sql1);
					$total_income=0;
					$bill=0;
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
								<?php echo $data['customer_name'];?>
							</td>
							<td>
								<?php echo $data['address'];?>
							</td>
							<td>
								<?php echo $data['mobile_no'];?>
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
								<?php echo $data['discount'];?>%
							</td>
							<td>
								<?php echo $row['service_provider_name'];?>
							</td>
						</tr>
						<?php
						$total_income+=$price_rate;
						$bill+=$payment;
					}
					?>
			<tr> <td colspan="8"></td></tr>	
						
	</tbody>
	<tfoot>
				<tr>
					<th><th><th><th>Total</th></th></th></th>
					<th><?php echo "$total_income";?></th>
					<th><?php echo "$bill";?></th>
					<th> </th>
					<th></th>
				</tr>
	</tfoot>

   </table>
</div>

</body>
</html>