<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
	</script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js">
	</script>
</head>
<style>
body {
  padding-left: 2%;
  padding-right:2%;
}
button {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
  text-align: center;
  cursor: pointer;
  padding: 15px 32px;
}
</style>
<body>
	<?php
	include 'navbar.php';
	
include("../model/connectDB.php"); //another php just to connect
$db = new dbObj();
$conn =  $db->getConnstring();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


echo'<form action="https://mayar.abertay.ac.uk/~1704097/306/week5/control/checkLoginDetails.php" method="POST">

  <div class="container">
    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Username" name="email" required>
	<br>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
	<br>
	
<div class="g-recaptcha" data-sitekey="6LeQTrwUAAAAADMmVXBVEWC3bcuTZDqTSpxPYJL4"></div>

    <button type="submit">Login</button>
  </div>
	<br>

  <div class="container" style="background-color:#f1f1f1">
    <span class="psw">No account? <a href="https://mayar.abertay.ac.uk/~1704097/306/week4/view/register.php">Register here</a></span>
	<br><a href="https://mayar.abertay.ac.uk/~1704097/306/week5/view/displayallItems.php">Items display</a><br>';

if (isset($_SESSION['UserNow']))
	 {
		 echo "Logged in: " . $_SESSION['UserEmail']."<br>";
		 echo '<a href="https://mayar.abertay.ac.uk/~1704097/306/week5/view/logOut.php">Log Out Here</a>';
	 }
	 else{
		 echo "No User logged in";
	 }
  echo'</div>
</form>';

?>
</body>
</html>