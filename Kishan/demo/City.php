<?php

// include "Database.php";

class City {

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

    /**
     * Get country list from id
     *
     * @param int $id
     * @return array
     */
    public function getCity($id) {
        $sql = "SELECT * FROM city WHERE state_id = $id";
        $res = $this->conn->query($sql);
        $result = $res->fetch_all(MYSQLI_ASSOC);

        return $result;
    }
    /** get city name by id in city table
     * @param int $id
     * @return string
     */
    public function getCityNameById($id) {

        $sql = "SELECT name FROM city WHERE id =$id";
        $res = $this->conn->query($sql);

        $result = $res->fetch_assoc();
        return $result['name'];
    }


}

?>