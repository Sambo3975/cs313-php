<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2018.css">
<link href="https://fonts.googleapis.com/css?family=Meera+Inimai|Monofett" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<title>Sam Knight</title>
</head>

<body class="w3-2018-red-pear">
<!-- Navbar -->
<div class="wrapper">
	<div id="top">
		<div class="w3-bar w3-2018-valiant-poppy w3-display-container height100">
			<h1 class="w3-display-middle">Sam Knight</h1>
		</div>
		<div class="w3-bar w3-2018-valiant-poppy">
			<a href="#" class="w3-bar-item w3-button">Home</a>
			<a href="#" class="w3-bar-item w3-button">Assignments</a>
		</div>
	</div>
	<div id="main" class="w3-2018-limelight w3-container">
		<h1>About Me</h1>
		<div class="w3-card w3-2018-valiant-poppy why-are-inline-styles-banned">
			<img src="img/sam_photo.jpg" alt="Picture of me" class="float-left"/>
			<p><b>Born:</b> Oct. 17, 1997</p>
			<p><b>Age: </b><?php
				$dob = new DateTime('1997-10-17');
				$today = new DateTime("now");
				$diff = $dob->diff($today);
				echo $diff->format('%Y years');
			?></p>
			<p><b>From:</b> Lovelock, NV</p>
			<p><b>Major:</b> Computer Science</p>
			<p><b>Hobbies:</b> Singing, Gaming, Programming, Game Design</p>
			<p><b>Interests:</b> Star Wars, Marvel, The Legend of Zelda, Super Mario Bros.</p>
		</div>
	</div>
	<div id="footer" class="w3-container w3-2018-valiant-poppy">
		<p>&copy; Sam Knight, <?php echo date('Y'); ?></p>
	</div>
</div>

</body>

</html>