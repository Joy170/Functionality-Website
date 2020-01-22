<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php
include("../model/queryDB.php");
if ($_POST['password']!= $_POST['psw-repeat'])
 {
	echo "<script>javascript: alert('Passwords dont match, try again!')</script>";
	echo "<script type='text/javascript'>location.href = 'https://mayar.abertay.ac.uk/~1704097/306/week4/view/register.php';</script>";
 }
 else{
 //another php just to connect

$data->firstname = $_POST["firstname"];
$data->lastname= $_POST["surname"];
$data->mobileno = $_POST["mobileno"];
$data->password = $_POST["password"];
$data->email = $_POST["email"];
$datatxt = json_encode($data);
$res = saveDetails($datatxt);
 }
?>
</body>
</html>