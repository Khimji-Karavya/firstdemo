<?php
// include "Database.php";

class State {
     
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
    public function getState($id) {
        $sql = "SELECT id,name FROM states WHERE country_id = $id";
        $res = $this->conn->query($sql);

        $result = $res->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    /**
     * get state name by id in state table.
     *
     * @param [int] $id
     * @return string
     */
    public function getStateNameById($id) {

        $sql = "SELECT name FROM states WHERE id =$id";
        $res = $this->conn->query($sql);

        $result = $res->fetch_assoc();
        return $result['name'];
    }

}

?>