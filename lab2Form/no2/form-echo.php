<!doctype html>
<html>
<head>
<meta name="author" content="Banchar Paseelatesang">
<meta name="description" content="Echo Form Data">
<meta charset="utf-8">
<title>form echo</title>
<style>
	table { width: 450px; border: solid 1px gray; border-collapse: collapse; font: 16px tahoma; }
	caption { font: bold 18px tahoma; color: brown; }
	th:first-child { width: 30%; }
	th:last-child { width: 70%; }
	td:first-child { background: #cdf; }
	th { background: gray; color: white; }
	td, th { border: solid 1px  navy; padding: 3px; vertical-align: top; }
</style>
</head>

<body>
<?php
if($_REQUEST || $_FILES) { 
?>
<table>
<caption>Form Data</caption>
<tr><th>Name</th><th>Data</th></tr>
<?php
	foreach($_REQUEST as $key => $value) {
		if(is_array($value)) {
			foreach($value as $v) {
				$v = stripslashes($v);
				echo "<tr><td>$key</td><td>$v</td></tr>";
			}
			continue;
		}
		$value = stripslashes($value);
		echo "<tr><td>$key</td><td>$value</td></tr>";
	}
	
	foreach($_FILES as $key => $value) {
		$value = "File (" . $_FILES[$key]['type'] . ")(" . $_FILES[$key]['name'] . ")";
		echo "<tr>	<td>$key</td><td>$value</td></tr>";
	}	
?>
</table>

<?php
}
?>
</body>
</html>
