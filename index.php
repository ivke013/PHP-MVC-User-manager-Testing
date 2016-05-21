<?php
/**
 * Front controller
 *
 * @author Ivan Stojmenovic
 * @project Diwanee konkurs
 */

/*** error reporting on ***/
error_reporting(E_ALL);

// Start session
if(session_id() == '' || !isset($_SESSION)) {
     session_start();
}

// Initialize autoloader
require_once 'vendor/autoload.php';

// Load config file
if(file_exists('app/config/application.config.php'))
{
    $config = include('app/config/application.config.php');

}

// Base path
define('BASEPATH', dirname(__FILE__));
define('SITEURL', $config['site_url'] );


/**
 * Simple front controller logic
 *
 */
$fc = new \Diwanee\Library\FrontController($config);
$fc->run();



