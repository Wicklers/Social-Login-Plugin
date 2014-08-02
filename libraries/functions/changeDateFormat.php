<?php
/**
 * Changes date format from MM/DD/YYYY to YYYY-MM-DD
 */
function changeDateFormatToDB($date){
	$date = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$1-$2', $date);
	return $date;
}

/**
 * Changes date format from YYYY-MM-DD to MM/DD/YYYY
 */
function changeDateFormatFromDB($date){
	$date = preg_replace('#(\d{4})-(\d{2})-(\d{2})#', '$2/$3/$1', $date);
	return $date;
}
?>