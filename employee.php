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
<link rel="stylesheet" type="text/css" href="employee.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body background="comb.png">
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
      <a class="navbar-brand" href="owner.php"><i class="fa fa-dashboard"></i> Dashboard</a>
      <a class="navbar-brand" href="#"><i class="fa fa-address-book"></i>Employee Details</a>
    </div>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="Add_empl.php"><i class="fa fa-user"></i>Add Employee</a></li>
        <li><a href="up_emp.php"><i class="fa fa-edit"></i>Update Employee</a></li>		
		<li><a href="remove_empl.php"><i class="fa fa-trash"></i>Remove Employee</a></li>
	  </ul>
  </div>
</nav>
<label for="search"><h3 style="font-weight: bold;color: black;">Search:</h3></label>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Names..."><i class="fa fa-search"></i>

<div class="w3-container w3-mobile">
  <!-- table start -->
  <table id="myTable" class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-teal">
        <th>Employee name</th>
        <th>Address</th>
		<th>Phone-number</th>
		<th>Expertise</th>
		<th>Reference</th>
	</thead>
    <tbody>
				<?php
					$sql="SELECT * FROM `Service_provider`";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_array($res))
					{ 
						?>

					<tr>
						<td>
							<?php echo $row['service_provider_name'];?>
						</td>
						<td>
							<?php echo $row['address'];?>
						</td>
						<td>
							<?php echo $row['mobile_no'];?>
						</td>
						<td>
							<?php echo $row['expertise'];?>
						</td>
						<td>
							<?php echo $row['ref'];?>
						</td>
					</tr>
					<?php
					}
					?>
						
	</tbody>						
    </table>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>


