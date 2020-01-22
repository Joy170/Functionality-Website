<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php
include("../model/queryDB.php");
if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
	  }
        if(!$captcha){
          echo "<script>javascript: alert('Registration not successful, make sure to fill out the Captcha')</script>";
			echo "<script type='text/javascript'>location.href = 'https://mayar.abertay.ac.uk/~1704097/306/week5/view/register.php';</script>";

          exit;
        }
	$secretKey = "6LeQTrwUAAAAALwTqxJc5Nxul4E2biHlmFXvBDuz";
	$ip = $_SERVER['REMOTE_ADDR'];
	// post request to server
	$url =  'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
	$response = file_get_contents($url);
	$responseKeys = json_decode($response,true);
	if($responseKeys["success"]) {
		if ($_POST['password']!= $_POST['psw-repeat'])
 {
	echo "<script>javascript: alert('Passwords dont match, try again!')</script>";
	echo "<script type='text/javascript'>location.href = 'https://mayar.abertay.ac.uk/~1704097/306/week5/view/register.php';</script>";
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
echo "<script>javascript: alert('Registration successful, please try loging in')</script>";
					echo "<script type='text/javascript'>location.href = 'https://mayar.abertay.ac.uk/~1704097/306/week5/view/login.php';</script>";
 }
	 
	} else {
		echo '<h2>Im not sure you should be here.</h2>';
        }

?>
</body>
</html>