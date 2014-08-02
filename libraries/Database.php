<?php
/**
 * Database Class
 * @package Social-Login
 * @author Harsh Vardhan Ladha
 */
class Database extends mysqli{
    
    public function __construct($db_server,$db_username,$db_password,$db_name){
        parent::__construct($db_server,$db_username,$db_password,$db_name);
                
    }
    
}
