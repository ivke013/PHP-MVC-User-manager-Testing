<?php

namespace Diwanee\Library;

/**
 * Created by PhpStorm.
 * User: ivke
 * Date: 5/19/2016
 * Time: 12:50 PM
 */

/**
 * Simple Class Database calass for Diwanee
 *
 * @package Diwanee\Library
 */
class Database
{
    public $conn;
    private $config;
    private $host;
    private $user;
    private $pass;
    private $db;
    private $charset;
    private $port;
    private $query;

    /**
     * Constructor
     *
     */
    public function __construct(Config $config)
    {
        $this->config = $config;

        $this->host = $config->item('hostname');
        $this->user = $config->item('username');
        $this->pass = $config->item('password');
        $this->db   = $config->item('database');
        $this->port = $config->item('port');
        $this->charset = $config->item('charset');

         $this->connect();
    }

    /**
     * Connect to database
     *
     */
    public function connect()
    {
        try {
             $this->conn = new \mysqli($this->host, $this->user, $this->pass, $this->db, $this->port) ;


        } catch (\mysqli_sql_exception $e ) {
            echo "Service unavailable";
            echo "message: " . $e->getMessage();   // not in live code obviously...
            exit;
        }
    }


    /**
     * Close connection
     *
     */
    public function __destruct(){
        mysqli_close($this->conn);
    }
}