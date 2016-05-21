<?php
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 7:20 PM
 */

namespace Diwanee\Controller;


use Diwanee\Library\BaseContollerFactory;

/**
 * Class NotFoundController
 *
 * @package Diwanee\Controller
 */
class NotFoundController extends BaseContollerFactory
{
    public function index()
    {
        $this->view('404');
    }
}