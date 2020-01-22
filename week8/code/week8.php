<html>
	<body>
		<?php
		
		include("queryDB.php") ;

		$jsonbody = file_get_contents('php://input');
		$jsonobj = json_decode($jsonbody);
        $res = electricImp($jsonbody);
		?>
	</body>
</html>