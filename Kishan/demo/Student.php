<?php
include "Database.php";
class Student extends Database {

    /**
     * xlsx file data insert function
     *
     * @param [arry] $data
     * @return 
     */
    public function insertStudentData($data) {
        // $sql = "INSERT INTO student ('fname', 'lname', 'email', 'mobile', 'Country', 'Gender', 'Date of birth', 'Address') VALUES ('".$data['fname']."', '".$data['lname']."', '".$data['email']."', '".$data['mobile']."', '".$data['Country']."', '".$data['Gender']."', '".$data['Date of birth']."', '".$data['Address']."')";

        $fname = $data['fname'];
            $lname = $data['lname'];
            $email = $data['email'];
            $mobile = $data['mobile'];
            $gender = $data['Gender'];
            $country = $data['Country'];
            $dob = $data['Date of birth'];
            $address = $data['Address'];
        
        $sql = "INSERT INTO student (id, fname, lname, email, mobile, Country, Gender, `Date of birth`, `Address`) VALUES (NULL, '$fname', '$lname', '$email', '$mobile', '$gender', '$country', '$dob', '$address') ";
        $res = $this->conn->query($sql);
        // echo "<pre>";
        // print_r($this->conn); exit;
        return $this->conn->insert_id;
        
    }


    /**
     * getEmail function 
     *
     * @return array
     */
    public function getEmail() {
        $sql = "SELECT email FROM student";

        $res = $this->conn->query($sql);
        $res = $res->fetch_all(MYSQLI_ASSOC);

        return $res;
    }


}
?>