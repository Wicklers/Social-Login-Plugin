<?php


/**
 * URL of the applicaiton
 */
define("URL", "url");

$path = __DIR__ . "/";
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


/**
 * If user uses proxy settings to connect to internet, 1 if true, else 0
 */
define("PROXY_SETTINGS", "proxy-settings");


/**
 * PROXY RULE !! http://address:port
 */
define("PROXY_RULE","proxy-rule");

//header("Cache-Control: no-cache");
//header("Pragma: no-cache");

//ini_set('display_errors', 1);
//error_reporting(E_ALL);
?>
