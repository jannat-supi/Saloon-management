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
<title>expenditure</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
<link rel="stylesheet" type="text/css" href="expenditure.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">   
</head>
<body background="comb3.png">

  <center><h2 style="margin-top: 50px; color: black; font-size: 70px; font-style: italic; font-weight: bold; font-family: Verdana;">BIG CUT GENTS PARLOUR</h2></br></center>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="manager.php"><i class="fa fa-dashboard"></i>Dashboard</a>
      <a class="navbar-brand" href="#"><i class="fa fa-shopping-bag"></i>Expenditure</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
		  <li><a href="Add_expn.php"><i class="fa fa-shopping-bag"></i>Add Expenditure</a></li>
		  <li><a href="up_expn.php"><i class="fa fa-edit"></i>Update Expenditure</a></li>
		  <li><a href="remove_expenditure.php"><i class="fa fa-trash"></i>Remove Expenditure</a></li>
		</ul>
  </div>
</nav>


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
<div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="w3-btn w3-round-large w3-teal" />  
                </div>  
                <div style="clear:both"></div>                 
                <br />  
<div id="expn_table" class="w3-container"></br> 
  <table class="w3-table-all w3-hoverable w3-mobile">
    <thead>
      <tr class="w3-teal">
        <th>Date</th>
		<th>Rent</th>
        <th>Electricity bill</th>
        <th>Blade</th>
        <th>Rezar</th>
        <th>Medicine</th>
        <th>Total</th>
      </tr>
	</thead>
	<tbody>
				<?php
					$sql="SELECT * FROM `expenditure`ORDER BY date";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_array($res))
					{
					  ?>
					<tr>
						<td>
							<?php echo $row['date'];?>
						</td>
						<td>
							<?php echo $row['rent'];?>
						</td>
						<td>
							<?php echo $row['electricity_bill'];?>
						</td>
						<td>
							<?php echo $row['blade'];?>
						</td>
						<td>
							<?php echo $row['rezar'];?>
						</td>
						<td>
							<?php echo $row['medicine'];?>
						</td>
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
<script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#expn_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
</body>


</html>