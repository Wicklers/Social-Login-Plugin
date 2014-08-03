<?php

$url = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
$url .= $_SERVER['SERVER_NAME'];
$url .= dirname($_SERVER['REQUEST_URI']).'/';

/**
 * URL of the applicaiton
 */
define("URL", $url);
$path = __DIR__ . "\\";
/**
 * ROOT Directory path on the server system
 */
define("ROOT_DIR", $path);

/**
 * MySQL Server Address
 */
define("DB_SERVER", "db-server");

/**
 * MySQL Server Username
 */
define("DB_USERNAME", "db-username");

/**
 * MySQL Server Password
 */
define("DB_PASSWORD", "db-password");

/**
 * MySQL DATABASE NAME of the System
 */
define("DB_NAME", "db-name");

/**
 * MySQL DATABASE NAME of the System
 */
define("DB_TABLE", "db-table");

/**
 * Facebook App ID
 */
define("FB_APP_ID", "fb-app-id");

/**
 * Facebook App Secret-ID
 */
define("FB_APP_SECRET_ID", "fb-app-secret-id");

//header("Cache-Control: no-cache");
//header("Pragma: no-cache");

//ini_set('display_errors', 1);
//error_reporting(E_ALL);
?>