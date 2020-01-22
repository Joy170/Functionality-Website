<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en"><head> 
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
</head>
<style>
button {
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
body{
	padding-left: 15px;
	padding-right: 15px;
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
<body>
	
	<?php
	include 'navbar.php';
	echo'<h1>Display the Article</h1>';
		include("../model/queryDB.php") ;
		$id = $_GET['ID'] ;
		$article = getArticleById($id) ;
		$itemjson = json_decode($article) ;
		for ($i=0 ; $i<sizeof($itemjson) ; $i++) {		
			
			echo "Article Title: " ;			
			echo $itemjson[$i] -> articleTitle ;
			echo "<br>" ;
			echo "Article Author: " ;			
			echo $itemjson[$i] -> articleAuthor ;
			echo "<br><br>" ;
			echo $itemjson[$i] -> articleText ;
			echo "<br><br>" ;
            echo "<img src='";
            echo $itemjson[$i] -> articleImage ;
            echo " 'width = '250px' height ='250px'>";	
            echo"<br>";						
		}
		
		$text = getCommentsArticle($id); //query that is being called that get all comments for specific article
		$commentjson = json_decode($text) ; //json
		echo "<h4>Comments</h4>";
		for ($i = 0; $i <sizeof($commentjson); $i++ ) { 
		echo "<br>" ;			
		echo"<div style='background-color: lavender; border-style: solid;border-color:grey'>";
		echo "User: " ;			
		echo $commentjson[$i] -> userEmail ;
		echo "<br>" ;			
		echo "Comment: " ;			
		echo $commentjson[$i] -> commentInput ;			
		echo "<br>";
        echo"</div>";			
		}
			
			
echo"<form action='../control/saveComment.php' method='post'>
  <br>Leave Your Comment:<br>
  <input type='text' name='comment' size='35'>
    <input type='text' name='articleID'  value='".$id."' hidden>
  <br>
 <br>
  <input type='submit' value='Submit'> 
</form> ";//all users can try and leave a comment but its only Submitted if youre a user
	
		echo "<hr>";
	if (isset($_SESSION['UserNow']))
	 {
		 echo "Logged in: " . $_SESSION['UserEmail']."<br>";
		 echo '<a href="https://mayar.abertay.ac.uk/~1704097/306/week4/view/logOut.php">Log Out Here</a>';
	 }
	 else{
		 echo "No User logged in, login required to make comments";
		 	echo'<br><a href="https://mayar.abertay.ac.uk/~1704097/306/week4/view/login.php">Login Here</a>';

	 }	
	?> 
	      <br><button onclick="window.location.href = 'displayallItems.php';">Display all</button>
</body>
</html>
