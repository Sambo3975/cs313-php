<!doctype html>
<html>

<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
<title></title>
</head>

<?php
# Load the database
require "load-db.php";
$db = loadDatabase();

# Fetch categories
$query = $db->prepare('SELECT id, name FROM categories ORDER BY id');
$query->execute();
$categories = $query->fetchAll();

# Fetch media
$query = $db->prepare('SELECT id, name FROM media ORDER BY id');
$query->execute();
$media = $query->fetchAll();

$message = "You must provide a value for ";
$error = false;
if (isset($_POST['source'])) {
	# Trim inputs from _POST
	function trim_value(&$value) {
		$value = trim($value);
	}
	array_filter($_POST, 'trim_value');

	# Add the quote if the form has been submitted
	# Prepare database update
	$fields = "INSERT INTO quotes (";
	$values = ") VALUES (";
	$comma = FALSE;
	foreach ($_POST as $k => $v) {
		$k = filter_var($k, FILTER_SANITIZE_STRING);
		$v = filter_var($v, FILTER_SANITIZE_STRING);
		
		if ($v != "") {
			$fields .= $comma ? ", $k" : "$k";
			$values .= $comma ? ", '$v'" : "'$v'";
		} else {
			$message .= $comma ? ", $k" : "$k";
			$error = TRUE;
		}
		if (!$comma) {$comma = TRUE;}
	}
	
	
	
	if ($error) {
		$message .= '.';
	} else {
		$addition = $db->prepare($fields . ", user_id, submissionDate" . $values . ", 2, '" . date("Y-m-d") . "')");
		$addition->execute();
		$message = "New quote successfully added.";
	}
}
?>

<body>
<div class="wrapper">
	<?php include 'header.php'; ?>
	<div id="main" class="w3-panel">
		<form action="add.php" method="POST" id="add">
			<h1>Add a Quote</h1>
			<div class="w3-container w3-blue w3-card-4 bottom-pad">
				<div class="w3-bar">
					<div class="w3-bar-item">
						<label for="source"><b>Source:</b></label><br/>
						<input type="text" class="w3-input w3-border-0" name="source" id="source"/><br/>
						
						<label for="attribution"><b>Attribution (who said it):</b></label><br/>
						<input type="text" class="w3-input w3-border-0"  name="attribution" id="attribution"/><br/>
					</div>
					
					<div class="w3-bar-item">
						<label for="category"><b>Category:</b></label><br/>
						<?php
							foreach ($categories as $category) {
								$name = $category['name'];
								$id = $category['id'];
								echo "<input type='radio' class='w3-radio' name='category_id' value='$id'> $name <br/>";
							}
						?>
					</div>
					
					<div class="list w3-bar-item">
						<label for="medium"><b>Medium:</b></label><br/>
						<?php
							foreach ($media as $medium) {
								$name = $medium['name'];
								$id = $medium['id'];
								echo "<input type='radio' class='w3-radio' name='medium_id' value='$id'> $name <br/>";
							}
						?>
					</div>
				</div>
				
				<label for="quote"><b>Quote Contents:</b></label><br/>
				<textarea name="quote" id="quote-contents" cols="80" rows="5"></textarea><br/>
				
				<input class="w3-btn w3-sand" type="submit" value="Add"/>
			</div>
		</form>
	</div>
	<?php include 'footer.php'; ?>
</div>
</body>