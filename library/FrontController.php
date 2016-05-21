<?php
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 3:11 PM
 */

namespace Diwanee\Library;

use Diwanee\Library\IFrontController;

/**
 * Class for simple FrontController
 *
 * @package Diwanee\Library
 */
class FrontController
{
    private $controller;
    private $method;
    private $param;
    public  $namespace;
    public  $default_method;
    public  $default_controller;
    public  $not_found_controller;

    /**
     * Fc class constructor
     *
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        $this->namespace = isset($options['namespace']) ? $options['namespace'] : null;
        $this->default_controller = isset($options['default_controller']) ? $options['default_controller'] : null;
        $this->default_method = isset($options['default_action']) ? $options['default_action'] : null;
        $this->not_found_controller = isset($options['not_found_controller']) ? $options['not_found_controller'] : null;

        $this->pareseUrl();
    }

    /**
     * Parse default url
     *
     */
    public function pareseUrl()
    {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");

        @list($prj, $controller, $method, $param) = explode("/", $path, 5);

        $controller = ucfirst($controller).'Controller';

        if(class_exists($this->namespace.$controller)) {
            $this->setController($controller);
            if (method_exists($this->namespace . $this->controller, $method)) {
                $this->setMethod($method);
            } else {
                $this->method = $this->default_method;
            }
            if (isset($param)) {
                $this->setParam($param);
            }
        }
        // Set default controller
        elseif($controller == "Controller") {
            $this->controller = $this->default_controller.'Controller';
            $this->method = $this->default_method;
        }
        // Set not found controller
        else {
            $this->controller = $this->not_found_controller.'Controller';
            $this->method = $this->default_method;
        }
    }

    /**
     * Run fc
     *
     * @return mixed
     */
    public function run()
    {
        $c = '\\'.$this->namespace.$this->controller;

         call_user_func(array(new $c, $this->method), $this->getParam());
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return array
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * @param array $params
     */
    public function setParam($param)
    {
        $this->param = $param;
    }


}