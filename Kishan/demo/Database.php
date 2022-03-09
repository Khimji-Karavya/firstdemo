<?php

/**class databse connection */
class Database {

    private $hostname = "localhost";
    private $username = "newuser";
    private $password = "root";
    private $dbname = "test";
    public $conn;

    /**
     * database connection
     * 
     */
    function __construct(){

        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if($this->conn->connect_error) {
            echo "connection fail"; 
        }
    }
}
?>