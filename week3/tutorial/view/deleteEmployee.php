<html>
<head>
</head>
<body>
	<h1>Delete an employee</h1>
	<?php
		include("../model/api-employee.php") ;
		$id = $_GET['id'] ;
		$text = deleteEmployeeById($id) ;
		echo $text;
	?> 
	Back to  <a href="displayall.php">Display All</a>
</body>
</html>