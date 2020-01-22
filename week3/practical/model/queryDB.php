<?php
	// Connect to database
	include("../model/connectDB.php"); //another php just to connect
	$db = new dbObj();
	$conn =  $db->getConnstring();
	
	//  function to get all the items
	function getAllItems()
	{
		global $conn;
		$sql = "SELECT * FROM itemsWeek2";
		$result = mysqli_query($conn, $sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows);
	}
	
	//  function to get all the articles
	function getAllArticle()
	{
		global $conn;
		$sql = "SELECT * FROM article";
		$result = mysqli_query($conn, $sql); // result stores the result of the query
		//  convert to JSON
		$rows = array(); //makes the varible row an array
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r; // puts every article into the array of rows 
		}
		return json_encode($rows);
	}
	
	function getAllImages()
	{
		global $conn;
		$sql = "SELECT * FROM images";
		$result = mysqli_query($conn, $sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows);
	}
	
	
	function getLinkArticleItem($id)
	{
		global $conn;
		$sql = "SELECT * FROM linkArticleItems WHERE itemID ='".$id."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$articleIDArray = [];
		while($row = mysqli_fetch_array($result))
		{
			$articleIDArray[] = $row['articleID'];
			
		}

		} 
		$sql = "SELECT * FROM article WHERE articleID = ";
		$limit = 1; 
		foreach($articleIDArray as $loop){
			if($limit == count($articleIDArray))
			{
				$sql .= "'". $loop ."'";
			}
			else{
				$sql .= "'" .$loop ."' OR articleID =";
			}
			$limit++;
		
		}
		$result = mysqli_query($conn, $sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows);
		
		
	}
	
	function getLinkItemImages($id)
	{
		global $conn;
		$sql = "SELECT * FROM linkImagesItems WHERE itemID ='".$id."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			$ImagesIDArray = [];
		while($row = mysqli_fetch_array($result))
		{
			$ImageIDArray[] = $row['imageID'];	
		}

		} else {
			echo "<br>the image cannot be displayed<br>"; 
		}
		
		$sql = "SELECT * FROM images WHERE imageID = ";
		$limit = 1; 
		foreach($ImageIDArray as $loop){
			if($limit == count($ImageIDArray))
			{
				$sql .= "'". $loop ."'";
			}
			else{
				$sql .= "'" .$loop ."' OR imageID =";
			}
			$limit++;
		
		}
		$result = mysqli_query($conn, $sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows);				
	}
	
	function getArticleById($id)
	{
		global $conn;
		$sql = "SELECT * FROM article WHERE articleID = '".$id."'";
		$result = mysqli_query($conn, $sql);
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows);
	}
	
?>