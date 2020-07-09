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
  <title>Voucher</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="voucher.css">

</head>

<body background="comb.png">
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
      <a class="navbar-brand" href="manager.php"><i class="fa fa-dashboard"></i> Dashboard</a>
      <a class="navbar-brand" href="#"><i class="fa fa-edit"></i>Voucher Entry</a>
    </div>
	<ul class="nav navbar-nav navbar-right">
		  <li><a href="show_voucher.php"><i class="fa fa-edit"></i>Today's Vouchers</a></li>
		  <li><a href="voucher_list.php"><i class="fa fa-list"></i>Voucher List</a></li>
		  <li><a href="daily_income.php"><i class="fa fa-book"></i>Daily Income</a></li>
      </ul>
  </div>
</nav>
<?php
					$voucher_no=-1;
					$customer='';
				
					if(isset($_REQUEST['add']))
					{
						$today =  date("Y-m-d");
						$customer_id=$_REQUEST["customer_id"];
						$sql = "INSERT INTO `voucher`(`date`, `customer_id`,`total_amount`, `payable_amount`) VALUES ('$today','$customer_id','0','0')";
						mysqli_query($conn,$sql);
						$voucher_no=mysqli_insert_id($conn);
						$sql2="SELECT * FROM voucher v, customer_info ci WHERE v.customer_id=ci.customer_id AND v.voucher_no=$voucher_no ";
						$res2=mysqli_query($conn,$sql2);
						$row=mysqli_fetch_array($res2);
						$customer=$row['customer_name'];
						
					}
					?>
<div class="row">

  <div class="column">
  	
  	<div class="entry">
  		<center><h3><b>Voucher Entry</b></h3></center>
  		
	<form action="voucher.php">
		<label for="date">Date:</label>
		<?php
		$today =  date("Y-m-d");
		echo "$today"; 
		?><br>
		<label for="cname">Customer Name:</label>
		<?php echo $customer;?><br>
		<label for="cname">Select Customer:</label>
		<select name="customer_id" required />
			<option value=""></option>
			<?php 
				$query = "SELECT * FROM `customer_info` ORDER BY `customer_id`";
				$result = mysqli_query($conn,$query);
				while ($row = mysqli_fetch_array($result))
				{
						echo "<option value='" . $row['customer_id']."'>". $row['customer_name'] .'->'. $row['address'] .'->'. $row['mobile_no'] ."</option>";
				}
			?>
			
			</select>
			<center><input type="submit" name="add" value="Enter"></center>
  </form>
  <?php 
  if($voucher_no!=-1){
  ?>
  <form method="post" action="cart.php">
	<input type="hidden" name="voucher_no" value="<?php echo $voucher_no;?>">
	<center><button class="butn3" type="submit" name="select"><i class="glyphicon glyphicon-ok"></i><br> Select Services</button></center>
  </form>
  <?php
  }
  ?>
</div>

  </div>
 <script>
		function printDiv(printme){
			var printContents = document.getElementById(printme).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>
 
  <div class="column">
  	    <center><a onclick="printDiv('printme')" class="btn btn-success btn-lg">
      <span class="glyphicon glyphicon-print"></span>Print</a></center>
      <div id="printme">
	  <?php
		if(isset($_GET['voucher']))
		{
			$voucher = $_GET['voucher'];
			echo $voucher;
			$sql6="SELECT * FROM voucher v, customer_info ci WHERE v.customer_id=ci.customer_id AND v.date='$today' AND v.voucher_no='$voucher'";
			$res6 = mysqli_query($conn,$sql6);
			$data2 = mysqli_fetch_array($res6);
		?>

			<p style="font-weight: bold; font-size: 20px;">Date: <?php echo $data2['date'];?></p>
			<p style="font-weight: bold; font-size: 20px;">Customer Name: <?php echo $data2['customer_name'];?></p>
			<p style="font-weight: bold; font-size: 20px;">Customer Address: <?php echo $data2['address'];?></p>
			<p style="font-weight: bold; font-size: 20px;">Mobile No: <?php echo $data2['mobile_no'];?></p>
			<table class="w3-table w3-small w3-border w3-centered" style="margin-right: 20px;">
				<thead class="w3-teal">
					<th>Service Name</th>
					<th>Price</th>
					<th>Discount</th>
				</thead>
				<tbody>
					<?php
						$sql5="SELECT * FROM customer_service_info csi, service s WHERE csi.service_id=s.service_id AND csi.date='$today' AND csi.voucher_no='$voucher' ";
						$res5 = mysqli_query($conn,$sql5);
						while($data1 = mysqli_fetch_array($res5))
						{
						?>
						<tr>
							<td class="w3-light-grey"><?php echo $data1['service_name']; ?></td>
							<td class="w3-light-grey"><?php echo $data1['price_rate']; ?></td>
							<td class="w3-light-grey"><?php echo $data1['discount']; ?>%</td>
						</tr>
						<?php
						} 

						?>
				</tbody>
		</table><br>
				<p style="font-weight: bold; font-size: 20px;">Total bill:<?php echo $data2['payable_amount'];?>/=</p>
		<?php
		}
		?>
  </div>
</div>

</div>
</body>
</html>