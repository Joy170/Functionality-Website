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
	#logOut{
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
session_start();
include 'navbar.php';

// destroy the session 
$_SESSION = array() ; // balnk the session array	
setcookie(session_name(), '', time()-2592000, '/');
echo "Log out successful";

echo '<br><a id="logOut" href="https://mayar.abertay.ac.uk/~1704097/306/week4/view/login.php">Login Here</a><br>';
echo '<a id="logOut" href="https://mayar.abertay.ac.uk/~1704097/306/week4/view/displayallItems.php">Display Items page</a>';

?>
</body>
</html>