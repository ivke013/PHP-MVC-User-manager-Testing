<?php
namespace Diwanee\Controller;
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 12:51 PM
 */
use Diwanee\Library\BaseContollerFactory;
use Diwanee\Model\UserGroupModel;
use Diwanee\Model\UserModel;

/**
 * User list controller
 *
 *
 * Class UserListController
 */
class UserController extends BaseContollerFactory
{
    /**
     * @var \Diwanee\Model\UserModel
     */
    public $user;

    /**
     * @var \Diwanee\Model\UserGroupModel
     */
    public $groups;

    /**
     * User list constructor
     *
     */
    public function __construct()
    {
        parent::__construct();

        // Only logged user can access
        if(!$this->isLogged()) {
            return $this->redirect('auth/login');
        }

        $this->user = new UserModel();
        $this->groups = new UserGroupModel();
    }

    /**
     * Should return a set of all users
     *
     * GET: /user
     */
    public function index()
    {
        $users = $this->user->findAllUsers();

        $this->view('user/index', array(
            'users' => $users,
        ));
    }

    /**
     * Should return a single user by id
     *
     * GET: /user/<id>
     *
     * @param int $id
     */
    public function details($id)
    {
        $this->view('user/details', array(
            'id' => $id
        ));
    }

    /**
     * Add new user
     *
     * GET: /user/add
     */
    public function add()
    {
        $data['groups'] = $this->groups->findAll();

        if(isset($_POST['submit'])) {

            // Filter data
            $username = $this->inputFilter($_POST['username']);
            $group = $this->inputFilter($_POST['group']);
            $email = $this->inputFilter($_POST['email']);
            $pass = $this->inputFilter($_POST['password']);// MD5/SHA a ni SALT-ove nisam koristion(ovo je samo test nema potrebe za time)
            $pass_conf = $this->inputFilter($_POST['password2']);


            // Validate data
            if($username === "")
                $data['error_username'] = "Username is required";
            if($email === "")
                $data['error_email'] = "Email is required";
            if($pass === "")
                $data['error_pass'] = "Password is required";
            if($pass_conf === "")
                $data['error_pass_conf'] = "Password confirmation is required";

            if($pass != $pass_conf ) {
                $data['error_pass_match'] = "Password not match";
            }

            // Save data to database

           if($this->user->insert(array(
               'username' => $username,
               'group' => $group,
               'email' => $email,
               'password' => $pass))) {

               $this->flashMessage("success", "User wass successfull created");

               return $this->redirect('user/index');
           }

        }

        $this->view('user/add', $data);
    }

    /**
     * Edit existing user
     *
     * @param $id
     */
    public function edit($id)
    {
        $id = (int) $id;

        $data = array(
            'groups' => $this->groups->findAll(),
            'user' => $this->user->findUser($id)
        );

        if(isset($_POST['submit'])) {

            // Filter data
            $username = $this->inputFilter($_POST['username']);
            $group = $this->inputFilter($_POST['group']);
            $email = $this->inputFilter($_POST['email']);
            $pass = $this->inputFilter($_POST['password']); // MD5/SHA a ni SALT-ove nisam koristion(ovo je samo test nema potrebe za time)
            $pass_conf = $this->inputFilter($_POST['password2']);


            // Validate data
            if($username === "")
                $data['error_username'] = "Username is required";
            if($email === "")
                $data['error_email'] = "Email is required";
            if($pass === "")
                $data['error_pass'] = "Password is required";
            if($pass_conf === "")
                $data['error_pass_conf'] = "Password confirmation is required";

            if($pass != $pass_conf ) {
                $data['error_pass_match'] = "Password not match";
            }

            // Save data to database

             if($this->user->update($id, array(
                'username' => $username,
                'group' => $group,
                'email' => $email,
                'password' => $pass))) {

                $this->flashMessage("success", "User wass successfull updated");

                return $this->redirect('user/index');
            }

        }

        $this->view('user/edit', $data);
    }

    /**
     * Delete user
     *
     * @param $id
     */
    public function delete($id)
    {
        if($id) {
            if($this->user->delete($id)) {
                $this->flashMessage("success", "User has been deleted");

                return $this->redirect("user/index");
            }
        }else{
            throw new \InvalidArgumentException("User with {$id} does not found");
        }
    }
}