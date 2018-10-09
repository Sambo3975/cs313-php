<?php
	function validateform() {
		$sanitizedData = array();
		foreach ($_POST as $k => $v) {
			$v = max(0, min(5, (int)$v));
			$sanitizedData += [$k => $v];
		}
		return $sanitizedData;
	}
?>