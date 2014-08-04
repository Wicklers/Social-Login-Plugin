<?php
/**
 * Social-Login is a plugin through which you can allow your users to sign-up or log-in to your website using their existing social network profiles.
 * <b><i>PHP</i> MVC</b> based solution
 * Open Source
 *
 * @package Social-Login
 * @author Harsh Vardhan Ladha
 *
 */
@session_start();

if (file_exists("config.php")) {
    require_once "config.php";
} else {
    header("location:install/");
}

spl_autoload_register(function($class) {
    require_once ROOT_DIR . 'libraries/' . $class . '.php';
});

require_once ROOT_DIR . "libraries/functions/sanitize.php";
require_once ROOT_DIR . "libraries/functions/loggedin.php";
require_once ROOT_DIR . "libraries/functions/changeDateFormat.php";

if (Input::exists('get')) {

    $type = Input::get('type');
    if ($type == 'logout') {
        require ROOT_DIR . "controllers/logout.php";
        $controller = new Logout();
        return;
    }
    if (loggedIn()) {
        Redirect::to('home.php');
    }
    $name = $type . "login";
    require ROOT_DIR . "controllers/" . $name . ".php";
    $controller = new $name;

} else {
    if(loggedIn()){
        Redirect::to("home.php");
    }
    //Default login type is FacebookLogin
    require ROOT_DIR . "controllers/FacebookLogin.php";
    $controller = new FacebookLogin();
}
