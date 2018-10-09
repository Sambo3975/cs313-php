<!doctype html>

<html>

<?php require_once 'product.php' ?>

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
	<?php include 'header.php'; ?>	
	<div id="main" class="w3-container">
		<?php
			echo "<table id='purchase-list'>\n";
			echo   "<tr>\n";
			echo     "<th>&#8203;</th>\n";
			echo     "<th>Title</th>\n";
			echo     "<th>Platform</th>\n";
			echo     "<th class='center'>Quantity</th>\n";
			echo     "<th>Subtotal</th>\n";
			echo     "<th class=>Remove</th>\n";
			echo   "</tr>\n";
			require "validate-form.php";
			$data = validateform();
			$total = 0.0;
			$rownum = 0;
			foreach ($data as $k => $v) {
				if ($v > 0) {
					$k = explode("_", $k); # 'tag' 'plttag'
					$tag = $k[0];
					$platformtag = $k[1];
					$product = $$tag; # 'tag' -> Product
					$platform = constant(strtoupper($platformtag));
					$name = $product->getname();
					$subtotal = (float)$v * $product->getprice();
					$total += $subtotal;
					echo "<tr id='row-$rownum'><td class='center'><img src='".$product->getimagepath()."' alt='$name' class='game-thumb-small'/></td>\n";
					echo "<td class='bold'>$name</td>\n";
					echo "<td>$platform</td>\n";
					echo "<td class='center'>$v</td>\n";
					echo "<td id='subtotal-$rownum'>$$subtotal</td>\n";
					echo "<td><div class='w3-black w3-badge w3-hover-red rem-btn' onclick=\"removeRow('$rownum')\"><i class='fa fa-times'></i></div></td></tr>\n";
					++$rownum;
				}
			}
			if ($total > 0) {
				echo   "<tr id='total-row'><td><td></td></td><td></td>\n";
				echo   "<td class='center bold large'>Total:</td><td id='total' class='bold large'>$$total</td><td></td></tr>";
			} else {
				echo "<script type='text/javascript'>showEmptyCartMessage()</script>\n";
			}
			echo "</table>\n";
		?>
		<div class="w3-panel w3-round-large" id="empty-cart-message">It looks like your shopping cart is empty!</div>
		<div class="w3-bar" id="option-buttons">
			<a class="w3-button w3-bar-item w3-middle w3-margin" id="return-to-browse" href="index.php">Return to Browse</a>
			<div class="w3-button w3-bar-item w3-middle w3-margin" id="checkout">Checkout</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</div>
<script type="text/javascript" src="cart-script.js"></script>
</body>