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
  body {
  padding-left: 2%;
  padding-right:2%;
}
  .carousel-item { 
  object-fit: contain; 
  height:250px;
  width:250px;
}
.footer {
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
  .img {
  object-fit: cover;

  width: 300px;
  height: 337px;
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
button {
	float:right;
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
table {
	width:100%;
  background-color: white;
  color: grey;
}
tr:nth-child(even) {background-color: #f2f2f2;
  }

th{

  border: 1px solid grey;
  padding-top: 4px;
  padding-right: 4px;
  padding-bottom: 4px;
  padding-left: 4px;
}

#top{
  background-color:  #3984C1;
  color: white;
  padding-top: 4px;
  padding-right: 4px;
  padding-bottom: 4px;
  padding-left: 4px;
}
  </style>
</head>
<body>
	<?php
include 'navbar.php';
?>
<a href="https://mayar.abertay.ac.uk/~1704097/306/week10/view/eco.xml"><button>Subsribe to my RSS feed</button></a>
<br><br><br>
<?php
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
		?>
		<br>
		<table>
<tr id="top">
<th>Name of article</th>
<th>Link</th>

</tr>
<?php
echo '<h2>Interesting Articles about Sustainable Lifestyles</h2>';

//  code to list the contacts
$xmltxt = file_get_contents('http://www.justluxe.com/rss/rss-channels.php?sec=lifestyle'); 
$xml = simplexml_load_string($xmltxt)  ;
//var_dump($xml) ;
echo "<br/><br/>" ;
$xsl = simplexml_load_file("external.xsl")  ;
$proc = new XSLTProcessor() ;
$proc->importStyleSheet($xsl);
$result = $proc->transformtoXML($xml) ;
echo $result;
?>
</table>
<br><br>

		
<?php		
	echo'<br>';
	
echo'<div class="footer">';
if (isset($_SESSION['UserNow']))
	 {
		 echo "Logged in: " . $_SESSION['UserEmail']."<br>";
		 echo '<a href="https://mayar.abertay.ac.uk/~1704097/306/week5/view/logOut.php">Log Out Here</a>';
	 }
	 else{
		 echo "No User logged in";
		 echo '<br><a href="https://mayar.abertay.ac.uk/~1704097/306/week5/view/login.php">Login Here</a>';

	 }
 echo'<p>Joy Firdaus 1704097</p>';
  
echo '</div>'; 
	?> 

</body>
</html>