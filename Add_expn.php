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
  <title>add_expn</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="Add_customer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body background="comb2.png">
	<center><h2 style="margin-top: 20px; color: black; font-size: 70px; font-style: italic; font-weight: bold; font-family: Verdana;">BIG CUT GENTS PARLOUR</h2></br></center>
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
    	<a class="navbar-brand" href="manager.php"><i class="fa fa-dashboard"></i>Dashboard</a>
		<a class="navbar-brand" href="Expenditure.php"><i class="fa fa-shopping-bag"></i>Expenditure</a>
		<a class="navbar-brand" href="#"><i class="fa fa-shopping-bag"></i>Add Expenditure</a>	
	  </div>
	  <ul class="nav navbar-nav navbar-right">
       <li><a href="up_expn.php"><i class="fa fa-edit"></i>Update Expenditure</a></li>
			<li><a href="remove_expenditure.php"><i class="fa fa-trash" ></i>Remove Expenditure</i></a></li>
		</ul>
  </div>
</nav>

<?php
				
					if(isset($_REQUEST['add']))
					{
						
						$date=$_REQUEST["date"];
						$rent=$_REQUEST["rent"];
						$electricity_bill=$_REQUEST["electricity_bill"];
						$blade=$_REQUEST["blade"];
						$rezar=$_REQUEST["rezar"];
						$medicine=$_REQUEST["medicine"];
						$total= $rent+$electricity_bill+$blade+$rezar+$medicine;
						$sql = "INSERT INTO `expenditure`(`date`, `rent`, `electricity_bill`, `blade`, `rezar`,`medicine`,`total`) VALUES ('$date','$rent','$electricity_bill','$blade','$rezar','$medicine','$total')";
						mysqli_query($conn,$sql);
						
						
					}
					?>

<div class="container w3-mobile">
 
    <div class="row">
      <div class="entry">
       <form action="Add_expn.php">
       <label for="date">Date</label>
    <input type="date" name="date" placeholder=""required />
    <label for="rent">Rent</label>
    <input type="number" name="rent" placeholder="" pattern="[0-9]">
       <label for="number">Electricity Bill</label>
    <input type="number" name="electricity_bill" placeholder="" pattern="[0-9]">
           <label for="number">Blade</label>
    <input type="number" name="blade" placeholder="" pattern="[0-9]">
           <label for="number">Rezar</label>
    <input type="number" name="rezar" placeholder="" pattern="[0-9]">
           <label for="number">Medicine</label>
    <input type="number" name="medicine" placeholder="" pattern="[0-9]">
    
    <input type="submit" name="add" value="ADD">
    </form>
  </div>
</div>
</div>

</body>
</html>





