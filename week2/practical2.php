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
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js">
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
  input[type="submit"] {
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

include 'navbar.php';
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
	$itemIDArray=[];//declaring items array

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $titleArray[] = $row["title"]; //claryfying what it is
	        $descriptionArray[] = $row["description"];
		    $itemIDArray[] = $row["itemID"];//setting  up a an array
	    }
	} else {
	    echo "0 results for itemsWeek2 table";
	}
	
	
	$linkImageArray = []; //a 2 dimensional array that pinpoints the imageID to the itemID
	foreach ($itemIDArray as $itemIDloop){
	$sql = 'SELECT * FROM linkImagesItems WHERE itemID ="'. $itemIDloop .'"';
	$result = $conn->query($sql);
	$count = 0;

	if ($result->num_rows > 0) { //matches up the imageID and the itemID
		while($row = mysqli_fetch_array($result)) {
			$linkImageArray[$itemIDloop][$count] = $row['imageID'];
			$count++; //if there are multiple images in an item, they can be shown in one bootstrap card
	    }
	} else {
	    echo "no results <br>";
	}
	}
		
$numberofItems = count($itemIDArray); //equals the amount of items
$imageArray = [];
for ($x = 0; $x <= $numberofItems; $x++) { //loops for the aount of items there are in the table(in our case 12, but need to be flexible if more added)
    for ($y = 0; $y <= 10; $y++) {
		if($linkImageArray[$x][$y] != NULL){
			$sql = "SELECT * FROM images WHERE imageID = '". $linkImageArray[$x][$y] ."'";
			$result = $conn->query($sql);
			
			//$count = 0;
			
			if ($result->num_rows > 0) {
			// output data of each row
				while($row = mysqli_fetch_array($result))
				{
				$imageArray[$x][$y] = $row['imageSource'];
								
				}
			} 
		}
		else{
			break;
		}
}
}
$linkArticleArray = [];
	foreach ($itemIDArray as $articleIDloop){
	$sql = 'SELECT * FROM linkArticleItems WHERE itemID ="'. $articleIDloop .'"';
	$result = $conn->query($sql);
	$amountofArticles = 0;//counts the amount of articles in each items (usually 1 or 0)

	if ($result->num_rows > 0) {
		while($row = mysqli_fetch_array($result)) {
			$linkArticleArray[$articleIDloop][$amountofArticles] = $row['articleID'];			
			$amountofArticles++;
	    }
	} else {
	}
	}
	
	//loops for the amount amount of items and sees if there is an article, if yes then stores the relevant info it to the array(articleID and articleTitle)
$numberofImages = count($itemIDArray);
$articleIDArray = [];
$articleTitleArray = [];
for ($x = 0; $x <= $numberofImages; $x++) {
    for ($y = 0; $y <= 10; $y++) {
		if($linkArticleArray[$x][$y] != NULL){
			$sql = "SELECT * FROM article WHERE articleID = '". $linkArticleArray[$x][$y] ."'"; //queries the article db for a specific article
			$result = $conn->query($sql);
						
			if ($result->num_rows > 0) {
				while($row = mysqli_fetch_array($result))
				{
				$articleIDArray[$x][$y] = $row['articleID'];
			    $articleTitleArray[$x][$y] = $row['articleTitle'];
								
				}
			}
		}
		else{
			break; //breaks if there is no article left on the item, or if an item does not have an article
		}
}
}

echo '<div class="container-fluid">';
  
  for ($i = 1; $i < 12; $i = $i + 3) { //iterates through all items and goes up 3 everytime so that the rows can be displayed properly
	  $active = false; //to make sure that the images scroll through
	  echo ' <div class="row">
	  <div class="col-sm-4">
	  <div class="card">
	  <div class="card-body">
	  
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">';
  for ($y = 0; $y <= 10; $y++) { //goes through all images switching fom true and false active
		if($imageArray[$i][$y] != NULL){
			if($active == false)
			{
				echo '<div class="carousel-item active">
				<img class="d-block w-100" src="'.$imageArray[$i][$y].'" alt="First slide">
				</div>';
				$active = true;
			}
			else{
				echo '<div class="carousel-item">
				<img class="d-block w-100" src="'.$imageArray[$i][$y].'" alt="Second slide">
				</div>';
			}
		}
		else{
			$active = false;
			break;
		}
  }
	echo'</div>
</div>
	  
	  <h5 class="card-title">'.$titleArray[$i-1] .'</h5>
	  <p class="card-text">'.$descriptionArray[$i-1] .'</p>';
	  
for ($y = 0; $y <= 10; $y++) {
		if($articleIDArray[$i][$y] != NULL){
				echo '<form action="article1.php" method="post">
				<input type="hidden" type="text" name="ID" value ="'.$articleIDArray[$i][$y].'" >
				<p>Article Title: '.$articleTitleArray[$i][$y].'</p><br>
				<input type="submit" value = "Go to Article">
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
			if($active == false)
			{
				echo '<div class="carousel-item active">
				<img class="d-block w-100" src="'.$imageArray[$i+1][$y].'" alt="First slide">
				</div>';
				$active = true;
			}
			else{
				echo '<div class="carousel-item">
				<img class="d-block w-100" src="'.$imageArray[$i+1][$y].'" alt="Second slide">
				</div>';
			}
		}
		else{
			$active = false;
			break;
			$active = false;

		}
  }
	echo'</div>
  
</div>

<h5 class="card-title">'.$titleArray[$i] .'</h5>
	  <p class="card-text">'.$descriptionArray[$i] .'</p>';
	  
	  for ($y = 0; $y <= 10; $y++) {
		if($articleIDArray[$i+1][$y] != NULL){
				echo '<form action="article1.php" method="post">
				<input type="hidden" type="text" name="ID" value ="'.$articleIDArray[$i+1][$y].'" ><br>
				<p>Article Title: '.$articleTitleArray[$i+1][$y].'</p><br>
				<input type="submit" value = "Go to Article">
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
			if($active == false)
			{
				echo '<div class="carousel-item active">
				<img class="d-block w-100" src="'.$imageArray[$i+2][$y].'" alt="First slide">
				</div>';
				$active = true;
			}
			else{
				echo '<div class="carousel-item">
				<img class="d-block w-100" src="'.$imageArray[$i+2][$y].'" alt="Second slide">
				</div>';
			}
		}
		else{
			$active = false;
			break;
			$active = false;

		}
  }
	echo'</div>
 
</div>	 
	  <h5 class="card-title">'.$titleArray[$i+1] .'</h5>
	  <p class="card-text">'.$descriptionArray[$i+1] .'</p>';
	  
	  for ($y = 0; $y <= 10; $y++) {
		if($articleIDArray[$i+2][$y] != NULL){
				echo '<form action="article1.php" method="post">
				<input type="hidden" type="text" name="ID" value ="'.$articleIDArray[$i+2][$y].'" ><br>
				<p>Article Title: '.$articleTitleArray[$i+2][$y].'</p><br>
				<input type="submit" value = "Go to Article">
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
	$conn->close();
?>
<br><br><br>
<div class="footer">
  <p>Joy Firdaus 1704097</p>
  
</div> 

</body>

</html>