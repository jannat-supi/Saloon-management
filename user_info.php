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
  <title>user_details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<head>
  <link rel="stylesheet" type="text/css" href="user_info.css">
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
      <a class="navbar-brand" href="owner.php"><i class="fa fa-dashboard"></i> Dashboard</a>
	  <a class="navbar-brand" href="#"><i class="fa fa-user"></i>User Details</a>
    </div>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="add_user.php"><i class="fa fa-user"></i>Add User</a></li>
      <li><a href="remove_user.php"><i class="fa fa-trash"></i>Remove User</a></li>
    </ul>
  </div>
</nav>


<div class="w3-container w3-mobile">
  <!-- table start -->
  <table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-teal">
        <th>Username</th>
		<th>User-Type</th>
        <th>Address</th>
		<th>Phone-number</th>
	</thead>
    <tbody>
			  <?php
					$sql="SELECT * FROM `user`";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_array($res))
						{
						 ?>
						<tr>
							<td>
								<?php echo $row['user_name'];?>
							</td>
							<td>
								<?php echo $row['user_type'];?>
							</td>
							<td>
								<?php echo $row['address'];?>
							</td>
							<td>
								<?php echo $row['mobile_no'];?>
							</td>
						</tr>
						<?php
						}
						?>
	</tbody>						
    </table>
</div>

</body>
</html>