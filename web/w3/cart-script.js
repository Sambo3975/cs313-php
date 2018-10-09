function removeRow(rowNum) {
	// Remove the subtotal from the total
	totalBox = $("#total");
	console.log(totalBox.text());
	total = parseFloat(totalBox.text().match(/\d+(\.\d{2})?/)[0]);
	console.log(total);
	subtotal = parseFloat($("#subtotal-" + rowNum).text().match(/\d+(\.\d{2})?/)[0]);
	console.log(subtotal);
	total = Math.round((total * 100 - subtotal * 100) / 100);
	totalBox.text("$" + total);
	// Hide the row
	$("#row-" + rowNum).css('display', 'none');
	// Hide the total if it has reached 0.
	if (total <= 0) {
		$("#total-row").css('display', 'none');
		$("#purchase-list").css('display', 'none');
		$("#empty-cart-message").css('display', 'block');
	}
}

function showEmptyCartMessage() {
	$("#total-row").css('display', 'none');
	$("#purchase-list").css('display', 'none');
	$("#empty-cart-message").css('display', 'block');
}