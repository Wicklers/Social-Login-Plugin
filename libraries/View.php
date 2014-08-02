<?php
/**
 * View Class
 * @package Social-Login
 * @author Harsh Vardhan Ladha
 */
class View{
    function __contruct(){
        echo "This is the view<br/>";
    }
    public function render($name, $noInclude=false){
        
        if($noInclude==true){
            require "views/".$name.".php";    
        }
        else{
            require "views/header.php";
            require "views/".$name.".php";
            require "views/footer.php";   
        }
    }
}
