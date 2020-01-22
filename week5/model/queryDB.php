	<?php
	session_start();

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
		
		function saveComment($txt)
		{
			global $conn;
			$data = json_decode($txt);		
	//$stmt = mysqli_stmt_init($conn);
	$comment= $data -> comment;
	$articleID = $data -> articleID; 
	$UserEmail = $data -> email;
	$stmt = $conn->prepare("INSERT INTO comments (commentInput, articleID, userEmail) VALUES(?,?,?)");
	$stmt->bind_param("sis", $comment, $articleID, $UserEmail);
	$res = $stmt-> execute();
	$res = $stmt ->insert_id;

	if($res){
			echo "<script>javascript: alert('Comment made successful')</script>";
			echo "<script type='text/javascript'>window.history.back();</script>";
	}
	else{
			echo "<script>javascript: alert('Error with comment, please try again and make sure you are successfully logged in.')</script>";
			echo "<script type='text/javascript'>window.history.back();</script>";
	}

	
	return $res;


		}

			function saveDetails($txt)
			{
			global $conn;
			$run = false;
			$data = json_decode($txt);		
			$firstname= mysqli_real_escape_string($conn, $data -> firstname);
			$surname = mysqli_real_escape_string($conn,$data -> lastname); 
			$mobile = mysqli_real_escape_string($conn,$data -> mobileno);
			$email = mysqli_real_escape_string($conn,$data -> email);
			$password = mysqli_real_escape_string($conn,$data -> password);
		$sql = "SELECT * FROM user WHERE email = '".$email."'";
		$result = $conn->query($sql);
		

		if ($result->num_rows > 0)
		{
		while($row = $result -> fetch_assoc()){
			$run = false;
	echo "<script>javascript: alert('Registration not successful, someone might already have logged in with your email')</script>";
			echo "<script type='text/javascript'>location.href = 'https://mayar.abertay.ac.uk/~1704097/306/week5/view/register.php';</script>";

		}
		}
		else {
			$run = true;
		}
		

	if($run == true){
		$pwdhsh = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $conn->prepare("INSERT INTO user (firstname, surname, mobileno, email, password) VALUES(?,?,?,?,?)");
		$stmt->bind_param("ssiss", $firstname, $surname, $mobile, $email, $pwdhsh);
		$res = $stmt-> execute();
		$res = $stmt ->insert_id;

		if($res){
			echo "<script>javascript: alert('Registration successful, please login with new details now')</script>";
			echo "<script type='text/javascript'>location.href = 'https://mayar.abertay.ac.uk/~1704097/306/week5/view/login.php';</script>";
		} 
		else{
				echo "Error with the registration, please try again.";

		}
			return $res;

		}
		else{
			return 0;
		}
				}
				
				
				
	function checkLogin($txt){
	global $conn;
	$data = json_decode($txt);	
	$logEmail= mysqli_real_escape_string($conn,$data -> email);
	$validPass = mysqli_real_escape_string($conn,$data -> password); 
		
	$stmt = $conn->prepare('SELECT * FROM user where email= ?'); //query to db finding email that matches the one typed in
	$stmt->bind_param('s', $logEmail); //bin the '?', prepared statement
	$stmt->execute(); //execute query
	$result = $stmt->get_result();

	if($result->num_rows > 0)//exit('Login Details false')
	{
    while($row = $result->fetch_assoc()) 
	{
	if(password_verify($validPass,$row["password"])) //checks if password is correct
	{
	$UserID = $row["uno"]; //store the userID as it is primary key and used for identification later
	$_SESSION["UserNow"] = $UserID; //session variable se to userID logged in now
	$_SESSION["UserEmail"] = $logEmail; 
	echo "<script>javascript: alert('Login successful')</script>";
	echo "<script type='text/javascript'>location.href = 'https://mayar.abertay.ac.uk/~1704097/306/week5/view/displayallItems.php';</script>";
	}
	else{
	echo "<script>javascript: alert('Login failed')</script>";
	echo "<script type='text/javascript'>location.href = 'https://mayar.abertay.ac.uk/~1704097/306/week5/view/login.php';</script>";
	} 
	}
				}	echo "<script>javascript: alert('Login failed')</script>";
	echo "<script type='text/javascript'>location.href = 'https://mayar.abertay.ac.uk/~1704097/306/week5/view/login.php';</script>";
				$res = $stmt->execute();
				$res = $stmt ->insert_id;
				return $res;
				}
				
				
	?>