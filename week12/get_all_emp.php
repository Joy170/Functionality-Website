
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
	$url = "https://mayar.abertay.ac.uk/~1704097/306/week12/employees.php?" ;
	//$url = "localhost/ .. /employees.php" ;
	$curl = curl_init($url) ;
  	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                     
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                                                                                                                                                                            
  	$resp = curl_exec($curl) ;
  	//echo "Finished : <br>" ;
  	//echo $resp ;
	$test = json_decode($resp);
    echo "List of all the Items";
	foreach($test as $tests) { 
	echo "Name is : ". $tests->title . "<br>";
	echo "Description is : ". $tests->description . "<br>";
	echo "<img height='100' width='100' src =". $tests->image . "><br>";
	echo "<br>";
	} 
		
  	if (!$resp) {die('Error : "'.curl_error($curl).'" - Code: '.curl_errno($curl)); }
  	curl_close($curl);	
?>
</body>
</html>