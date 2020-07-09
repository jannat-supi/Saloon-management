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
  <title>daily_record</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<head>
  <link rel="stylesheet" type="text/css" href="m_record.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body background="comb2.png">
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
    	<a class="navbar-brand" href="owner.php"><i class="fa fa-dashboard"></i>Dashboard</a>
      <a class="navbar-brand" href="history.php"><i class="fa fa-history"></i>Accounting History</a>
	  <a class="navbar-brand" href="#"><i class="fa fa-edit"></i>Monthly Record</a>
    </div>
  </div>
</nav>


<div class="w3-container w3-mobile">
  <!-- table start -->
  <table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-teal">
        <th>Month</th>
     <th>Total Income</th>
    <th>Owner's Income</th>
    <th>Employee's Income</th>
    <th>Expenditure</th>
	<th>Expenditure Details</th>
      </tr>
    </thead>
    <?php
					$sql="SELECT MONTH(date) AS `Month`,`date` from `income_distribution` GROUP BY `Month`";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_array($res))
					{
					    $date=$row['date'];
						$month_y = date("F-Y",strtotime($date));
						$month = date("m",strtotime($date));;
						$sql2="SELECT * FROM `income_distribution` WHERE MONTH(date) ='$month'";
						$res2 = mysqli_query($conn,$sql2);
						$total_income=0;
						$total_own_inc=0;
						$total_emp_inc=0;
						while($data = mysqli_fetch_array($res2))
						{
							$total_inc=$data['total_income'];
							$total_own=$data['60%_of_total_income'];
							$total_emp=$data['40%_of_total_income'];
							$total_income=$total_income+$total_inc;
							$total_own_inc=$total_own_inc+$total_own;
							$total_emp_inc=$total_emp_inc+$total_emp;
						}
							
						?>
						<td>
							<?php echo "$month_y";?>
						</td>
						<td>
							<?php echo "$total_income";?>
						</td>
						<td>
							<?php echo "$total_own_inc";?>
						</td>
						<td>
							<?php echo "$total_emp_inc";?>
						</td>
						<td>
							<?php $sql3="SELECT * FROM `expenditure` WHERE MONTH(date) = '$month'";
								  $res3 = mysqli_query($conn,$sql3);
								  $data2 = mysqli_fetch_array($res3);
								  $date1=$data2['date'];
								  $total=$data2['total'];
								  echo "$total";
								  ?>
						</td>
						<td>
							<form method="get" action="view_services3.php">
								<input type="hidden" name="date" value="<?php echo $date1;?>">
								<input class="w3-teal" type="submit" name="details" value="Expenditure Details">
							</form>
						</td>
							</tr>
							<?php
					}
					
					?>	
    </table>
</div>

</body>
</html>