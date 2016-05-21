<?php
/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/20/2016
 * Time: 11:48 AM
 */

namespace Diwanee\Model;

use Diwanee\Library\Model;

/**
 * Class UserModel
 *
 * @package Diwanee\Model
 */
class UserModel extends Model
{
    /**
     * User constructor
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Should return a set of all users
     *
     * @return array
     */
    public function findAllUsers()
    {
        $query = "SELECT U.id, G.name as `group`, U.username, U.email, U.activated, U.date_created AS registred, U.date_modified AS modified
                    FROM users AS U
                    INNER JOIN user_groups AS G ON G.id = U.group_id
                    ORDER BY U.id ASC";

        $result  = $this->conn->query($query);


        if(mysqli_num_rows($result) > 0) {
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

            return $users;
        }
    }

    /**
     * Should return a single
     *
     * @param int $id The user id
     */
    public function findUser($id)
    {
        $query = "SELECT U.id, G.name, U.username, U.email, U.activated, U.date_created AS registred, U.date_modified AS modified
                    FROM users AS U
                    INNER JOIN user_groups AS G ON G.id = U.group_id
                    WHERE U.id = '$id'";

        $result = mysqli_query($this->conn, $query);

        if(mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            return $user;
        }
     }

    // U sustini update i insert ide pod jednom funkcijom kao SAVE(). Ako user vec postoji onda UPDATE ako ne onda INSERT.
    // Lakse mi je ovako bilo jer zurim

    /**
     * Inset new user in database
     *
     * @param array $data
     */
    public function insert(array $data = array())
    {
        $stmt = $this->conn->prepare("INSERT INTO users (username, group_id, email, password) VALUES (?, ?, ?, ?)");

        $stmt->bind_param("ssss", $data['username'], $data['group'], $data['email'], $data['password']);

        if($stmt->execute()) {
            return true;
        }

        $stmt->close();
     }

    /**
     * Update
     *
     * @param $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data = array())
    {
       // $data['id'] = $id;
         //print_r($data);die();

        $stmt = $this->conn->prepare("UPDATE users SET username=?, group_id=?, email=?, password=? WHERE id=?");

        $stmt->bind_param("ssssi", $data['username'], $data['group'], $data['email'], $data['password'], $id);

        if($stmt->execute()) {
            return true;
        }

        echo "Success";
        $stmt->close();
    }

    /**
     * Delete
     *
     * NOTE: Ovog puta bez prepared statements <zurim>
     * @param $id
     */
    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id = '$id'";

        if ($this->conn->query($query) === TRUE) {
            return true;
        }
    }
}