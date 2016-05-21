<?php
namespace Diwanee\Library;
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 12:50 PM
 */

use Diwanee\Library\Registry;
use Diwanee\Library\View;

/**
 * Class BaseController
 *
 * @package Diwanee\Library
 */
class BaseController
{
    /**
     * @var \Diwanee\Library\Registry
     */
    protected $registry;


    /**
     * Base controller class
     *
     * @param \Diwanee\Library\Registry $registry
     * @param \Diwanee\Library\View $view
     * @param Config $config
     */
    public function __construct(Registry $registry, View $view, Config $config)
    {
        $this->registry = $registry;

        $this->registry->set('view', $view);
        $this->registry->set('config', $config);
     }

    /**
     * Get registry container
     *
     * @param string $name The registry container name
     */
    public function get($name)
    {
        return $this->registry->get($name);
    }


    /**
     * Shortcut for rendering view file
     *
     * @param $file
     * @param array $vars
     */
    public function view($file, $vars = array())
    {
          $this->get('view')->render($file, $vars);
    }

    /**
     * Redirect
     *
     * @param $url
     */
    public function redirect($url)
    {
        header( "Location:".SITEURL . '/'.$url);
    }

    /**
     * Check if user logged
     *
     */
    public function isLogged()
    {
        if(isset($_SESSION['isLogged'])) {
            return true;
        }
    }

    /**
     * Filter input data
     *
     * @param $data
     * @return string
     */
    public function inputFilter($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    /**
     * Set flash message
     *
     * @param $name
     * @param $value
     * @return mixed
     */
    public function flashMessage($name, $value)
    {
        if(!isset($_SESSION['message'][$name])) {
            $_SESSION['message'][$name] = $value;
        }
    }
 }