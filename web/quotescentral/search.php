<!doctype html>
<html>

<?php
# Load the database
require "load-db.php";
$db = loadDatabase();

# Fetch categories
$query = $db->prepare('SELECT name, tag FROM categories ORDER BY tag');
$query->execute();
$categories = $query->fetchAll();

# Fetch media
$query = $db->prepare('SELECT name, tag FROM media ORDER BY tag');
$query->execute();
$media = $query->fetchAll();

# Trim inputs from _GET
function trim_value(&$value) {
	$value = trim($value);
}
array_filter($_GET, 'trim_value');

# Prepare query
$queryString = "SELECT quote, attribution, source, medium, category, submitter, submissionDate FROM quotes";
$whereClause = false;
foreach ($_GET as $k => $v) {
	$k = filter_var($k, FILTER_SANITIZE_STRING);
	$v = filter_var($v, FILTER_SANITIZE_STRING);
	
	if ($v != "") {
		if (!$whereClause) {
			$queryString = $queryString . " WHERE ";
			$whereClause = true;
		} else {
			$queryString = $queryString . " AND ";
		}
		
		$queryString = $queryString . "$k = '$v'";
	}
}

# Generate search results
# echo $queryString;
$query = $db->prepare($queryString);
$query->execute();
$results = $query->fetchAll();
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
		<form id="search" class="w3-container w3-half" action="search.php">
			<h2>Filter Quotes</h2>
			<div class="w3-container w3-blue w3-card-4 bottom-pad">
				<div class="w3-bar">
					<div class="w3-bar-item">
						<label for="category"><b>Category:</b></label><br/>
						<?php
							foreach ($categories as $category) {
								$name = $category['name'];
								echo "<input type='radio' class='w3-radio' name='category' value='$name'> $name <br/>";
							}
						?>
					</div>
					
					<div class="list w3-bar-item">
						<label for="medium"><b>Medium:</b></label><br/>
						<?php
							foreach ($media as $medium) {
								$name = $medium['name'];
								echo "<input type='radio' class='w3-radio' name='medium' value='$name'> $name <br/>";
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
						<input type="text" class="w3-input w3-border-0"  name="submitter" id="submitter"/><br/>
					</div>
				</div>
				
				<label for="quote"><b>Quote Contents:</b></label><br/>
				<textarea name="quote" id="quote-contents" cols="80" rows="5"></textarea><br/>
				
				<input class="w3-btn w3-sand" type="submit" value="Search"/>
			</div>
		</form>
		
		<div id="results" class="w3-container w3-half">
			<h2>Quotes</h2>
			<?php
				foreach ($results as $result) {
					$quote = $result['quote'];
					$attribution = $result['attribution'];
					$source = $result['source'];
					$submitter = $result['submitter'];
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