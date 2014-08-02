<?php
/**
 * Installation file for Social-Login plugin.
 * Social-Login is a plugin through which you can allow your users to sign-up or log-in to your website using their existing social network profiles.
 * <b>MVC</b> based solution
 * Open Source
 * 
 * @package Social-Login
 * @author Harsh Vardhan Ladha
 * 
 */
@session_start(); 
require_once "config.php";



spl_autoload_register(function($class){
    require_once ROOT_DIR . 'libraries/'.$class.'.php';   
});

require_once ROOT_DIR."libraries/functions/sanitize.php";

if(Input::exists('get')){
    $method = Input::get('path');
    require "controllers/install.php";
    
    $controller = new Install();
    
    $controller->{$method}();
}
else{
    Redirect::to("?path=introduction");
}
