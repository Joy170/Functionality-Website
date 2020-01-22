<!DOCTYPE html> 
<html> 
	<head> 
	<meta charset="utf-8">
	<title>Multi Page Example</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head> 
<body> 
<div data-role="page" id="mobilephone" data-title="Mobile Phone">
	<div data-role="header">
		<h1>Basic Program</h1>
	</div>

	<div data-role="content">	
		<h1>Readings of electric imp</h1>
		<?php
       include("queryDB.php") ; //link to all sql queries
		$text = getAllReadings() ; //query that is being called that get all items from DB 
		$itemjson = json_decode($text) ; //json
		for ($i = sizeof($itemjson)-1; $i > 100; $i--) { 
		echo "Reading number: ";
		echo $itemjson[$i] -> rid;
		echo "<br>";
		echo "Date and time: ";
		echo $itemjson[$i] -> datetime;
		echo "<br>";
		echo "state: ";
		echo $itemjson[$i] -> state;
	    echo "<br>";
		}
		?>
		
		<a href="https://mayar.abertay.ac.uk/~1704097/306/week9/jqm.php" data-role="button">Back to home</a>
	</div>
	
	<div data-role="footer" data-position="fixed">
		<h4>Page Footer - Written by GRL</h4>
	</div>
	
</div>

