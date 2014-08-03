<?php
/**
 * Social-Login is a plugin through which you can allow your users to sign-up or log-in to your website using their existing social network profiles.
 * <b>MVC</b> based solution
 * Open Source
 * 
 * @package Social-Login
 * @author Harsh Vardhan Ladha
 * 
 */
@session_start(); 


if(file_exists("config.php")){
    require_once "config.php";    
}
else {
    header("location:install/");
}

spl_autoload_register(function($class){
    require_once ROOT_DIR . 'libraries/'.$class.'.php';   
});

require_once ROOT_DIR."libraries/functions/sanitize.php";

require ROOT_DIR."controllers/instruction.php";
$controller = new Instruction();
