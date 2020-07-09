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
<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<head>
<link rel="stylesheet" type="text/css" href="profile.css">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body background="comb.png">
<?php
					
					if(isset($_SESSION['email']))
					{
						$email=$_SESSION['email'];
						$f=0;
						$sql2="SELECT * FROM `user` where `email`='$email'";
						$res2 = mysqli_query($conn,$sql2);
						$data = mysqli_fetch_array($res2);
						$password=$data['password'];
						$type=$data['user_type'];
						if($type=="owner")
						{
							$f=1;
						}
						
						
					}
					else
					{
						header("location: index.php");
						
					}
					session_write_close();
?>
<div>
  <center><h2 style="margin-top: 50px; color: black; font-size: 70px; font-style: italic; font-weight: bold; font-family: Verdana;">BIG CUT GENTS PARLOUR</h2></br></center>
	
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
	<?php

					if($f==1)
					{
						echo '<a class="navbar-brand" href="owner.php"><i class="fa fa-dashboard"></i>Dashboard</a>';
					}
					else if($f==0)
					{
						echo '<a class="navbar-brand" href="manager.php"><i class="fa fa-dashboard"></i>Dashboard</a>';
					}
     
      ?>
		<a class="navbar-brand" href="#"><i class="fa fa-user"></i>User Profile</a>
    </div>
  </div>
</nav>

<div class="container">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <center><h3 class="panel-title">User Profile</h3></center>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img src="user2.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
					<?php
					$sql="SELECT * FROM `user` where `email`='$email' AND `password`='$password'";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_array($res))
					{
					$user_id=$row['user_id'];
					  ?>
					<tr>
						<td>Name:</td>
						<td>
							<?php echo $row['user_name'];?>
						</td>
					</tr>
					 <tr>
                        <td>User-Type:</td>
						<td>
							<?php echo $row['user_type'];?>
						</td>
					</tr>
					 <tr>
                        <td>Email:</td>
						<td>
							<?php echo $row['email'];?>
						</td>
					</tr>
					<tr>
                        <td>Address:</td>
						<td>
							<?php echo $row['address'];?>
						</td>
					</tr>
					<tr>
                        <td>Phone No:</td>
						<td>
							<?php echo $row['mobile_no'];?>
						</td>
					</tr>
					<?php
					}
					?>  
                    </tbody>
                  </table>
                  <button onclick="document.getElementById('id01').style.display='block'" class="butn button5">Update Profile</button>
                  <div class="content">
          
          <div id="id01" class="w3-modal">
        
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <center><img src="user2.png" alt="Avatar" style="width:20%" class="w3-circle w3-margin-top"></center>
      </div>
<?php
				
					if(isset($_REQUEST['submit']))
					{
						
						$edit_sql="SELECT * FROM `user` where `email`='$email'";
						$res = mysqli_query($conn,$edit_sql);
						$row = mysqli_fetch_array($res);
						$user_id=$row['user_id'];
						$user_name_1=$row['user_name'];
						$email_1=$row['email'];
						$password_1=$row['password'];
						$address_1=$row['address'];
						$mobile_no_1=$row['mobile_no'];
						$user_name=$_REQUEST["user_name"];
						$email=$_REQUEST["email"];
						$password= $_REQUEST["password"];
						$address= $_REQUEST["address"];
						$mobile_no= $_REQUEST["phone"];
						if((null !== $user_name)&&(null == $email)&&(null == $password)&&(null == $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email_1',`password`='$password_1',`address`='$address_1',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null !== $email)&&(null == $password)&&(null == $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email',`password`='$password_1',`address`='$address_1',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null == $email)&&(null !== $password)&&(null == $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email_1',`password`='$password',`address`='$address_1',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null == $email)&&(null == $password)&&(null !== $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email_1',`password`='$password_1',`address`='$address',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null == $email)&&(null == $password)&&(null == $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email_1',`password`='$password_1',`address`='$address_1',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null !== $email)&&(null == $password)&&(null == $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email',`password`='$password_1',`address`='$address_1',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null == $email)&&(null !== $password)&&(null == $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email_1',`password`='$password',`address`='$address_1',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null == $email)&&(null == $password)&&(null !== $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email_1',`password`='$password_1',`address`='$address',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null == $email)&&(null == $password)&&(null == $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email_1',`password`='$password_1',`address`='$address_1',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null !== $email)&&(null !== $password)&&(null == $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email',`password`='$password',`address`='$address_1',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null !== $email)&&(null == $password)&&(null !== $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email',`password`='$password_1',`address`='$address',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null !== $email)&&(null == $password)&&(null == $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email',`password`='$password_1',`address`='$address_1',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null ==  $email)&&(null !== $password)&&(null !== $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='user_name_1',`email`='$email_1',`password`='$password',`address`='$address',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null == $email)&&(null !== $password)&&(null == $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email_1',`password`='$password',`address`='$address_1',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null == $email)&&(null == $password)&&(null !== $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email_1',`password`='$password_1',`address`='$address',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null !== $email)&&(null !== $password)&&(null == $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email',`password`='$password',`address`='$address_1',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null !== $email)&&(null == $password)&&(null !== $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email',`password`='$password_1',`address`='$address',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null !== $email)&&(null == $password)&&(null == $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email_1',`password`='$password_1',`address`='$address_1',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null == $email)&&(null !== $password)&&(null !== $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email_1',`password`='$password',`address`='$address',`mobile_no`='$mobile_no_1' WHERE user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null == $email)&&(null !== $password)&&(null == $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email_1',`password`='$password',`address`='$address_1',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null == $email)&&(null == $password)&&(null !== $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email_1',`password`='$password_1',`address`='$address',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null !== $email)&&(null !== $password)&&(null !== $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email',`password`='$password',`address`='$address',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null !== $email)&&(null !== $password)&&(null == $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email',`password`='$password',`address`='$address_1',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null !== $email)&&(null == $password)&&(null !== $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email',`password`='$password_1',`address`='$address',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null == $email)&&(null !== $password)&&(null !== $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email_1',`password`='$password',`address`='$address',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null !== $email)&&(null !== $password)&&(null !== $address)&&(null == $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email',`password`='$password',`address`='$address',`mobile_no`='$mobile_no_1' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null !== $email)&&(null !== $password)&&(null == $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email',`password`='$password_1',`address`='$address',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null !== $email)&&(null == $password)&&(null !== $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email',`password`='$password_1',`address`='$address',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !==$user_name)&&(null == $email)&&(null !== $password)&&(null !== $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email_1',`password`='$password',`address`='$address',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null == $user_name)&&(null !== $email)&&(null !== $password)&&(null !== $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name_1',`email`='$email',`password`='$password',`address`='$address',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						else if((null !== $user_name)&&(null !== $email)&&(null !== $password)&&(null !== $address)&&(null !== $mobile_no))
						{
							$sql ="UPDATE `user` SET `user_name`='$user_name',`email`='$email',`password`='$password',`address`='$address',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'";
							mysqli_query($conn,$sql);
						}
						
					}
?>
      <form class="w3-container" action="profile.php">
        <div class="w3-section">
		<center><label for="uname"><b>Name:</b></label>
      <input type="text" placeholder="..." name="user_name" ><br>
      <label for="psw"><b>Email:</b></label>
    <input type="email" placeholder="..." name="email" ></center>
          <center><label for="uname"><b>Password:</b></label>
      <input type="text" placeholder="..." name="password" ><br>
      <label for="psw"><b>Address:</b></label>
    <input type="text" placeholder="..." name="address" ></center>
     <label for="psw"><b>Phone_No:</b></label>
    <input type="tel" placeholder="..." name="phone" pattern="[0-9]{3}[0-9]{4}[0-9]{4}" ></center>
          <center><input type="Submit" name="submit" value="Update"></center>
        </div>
      </form>

    </div>
  </div>
</div>
</div>
                 
                  
                </div>
              </div>
            </div>

</body>
</html>