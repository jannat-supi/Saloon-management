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
  <title>add_user</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<head>
  <link rel="stylesheet" type="text/css" href="add_user.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
 
<center><h2 style="margin-top: 20px; color: black; font-size: 70px; font-style: italic; font-weight: bold; font-family: Verdana;">BIG CUT GENTS PARLOUR</h2></br></center>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    	   <a class="navbar-brand" href="owner.php"><i class="fa fa-dashboard"></i>Dashboard</a>
      <a class="navbar-brand" href="user_info.php"><i class="fa fa-list"></i> User Details</a>
	  <a class="navbar-brand" href="#"><i class="fa fa-user"></i>Add User</a>
    </div>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="remove_user.php"><i class="fa fa-trash"></i>Remove User</a></li>
    </ul>
  </div>
</nav>
<?php
				
					if(isset($_REQUEST['add']))
					{
						
						$username= $_REQUEST["username"];
						$user_type=$_REQUEST["user_type"];
						$email=$_REQUEST["email"];
						$password=$_REQUEST["password"];
						$address=$_REQUEST["address"];
						$mobile_no=$_REQUEST["mobile_no"];
						$sql = "INSERT INTO `user`(`username`, `user_type`, `email`, `password`, `address`, `mobile_no`) VALUES ('$username','$user_type','$email','$password','$address','$mobile_no')";
						mysqli_query($conn,$sql);
						
						
					}
					?>
<div class="container w3-mobile">
  
    <div class="row">
      <div class="entry">
      <form action="add_user.php">
    
        <label for="uname">Username</label>
        <input type="text" id="fname" name="username" placeholder="..." pattern="[a-zA-Z+\s]{3,}" required />
        <label for="user">User-type</label>
        <select id="utype" name="user_type" required />
		  <option value="null">...</option>
          <option value="owner">Owner</option>
          <option value="manager">Manager</option>
        </select>
		<label for="uname">Email</label>
        <input type="email" id="fname" name="email" placeholder="..." pattern=".+@gmail.com" required />
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="..." pattern="(?=.*\d)(?=.*[a-z]).{7,}" required />
        <label>Show Password</label>
        <input type="checkbox" onclick="myFunction()">
		

		<script>
		function myFunction() {
			var x = document.getElementById("password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
		</script>

        <label for="address">Address</label>
        <input type="text" id="subject" name="address" placeholder="..." pattern="[a-zA-Z0-9-_\.\,+\s]{5,}" required />
        <label for="mobile_num">Phone-Number</label>
        <input type="tel" id="telNo" name="mobile_no" placeholder="..." pattern="[0-9]{3}[0-9]{4}[0-9]{4}" required />
      <input type="submit" name="add" value="Add">
</form>
</div>
</div>
</div>
</body>
</html>