<!DOCTYPE html>
<html>
<head>
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
	</head>
	<body>
<?php
include 'navbar.php';
	//  complete the CURL
	$url = "https://mayar.abertay.ac.uk/~1704097/306/week12/employees.php" ;
	//$url = "localhost/.../employees.php" ;
	
	$description = $_POST['description'];
	echo $_POST['description'];
	$image = $_POST['image'];
	$title = $_POST['title'];
	$data = '{"title": "'.$title.'", "description": "'.$description.'", "image" : "'.$image.'"}' ;
	$curl = curl_init($url) ;
  	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                                                                  
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
    	'Content-Type: application/json',                                                                                
    	'Content-Length: ' . strlen($data))                                                                       
	);                 
  	$resp = curl_exec($curl) ;
  	echo "Finished :" ;
  	echo $resp ;
  	if (!$resp) {die('Error : "'.curl_error($curl).'" - Code: '.curl_errno($curl)); }
  	curl_close($curl) ;	
?>
</body>
</html>