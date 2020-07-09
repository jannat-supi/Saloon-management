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
  <title>show_voucher</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<head>
  <link rel="stylesheet" type="text/css" href="show_voucher.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body background="comb.png">
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
      <a class="navbar-brand" href="voucher.php"><i class="fa fa-edit"></i>Voucher</a>
	  <a class="navbar-brand" href="#"><i class="fa fa-list"></i>Today's Vouchers</a>
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
         <th>Voucher No</th>
		 <th>Customer Name</th>
		 <th>Total Amount</th>
		 <th>Payable Amount</th>
		 <th>List of Services</th>
      </tr>
    </thead>
    <tbody>
	
				<?php
					$voucher=0;
					$total=0;
					$tt=0;
					$sql="SELECT DISTINCT voucher_no, total_amount, payable_amount , customer_name FROM `voucher` NATURAL JOIN`customer_info` NATURAL JOIN`customer_service_info` WHERE `date`='$today'";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_array($res))
					{
						$voucher_no=$row['voucher_no'];
						$total_amount=$row['total_amount'];
						$total_inc=$row['payable_amount'];
					  ?>
					<tr>
						<td>
							<?php
							$voucher+=1;
							echo "$voucher";?>
						</td>
						<td>
							<?php echo $row['customer_name'];?>
						</td>
						<td>
							<?php echo $row['total_amount'];?>
						</td>
						<td>
							<?php echo $row['payable_amount'];?>
						</td>
						<td>
							<form method="get" action="view_services4.php">
										<input type="hidden" name="voucher_no" value="<?php echo $voucher_no;?>">
										<input class="w3-teal" type="submit" name="view" value="Voucher Details">
							</form>
						</td>
					</tr>
					<?php
					$tt+=$total_amount;
					$total+=$total_inc;
					}
					?>
	<tr> <td colspan="6"></td></tr>					
	</tbody>
		<tfoot>
				<tr>
					<th><th>Total</th></th>
					<th><?php echo "$tt";?></th>
					<th><?php echo "$total";?></th>
					<th> </th>
				</tr>
		</tfoot>
    </table>
</div>

</body>
</html>