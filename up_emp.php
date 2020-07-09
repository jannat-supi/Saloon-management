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
  <title>update_employee</title>
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
    	 <a class="navbar-brand" href="owner.php"><i class="fa fa-dashboard"></i>Dashboard</a>
		<a class="navbar-brand" href="employee.php"><i class="fa fa-address-book"></i>Employee Details</a>
		<a class="navbar-brand" href="#"><i class="fa fa-edit"></i>Update Employee</a>
	  </div>
	  <ul class="nav navbar-nav navbar-right">
		  <li><a href="Add_empl.php"><i class="fa fa-user"></i>Add Employee</a></li>
		  <li><a href="remove_empl.php"><i class="fa fa-trash"></i>Remove Employee</a></li>
      </ul>
  </div>
</nav>

<?php
				
					if(isset($_REQUEST['update']))
					{
						
						$employee_id= $_REQUEST["service_provider_id"];
						$edit_sql="SELECT * FROM `service_provider` where `service_provider_id`='$employee_id'";
						$res = mysqli_query($conn,$edit_sql);
						$row = mysqli_fetch_array($res);
						$employee_name_1=$row['service_provider_name'];
						$address_1=$row['address'];
						$mobile_no_1=$row['mobile_no'];
						$expertise_1=$row['expertise'];
						$reference_1=$row['ref'];
						$employee_name=$_REQUEST["employee_name"];
						$address=$_REQUEST["address"];
						$mobile_no=$_REQUEST["mobile_no"];
						$expertise=$_REQUEST["expertise"];
						$reference=$_REQUEST["reference"];
						if((null !== $employee_name)&&(null == $address)&&(null == $mobile_no)&&(null == $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address_1',`mobile_no`='$mobile_no_1',`expertise`='$expertise_1',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null !== $address)&&(null == $mobile_no)&&(null == $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address',`mobile_no`='$mobile_no_1',`expertise`='$expertise_1',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null == $address)&&(null !== $mobile_no)&&(null == $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address_1',`mobile_no`='$mobile_no',`expertise`='$expertise_1',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null == $address)&&(null == $mobile_no)&&(null !== $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address_1',`mobile_no`='$mobile_no_1',`expertise`='$expertise',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null == $address)&&(null == $mobile_no)&&(null == $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address_1',`mobile_no`='$mobile_no_1',`expertise`='$expertise_1',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null !== $address)&&(null == $mobile_no)&&(null == $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address',`mobile_no`='$mobile_no_1',`expertise`='$expertise_1',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null == $address)&&(null !== $mobile_no)&&(null == $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address_1',`mobile_no`='$mobile_no',`expertise`='$expertise_1',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null == $address)&&(null == $mobile_no)&&(null !== $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address_1',`mobile_no`='$mobile_no_1',`expertise`='$expertise',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null == $address)&&(null == $mobile_no)&&(null == $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address_1',`mobile_no`='$mobile_no_1',`expertise`='$expertise_1',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null !== $address)&&(null !== $mobile_no)&&(null == $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address',`mobile_no`='$mobile_no',`expertise`='$expertise_1',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null !== $address)&&(null == $mobile_no)&&(null !== $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address',`mobile_no`='$mobile_no_1',`expertise`='$expertise',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null !== $address)&&(null == $mobile_no)&&(null == $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address',`mobile_no`='$mobile_no_1',`expertise`='$expertise_1',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null ==  $address)&&(null !== $mobile_no)&&(null !== $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address_1',`mobile_no`='$mobile_no',`expertise`='$expertise',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null == $address)&&(null !== $mobile_no)&&(null == $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address_1',`mobile_no`='$mobile_no',`expertise`='$expertise_1',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null == $address)&&(null == $mobile_no)&&(null !== $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address_1',`mobile_no`='$mobile_no_1',`expertise`='$expertise',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null !== $address)&&(null !== $mobile_no)&&(null == $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address',`mobile_no`='$mobile_no',`expertise`='$expertise_1',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null !== $address)&&(null == $mobile_no)&&(null !== $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address',`mobile_no`='$mobile_no_1',`expertise`='$expertise',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null !== $address)&&(null == $mobile_no)&&(null == $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address_1',`mobile_no`='$mobile_no_1',`expertise`='$expertise_1',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null == $address)&&(null !== $mobile_no)&&(null !== $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address_1',`mobile_no`='$mobile_no',`expertise`='$expertise',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null == $address)&&(null !== $mobile_no)&&(null == $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address_1',`mobile_no`='$mobile_no',`expertise`='$expertise_1',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null == $address)&&(null == $mobile_no)&&(null !== $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address_1',`mobile_no`='$mobile_no_1',`expertise`='$expertise',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null !== $address)&&(null !== $mobile_no)&&(null !== $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address',`mobile_no`='$mobile_no',`expertise`='$expertise',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null !== $address)&&(null !== $mobile_no)&&(null == $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address',`mobile_no`='$mobile_no',`expertise`='$expertise_1',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null !== $address)&&(null == $mobile_no)&&(null !== $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address',`mobile_no`='$mobile_no_1',`expertise`='$expertise',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null == $address)&&(null !== $mobile_no)&&(null !== $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address_1',`mobile_no`='$mobile_no',`expertise`='$expertise',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null !== $address)&&(null !== $mobile_no)&&(null !== $expertise)&&(null == $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address',`mobile_no`='$mobile_no',`expertise`='$expertise',`ref`='$reference_1' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null !== $address)&&(null !== $mobile_no)&&(null == $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address',`mobile_no`='$mobile_no_1',`expertise`='$expertise',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null !== $address)&&(null == $mobile_no)&&(null !== $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address',`mobile_no`='$mobile_no_1',`expertise`='$expertise',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !==$employee_name)&&(null == $address)&&(null !== $mobile_no)&&(null !== $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address_1',`mobile_no`='$mobile_no',`expertise`='$expertise',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $employee_name)&&(null !== $address)&&(null !== $mobile_no)&&(null !== $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name_1',`address`='$address',`mobile_no`='$mobile_no',`expertise`='$expertise',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $employee_name)&&(null !== $address)&&(null !== $mobile_no)&&(null !== $expertise)&&(null !== $reference))
						{
							$sql ="UPDATE `service_provider` SET `service_provider_name`='$employee_name',`address`='$address',`mobile_no`='$mobile_no',`expertise`='$expertise',`ref`='$reference' WHERE `service_provider_id`='$employee_id'";
							mysqli_query($conn,$sql);
						}
					
						
					}
					?>

<div class="container w3-mobile">
  
  
    <div class="row">
    	<div class="entry">
    	<form action="up_emp.php">

        <label for="uname">Select Employee</label>
        <select name="service_provider_id">
			<option value=""></option>
			<?php 
				$query = "SELECT * FROM `service_provider` ORDER BY `service_provider_id`";
				$result = mysqli_query($conn,$query);
				while ($row = mysqli_fetch_array($result))
				{
						echo "<option value='" . $row['service_provider_id']."'>". $row['service_provider_name'] .'->'. $row['address'] .'->'. $row['mobile_no'] .'->'. $row['expertise'] .'->'. $row['ref'] ."</option>";
				}
			?>
			
			</select>
		<label for="uname">Employee name</label>
        <input type="text" id="fname" name="employee_name"  placeholder="...." pattern="[a-zA-Z+\s]{3,}">
        <label for="address">Address</label>
        <input type="text" id="subject" name="address" pattern="[a-zA-Z0-9-_\.\,+\s]{5,}" placeholder="....">
        <label for="number">Mobile No.</label>
        <input type="tel" id="telNo" name="mobile_no" placeholder="....">
        <label for="uname">Expertise</label>
        <input type="text" id="expertise" name="expertise"  placeholder="....">
        <label for="uname">Reference</label>
        <input type="text" id="reference" name="reference"  placeholder="....">
      <input type="submit" name="update" value="Update">
</form>
</div>
</div>
</div>

</body>
</html>