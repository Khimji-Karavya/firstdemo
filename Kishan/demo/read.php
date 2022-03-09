    <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    session_start();
    /**session check login user */
    if(!isset($_SESSION['user']['email'])){
       header("location:login.php");
    }

    /* include file.*/
    include "./vendor/autoload.php";
    include "header.php";
    include "Validator.php";
    include "Student.php";
    include "Education.php";
//  include "Student.php";

// $student = new Student();
// $email = $student->getEmail();

    $validator = new Validator();
    $student = new Student();
    $education = new Education();

    if(isset($_POST['submit'])){
        $xmlFile = $_FILES['xml']['tmp_name'];
        $xlsx = Shuchkin\SimpleXLSX::parse($xmlFile);
        $data = $xlsx->rows();
        $newarray = [];
        $check = 0;
      
        // echo "<pre>";
        // print_r($data);

        foreach(array_slice($data,1) as $key => $value) {
            $counter = -1;

            foreach( $value as $k => $val ) {
                if($data[0][$k] == "Degree") {
                    $check = 1;
                    $counter++;
                }
                if($check) {
                    $newarray[$key]['Education'][$counter][$data[0][$k]] = $val;
                } else {
                    $newarray[$key][$data[0][$k]] = $val;
                }
            }
            $check = 0;
        }
        /**
         * check validation
         */
        $insertarray = [];
        $errorArray = [];
        $email = $student->getEmail();
        foreach($newarray as $key => $data) {
            $error = $validator->FileValiation($data, $email);
            if(empty($error)) {
                $insertarray[$key] = $data;
            } else {
                $errorArray = $data;
            }
        }
        echo "<pre>";
        print_r($errorArray);
        echo "</pre>";
        foreach($insertarray as $data) {
            $id = $student->insertStudentData($data);
            foreach($data['Education'] as $data) {
                $education->insertStudentEducationData($data, $id);
            }
        }
    }
?>

<div class="container mt-5 "style="min-height: 310px;width:auto;">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">

            <div class="card border-1">
                <div class="card-titel">
                    <h3 class="text-center">Select xml file form</h3>
                    <div class="card-body">
                        <form method="POST"  enctype="multipart/form-data">
                            
                            <label class="form-label text-start">select xml file</label>
                            <input type="file" name="xml"class="form-control">

                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" name="submit"
                                            class="btn btn-primary btn-lg gradient-custom-4 blue text-white" tabindex="12">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            

            </div>              
        </div>
    </div>
</div>
<?php
    include "footer.php";
?>