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
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="owner_service.css">
</head>

<body background="comb2.png">
<center><h2 style="margin-top: 50px; color: black; font-size: 70px; font-style: italic; font-weight: bold; font-family: Verdana;">BIG CUT GENTS PARLOUR</h2></br></center>
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
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="owner.php"><i class="fa fa-dashboard"></i> Dashboard</a>
      <a class="navbar-brand" href="#"><i class="fa fa-book"></i> Service Details</a>
    </div>
  </div>
</nav> 

<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="haircut.jpg" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Hair Cut</h1> 
      <p>Here Different hair cuts are available...!</p> 
      <button class="btn" onclick="document.getElementById('modal01').style.display='block'">Details</button>
    </div>
  </div>
</div>

<div id="modal01" class="w3-modal" onclick="this.style.display='none'">
    <div class="w3-container">
      
     <table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-teal">
        <th>Service Code</th>
    <th>Service Name</th>
        <th>Price</th>
  </thead>
  <tbody>
    
   <?php
					$sql="SELECT * FROM `service` WHERE `service_type`='hair-cutting' ORDER BY service_code";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_array($res))
					{
						$service_id=$row['service_id'];
					  ?>
					<tr>
						<td>
							<?php echo $row['service_code'];?>
						</td>
						<td>
							<?php echo $row['service_name'];?>
						</td>
						<td>
							<?php echo $row['price_rate'];?>/=
						</td>
					</tr>
					<?php
					}
					?>	

</tbody>
</table>
</div>
    <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
    <div class="w3-modal-content w3-animate-zoom">
    </div>
  </div>


<div class="flip2">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="haircolor.png" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Hair Color</h1> 
      <p>Here Different hair colors are available...!<br>
      Choose Yours...!</p>

      <button class="btn" onclick="document.getElementById('modal02').style.display='block'">Details</button>

    </div>
  </div>
</div>
</div>
<div id="modal02" class="w3-modal" onclick="this.style.display='none'">
    <div class="w3-container">
    <table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-teal">
        <th>Service Code</th>
    <th>Service Name</th>
        <th>Price</th>
  </thead>
  <tbody>
    <?php
					$sql="SELECT * FROM `service` WHERE `service_type`='hair-coloring' ORDER BY service_code";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_array($res))
					{
						$service_id=$row['service_id'];
					  ?>
					<tr>
						<td>
							<?php echo $row['service_code'];?>
						</td>
						<td>
							<?php echo $row['service_name'];?>
						</td>
						<td>
							<?php echo $row['price_rate'];?>/=
						</td>
					</tr>
					<?php
					}
					?>	
  </tbody>
</table>
</div>
    <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
    <div class="w3-modal-content w3-animate-zoom">
    </div>
  </div>

<div class="flip3">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="facial.jpg" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Facial</h1> 
      <p>Let's take some care of your face today...!<br>
      Which one you will like...?</p>

      <button class="btn" onclick="document.getElementById('modal03').style.display='block'">Details</button>

    </div>
  </div>
</div>
</div>
<div id="modal03" class="w3-modal" onclick="this.style.display='none'">
    <div class="w3-container">
 <table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-teal">
        <th>Service Code</th>
    <th>Service Name</th>
        <th>Price</th>
  </thead>
  <tbody>
    <?php
					$sql="SELECT * FROM `service` WHERE `service_type`='facial' ORDER BY service_code";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_array($res))
					{
						$service_id=$row['service_id'];
					  ?>
					<tr>
						<td>
							<?php echo $row['service_code'];?>
						</td>
						<td>
							<?php echo $row['service_name'];?>
						</td>
						<td>
							<?php echo $row['price_rate'];?>/=
						</td>
					</tr>
					<?php
					}
					?>	
  </tbody>
</table>
</div>
    <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
    <div class="w3-modal-content w3-animate-zoom">
    </div>
  </div>


<div class="flip4">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="shave2.jpg" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Shave</h1> 
      <p>Let's set the beard...!<br>
      Which style do you want...?</p>

      <button class="btn" onclick="document.getElementById('modal04').style.display='block'">Details</button>

    </div>
  </div>
</div>
</div>

<div id="modal04" class="w3-modal" onclick="this.style.display='none'">
    <div class="w3-container">
  <table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-teal">
        <th>Service Code</th>
    <th>Service Name</th>
        <th>Price</th>
  </thead>
  <tbody>
  <?php
					$sql="SELECT * FROM `service` WHERE `service_type`='shaving' ORDER BY service_code";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_array($res))
					{
						$service_id=$row['service_id'];
					  ?>
					<tr>
						<td>
							<?php echo $row['service_code'];?>
						</td>
						<td>
							<?php echo $row['service_name'];?>
						</td>
						<td>
							<?php echo $row['price_rate'];?>/=
						</td>
					</tr>
					<?php
					}
					?>	
</tbody>
</table>
</div>
    <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
    <div class="w3-modal-content w3-animate-zoom">
    </div>
  </div>

<div class="flip5">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="package.png" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Facial Package</h1> 
      <p>Choose your favourite package today...!</p>

      <button class="btn" onclick="document.getElementById('modal05').style.display='block'">Details</button>

    </div>
  </div>
</div>
</div>
<div id="modal05" class="w3-modal" onclick="this.style.display='none'">
    <div class="w3-container">
  <table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-teal">
        <th>Service Code</th>
    <th>Service Name</th>
        <th>Price</th>
  </thead>
  <tbody>
  <?php
					$sql="SELECT * FROM `service` WHERE `service_type`='facial-package' ORDER BY service_code";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_array($res))
					{
						$service_id=$row['service_id'];
					  ?>
					<tr>
						<td>
							<?php echo $row['service_code'];?>
						</td>
						<td>
							<?php echo $row['service_name'];?>
						</td>
						<td>
							<?php echo $row['price_rate'];?>/=
						</td>
					</tr>
					<?php
					}
					?>	
</tbody>
</table>
</div>
    <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
    <div class="w3-modal-content w3-animate-zoom">
    </div>
  </div>
</body>
</html>