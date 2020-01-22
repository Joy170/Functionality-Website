<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
include("../model/queryDB.php"); //another php just to connect
$data -> email = $_POST["email"];
$data -> password = $_POST["password"];
$datatxt = json_encode($data);
$res = checkLogin($datatxt);
?>
</body>
</html>