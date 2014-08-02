<?php
/**
 * Model Class
 * @package Social-Login
 * @author Harsh Vardhan Ladha
 */
class Model{
	
	function __construct() {
		$this->db = new Database(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
	}
}
