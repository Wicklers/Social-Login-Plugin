<?php
/**
 * Controller Class
 * @package Social-Login
 * @author Harsh Vardhan Ladha
 */
class Controller{
	
	function __construct() {
        $this->view = new View();     
	}
    
    public function loadmodel($name){
       
        $path = "models/".$name."_model.php";
       
        if(file_exists($path)){
            require $path;
            
            $modelName = $name . "_model";
            $this->model = new $modelName;
        } 
    }
}