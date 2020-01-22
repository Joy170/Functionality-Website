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
	<style>
	#chartContainer{
		padding-left:2%;
		padding-right:20px;
	}
	</style>
<body> 

<!-- First Page -->
<div data-role="page" id="home" data-title="Home Page">
	<div data-role="header">
		<h1>Week 9 JQuery Mobile</h1>
	</div>

	<div data-role="content">
			<a href="https://mayar.abertay.ac.uk/~1704097/306/week9/contact.php" data-role="button">Basic program</a></br>	
		<a href="#mobilephone" data-role="button">Task 2: Latest 10 records</a></br>
		<a href="#ajax" data-role="button">Task 3: Latest values(AJAX)</a></br>			
		<a href="#address" data-role="button">Task 4: Graphs</a>
	</div>
	
	<div data-role="footer" data-position="fixed">
		<h4>Page Footer - Written by GRL</h4>
	</div>
</div>

<!-- Second Page -->
<div data-role="page" id="mobilephone" data-title="Mobile Phone">
	<div data-role="header">
		<h1>Task 2</h1>
	</div>

	<div data-role="content">
		<h1>Readings of electric imp</h1>
		<?php
       include("queryDB.php") ; //link to all sql queries
		$text = getAllReadings() ; //query that is being called that get all items from DB 
		$itemjson = json_decode($text) ; //json
		for ($i = sizeof($itemjson)-10; $i <sizeof($itemjson); $i++) { 
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
		<a href="#home" data-role="button">Back to home</a>
	</div>
	
	<div data-role="footer" data-position="fixed">
		<h4>Page Footer - Written by GRL</h4>
	</div>
</div>
<!-- end of second -->

<div data-role="page" id="ajax" data-title="update ajax">
	<div data-role="header">
		<h1>Task 3</h1>
	</div>

	<div data-role="content">
		<h1>Updated readings of electric imp</h1>
		<div id="reload">
		<?php
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
		</div>
		<script type="text/javascript" language="javascript">
var $scores = $("#reload");
setInterval(function () {
    $scores.load("https://mayar.abertay.ac.uk/~1704097/306/week9/jqm.php#ajax #reload");
}, 2000);
</script>
		<a href="#home" data-role="button">Back to home</a>
	</div>
	
	<div data-role="footer" data-position="fixed">
		<h4>Page Footer - Written by GRL</h4>
	</div>
</div>

<!-- Third Page -->
<div data-role="page" id="address" data-title="Work Address">
	<div data-role="header">
		<h1>Task 4 </h1>
	</div>

	<div data-role="content">
<script type="text/javascript">
window.onload = function ()
{
	var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	
	title:{
		text:"Last 10 internal readings"
	},
	axisX:{
		interval: 1
	},
	axisY2:{
		interlacedColor: "rgba(1,77,101,.2)",
		gridColor: "rgba(1,77,101,.1)",
		title: "in degrees Celsius"
	},
	data: [{
		type: "bar",
		name: "readings",
		axisYType: "secondary",
		color: "#014D65",
		dataPoints: [<?php
		$conn = new mysqli('lochnagar.abertay.ac.uk', 'sql1704097', 'eDKP1mt6NQiG', 'sql1704097');
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			$sql = "SELECT * FROM reading ORDER BY rID DESC LIMIT 10";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				$i = 1;
				while($row = $result->fetch_assoc()) {
					if ($i != 10){
					$test = json_decode($row["state"]);
					echo '{ label: '. $i . ', y: '.$test -> internal.'},';
					}
					else{
					echo '{ label: '. $i . ', y: '.$test -> internal.'}';
					}
					$i++;
				}
			} 
			?>
		]
	}]
});
chart.render();

}
</script>
<div id="chartContainer" style="height: 400px; width: 300px;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	</div>
		<a href="#home" data-role="button">Back to home</a>
	<div data-role="footer" data-position="fixed">
		<h4>Page Footer - Written by GRL</h4>
	</div>
</div>

</body>
</html>

