<?php
namespace Diwanee\Controller;
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 12:52 PM
 */

use Diwanee\Library\BaseContollerFactory;
use Diwanee\Library\View;
use Diwanee\Model\AuthModel;

/**
 * Class AuthController
 *
 * @package Diwanee\Controller
 */
class AuthController extends BaseContollerFactory
{
    /**
     * @var \Diwanee\Model\AuthModel
     */
    private $auth;

    /**
     * Auth controller constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->auth = new AuthModel();
    }

    /**
     * Index action
     *
     * @no direct access to index
     */
    public function index()
    {
        return $this->redirect('auth/login');
    }

    /**
     * Login page
     *
     */
    public function login()
    {
        $this->view('auth/login');
    }



    /**
     * Authenticate user
     *
     */
    public function authenticate()
    {
//        echo "<pre>";
//        print_r($_POST);

        if(isset($_POST['submit']))
        {
            $username = $this->inputFilter($_POST['username']);
            $password = $this->inputFilter($_POST['password']);

            // check if user exist
            if(!$this->auth->autheticate($username, $password)) {
                $this->flashMessage('error', 'Invalid username or password!');

                return $this->redirect('auth/login');
            }
            // login success
            else {

                $_SESSION['isLogged'] = true;
                $_SESSION['username'] = $username;

                $this->flashMessage('success', 'You are successfully logged in!');
                return $this->redirect('home/index');
            }

         }
    }

    /**
     * Logout
     *
     */
    public function logout()
    {
        if($this->isLogged()) {
            session_unset($_SESSION);
            return $this->redirect('auth/login');
        }
    }
}