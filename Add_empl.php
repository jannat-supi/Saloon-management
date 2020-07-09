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
  <title>add_employee</title>
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
		<a class="navbar-brand" href="#"><i class="fa fa-user"></i>Add Employee</a>
	  </div>
	  
	  <div>
	    <ul class="nav navbar-nav navbar-right">
			<li><a href="up_emp.php"><i class="fa fa-edit"></i>Update Employee info</a></li>		
			<li><a href="remove_empl.php"><i class="fa fa-trash"></i>Remove Employee</a></li>
		</ul>	
	  </div>
	  
  </div>
</nav>

<?php
				
					if(isset($_REQUEST['add']))
					{
						$employee_name= $_REQUEST["employee_name"];
						$address=$_REQUEST["address"];
						$mobile_no=$_REQUEST["phone_num"];
						$expertise=$_REQUEST["expertise"];
						$reference=$_REQUEST["reference"];
						$sql = "INSERT INTO `service_provider`(`service_provider_name`, `address`, `mobile_no`, `expertise`, `ref`) VALUES ('$employee_name','$address','$mobile_no','$expertise','$reference')";
						mysqli_query($conn,$sql);
						echo '<center><p style="color:green;">Add an employee successfully</p></center>';
						
						
					}
					?>

<div class="container w3-mobile">
  
  <div class="row">
    <div class="entry">
    <form action="Add_empl.php">
        <label for="uname">Employee name</label>
        <input type="text" id="fname" name="employee_name"  placeholder="...." pattern="[a-zA-Z+\s]{3,}" required />
        <label for="address">Address</label>
        <input type="text" id="subject" name="address" placeholder="...." pattern="[a-zA-Z0-9-_\.\,+\s]{5,}" required />
        <label for="mobile_num">Phone-Number</label>
        <input type="tel" id="telNo" name="phone_num" placeholder="...." pattern="[0-9]{3}[0-9]{4}[0-9]{4}" required />
        <label for="uname">Expertise</label>
        <input type="text" id="fname" name="expertise"  placeholder="...." required />
        <label for="uname">Reference</label>
        <input type="text" id="fname" name="reference"  placeholder="...." pattern="[a-zA-Z+\s]{3,}" required />

      <input type="submit" name="add" value="Add">
    </form>
  </div>
</div>
</div>

</body>
</html>