<?php
class Education {
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
     * insert student education data.
     *
     * @param [array] $data
     * @return void
     */
    public function insertStudentEducationData($data, $id) {
        $sql = "INSERT INTO Education (`Degree`, `Year of passing`, University, Grade, student_id) VALUES ('".$data['Degree']."', '".$data['Year of passing']."', '".$data['University']."', '".$data['Grade']."', $id)";
        $res = $this->conn->query($sql);
        // if($res){
        //     header("location:index.php");
        // }
    }
}
?>