<!doctype html>

<?php
require "load-db.php";
$db = loadDatabase();

$query = $db->prepare('SELECT name from topics');
$query->execute();
$topics = $query->fetchAll(PDO::FETCH_COLUMN, 'name');
?>

<head>
<title>Team Activity 6</title>
</head>

<body>
<h1>Add a scripture:</h1>
<form action="view-scriptures.php" method="POST" id="add-scripture">
Book: <input type="text" name="book" id="book"/><br/>
Chapter: <input type="text" name="chapter" id="chapter"/><br/>
Verse: <input type="text" name="verse" id="verse"/><br/>
Content: <br/>
<textarea rows="5" cols="30" name="content" id="content"></textarea> <br/>
Select topic(s): <br/>
<?php
foreach ($topics as $topic) {
	echo "<input type='checkbox' name='$topic' value='$topic'/> $topic <br/>";
}
?>
<input type="Submit" value="Submit"/> <br/>
</form>
</body>