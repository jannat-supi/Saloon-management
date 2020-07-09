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
</head>

<body>
  <center><img src="salon.jpeg" style="width:200px;height:100px; margin: 20px;"></br></center>
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



<script>
//Add Item to Cart
$(".form-item").submit(function(e){ //user clicks form submit button
	var form_data = $(this).serialize(); //prepare form data for Ajax post
	var button_content = $(this).find('button[type=submit]'); //get clicked button info
	button_content.html('Adding...'); //Loading button text //change button text 

	$.ajax({ //make ajax request to cart_process.php
		url: "voucher.php",
		type: "POST",
		dataType:"json", //expect json value from server
		data: form_data
	}).done(function(data){ //on Ajax success
		$("#cart-info").html(data.items); //total items count fetch in cart-info element
		button_content.html('Add to Cart'); //reset button text to original text
		alert("Item added to Cart!"); //alert user
		if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
			$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
		}
	})
	e.preventDefault();
});
</script>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="voucher.php"><i class="fa fa-edit">Voucher</i></a>
      <a class="navbar-brand" href="#"><i class="fa fa-shopping-cart">Service Cart</i></a>
       <a href="#" class="cart-box" id="cart-info" title="View Cart"></a>
    </div>
  </div>
</nav>
<div class="w3-container"></br> 
<form class="form-item">
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
          $sql="SELECT * FROM `service` ORDER BY service_code";
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
              <td><select id="select1" name="select"><option value="">0%</option><option value="">5%</option><option value="">10%</option><option value="">15%</option><option value="">20%</option><option value="">25%</option><option value="">30%</option><option value="">35%</option><option value="">40%</option><option value="">45%</option><option value="">50%</option><option value="">55%</option><option value="">60%</option><option value="">65%</option><option value="">70%</option><option value="">75%</option><option value="">80%</option><option value="">85%</option><option value="">90%</option><option value="">95%</option><option value="">100%</option></select></td>
              <td><select name="service_provider_id">
                <option value=""></option>
                <?php 
                  $query = "SELECT * FROM `service_provider` ORDER BY `service_provider_code`";
                  $result = mysqli_query($conn,$query);
                  while ($row = mysqli_fetch_array($result))
                  {
                      echo "<option value='" . $row['service_provider_id']."'>". $row['service_provider_name'] ."</option>";
                  }
                ?>
            </select></td>
            <td><button class="btn" type="submit">Add to cart</button></td>
            </tr>
            <?php
          }
          ?>  
  </tbody>
</table>
</form>
</div>
</body>
</html>