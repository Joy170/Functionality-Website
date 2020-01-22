<?php
// Connect to database
	include("connection.php");
	
	$db = new dbObj();
	$connection =  $db->getConnstring();
	
	include("library.php") ; //queryDB where you find all sql methods 
 
	$request_method=$_SERVER["REQUEST_METHOD"]; 
	
switch($request_method) //calls the methods that need to be done CRUD method
	{
		case 'GET':
			// Retrive Products
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				get_employees($id);
			}
			else
			{
				get_employees(0);
			}
			break;
		case 'POST':
			// Insert Product
			insert_employee();
			break;
		case 'PUT':
		// Update Product
		$id=intval($_GET["id"]);
		update_employee($id);
		break;	
		case 'DELETE':
		// Delete Product
		$id=intval($_GET["id"]);
		delete_employee($id);
		break;
		
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}

?>