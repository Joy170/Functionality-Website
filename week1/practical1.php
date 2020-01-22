<!DOCTYPE html>
<html lang="en">
<head>
  <title>Eco friendly materials</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  .card-img-top { 
  object-fit: contain; 
  height:250px;
  width:250px;
}
.footer {
padding-top: 15px;
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: lavender;
  color: black;
  text-align: center;
} 
.container-fluid{
padding-bottom: 45px;
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
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, description, itemID, image  FROM items";
$result = $conn->query($sql);

$titleArray=[]; //declaring array
$descriptionArray=[]; //declaring array
$imageArray=[]; //declaring array

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$titleArray[] = $row["title"]; //claryfying what it is
	    $descriptionArray[] = $row["description"];
		$imageArray[] = $row["image"];

    }
} else {
    echo "0 results";
}

$conn->close();
?>

<div class="container-fluid">
  
  <?php
  for ($i = 0; $i < 12; $i = $i + 3) {
	  echo ' <div class="row">
	  <div class="col-sm-4">
	  <div class="card">
	  <div class="card-body">
	  <img class="card-img-top" src="'.$imageArray[$i].'" alt="Card image cap" width = "100%"  height = "100%" >
	  <h5 class="card-title">'.$titleArray[$i] .'</h5>
	  <p class="card-text">'.$descriptionArray[$i] .'</p>
	  </div>
	  </div>
	  </div>
	  
	  <div class="col-sm-4">
	  <div class="card">
	  <div class="card-body">
	  <img class="card-img-top" src="'.$imageArray[$i+1].'" alt="Card image cap" width = "100%"  height = "auto" >
	  <h5 class="card-title">'.$titleArray[$i+1] .'</h5>
	  <p class="card-text">'.$descriptionArray[$i+1] .'</p>
	  </div>
	  </div>
	  </div>
	  
	  <div class="col-sm-4">
	  <div class="card">
	  <div class="card-body">
	  <img class="card-img-top" src="'.$imageArray[$i+2].'" alt="Card image cap" width = "100%"  height = "auto">
	  <h5 class="card-title">'.$titleArray[$i+2] .'</h5>
	  <p class="card-text">'.$descriptionArray[$i+2] .'</p>
	  </div>
	  </div>
	  </div>
	  
	  </div><br><br><br>';	  
} 
?>

<div class="footer">
  <p>Name: Joy Firdaus</p>
  <p>Student Number: 1704097</p>  
</div>

</body>

</html>
