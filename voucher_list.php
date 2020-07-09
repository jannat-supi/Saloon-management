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
  <title>voucher_list</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<head>
  <link rel="stylesheet" type="text/css" href="show_voucher.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
      <a class="navbar-brand" href="voucher.php"><i class="fa fa-edit"></i>Voucher</a>
	  <a class="navbar-brand" href="#"><i class="fa fa-list"></i>Voucher list</a>
    </div>
  </div>
</nav>

	<div class="Date">
		<form action="voucher_list.php">
		 
			<label style="font-weight: bold; font-size: 25px; margin: 20px; color: black;">Date:</label>
			<select name="date">
				<option value=""></option>
				<?php 
					$query = "SELECT DISTINCT `date` FROM `voucher`";
					$result = mysqli_query($conn,$query);
					while ($row = mysqli_fetch_array($result))
					{
							echo "<option value='" . $row['date']."'>". $row['date'] ."</option>";
					}
				?>
				
			</select>
		  <input type="submit" name="select" value="Select">
	 </form>
<div class="w3-container w3-mobile">
  <!-- table start -->
  <table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-teal">
         <th>Voucher No</th>
		 <th>Customer Name</th>
		 <th>Total Amount</th>
		 <th>Payable Amount</th>
		 <th>Edit Voucher</th>
      </tr>
    </thead>
    <tbody>
	
				<?php
					if(isset($_REQUEST['select']))
					{
						$date= $_REQUEST["date"];
						$sql="SELECT DISTINCT voucher_no, total_amount, payable_amount, customer_name FROM `voucher` NATURAL JOIN`customer_info` NATURAL JOIN`customer_service_info` WHERE `date`='$date'";
						$res = mysqli_query($conn,$sql);
						$voucher=0;
						$total=0;
						$tt=0;
						while($row = mysqli_fetch_array($res))
						{
							$voucher_no=$row['voucher_no'];
							$total_amount=$row['total_amount'];
							$total_inc=$row['payable_amount'];
							  ?>
							<tr>
								<td class="w3-gray">
									<?php
									$voucher+=1;
									echo "$voucher";?>
								</td>
								<td class="w3-gray">
									<?php echo $row['customer_name'];?>
								</td>
								<td class="w3-gray">
									<?php echo $row['total_amount'];?>
								</td>
								<td class="w3-gray">
									<?php echo $row['payable_amount'];?>
								</td>
								<?php
								if(isset($_REQUEST['remove']))
								{
									$voucher_no=$_REQUEST["voucher_no"];
									$sql2 = "DELETE FROM `voucher` WHERE `voucher_no`='$voucher_no'" ;
									mysqli_query($conn,$sql2);
									
								}
								if($total_amount==0)
								{
								?>
								<td class="w3-gray">
									<form method="POST" action="voucher_list.php">
										<input type="hidden" name="voucher_no" value="<?php echo $voucher_no;?>">
										<button class="w3-btn w3-round-large w3-red" name="remove" value="remove">Delete</button>
									</form>
								</td>
							</tr>
								<?php
								}
								else
								{
								?>
								<td class="w3-gray">
									<form method="get" action="view_services4.php">
										<input type="hidden" name="voucher_no" value="<?php echo $voucher_no;?>">
										<input class="w3-teal" type="submit" name="view" value="View">
									</form>
								</td><?php
								?>
									
								<?php
								}
								?>
							
							<?php
							$tt+=$total_amount;
							$total+=$total_inc;
						}
					?>
					</tr>					
							</tbody>
								<tfoot>
										<tr>
											<th class="w3-light-gray"><th class="w3-light-gray">Total</th></th>
											<th class="w3-light-gray"><?php echo "$tt";?></th>
											<th class="w3-light-gray"><?php echo "$total";?></th>
											<th class="w3-light-gray"> </th>
										</tr>
								</tfoot>
							</table>
					<?php
					}
					?>
</div>

</body>
</html>