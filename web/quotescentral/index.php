<!doctype html>
<html>

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

# Trim inputs from _GET
function trim_value(&$value) {
	$value = trim($value);
}
array_filter($_GET, 'trim_value');

# Prepare query
$queryString = "SELECT q.quote, q.attribution, q.source, q.submissionDate, u.username, u.name FROM quotes q, quote_users u WHERE q.user_id = u.id";
$search = false;
foreach ($_GET as $k => $v) {
	$k = filter_var($k, FILTER_SANITIZE_STRING);
	$v = filter_var($v, FILTER_SANITIZE_STRING);
	
	if ($v != "") {
		$queryString = $queryString . " AND ($k = '$v'";
		if ($k == 'username') {
			$queryString = $queryString . " OR u.name = '$v'";
		}
		$queryString = $queryString . ")";
		
		$search = true;
	}
}

if ($search) {
	# Generate search results
	# echo $queryString;
	$query = $db->prepare($queryString);
	$query->execute();
	$results = $query->fetchAll();
} else {
	# Select a random quote
	$query = $db->prepare($queryString . " ORDER BY RANDOM() LIMIT 1");
	$query->execute();
	$results = $query->fetchAll();
}
?>

<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
<title>Quotes Central</title>
</head>

<body>
<div class="wrapper">
	<?php include 'header.php'; ?>
	<div id="main" class="w3-container w3-row">
		<form id="search" class="w3-container w3-half" action="index.php">
			<h1>Filter Quotes</h1>
			<div class="w3-container w3-blue w3-card-4 bottom-pad">
				<div class="w3-bar">
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
					
					<div class="w3-bar-item">
						<label for="source"><b>Source:</b></label><br/>
						<input type="text" class="w3-input w3-border-0" name="source" id="source"/><br/>
						
						<label for="attribution"><b>Attribution (who said it):</b></label><br/>
						<input type="text" class="w3-input w3-border-0"  name="attribution" id="attribution"/><br/>
						
						<label for="submissionDate"><b>Submission Date:</b></label><br/>
						<input type="text" class="w3-input w3-border-0"  name="submissionDate" id="submissionDate"/><br/>
					
						<label for="submitter"><b>Submitted By:</b></label><br/>
						<input type="text" class="w3-input w3-border-0"  name="username" id="username"/><br/>
					</div>
				</div>
				
				<label for="quote"><b>Quote Contents:</b></label><br/>
				<textarea name="quote" id="quote-contents" cols="80" rows="5"></textarea><br/>
				
				<input class="w3-btn w3-sand" type="submit" value="Search"/>
			</div>
		</form>
		
		<div id="results" class="w3-container w3-half">
			<h1>Quotes</h1>
			<?php
				foreach ($results as $result) {
					$quote = $result['quote'];
					$attribution = $result['attribution'];
					$source = $result['source'];
					$submitter = $result['name'];
					if ($submitter == "") {
						$submitter = $result['username'];
					}
					$submissionDate = $result['submissiondate'];
					echo "<div class='w3-panel w3-leftbar w3-sand w3-card-4'>";
					echo   "<p class='w3-xlarge w3-serif quote'>$quote</p>";
					echo   "<div class='w3-bar'>";
					echo     "<p class='w3-left'>$attribution, <i>$source</i></p>";
					echo     "<p class='w3-right'>Submitted by $submitter on $submissionDate</p>";
					echo   "</div>";
					echo "</div>";
				}
			?>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</div>
</body>
</html>