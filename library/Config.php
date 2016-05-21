<?php
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 2:50 PM
 */

namespace Diwanee\Library;

/**
 * Class Config
 *
 * @package Diwanee\Library
 */
class Config
{
    /**
     * @var string The config file
     */
    private $config;

    /**
     * @var string The config item
     */
    private $item;

    /**
     * Config constructor
     */
    public function __construct()
    {
        $this->config = $this->getConfig();
    }

    /**
     * @param $name
     */
    public function item($name)
    {
        if(array_key_exists($name, $this->config)) {
            return $this->config[$name];
        }
    }


    /**
     * Get config file
     *
     * @return mixed
     */
    public function getConfig()
    {
        return include 'app/config/application.config.php';
    }
}