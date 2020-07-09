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
  <title>remove_employee</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<head>
  <link rel="stylesheet" type="text/css" href="Add_empl.css">
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
    	  <a class="navbar-brand" href=owner.php><i class="fa fa-dashboard"></i>Dashboard</a>
		<a class="navbar-brand" href="employee.php"><i class="fa fa-address-book"></i>Employee Details</a>
		<a class="navbar-brand" href="remove_empl.php"><i class="fa fa-trash"></i>Remove Employee</a>
	  </div>
	  
	  <div>
	    <ul class="nav navbar-nav navbar-right">
			<li><a href="Add_empl.php"><i class="fa fa-user"></i>Add Employee</a></li>
			<li><a href="up_emp.php"><i class="fa fa-edit"></i>Update Employee</a></li>
		</ul>	
	  </div>
	  
  </div>
</nav>

<?php

					if(isset($_REQUEST['delete']))
					{
						$employee_id= $_REQUEST["service_provider_id"];
						$sql = "DELETE FROM `service_provider` WHERE service_provider_id='$employee_id'" ;
						mysqli_query($conn,$sql);
						
						
					}
			?>

<div class="container w3-mobile">

    <div class="row">
    	<div class="entry">
    	  <form action="remove_empl.php">
     
        <label for="uname">Select Employee</label>
        <select name="service_provider_id">
			<option value=""></option>
			<?php 
				$query = "SELECT * FROM `service_provider` ORDER BY `service_provider_id`";
				$result = mysqli_query($conn,$query);
				while ($row = mysqli_fetch_array($result))
				{
						echo "<option value='" . $row['service_provider_id']."'>". $row['service_provider_name'] .' -> '. $row['address'] .' -> '. $row['mobile_no'] ."</option>";
				}
			?>
			
			</select>
      <input type="submit" name="delete" value="Remove">
 </form>
</div>
</div>
</div>

</body>
</html>