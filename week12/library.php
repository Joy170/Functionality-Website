<?php

	function get_employees($id)
	{
	global $connection;
	$query="SELECT * FROM items";
	if($id != 0)
	{
		$query=$query." WHERE itemID=".$id." LIMIT 1";
	}
	$response=array();
	$result=mysqli_query($connection, $query);
	while($row=mysqli_fetch_array($result))
	{
		$response[]=$row;
	}
	header('Content-Type: application/json');
	echo json_encode($response);
	}
	
	function insert_employee()
	{
		global $connection;
 
		$data = json_decode(file_get_contents('php://input'), true);
		$title=$data["title"];
		$description=$data["description"];
		$image=$data["image"];
		echo $query="INSERT INTO items SET title='".$title."', description='".$description."', image='".$image."'";
		if(mysqli_query($connection, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Item added successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Item Addition Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	

	
?>