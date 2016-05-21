<?php
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 1:43 PM
 *
 */

/**
 * Application configuration
 *
 */

return array(

    // Site url
    'site_url' => 'http://work.petbook.rs/1/',

    // Namespace where app controller is stored
    'namespace' => 'Diwanee\\Controller\\',

    // Default controller
    'default_controller' => 'Home',
    // Default action
    'default_action' => 'index',
    // Not found cotntroller
    'not_found_controller' => 'NotFound',

    /**
     * Database config
     *
     */
    'hostname' => 'cloud.test.rs',
    'username' => 'root',
    'password' => '123123',
    'database' => 'diwanee_test',
    'port' => '',
    'charset' => 'UTF-8',
);

