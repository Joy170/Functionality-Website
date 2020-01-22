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
// destroy the session 
$_SESSION = array() ; // balnk the session array	
setcookie(session_name(), '', time()-2592000, '/');
echo "You have logged out successfully!";

echo '<br><button><a href="https://mayar.abertay.ac.uk/~1704097/306/week5/view/login.php">Login Here<a></button><br>';
echo '<button><a href="https://mayar.abertay.ac.uk/~1704097/306/week5/view/displayallItems.php">Display Items page</a></button>';

?>
</body>
</html>