<?php
/**
 * Escapes HTML entities for saving in database & protecting from SQL Injection
 */
function escape($string) {
		return htmlentities(trim($string), ENT_QUOTES, 'UTF-8');
	}
?>