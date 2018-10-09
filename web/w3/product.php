<?php
# Platforms
define("PC","PC");
define("XBOX","Xbox One");
define("PS4", "PlayStation 4");
define("NSWITCH", "Nintendo Switch");

const PLATFORM_TAG_MAP = [
	"PC"              => "_pc",
	"Xbox One"        => "_xbox",
	"PlayStation 4"   => "_ps4",
	"Nintendo Switch" => "_nswitch",
];

# Product Class
# Contains info about a product
class Product {
	var $name;
	var $tag;
	var $description;
	var $imagePath;
	var $price;
	var $platforms;
	
	function __construct($name, $tag, $description, $imagePath, $platforms, $price) {
		$this->name = $name;
		$this->tag = $tag;
		$this->description = $description;
		$this->imagePath = $imagePath;
		$this->price = $price;
		$this->platforms = $platforms;
	}
	
	function setname($name) {
		$this->name = $name;
	}
	function settag($tag) {
		$this->tag = $tag;
	}
	function setdescription($description) {
		$this->description = $description;
	}
	function setimagepath($imagePath) {
		$this->imagePath = $imagePath;
	}
	function setprice($price) {
		$this->price = $price;
	}
	function setplatforms($platforms) {
		$this->platforms = $platforms;
	}
	
	function getname() {
		return $this->name;
	}
	function gettag() {
		return $this->tag;
	}
	function getdescription() {
		return $this->description;
	}
	function getimagePath() {
		return $this->imagePath;
	}
	function getprice() {
		return $this->price;
	}
	function getplatforms() {
		return $this->platforms;
	}
}

# Products For Sale
$mk8dx = new Product(
	"Mario Kart 8 Deluxe",
	"mk8dx",
	"Hit the road with the definitive version of Mario Kart 8 and play anytime, anywhere! Race your friends or battle them in a revised battle mode on new and returning battle courses. Play locally in up to 4-player multiplayer in 1080p while playing in TV Mode. Every track from the Wii U version, including DLC, makes a glorious return. Plus, the Inklings appear as all-new guest characters, along with returning favorites, such as King Boo, Dry Bones, and Bowser Jr.!",
	"img/mk8dx.jpg",
	array(NSWITCH),
	49.99
);

$botw = new Product(
	"Breath of the Wild",
	"botw",
	"No kingdom. No memories. After a 100-year slumber, Link wakes up alone in a world he no longer remembers. Now the legendary hero must explore a vast and dangerous land and regain his memories before Hyrule is lost forever. Armed only with what he can scavenge, Link sets out to find answers and the resources needed to survive.",
	"img/botw.jpg",
	array(NSWITCH),
	49.99
);

$arms = new Product(
	"ARMS",
	"arms",
	"ARMS is a revolutionary new sport where elite athletes use awesome extendable arms to fight like never before.Use simple motion or button controls to dish out highly strategic beatdowns. Armed with a Joy-Con™ controller in each hand, you’ll feel the heat of battle as you punch your way to the top.",
	"img/arms.jpg",
	array(NSWITCH),
	49.99
);

$nms = new Product(
	"No Man's Sky",
	"nms",
	"Be the first to land on beautiful, unknown planets teeming with life. Survive hazardous environments, where alien civilizations seek their fortune and outlaws take it by force. Team up to build anything from small outposts to complex multi-planet colonies. Farm for resources, hire helpers, or build a mobile base in your freighter. Assemble and upgrade a fleet of frigates and command them from the bridge of your freighter.",
	"img/nms.png",
	array(PC, PS4, XBOX),
	49.99
);

$spiderman = new Product(
	"Marvel's Spider Man",
	"spiderman",
	"When a new villain threatens New York City, Peter Parker and Spider-Man’s worlds collide. To save the city and those he loves, he must rise up and be greater.",
	"img/spiderman.jpg",
	array(PS4),
	49.99
);

$rocketleague = new Product(
	"Rocket League",
	"rocketleague",
	"Soccer meets driving once again in the long-awaited, physics-based sequel to the beloved arena classic, Supersonic Acrobatic Rocket-Powered Battle-Cars!",
	"img/rocketleague.jpg",
	array(PC, PS4, NSWITCH, XBOX),
	49.99
);

$products = array($mk8dx, $botw, $arms, $nms, $spiderman, $rocketleague);
?>