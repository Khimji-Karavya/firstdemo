<?php

// include "Database.php";
class Country {
    
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
     * country name get database countries table function
     *
     * @return object
     */
    public function getCountries() {
        $sql = "SELECT * FROM countries";
        $res = $this->conn->query($sql);
        $result = $res->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    /**
     * get country name by id in country table.
     *
     * @param [int] $id
     * @return name
     */
    public function getCountryNameById($id) {

        $sql = "SELECT name FROM countries WHERE id =$id";
        $res = $this->conn->query($sql);

        $result = $res->fetch_assoc();
        return $result['name'];
    }

}

?>