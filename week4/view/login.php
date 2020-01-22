<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="utf-8">
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
	<style>
	button[type="submit"] {
   background-color: #89cff0;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<body>
<?php
include 'navbar.php';
include("../model/connectDB.php"); //another php just to connect
$db = new dbObj();
$conn =  $db->getConnstring();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


echo'<form action="https://mayar.abertay.ac.uk/~1704097/306/week4/control/checkLoginDetails.php" method="POST">

  <div class="container">
    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Username" name="email" required>
	<br>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
	<br>


    <button type="submit">Login</button>
  </div>
	<br>

  <div class="container" style="background-color:#f1f1f1">
    <span class="psw">No account? <a href="https://mayar.abertay.ac.uk/~1704097/306/week4/view/register.php">Register here</a></span>
  </div>
</form>';

if (isset($_SESSION['UserNow']))
	 {
		 echo "Logged in: " . $_SESSION['UserEmail']."<br>";
		 echo '<a href="https://mayar.abertay.ac.uk/~1704097/306/week4/control/logOut.php">Log Out Here</a>';
	 }
	 else{
		 echo "No User Currently Logged in";
	 }

?>
</body>
</html>