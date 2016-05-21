<?php

namespace Diwanee\Model;
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 1:17 PM
 */
use Diwanee\Library\Model;

/**
 * Class AuthModel
 *
 * @package Diwanee\Model
 */
class AuthModel extends Model
{
    /**
     * Auth constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Check if user exist in database
     *
     * @param $username
     * @param $password
     * @return bool
     */
    public function autheticate($username, $password)
    {
        $username = mysqli_real_escape_string($this->conn, $username);
        $password = mysqli_real_escape_string($this->conn, $password);

        $user = $this->conn->query("SELECT U.username, U.password FROM users as U WHERE U.username = '$username' AND U.password = '$password'");

        if(mysqli_num_rows($user) > 0) {
            return true;

        }
    }


}