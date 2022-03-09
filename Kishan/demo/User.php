<?php

include "Database.php";

/**
 * class user extends database class 
 */
class User extends Database {

    private function UserImageUpload(){
        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $timeStamp = date('mdYHis',);
        $random = rand(1,100); 
        $uploadFilePath = __DIR__."/Images/imageDirectory/";
        $newFileName= $timeStamp.$random.$fileName;
        if(move_uploaded_file($fileTmpName,$uploadFilePath.$newFileName)) {
            return $newFileName;
        }

    }

    /**
     * insert data from database
     * @param [string] $table
     * @param [array] $field
     * @return bool;
     */
    public function register($field, $adduser = null) {
        $pass = password_hash($field['password'], PASSWORD_DEFAULT);
        $userImageName = $this->UserImageUpload();
        $sql = "INSERT INTO users(fname, lname, email, password, image, dob, gender, mobile, country_id, state_id, city_id)VALUES('$field[fname]', '$field[lname]', '$field[email]', '$pass', '$userImageName', '$field[dob]', '$field[gender]', '$field[phone]', '$field[country]', '$field[state]', '$field[city]')";
        $res = $this->conn->query($sql);
        if ($res) {
            if(isset($adduser)) {
                header('location:dashboard.php');
            }
            else {
                header('location:login.php');
            }
        }
    }


    /**
     * login user function
     * @param [array] $data
     * @return bool
     */
    public function login($data) {
        $sql = "SELECT * FROM users WHERE email = '".$data['email']."'";
        $res = $this->conn->query($sql);
        $row = $res->fetch_assoc();
        $pass = $row['password'];
        if(password_verify($data['password'], $pass) && $row['email'] == $data['email']) {
            $_SESSION['user'] = $row;
            return true;
        } else {
            return false;
        }   
    }

    /**
     * listing users dasebord
     *
     * @return userList
     */
    public function listingUser() {
        $sql = "SELECT * FROM users";
        $res = $this->conn->query($sql);
        return $res;
    }

    /**
     * delete user function
     * @param string $data
     * @return bool
     */
    public function delete($data) {
        $loginUser = $_SESSION['loginEmail'];
        $result = $this->conn->query("SELECT * FROM users WHERE id = '$data'");
        $row = $result->fetch_assoc();
        if($loginUser != $row['email']) {
            $sql = "DELETE FROM users WHERE id = '$data'";
            $res = $this->conn->query($sql);
        }
    }

    /**
     * update time user data get function
     *
     * @param [string] $id
     * @return array
     */
    public function userData($id) {
        $sql = "SELECT * FROM users WHERE id = '".$id['id']."'";
        $res = $this->conn->query($sql);
        $row = $res->fetch_assoc();
        if($row) {
            return $row;
        }
    }

    /**
     * update user function
     *
     * @param [string] $id
     * @param [array] $data
     * @return void
     */
    public function updateUser($id, $data) {
        $userImageName = $this->UserImageUpload();
        $sql = "UPDATE users SET fname = '".$data['fname']."', lname = '".$data['lname']."', email = '".$data['email']."', image = '$userImageName', dob = '".$data['dob']."', gender = '".$data['gender']."', mobile = '".$data['phone']."', country_id = '".$data['country']."', state_id = '".$data['state']."', city_id = '".$data['city']."' WHERE id =".$id."";

        $res = $this->conn->query($sql);
        
        return true;
    }

    /**
     *update user password function
     *
     * @return bool
     */
    public function updateUSerPassword($password) {
        $id = $_SESSION['user']['id'];
        $pass = password_hash($password['newpassword'],PASSWORD_DEFAULT);
       
        $sql = "UPDATE users SET password = '$pass' WHERE id = $id ";

        $res = $this->conn->query($sql);

        if($res) {
            header('location:dashboard.php');
        }
        

    }

    

    /**
     * state name get database state table function
     *
     * @return object
     */
    public function state($id) {
        $sql = "SELECT * FROM states WHERE id = '$id'";
        $res = $this->conn->query($sql);
        return $res;
    }

    /**
     * city name get database city table function
     *
     * @return object
     */
    public function city() {
        $sql = "SELECT * FROM city";
        $res = $this->conn->query($sql);
        return $res;
    }

}
?>