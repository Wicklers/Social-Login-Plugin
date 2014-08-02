<?php

/**
 * Check whether user is logged in or not.
 * 
 */
function loggedIn(){
	if(Session::exists('loggedIn') && Session::get('loggedIn')==1){
		return true;
	}
	else
		return false;
}
?>