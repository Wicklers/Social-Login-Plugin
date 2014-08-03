<?php
/**
 * 
 */
class Logout extends Controller {
	
	function __construct() {
		parent::__construct();
        
        Session::destroy();
        Redirect::to("index.php");
	}
}
