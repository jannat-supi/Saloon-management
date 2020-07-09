<?php
	include 'database_connect.php';
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
   <head>
       
       <title>Forget Password</title>
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
       <link rel="stylesheet" type="text/css" href="forget.css">
  </head>
  <body background="comb2.png">
<div class="entry">
<form action="change.php" method="POST">

<label> E-mail:</label>
 <input type="text" name="email" size="20" />
<center><input class="w3-btn w3-round w3-teal" style="width: 30%;" type="submit" name="ForgotPassword" value="Send Mail" /></center>

</form>
</div>
</body>
</html>