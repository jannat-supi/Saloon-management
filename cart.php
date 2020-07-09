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
  <link rel="stylesheet" type="text/css" href="cart.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body background="comb.png">
  <center><h2 style="margin-top: 50px; color: black; font-size: 70px; font-style: italic; font-weight: bold; font-family: Verdana;">BIG CUT GENTS PARLOUR</h2></br></center>
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
       <a  class="navbar-brand" onclick="document.getElementById('modal01').style.display='block'"><i class="fa fa-shopping-cart">View Cart</i></a>
    </div>
  </div>
</nav>	



<?php
				$voucher_no = '';
				if(isset($_REQUEST['select']))
				{
					$voucher_no = $_REQUEST['voucher_no'];
					echo $voucher_no;
				}
				//echo "$voucher_no";
				if(isset($_REQUEST['add']))
				{		
				
					$today =  date("Y-m-d");
					$service_id=$_REQUEST["service_id"];
					echo "$service_id";
					$service_provider_id= $_REQUEST["service_provider_id"];
					echo "$service_provider_id";
					$discount=$_REQUEST["select"];
					echo "$discount";
					$sql3 = "INSERT INTO `customer_service_info`(`date`, `voucher_no`, `service_id`, `service_provider_id`, `discount`) VALUES ('$today','$voucher_no','$service_id','$service_provider_id','$discount')";
					mysqli_query($conn,$sql3);
				}
				if(isset($_REQUEST['remove']))
				{
					$csi=$_REQUEST["customer_service_id"];
					$sql4 = "DELETE FROM `customer_service_info` WHERE `customer_service_id`='$csi'" ;
					mysqli_query($conn,$sql4);
					
				}
				if(isset($_REQUEST['enter']))
				{
					if(isset($_POST['voucher_no']))
					{
						$voucher_no=$_POST['voucher_no'];
						echo $voucher_no;
					}
					$total=0;
					$payable=0;
					$temp='';
					$temp2='';
					$today =  date("Y-m-d");
					echo $voucher_no;
					$sql5="SELECT * FROM customer_service_info csi, service s WHERE csi.service_id=s.service_id AND csi.date='$today' AND csi.voucher_no='$voucher_no'";
					$res5 = mysqli_query($conn,$sql5);
					while($data1 = mysqli_fetch_array($res5))
					{
						$price=$data1['price_rate'];
						$discount1=$data1['discount'];
						if($discount1==0)
						{
							$total+=$price;
							$payable+=$price;
						}
						else if($discount1==1)
						{
							$total+=$price;
							$payable=$payable;
						}
						else
						{
							$total+=$price;
							$temp=$price / 100 ;
							$temp = $temp * $discount1;
							$temp2=$price - $temp;
							$payable+=$temp2;
						}
						
					}
					$sql6 ="UPDATE `voucher` SET `total_amount`='$total',`payable_amount`='$payable' WHERE `voucher_no`='$voucher_no'";
					mysqli_query($conn,$sql6);
					$emp='';
					$own='';
					$tot='';
					$total_own='';
					$total_emp='';
					$temp='';
					$temp2='';
					$emp_inc='';
					$own_inc='';
					$sql="SELECT * FROM customer_service_info csi, service s, service_provider sp WHERE csi.service_id=s.service_id AND csi.service_provider_id=sp.service_provider_id AND csi.voucher_no='$voucher_no' AND csi.date='$today'";
					$res = mysqli_query($conn,$sql);
					while($data = mysqli_fetch_array($res))
					{
					
						$service_provider=$data['service_provider_id'];
						$price=$data['price_rate'];
						$discount1=$data['discount'];
						if($discount1==0)
						{
							$ow=$price * 0.5;
							$own=round($ow);
							$em=$price * 0.5;
							$emp=round($em);
							$sql2="SELECT * FROM income_distribution WHERE date='$today' AND service_provider_id='$service_provider'";
							$res2 = mysqli_query($conn,$sql2);
							$numrow = mysqli_num_rows($res2); 
							if($numrow < 1)
							{
								$sql3 = "INSERT INTO `income_distribution`(`date`, `service_provider_id`, `total_income`, `60%_of_total_income`, `40%_of_total_income`) VALUES ('$today','$service_provider','$price','$own','$emp')";
								mysqli_query($conn,$sql3);
								echo "b";
							}
							else if($numrow >= 1)
							{
								$data1 = mysqli_fetch_array($res2);
								$emp_inc=$data1['40%_of_total_income'];
								$own_inc=$data1['60%_of_total_income'];
								$total=$data1['total_income'];
								$total_emp=$emp_inc+$emp;
								$total_own=$emp_inc+$own;
								$tot=$total+$price;
								$sql4 ="UPDATE `income_distribution` SET `total_income`='$tot',`60%_of_total_income`='$total_own',`40%_of_total_income`='$total_emp' WHERE date='$today' AND service_provider_id='$service_provider'";
								mysqli_query($conn,$sql4);
								echo "c";
							}
						echo "a";
						}
						else if($discount1!=0)
						{
							$temp=$price / 100 ;
							$te = $temp * $discount1;
							$temp=round($te);
							$temp2=$price - $temp;
							$owne=$temp2 * 0.5;
							$owner=round($owne);
							$emp=$temp2 * 0.5;
							$empl=round($emp);
							$sql2="SELECT * FROM income_distribution WHERE date='$today' AND service_provider_id='$service_provider'";
							$res2 = mysqli_query($conn,$sql2);
							$numrow = mysqli_num_rows($res2);
							if($numrow < 1)
							{
								$sql5 = "INSERT INTO `income_distribution`(`date`, `service_provider_id`, `total_income`, `60%_of_total_income`, `40%_of_total_income`) VALUES ('$today','$service_provider','$temp2','$owner','$empl')";
								mysqli_query($conn,$sql5);
							}
							else if($numrow >= 1)
							{
								$data = mysqli_fetch_array($res2);
								$emp_inc=$data['40%_of_total_income'];
								$own_inc=$data['60%_of_total_income'];
								$total=$data['total_income'];
								$total_emp=$emp_inc+$empl;
								$total_own=$emp_inc+$owner;
								$tot=$total+$temp2;
								$sql6 ="UPDATE `income_distribution` SET `total_income`='$tot',`60%_of_total_income`='$total_own',`40%_of_total_income`='$total_emp' WHERE date='$today' AND service_provider_id='$service_provider'";
								mysqli_query($conn,$sql6);
							}
						}
	
					}
					header("location:voucher.php?voucher=$voucher_no");
				}
				
?>
		

          <div id="modal01" class="w3-modal">
        
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:700px; height: 500px; margin-top: 50px;">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('modal01').style.display='none'" class="w3-button w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

<table class="w3-table-all w3-hoverable w3-mobile" style="margin-top: 50px;">
    <thead>
      <tr class="w3-teal">
		<th>Service Code</th>
		<th>Service Name</th>
		<th>Price</th>
		<th>Discount</th>
		<th>Service Provider</th>
		<th>Remove</th>
      </tr>
  </thead>
  <tbody>
<?php
		$today =  date("Y-m-d");
		echo $today;
		if(isset($_POST['voucher_no']))
		{
			$voucher_no=$_POST['voucher_no'];
			echo $voucher_no;
		}
		echo $voucher_no;
		//$sql2="SELECT * FROM `customer_service_info` NATURAL JOIN`service_provider` NATURAL JOIN`service` WHERE `date`='$today' AND `voucher_no`='$voucher_no'";
		$sql2="select * from customer_service_info csi, service s, service_provider sp where csi.service_id=s.service_id and csi.service_provider_id=sp.service_provider_id and csi.date='$today' and csi.voucher_no='$voucher_no' ";
		$res2 = mysqli_query($conn,$sql2);
		while($data = mysqli_fetch_array($res2))
		{
		?>
		<form action="cart.php" method="post">
		<tr>
			<input type="hidden" name="customer_service_id" value="<?php echo $data['customer_service_id'];?>">
			<td><?php echo $data['service_code'];?></td>
			<td><?php echo $data['service_name'];?></td>
			<td><?php echo $data['price_rate'];?></td>
			<td><?php echo $data['discount'];?></td>
			<td><?php echo $data['service_provider_name'];?></td>
			<td>
				<input type="hidden" name="today" value="<?php echo $today;?>">
				<input type="hidden" name="voucher_no" value="<?php echo $data['voucher_no'];?>">
				<button class="w3-btn w3-round-large w3-red" name="remove" value="remove">Delete</button>
			</td>
		</tr>	
		</form>
		<?php
		}
		?>
		
  </tbody>
</table><br>
<form action="cart.php" method="post">
				<input type="hidden" name="voucher_no" value="<?php echo $voucher_no;?>">
				<center><button class="w3-btn w3-round-large w3-teal" name="enter" value="enter">Enter</button></center>
</form>
</div>
</div>

<label for="search"><h3 style="font-weight: bold;color: black;">Search:</h3></label>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Names..."><i class="fa fa-search"></i>

<div class="w3-container"></br> 
<form action="cart.php">
  <table id="myTable" class="w3-table-all w3-hoverable w3-mobile">
    <thead>
      <tr class="w3-teal">
 <th>Service Code</th>
    <th>Service Name</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Service Provider</th>
    <th>Add Service</th>
      </tr>
  </thead>
   <tbody>
        <?php
          $sql="SELECT * FROM `service` ORDER BY `service_code`";
          $res = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_array($res))
          {
		  ?>
		  <form action="cart.php" method="post">
		  <?php
			//$_REQUEST["service_id"] = $row['service_id'];
			//$service_id=$_REQUEST["service_id"];
			//echo "$service_id";
            ?>
            <tr>
			<input type="hidden" name="service_id" value="<?php echo $row['service_id']; ?>">
              <td>
              <?php echo $row['service_code'];?>
              </td>
              <td>
              <?php echo $row['service_name'];?>
             </td>
             <td>
              <?php echo $row['price_rate'];?>/=
            </td>
              <td><select  name="select"><option value="0">0%</option><option value="5">5%</option><option value="10">10%</option><option value="15">15%</option><option value="20">20%</option><option value="25">25%</option><option value="30">30%</option><option value="35">35%</option><option value="40">40%</option><option value="45">45%</option><option value="50">50%</option><option value="55">55%</option><option value="60">60%</option><option value="65">65%</option><option value="70">70%</option><option value="75">75%</option><option value="80">80%</option><option value="85">85%</option><option value="90">90%</option><option value="95">95%</option><option value="1">100%</option></select></td>
              <td>
			  <select name="service_provider_id">
                <option value=""></option>
                <?php 
                  $query = "SELECT * FROM `service_provider` ORDER BY `service_provider_id`";
                  $result = mysqli_query($conn,$query);
                  while ($row = mysqli_fetch_array($result))
                  {
                      echo "<option value='" . $row['service_provider_id']."'>". $row['service_provider_name'] ."</option>";
                  }
                ?>
            </select>
			</td>
            <td>
			<input type="hidden" name="voucher_no" value="<?php echo $voucher_no;?>">
				<button class="w3-btn w3-round-large w3-teal" name="add" value="add">Add to cart</button>
			</td>
           </tr>
		 </form>
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
    td = tr[i].getElementsByTagName("td")[1];
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