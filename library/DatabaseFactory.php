<?php
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/20/2016
 * Time: 10:50 AM
 */

namespace Diwanee\Library;

use Diwanee\Library\Database;
use Diwanee\Library\Config;

/**
 * Class DatabaseFactory pattern
 *
 * @package Diwanee\Library
 */
class DatabaseFactory extends Database
{
    public function __construct()
    {
        parent::__construct(
            new Config()
        );
    }
}