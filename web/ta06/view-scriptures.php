<!doctype html>

<?php
require "load-db.php";
$db = loadDatabase();

# Trim inputs from _POST
function trim_value(&$value) {
	$value = trim($value);
}
array_filter($_POST, 'trim_value');

foreach ($_POST as $k => $v) {
	$k = filter_var($k, FILTER_SANITIZE_STRING);
	$v = filter_var($v, FILTER_SANITIZE_STRING);
		
	$$k = $v;
}


?>

<head>
<title>Team Activity 6</title>
</head>

<body>

</body>