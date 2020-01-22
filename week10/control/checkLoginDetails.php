<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php
include("../model/queryDB.php"); //another php just to connect
$data -> email = $_POST["email"];
$data -> password = $_POST["password"];
if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
	  }
        if(!$captcha){
          echo "<script>javascript: alert('Login not successful, make sure to fill out the Captcha')</script>";
			echo "<script type='text/javascript'>location.href = 'https://mayar.abertay.ac.uk/~1704097/306/week5/view/login.php';</script>";

          exit;
        }
	$secretKey = "6LeQTrwUAAAAALwTqxJc5Nxul4E2biHlmFXvBDuz";
	$ip = $_SERVER['REMOTE_ADDR'];
	// post request to server
	$url =  'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
	$response = file_get_contents($url);
	$responseKeys = json_decode($response,true);
	if($responseKeys["success"]) {
					echo "<script type='text/javascript'>location.href = 'https://mayar.abertay.ac.uk/~1704097/306/week5/view/displayallItems.php';</script>";
		$datatxt = json_encode($data);
     $res = checkLogin($datatxt);
	} else {
		echo '<h2>Im not sure you should be here.</h2>';
        }
?>
</body>
</html>