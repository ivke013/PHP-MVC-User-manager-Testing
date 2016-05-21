<?php
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/20/2016
 * Time: 10:07 AM
 */

namespace Diwanee\Controller;

use Diwanee\Library\BaseContollerFactory;

/**
 * Class HomeController
 *
 * @package Diwanee\Controller
 */
class HomeController extends BaseContollerFactory
{
    /**
     * Home constructor
     *
     */
    public function __construct()
    {
        parent::__construct();

        // Only logged user can access
        if(!$this->isLogged()) {
            return $this->redirect('auth/login');
        }
    }


    /**
     * Index action
     *
     * GET:  /
     */
    public function index()
    {
        $this->view('homepage');
    }
}