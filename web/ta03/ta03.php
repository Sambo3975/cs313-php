<!DOCTYPE html>
<html>
<head>
	<title>TA03</title>
</head>
<body>
	<form id="form" method="post" action="ta03.php">
		<div id="name">
			Name:<input type="text" name="name">
		</div>
		<div id="email">
			Email:<input type="email" name="email">
		</div>
		<div id="major">
			Major:
			<input type="radio" name="major" value="Computer Science">Computer Science
			<input type="radio" name="major" value="Web Design and Development">Web Design and Development
			<input type="radio" name="major" value="Computer Information Technology">Compute Information Technology
			<input type="radio" name="major" value="Computer Engineering">
		</div>
		<div id="comments">
			<textarea name="comment" rows="5" cols="40"></textarea>
		</div>
		<div>
			Continents Visited:
			<br>
			<input type="checkbox" name="continent[]" value="North America">North America
			<input type="checkbox" name="continent[]" value="South America">South America
			<input type="checkbox" name="continent[]" value="Europe">Europe
			<input type="checkbox" name="continent[]" value="Asia">Asia
			<input type="checkbox" name="continent[]" value="Australia">Australia
			<input type="checkbox" name="continent[]" value="Africa">Africa
			<input type="checkbox" name="continent[]" value="Antarctica">Antarctica
		</div>
		<div>
			<button name="submit" type="submit" form="form">Submit</button>
		</div>
	</form>
	<div>

	</div>
</body>
</html>