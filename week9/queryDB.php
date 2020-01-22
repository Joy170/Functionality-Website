	<?php
	session_start();

		// Connect to database
		include("connectDB.php"); //another php just to connect
		$db = new dbObj();
		$conn =  $db->getConnstring();
		
		//  function to get all the items
		function getAllReadings()
		{
			global $conn;
			$sql = "SELECT * FROM reading";
			$result = mysqli_query($conn, $sql);
			//  convert to JSON
			$rows = array();
			while($r = mysqli_fetch_assoc($result)) {
				$rows[] = $r;
			}
			return json_encode($rows);
		}
		
		
		function getCommentsArticle($id)
		{
			global $conn;
			$sql = "SELECT * FROM comments WHERE articleID ='".$id."'";
			$result = $conn->query($sql);
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