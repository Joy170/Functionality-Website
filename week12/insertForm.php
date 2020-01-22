
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
	</script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js">
	</script>
	</head>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=url], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #89cff0;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
h3{
text-align: center;
}
</style>
<body>
<?php
include 'navbar.php';
?>
<h3>Get all items</h3>
	<form action="get_all_emp.php" method="POST">
    <input type="submit" value="Get all items">
    </form> 
<h3>Select a specific item</h3>
	<form action="get_emp.php" method="POST">
    ID for required item <input type="text" name="ID" required><br>
    <input type="submit">
    </form> 

<h3>Create Item</h3>
	<form action="insert_emp.php" method="post">
    Item Title: <input type="text" name="title" required><br>
    Description: <input type="text" name="description" required><br>
	Image(url): <input type="url" name="image"><br>
    <input type="submit">
    </form> 
	
	</body>
	</html>
	