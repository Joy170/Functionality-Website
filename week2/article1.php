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
</style>
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
	$sql = "SELECT * FROM article WHERE articleID = '". $_POST["ID"] ."'";

	$result = $conn->query($sql);
	$count = 0;
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = mysqli_fetch_array($result))
		{
	    echo "<p>Title: </p>";
		echo $row['articleTitle'];
		echo "<br><p>Author: </p>";
		echo $row['articleAuthor'];
		echo "<br><br>";
		echo $row['articleText'];
		echo "<br><br>";
		echo '<img src="'.$row['articleImage'].'" width = "250px"  height = "auto" align="right"> ';
		echo "<br><br>";
        echo '<iframe width="560" height="315" src=" '.$row['articleVideo'].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';	
		echo "<br><br>";
		}
	}
	else
	{echo "NO SUCCESS, article not found";}	
	
?>
      <button onclick="window.location.href = 'https://mayar.abertay.ac.uk/~1704097/306/week2/practical2';">Click Here to go back</button>
</body>
</html>