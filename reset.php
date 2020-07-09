<?php
	include 'database_connect.php';
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
   <head> 
      <title>Password Reset</title>
        <link rel="stylesheet" type="text/css" href="expenditure.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body background="comb2.png">
<div class="entry">
<form action="reset.php" method="POST">

    <label>E-mail:</label>
    <input type="text" name="email" placeholder="...." /><br>
    <label>New Password:</label>
    <input type="password" name="password" placeholder="...."/><br>
    <label>Confirm Password:</label>
    <input type="password" name="confirmpassword" placeholder="...."/><br>
 	<input type="hidden" name="q" value=""/><br>

 <center><input style="width: 30%;" class="w3-btn w3-round w3-teal" type="submit" name="ResetPasswordForm" value=" Reset Password " /></center>
</form>
</div>


<?php

if (isset($_GET["q"])) {

    echo $_GET["q"];

}

?>
<?php

// Connect to MySQL
    $username = "b12_23243771"; 
    $password = "saloon3"; 
    $host = "sql207.epizy.com"; 
    $dbname = "b12_23243771_saloon_management"; 
try {
$conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);
//$conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');
}
catch(PDOException $ex) 
    { 
        $msg = "Failed to connect to the database"; 
    } 
    
// Was the form submitted?
if (isset($_POST["ResetPasswordForm"]))
{
	// Gather the post data
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirmpassword = $_POST["confirmpassword"];
	$hash = $_POST["q"];

	// Use the same salt from the forgot_password.php file
	$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

	// Generate the reset key
	$resetkey = hash('sha512', $salt.$email);

	// Does the new reset key match the old one?
	if ($resetkey == $hash)
	{
		if ($password == $confirmpassword)
		{
			//has and secure the password
			$password = hash('sha512', $salt.$password);

			// Update the user's password
				$query = $conn->prepare('UPDATE user SET password = :password WHERE email = :email');
				$query->bindParam(':password', $password);
				$query->bindParam(':email', $email);
				$query->execute();
				$conn = null;
			echo "Your password has been successfully reset.";
			header("location: manager.php");
		}
		else
			echo "Your password's do not match.";
	}
	else
		echo "Your password reset key is invalid.";
}

?>
</body>
</html>