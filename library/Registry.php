<?php
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 2:00 PM
 */

namespace Diwanee\Library;

/**
 * Class Registry
 *
 * @package Diwanee\Library
 */
class Registry
{

    /**
     * Singleton
     */
    protected static $_instance = null;
    /**
     * @var array
     */
    protected $data = array();

    /**
     * Set registry data
     *
     * @param $name
     * @param $value
     */
    public function set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * Get registry by name
     *
     * @param $name
     * @return mixed
     * @throws \Exception
     */
    public function get($name)
    {
        if(!array_key_exists($name, $this->data)) {
            throw new \Exception("Registry with name {$name} does not exist");
        }

        return $this->data[$name];
    }


}