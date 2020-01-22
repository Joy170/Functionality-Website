<!DOCTYPE html>
<html lang="en">
<head>
  <title>Eco friendly materials</title>
  <meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
	</script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
	</script>
  <style>
  .carousel-item { 
  object-fit: contain; 
  height:250px;
  width:250px;
}
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: lavender;
  color: black;
  text-align: center;
} 

  .hide{
	    visibility: hidden;
  }
  </style>
</head>

<body>
<?php
	$servername = "lochnagar.abertay.ac.uk";
	$username = "sql1704097";
	$password = "eDKP1mt6NQiG";
	$dbname = "sql1704097";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die('Connection failed: ' . $conn->connect_error);
	}

	$sql = "SELECT title, description, itemID  FROM itemsWeek2";
	$result = $conn->query($sql);

	$titleArray=[]; //declaring array
	$descriptionArray=[]; //declaring array
	$imageArray=[]; //declaring array
	$itemIDArray=[];

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $titleArray[] = $row["title"]; //claryfying what it is
	        $descriptionArray[] = $row["description"];
		    $itemIDArray[] = $row["itemID"];


	    }
	} else {
	    echo "0 results";
	}
	
	

	
	$testImageArray = [];
	foreach ($itemIDArray as $test){
	$sql = 'SELECT * FROM linkImagesItems WHERE itemID ="'. $test .'"';
	$result = $conn->query($sql);
	$count = 0;

	if ($result->num_rows > 0) {
	    // output data of each row
	    //while($row = $result->fetch_assoc()) {
		while($row = mysqli_fetch_array($result)) {
			$testImageArray[$test][$count] = $row['imageID'];
			$count++;

	    }
	} else {
	    echo "no results <br>";
	}
	}
	
	
$countTest = count($itemIDArray);
$imageArray = [];
for ($x = 0; $x <= $countTest; $x++) {
    for ($y = 0; $y <= 10; $y++) {
		if($testImageArray[$x][$y] != NULL){
			$sql = "SELECT * FROM images WHERE imageID = '". $testImageArray[$x][$y] ."'";
			$result = $conn->query($sql);
			
			//$count = 0;
			
			if ($result->num_rows > 0) {
			// output data of each row
				while($row = mysqli_fetch_array($result))
				{
				$imageArray[$x][$y] = $row['imageSource'];
								
				}
			} else {
				echo "0 results";
				echo "<br>";
			}
		}
		else{
			break;
		}
}
}
$testArtArray = [];
	foreach ($itemIDArray as $test){
	$sql = 'SELECT * FROM linkArticleItems WHERE itemID ="'. $test .'"';
	$result = $conn->query($sql);
	$countArt = 0;

	if ($result->num_rows > 0) {
	    // output data of each row
	    //while($row = $result->fetch_assoc()) {
		while($row = mysqli_fetch_array($result)) {
			$testArtArray[$test][$countArt] = $row['articleID'];
			//echo $row['articleID'];
			//echo "in " .$testArtArray[$test][$countArt];
			$countArt++;

	    }
	} else {
	    //echo "no results <br>";
	}
	}
	
	
$countTest2 = count($itemIDArray);
$artTitleArray = [];
for ($x = 0; $x <= $countTest2; $x++) {
    for ($y = 0; $y <= 10; $y++) {
		if($testArtArray[$x][$y] != NULL){
			$sql = "SELECT * FROM article WHERE articleID = '". $testArtArray[$x][$y] ."'";
			//echo $sql;
			$result = $conn->query($sql);
			
			//$count = 0;
			
			if ($result->num_rows > 0) {
			// output data of each row
				while($row = mysqli_fetch_array($result))
				{
				$artTitleArray[$x][$y] = $row['articleID'];
								
				}
			} else {
				echo "0 results";
				echo "<br>";
			}
		}
		else{
			break;
		}
}
}
	$conn->close();

$servername = "lochnagar.abertay.ac.uk";
$username = "sql1704097";
$password = "eDKP1mt6NQiG";
$dbname = "sql1704097";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, description, itemID, image  FROM items";
$result = $conn->query($sql);

$titleArray=[]; //declaring array
$descriptionArray=[]; //declaring array

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$titleArray[] = $row["title"]; //claryfying what it is
	    $descriptionArray[] = $row["description"];

    }
} else {
    echo "0 results";
}

$conn->close();
?>

<div class="container-fluid">
  
  <?php
  for ($i = 1; $i < 12; $i = $i + 3) {
	  $active = 0;
	  echo ' <div class="row">
	  <div class="col-sm-4">
	  <div class="card">
	  <div class="card-body">
	  
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">';
  for ($y = 0; $y <= 10; $y++) {
		if($imageArray[$i][$y] != NULL){
			if($active == 0)
			{
				echo '<div class="carousel-item active">
				<img class="d-block w-100" src="'.$imageArray[$i][$y].'" alt="First slide">
				</div>';
				$active = 1;
			}
			else{
				echo '<div class="carousel-item">
				<img class="d-block w-100" src="'.$imageArray[$i][$y].'" alt="Second slide">
				</div>';
			}
		}
		else{
			$active = 0;
			break;
		}
  }
	echo'</div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	  
	  <h5 class="card-title">'.$titleArray[$i-1] .'</h5>
	  <p class="card-text">'.$descriptionArray[$i-1] .'</p>';
	  
for ($y = 0; $y <= 10; $y++) {
		if($artTitleArray[$i][$y] != NULL){
				echo '<form action="article2.php" method="post">
				<input type="text" name="ID" value ="'.$artTitleArray[$i][$y].'" ><br>
				<input type="submit" value = "true">
				</form>';
			}
			else{
			break;
		}
		}

	  echo '
	  </div>
	  </div>
	  </div>
	  
	  <div class="col-sm-4">
	  <div class="card">
	  <div class="card-body">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">';
  for ($y = 0; $y <= 10; $y++) {
		if($imageArray[$i+1][$y] != NULL){
			if($active == 0)
			{
				echo '<div class="carousel-item active">
				<img class="d-block w-100" src="'.$imageArray[$i+1][$y].'" alt="First slide">
				</div>';
				$active = 1;
			}
			else{
				echo '<div class="carousel-item">
				<img class="d-block w-100" src="'.$imageArray[$i+1][$y].'" alt="Second slide">
				</div>';
			}
		}
		else{
			$active = 0;
			break;
			$active = 0;

		}
  }
	echo'</div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>	  
<h5 class="card-title">'.$titleArray[$i] .'</h5>
	  <p class="card-text">'.$descriptionArray[$i] .'</p>';
	  
	  for ($y = 0; $y <= 10; $y++) {
		if($artTitleArray[$i+1][$y] != NULL){
				echo '<form action="article1.php" method="post">
				<input type="hidden" type="text" name="ID" value ="'.$artTitleArray[$i+1][$y].'" ><br>
				<input  type="submit" value = "Article">
				</form>';
			}
			else{
			break;
		}
		}

	  echo '
	  
	  </div>
	  </div>
	  </div>
	  
	  <div class="col-sm-4">
	  <div class="card">
	  <div class="card-body">
	  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">';
  for ($y = 0; $y <= 10; $y++) {
		if($imageArray[$i+2][$y] != NULL){
			if($active == 0)
			{
				echo '<div class="carousel-item active">
				<img class="d-block w-100" src="'.$imageArray[$i+2][$y].'" alt="First slide">
				</div>';
				$active = 1;
			}
			else{
				echo '<div class="carousel-item">
				<img class="d-block w-100" src="'.$imageArray[$i+2][$y].'" alt="Second slide">
				</div>';
			}
		}
		else{
			$active = 0;
			break;
			$active = 0;

		}
  }
	echo'</div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>	 
	  <h5 class="card-title">'.$titleArray[$i+1] .'</h5>
	  <p class="card-text">'.$descriptionArray[$i+1] .'</p>';
	  
	  for ($y = 0; $y <= 10; $y++) {
		if($artTitleArray[$i+2][$y] != NULL){
				echo '<form action="article2.php" method="post">
				<input type="text" name="ID" value ="'.$artTitleArray[$i+2][$y].'" ><br>
				<input type="submit" value = "true">
				</form>';
			}
			else{
			break;
		}
		}

	  echo '
	  
	  </div>
	  </div>
	  </div>
	  
	  </div>';	  

  }
  
	$servername = "lochnagar.abertay.ac.uk";
	$username = "sql1704097";
	$password = "eDKP1mt6NQiG";
	$dbname = "sql1704097";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die('Connection failed: ' . $conn->connect_error);
	}

	$sql = "SELECT * FROM article";
	$result = $conn->query($sql);

	$articleIDArray=[]; //declaring array
	$articleAuthorArray=[]; //declaring array
	$articleTextArray=[]; //declaring array
	$articleImageArray=[]; //declaring array
	$articleTitleArray=[]; //declaring array
	$articleVideoArray=[]; //declaring array

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        	$articleIDArray[] = $row["articleID"]; //claryfying what it is
	        	$articleAuthorArray[] = $row["articleAuthor"]; //claryfying what it is
	        	$articleTextArray[] = $row["articleText"]; //claryfying what it is
	        	$articleImageArray[] = $row["articleImage"]; //claryfying what it is
	        	$articleTitleArray[] = $row["articleTitle"]; //claryfying what it is
               	$articleVideoArray[] = $row["articleVideo"]; //claryfying what it is
     echo "hello this works";
	 
	    }
	} 
	else {
	    echo "0 results";
	}
	
	
echo '<button onclick="myFunction()">open the article text</button>

<script>
function myFunction(x) {
  var w = window.open();
  w.document.open();
  w.document.write("<p>Title: '. $articleTitleArray[x].'</p>");
  w.document.write("<p>Author: '. $articleAuthorArray[x].'</p>");
  w.document.write("<img src='.$articleImageArray[x].' >");
  w.document.write("<p>'. $articleTextArray[x].'</p>");
  w.document.close();
}
</script>';
	$conn->close();
?>

<div class="footer">
  <p>Joy Firdaus 1704097</p>
  
</div> 

</body>

</html>