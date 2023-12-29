<?php
	
	function convert_format($value) {
		return date('H:i:s - D M Y', strtotime($value));
	}
?>