<?php

/**
 * Configuration file for installing social login on your site
 * @package Social-Login
 * @author Harsh Vardhan Ladha
 * @link http://facebook.com/harhsvladha
 */
$url  = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
$url .= $_SERVER['SERVER_NAME'];
$url .= dirname($_SERVER['REQUEST_URI']).'/';
/**
* URL of the applicaiton
*/
define("URL", $url);
 
$path = explode('install',__DIR__);
/**
 * ROOT DIRECTORY path
 */
define('ROOT_DIR',$path[0]); 
