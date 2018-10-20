<!doctype html>

<html>
<body>
<?php
try {
	$dbUrl = getenv('DATABASE_URL');

	if (empty($dbUrl)) {
		$dbUrl = "postgres://postgres:temppswd@localhost:5432/postgres";
	}

	$dbopts = parse_url($dbUrl);

	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
} catch (PDOException $ex) {
	echo 'Error!: ' . $ex->getMessage();
	die();
}

?>
</body>
</html>