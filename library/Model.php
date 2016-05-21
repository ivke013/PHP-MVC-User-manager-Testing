<?php
namespace Diwanee\Library;

/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 12:50 PM
 */

use Diwanee\Library\DatabaseFactory;

/**
 * Simple Class Model
 *
 * @package Diwanee\Model
 */
class Model extends DatabaseFactory
{
    /**
     * Model class construct
     */
    public function __construct()
    {
        parent::__construct();
    }
}