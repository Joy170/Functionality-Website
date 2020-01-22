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
include("../model/queryDB.php") ; //link to all sql queries

$data -> comment = $_POST["comment"];
$data -> articleID = $_POST["articleID"];
$data -> email = $_SESSION['UserEmail'];
$datatxt = json_encode($data);
$res = saveComment($datatxt);

?>
</body>
</html>