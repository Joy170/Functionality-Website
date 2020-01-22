<?php
Class dbObj{
	/* Database connection start */
	var $servername = "lochnagar.abertay.ac.uk";
	var $username = "sql1704097";
	var $password = "eDKP1mt6NQiG";
	var $dbname = "sql1704097";
	var $conn;
	function getConnstring() {
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
 
		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->conn = $conn;
		}
		return $this->conn;
	}
}
 
?>