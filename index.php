<?php
	include 'database_connect.php';
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
   <head>
       
       <title>Home page</title>
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
       <link rel="stylesheet" type="text/css" href="index.css">
  </head>
  <body>
<?php
				
				if(isset($_REQUEST['submit']))
				{
					$email=trim($_REQUEST['email']);
					$password=trim($_REQUEST['password']);
					$sql_o="select * from user where email='$email' AND password='$password' AND user_type='Owner' ";
					$res_o=mysqli_query($conn,$sql_o);
					
					
					
					$sql_m="select * from user where email='$email' AND password='$password' AND user_type='Manager' ";
					$res_m=mysqli_query($conn,$sql_m);
					if(mysqli_num_rows($res_o)>=1)
					{
						$arr=mysqli_fetch_array($res_o);
						session_start();
						$_SESSION['email']=$email;
						$_SESSION['password']=$password;
						session_write_close();
						header("location: owner.php");
					
					}
					else if(mysqli_num_rows($res_m)>=1)
					{
						$arr=mysqli_fetch_array($res_m);
						session_start();
						$_SESSION['email']=$email;
						$_SESSION['password']=$password;
						session_write_close();
						header("location: manager.php");
					}
					else
					{
						echo '<p style="color:red;">Invalid email or password</p>';
					}
					
				}
			
			?>
  		
  			<div class="content">
  				<h1 style="font-style: italic; font-weight: bold;">BIG CUT GENTS PARLOUR</h1>
  				<button onclick="document.getElementById('id01').style.display='block'" class="butn button5">Log In</button>
  				<div id="id01" class="w3-modal">
				
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <img src="user2.png" alt="Avatar" style="width:20%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" action="index.php">
        <div class="w3-section">
          <label for="uname"><b>Enter E-mail:</b></label>
			<center><input type="email" placeholder="..." name="email" pattern=".+@gmail.com" required><br></center>
			<label for="psw"><b>Enter Password:</b></label>
    <center><input type="password" placeholder="..." name="password" required></center>

          <center><input type="Submit" name="submit" value="Log In"></center>
			<a href="forget.php" class="w3-btn w3-round w3-red">Forget Password</a>
        </div>
        
      </form>
    </div>
  </div>
</div>
</div>

</body>
</html>