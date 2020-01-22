<?php
session_start();

	// Connect to database
	include("connectDB.php"); //another php just to connect
	$db = new dbObj();
	$conn =  $db->getConnstring();

function electricImp($txt)
	{
		global $conn;
		$data = json_decode($txt);		
//$stmt = mysqli_stmt_init($conn);
$dateTime = date("Y/m/d").date("h:i:sa");
$eidevice = "232120b236a7c9ee";
$stmt = $conn->prepare("INSERT INTO reading (eidevice, datetime, state) VALUES(?,?,?)");
$stmt->bind_param("sss",$eidevice, $dateTime, $txt);
$res = $stmt-> execute();
$res = $stmt ->insert_id;
return $res;
}
?>