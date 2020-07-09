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
  <title>remove_user</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<head>
  <link rel="stylesheet" type="text/css" href="add_user.css">
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
      <a class="navbar-brand" href="user_info.php"><i class="fa fa-list"></i> User Details</a>
	  <a class="navbar-brand" href="#"><i class="fa fa-trash"></i>Remove User</a>
    </div>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="add_user.php"><i class="fa fa-user"></i>Add User</a></li>
    </ul>
  </div>
</nav>
<?php

					if(isset($_REQUEST['delete']))
					{
						$user_name= $_REQUEST["user_id"];
						$sql = "DELETE FROM `user` WHERE user_id='$user_name'" ;
						mysqli_query($conn,$sql);
						
						
					}
			?>
<div class="container">

    <div class="row">
      <div class="entry">
        <form action="remove_user.php">
     
        <label for="uname">Select User</label>
        <select name="user_id">
			<option value=""></option>
			<?php 
				$query = "SELECT * FROM `user` ORDER BY `user_type`";
				$result = mysqli_query($conn,$query);
				while ($row = mysqli_fetch_array($result))
				{
						echo "<option value='" . $row['user_id']."'>". $row['user_name'] .'->'. $row['address'] .'->'. $row['mobile_no'] .'->'. $row['user_type'] ."</option>";
				}
			?>
			
			</select>
   
      <input type="submit" name="delete" value="Remove User">
  </form>
</div>
</div>
</div>

</body>
</html>