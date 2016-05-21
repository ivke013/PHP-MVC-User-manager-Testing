<?php
namespace Diwanee\Library;

/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 2:13 PM
 */

use Diwanee\Library\BaseController;
use Diwanee\Library\Registry;
use Diwanee\Library\View;
use Diwanee\Library\Config;

/**
 * Class BaseContollerFactory
 *
 * @package Diwanee\Library
 */
class BaseContollerFactory extends BaseController
{
    /**
     * Base controller factory constructor
     *
     * fill registry with dependency injection
     */
    public function __construct()
    {
        parent::__construct(
            new Registry(),
            new View(),
            new Config()
         );
    }

}