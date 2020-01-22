<?php
session_start();
?>
<!DOCTYPE html>
<html>
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

		include("../model/queryDB.php") ; //link to all sql queries
		$text = getAllItems() ; //query that is being called that get all items from DB 
		$itemjson = json_decode($text) ; //json
		for ($i = 1; $i <sizeof($itemjson); $i = $i + 3) { //same loop like in the practical 
			
				echo'<div class="row">
		
				 <div class="col-sm-4">
	                   <div class="card">
	                   <div class="card-body">
					   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                       <div class="carousel-inner">';
	
	    $imageText = getLinkItemImages($itemjson[$i-1] -> itemID) ;
		$imagejson = json_decode($imageText);
		for ($j = 0; $j<sizeof($imagejson) ; $j++ )
		{
			if($j == 0)
			{
			echo '<div class="carousel-item active">
				<img class="d-block w-100" src="'.$imagejson[$j]-> imageSource.'" alt="First slide">
				</div>';
			}
			else{
				echo '<div class="carousel-item">
				<img class="d-block w-100" src="'.$imagejson[$j]-> imageSource.'" alt="Second slide">
				</div>';
			}
			
		}
		
		echo'</div>
</div>
	  
	  <h5 class="card-title">'.$itemjson[$i-1] -> title .'</h5>
	  <p class="card-text">'.$itemjson[$i-1] -> description.'</p>';
	  
	  
	  $articleText = getLinkArticleItem($itemjson[$i-1] -> itemID) ;
		$articlejson = json_decode($articleText);
		for ($j = 0; $j<sizeof($articlejson) ; $j++ )
		{
			echo '<form action="../view/displayArticle.php" method="get">
				<input type="hidden" type="text" name="ID" value ="'.$articlejson[$j] -> articleID.'" >
				<p>Article Title: '.$articlejson[$j] -> articleTitle.'</p><br>
				<input type="submit" value = "Go to Article">
				</form>';

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
	
	  $imageText = getLinkItemImages($itemjson[$i] -> itemID) ;
		$imagejson = json_decode($imageText);
		for ($j = 0; $j<sizeof($imagejson) ; $j++ )
		{
			if($j == 0)
			{
			echo '<div class="carousel-item active">
				<img class="d-block w-100" src="'.$imagejson[$j]-> imageSource.'" alt="First slide">
				</div>';
			}
			else{
				echo '<div class="carousel-item">
				<img class="d-block w-100" src="'.$imagejson[$j]-> imageSource.'" alt="Second slide">
				</div>';
			}
			
		}
		
		echo'</div>
</div>
	  
	  <h5 class="card-title">'.$itemjson[$i] -> title .'</h5>
	  <p class="card-text">'.$itemjson[$i] -> description.'</p>';
	  
	  
	  $articleText = getLinkArticleItem($itemjson[$i] -> itemID) ;
		$articlejson = json_decode($articleText);
		for ($j = 0; $j<sizeof($articlejson) ; $j++ )
		{
			echo '<form action="../view/displayArticle.php" method="get">
				<input type="hidden" type="text" name="ID" value ="'.$articlejson[$j] -> articleID.'" >
				<p>Article Title: '.$articlejson[$j] -> articleTitle.'</p><br>
				<input type="submit" value = "Go to Article">
				</form>';

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
	
	  $imageText = getLinkItemImages($itemjson[$i+1] -> itemID) ;
		$imagejson = json_decode($imageText);
		for ($j = 0; $j<sizeof($imagejson) ; $j++ )
		{
			if($j == 0)
			{
			echo '<div class="carousel-item active">
				<img class="d-block w-100" src="'.$imagejson[$j]-> imageSource.'" alt="First slide">
				</div>';
			}
			else{
				echo '<div class="carousel-item">
				<img class="d-block w-100" src="'.$imagejson[$j]-> imageSource.'" alt="Second slide">
				</div>';
			}
			
		}
		
		echo'</div>
</div>
	  
	  <h5 class="card-title">'.$itemjson[$i+1] -> title .'</h5>
	  <p class="card-text">'.$itemjson[$i+1] -> description.'</p>';
	  
	  
	  $articleText = getLinkArticleItem($itemjson[$i+1] -> itemID) ;
		$articlejson = json_decode($articleText);
		for ($j = 0; $j<sizeof($articlejson) ; $j++ )
		{
			echo '<form action="../view/displayArticle.php" method="get">
				<input type="hidden" type="text" name="ID" value ="'.$articlejson[$j] -> articleID.'" >
				<p>Article Title: '.$articlejson[$j] -> articleTitle.'</p><br>
				<input type="submit" value = "Go to Article">
				</form>';

		}
		 echo '
	  </div>
	  </div>
	  </div>	  
	  
	  
	  </div>';
	  
	}
	
		if (isset($_SESSION['UserNow']))
	 {
		 echo "Logged in: " . $_SESSION['UserEmail']."<br>";
		 echo '<a href="https://mayar.abertay.ac.uk/~1704097/306/week4/view/logOut.php">Log Out Here</a>';
	 }
	 else{
		 echo "No User logged in";
		 echo '<br><a href="https://mayar.abertay.ac.uk/~1704097/306/week4/view/login.php">Login Here</a>';

	 }
	 ?>
	<br><br><br>
	
<div class="footer">
  <p>Joy Firdaus 1704097</p>
  
</div> 
</body>
</html>