<!doctype html>

<?php require_once 'product.php'; ?>

<html>

<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Press+Start+2P|Ubuntu" rel="stylesheet">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<title>Games4Cheap</title>
</head>

<body class="w3-khaki">
<div class="wrapper">
	<div id="header-main" class="w3-container w3-highway-green">
		<div class="w3-display-container" style="height:180px;">
			<img src="img/logo.svg" class="w3-display-middle" alt="Games4Cheap Logo"/>
			<h1 class="w3-display-middle">Games4Cheap</h1>
		</div>
	</div>
	<div id="nav" class="w3-bar w3-highway-green">
		<a id="return-to-main" href="../index.php" class="w3-bar-item w3-left">Return to Main Site</a>
		<div id="view-cart" class="w3-button w3-bar-item w3-right" onclick="submitCart()"><i class="fa fa-shopping-cart"></i></div>
	</div>
	<div id="main" class="w3-container">
		<h1>Get Games for $10 Below Retail!</h1>
		<h3>It's the real deal! On this site, we offer select games at discount prices. Our selection may be small now, but more games are coming soon!</h3>
		<div id="add-to-cart-notification" class="w3-panel w3-round-large">blah</div>
		<?php
			global $products;
			foreach ($products as $p) {
				$imgpath = $p->getimagepath();
				$name = $p->getname();
				$price = $p->getprice();
				$tag = $p->gettag();
				$description = $p->getdescription();
				$platforms = $p->getplatforms();
				echo "<div class=\"w3-round-xlarge w3-white product-tile\">\n";
				echo   "<img src=\"$imgpath\"alt=\"$name\" class=\"game-thumb\"/>\n";
				echo   "<p id='$tag-name' class=\"nospace\"><strong>$name</strong></p>\n";
				echo   "<p class=\"nospace\"><strong>\$$price</strong></p>\n";
				echo   "<div class='description-button' onclick=\"showDescription('$tag')\">View Description";
				echo     "<div class='description w3-card-4' id='$tag-description' onmouseout=\"hideDescription('$tag')\">$description</div>";
				echo   "</div>\n";
				echo   "<div class=\"dropdown\">\n";
				echo     "<div id=\"$tag-dropdown-label\">" . $platforms[0] . "</div>";
				echo     "<div id=\"$tag-dropdown-btn\" onclick=\"dropdownClicked('$tag');\"><i class=\"fa fa-angle-down\"></i></div>\n";
				echo   "</div>\n";
				echo   "<div id=\"$tag-dropdown-list\" class=\"w3-bar-block dropdown-selection\">\n";
				$ct = 0;
				foreach ($platforms as $plt) {
					echo   "<p class='w3-khaki' onclick=\"dropdownItemClicked('$tag','$plt');\" style='top:" . (22 * $ct) . "px;'>$plt</p>\n";
					$ct += 1;
				}
				echo   "</div>\n";
				echo   "<div class='qty'>Qty:</div>";
				echo   "<div class='spinner'>\n";
				echo     "<div class='left' onclick=\"spinLeft('$tag')\"><i class='fa fa-angle-left'></i></div>";
				echo     "<div class='label' id='$tag-spin-label'>1</div>";
				echo     "<div class='right' onclick=\"spinRight('$tag')\"><i class='fa fa-angle-right'></i></div>\n";
				echo   "</div>\n";
				echo   "<div class='description-button' onclick=\"addToCart('$tag')\">Add to Cart</div>\n";
				echo "</div>\n";
			}
		?>
	</div>
	<form action="cart.php" method="post" id="order-form">
		<?php
			foreach ($products as $p) {
				$tag = $p->gettag();
				$platforms = $p->getplatforms();
				foreach ($platforms as $plt) {
					$plttag = PLATFORM_TAG_MAP[$plt];
					echo "<input type='text' name='$tag$plttag' id='$tag$plttag' value='0'/>";
				}
			}
		?>
	</form>
	<?php include 'footer.php'; ?>
</div>
<script src="script.js"></script>
</body>