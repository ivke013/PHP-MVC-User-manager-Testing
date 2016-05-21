<?php
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/20/2016
 * Time: 5:52 PM
 */

namespace Diwanee\Model;

use Diwanee\Library\Model;

/**
 * Class UserGroupModel
 *
 * @package Diwanee\Model
 */
class UserGroupModel extends Model
{
    /**
     * Group constructor
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Find all user groups
     *
     * @return array|null
     */
    public function findAll()
    {
        $query = "SELECT * FROM user_groups";

        $result = $this->conn->query($query);

        if(mysqli_num_rows($result) > 0) {
            $groups = mysqli_fetch_all($result, MYSQLI_ASSOC);

            return $groups;
        }
    }

    /**
     * Find single user group by id
     *
     * @param $id
     */
    public function find($id)
    {
        // Drugi put... Mrzi me sada nemam vremena. Ako prodjem konkurs mozda i zavrsim, pa razvijem ceo FW
    }


}