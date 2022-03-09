<?php

/**
 * Validations class
 */
class Validator {  

   /**
    * check only string function validation
    *
    * @param $string
    * @return bool
    */
    private function stringChecker($string) {
        if (!preg_match("/^[a-zA-Z ]*$/", $string) === true) {
            return true;
        }
        return false;
    }

    /**
     *
     * @param array $data
     * @return bool or array
     */
    public function check($data, $EmailPassword = null) {

        $error = [];

        // check first name
        if (!empty($data['fname'])) {
            if ($this->stringChecker($data['fname'])) {
                $error['fname'] = "Only string is a valid first name.";
            }
        } else {          
            $error['fname'] = "Plese enter first name." ;
        }

        // check last name
        if (!empty($data['lname'])) {
            if ($this->stringChecker($data['lname'])) {
                $error['lname'] = "Only string is a valid last name.";
            }
        } else {
            $error['lname'] = "Plese enter last name." ;
        }

        //   check email
        if (!empty($data['email'])) {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Invalid email format.";
            }
            if(isset($EmailPassword)) {
                while ($email = $EmailPassword->fetch_assoc()) {
                    if($email['email'] == $data['email']) {
                        $error['email'] = "This email is already exist.";
                    }
                }
            }

        }else {
            $error['email'] = "plese enter email.";
        }
        

        //  check password
        if (!empty($data['password'])) {

            if (strlen($data['password']) < '8') {
                $error['password'] = "Your password must contain at least 8 characters!.";
            } else if ( !preg_match("#[0-9]+#", $data['password']) ) {
                $error['password'] = "Your password must contain At least 1  number!.";
            } else if (!preg_match("#[A-Z]+#",$data['password'])) {
                $error['password'] = "Your password must contain at least 1 capital letter!.";
            } else if(!preg_match("#[a-z]+#",$data['password'])) {
                $error['password'] = "Your password must contain at least 1 lowercase letter!.";
            }
        } else {
            $error['password'] = "Please enter password.";
        }

       //conform password
        if (!empty($data['conform'])) {
            if ($data['conform'] != $data['password']) {
               $error['conform'] = "Plese conform password.";
            }
        } else {
         $error['conform'] = "Plese enter pasword.";
        }

        //  check date 
         if(!empty($data['dob'])){

            $dateToday = date("Y-m-d");
            $today = array_reverse(explode('-',$dateToday));
            $userDate = array_reverse(explode('-',$data['dob']));
          
            if($userDate[2] <= $today[2]){
                if(($userDate[2] == $today[2]) ? ($userDate[1] <= $today[1]) : true){
                    if(($userDate[1] == $today[1]) ? ($userDate[0] < $today[0]) : true){
                      
                    } else {
                        $error['dob'] = "Invalide date."; 
                    }
                } else {
                    $error['dob'] = "Invalide date."; 

                }
   
            }  else {
                $error['dob'] = "Invalide date."; 

            }
         } else {
            $error['dob'] = "Please enter date of birth.";
         }

        //  check gender
        if(empty($data['gender'])){
            $error['gender'] = "Please select gender.";
        }

        //  check phone number
        if(!empty($data['phone'])) {  
           if (!preg_match('/^[0-9]{10}+$/', $data['phone'])) {
               $error['phone'] = "Your mobile number must contain at least 10 characters!.";
            }
        } else {
            $error['phone'] = " Plese enter phone number.";
        }

        // check country
        if(empty($data['country'])) {
            $error['country'] = "Please select country";
        }
        // check state
        if(empty($data['state'])) {
            $error['state'] = "Please select state";
        }
        
        // check city
        if(empty($data['city'])){
            $error['city'] = "Plese select city.";
            
        }

        //check tems and condition 
        if(empty($data['terms'])){
           $error['terms'] = "Agree terms and condition.";
        }

        // check image uploade validaton
        if(isset($_FILES['image']['name'])) {

            $fileName = $_FILES['image']['name'];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            
            if(!($ext == "jpg" ||  $ext == "png" || $ext == "jpeg" )) {
                $error['image'] = "Sorry, only JPG, JPEG, PNG files are allowed.";
            }
            
        } else {
            
            $error['image']="Please select image.";
        }
        return $error;
        
    }


    public function checkUserPassword($data) {
        $error = [];
        // check curent password
        if (!empty($data['password'])) {
            if (!password_verify($data['password'], $_SESSION['user']['password'] )){
                $error['password'] = "Please enter current password!.";
            } 
        } else {
            $error['password'] = "Please enter current password.";
        }

        // check new password
        if (!empty($data['newpassword'])) {

            if (strlen($data['newpassword']) < '8') {
                $error['newpassword'] = "Your password must contain at least 8 characters!.";
            } else if ( 
                !preg_match("#[0-9]+#", $data['password']) &&
                !preg_match("#[A-Z]+#", $data['password']) &&
                !preg_match("#[a-z]+#", $data['password'])
            ) {
                $error['newpassword'] = "Uparecase, lowercase, and number enter password!.";
            } 
        } else {
            $error['newpassword'] = "Please enter new password.";
        }

        //conform password
        if (!empty($data['conform'])) {
            if ($data['conform'] != $data['newpassword']) {
               $error['conform'] = "Plese conform enter password.";
            }
        } else {
         $error['conform'] = "Plese enter conform pasword.";
        }

         //check tems and condition 
         if(empty($data['terms'])){
            $error['terms'] = "Agree terms and condition.";
         }
        return $error;
    }

    /**
     * xlsx file validation function
     *
     * @param [array] $data
     * @return array
     */
    public function FileValiation($data, $email) {
        $error = false;
            // check first name
            if (!empty($data['fname'])) {
                if ($this->stringChecker($data['fname'])) {
                    $error = true;
                }
            } else {          
                $error = true;
            }

            // check last name
            if (!empty($data['lname'])) {
                if ($this->stringChecker($data['lname'])) {
                    $error = true;
                }
            } else {
                $error = true;
            }
             //   check email
            if (!empty($data['email'])) {
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    foreach($email['email'] as $email) {
                        if($email == $data['email']) {
                            $error = true;
                        }
                    }
                }
            }else {
                $error = true;
            }
            
             //  check phone number
            if(!empty($data['mobile'])) {  
                if (!preg_match('/^[0-9]{10}+$/', $data['mobile'])) {
                    $error = true;
                }
            } else {
                $error = true;
            }

            // check conuntry
            if (!empty($data['Country'])) {
                if ($this->stringChecker($data['Country'])) {
                    $error = true;
                }
            } else {          
                $error = true;
            }

            // check gender
            if (!empty($data['Gender'])) {
                if ($this->stringChecker($data['Gender'])) {
                    $error = true;
                }
            } else {          
                $error = true;
            }

            //  check date 
            if(!empty($data['Date of birth'])){

                $dateToday = date("d-m-Y");
                $today = array_reverse(explode('-',$dateToday));
                $userDate = array_reverse(explode('/',$data['Date of birth']));

                if($userDate[0] <= $today[0]){
                    if(($userDate[0] == $today[0]) ? ($userDate[1] <= $today[1]) : true){
                        if(($userDate[1] == $today[1]) ? ($userDate[2] < $today[2]) : true){   
                        } else {
                            $error = true; 
                        }
                    } else {
                        $error = true;
                    }      
                }  else {
                    $error = true;  
                }
             } else {
                $error = true;
             }
            

            // check address
            if (!empty($data['Address'])) {
                if ($this->stringChecker($data['Address'])) {
                    $error = true;
                }
            } else {          
                $error = true;
            }

            // foreach loop educaton array
            foreach($data['Education'] as $key => $val) {
                // check Education
                if (!empty($val['Degree'])) {
                    if ($this->stringChecker($val['Degree'])) {
                        $error = true;
                    }
                } else {          
                    $error = true;
                }
                //  check Year of passing
                
                 if (!empty($val['Year of passing'])) {
                    $dateToday = date("Y");

                    if($val <! $dateToday){
                        $error = true;                    }
                } else {          
                    $error = true;                }
                
                
                 // check University name
                 if (!empty($val['University'])) {
                    if ($this->stringChecker($val['University'])) {
                        $error = true;
                    }
                } else {          
                    $error = true;
                }


                // check University name
                if (!empty($val['Grade'])) {
                     if (!(strlen($val['Grade']) < '1') && !preg_match("#[A-Z]+#", $val['Grade'])) {
                            $error = true;
                        }
                } else {          
                    $error = true;
                }
            }
        
        return $error;
    }

}
?>