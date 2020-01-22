
<!DOCTYPE html>
<html>
<head>
<title>Eco friendly materials</title>
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
table {
  background-color: white;
  color: grey;
}
tr:nth-child(even) {background-color: #f2f2f2;
  }

th{

  border: 1px solid grey;
  padding-top: 4px;
  padding-right: 4px;
  padding-bottom: 4px;
  padding-left: 4px;
}

#top{
  background-color:  #3984C1;
  color: white;
  padding-top: 4px;
  padding-right: 4px;
  padding-bottom: 4px;
  padding-left: 4px;
}
</style>
<body>
<table>
<tr id="top">
<th>Name of article</th>
<th>Link</th>

</tr>
<?php
include 'navbar.php';

echo '<h2>Interesting Articles about Sustainable Lifestyles</h2>';

//  code to list the contacts
$xmltxt = file_get_contents('http://www.justluxe.com/rss/rss-channels.php?sec=lifestyle'); 
$xml = simplexml_load_string($xmltxt)  ;
//var_dump($xml) ;
echo "<br/><br/>" ;
$xsl = simplexml_load_file("external.xsl")  ;
$proc = new XSLTProcessor() ;
$proc->importStyleSheet($xsl);
$result = $proc->transformtoXML($xml) ;
echo $result;
?>
</table>
<br><br>

</body>
</html>
