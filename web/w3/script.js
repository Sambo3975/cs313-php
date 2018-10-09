var PLATFORM_TAG_MAP = {
	"PC"              : "_pc",
	"Xbox One"        : "_xbox",
	"PlayStation 4"   : "_ps4",
	"Nintendo Switch" : "_nswitch",
};

function dropdownClicked(name) {
	$("#" + name + "-dropdown-list").toggle();
}

function dropdownItemClicked(name, platform) {
	$("#" + name + "-dropdown-list").hide();
	$("#" + name + "-dropdown-label").text(platform);
}

function showDescription(tag) {
	$("#" + tag + "-description").show();
	$("#" + tag + "-dropdown-list").hide();
}

function hideDescription(tag) {
	$("#" + tag + "-description").hide();
}

function spinLeft(tag) {
	var labelValue = parseInt($("#" + tag + "-spin-label").text());
	labelValue = Math.max(labelValue - 1, 1);
	$("#" + tag + "-spin-label").text(labelValue.toString());
}

function spinRight(tag) {
	var labelValue = parseInt($("#" + tag + "-spin-label").text());
	labelValue = Math.min(labelValue + 1, 5);
	$("#" + tag + "-spin-label").text(labelValue.toString());
}

function addToCart(tag) {
	var platform = $("#" + tag + "-dropdown-label").text();
	var platformTag = PLATFORM_TAG_MAP[platform];
	var textBox = $("#" + tag + platformTag);
	
	var initVal = parseInt(textBox.val());
	var addVal = parseInt($("#" + tag + "-spin-label").text());
	var finalVal = Math.min(addVal + initVal, 5);
	textBox.val(finalVal.toString());
	
	var message = "";
	if (initVal + addVal > 5) {
		message = "Limit of 5 for each game. " + (5 - initVal) + " items added to cart.";
	} else {
		message = "Item " + $("#" + tag + "-name").text() +  " x" + addVal + " added successfully.";
		message = addVal + "x " + $("#" + tag + "-name").text() + " for " + platform + " added successfully.";
	}
	var notificationBox = $('#add-to-cart-notification')
	notificationBox.text(message);
	notificationBox.css('opacity',0).animate({opacity:1}, 500)
	
	messageTimer = setTimeout(hideDisplayMessage, 5000);
}

function hideDisplayMessage() {
	$('#add-to-cart-notification').animate({opacity:0}, 500);
}

function submitCart() {
	$("#order-form").submit();
}