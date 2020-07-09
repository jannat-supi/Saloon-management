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
<title>view_service</title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<head>
<link rel="stylesheet" type="text/css" href="record.css">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body background="salon1.png">
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
      <a class="navbar-brand" href="m_record.php"><i class="fa fa-edit"></i>Monthly Record</a>
	  <a class="navbar-brand" href="#"><i class="fa fa-shopping-bag"></i>Monthly Expenditure</a>
    </div>
  </div>
</nav>

<div class="container">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <center><h3 class="panel-title">Expenditure Details</h3></center>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-12 col-lg-12 " align="center"> 
                  <table class="table table-user-information">
                    <tbody>
						<?php
						if(isset($_GET['date']))
						{		
							$date1=$_GET['date'];
						}
						$sql="SELECT * FROM `expenditure`WHERE `date`='$date1' ORDER BY date";
						$res = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($res))
						{
						  ?>
						<tr>
							<td>Date:</td>
							<td>
								<?php echo $row['date'];?>
							</td>
						</tr>
						<tr>
							<td>Rent:</td>
							<td>
								<?php echo $row['rent'];?>
							</td>
						<tr>
							<td>Electricity Bill:</td>
							<td>
								<?php echo $row['electricity_bill'];?>
							</td>
						</tr>
						<tr>
							<td>Blade:</td>
							<td>
								<?php echo $row['blade'];?>
							</td>
						</tr>
						<tr>
							<td>Rezar:</td>
							<td>
								<?php echo $row['rezar'];?>
							</td>
						</tr>
						<tr>
							<td>Medicine:</td>
							<td>
								<?php echo $row['medicine'];?>
							</td>
						</tr>
						<tr>
							<td>Total:</td>
							<td>
								<?php echo $row['total'];?>
							</td>
						</tr>
					<?php
					}
					?>			
				</tbody>	
            </table>
                  
                  
</div>
                 
                  
                </div>
              </div>
            </div>

</body>
</html>