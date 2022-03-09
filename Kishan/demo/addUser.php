<?php
    include "header.php";
    include "Validator.php";
    include "User.php";

    

    //create object validation class
    $validator = new Validator();
    $user = new User();
    
    
    // check submit button in call check funtion
    if(isset($_POST['submit'])) {

        // list all users in databae  
        $EmailPassword = $user->listingUser();

        // validation to check function call 
        $error = $validator->check($_POST, $EmailPassword);
        
        if(empty($error)) {
            $type = $_GET['type'];
            $user->register($_POST, $type);
        }
    }   
?>
    <section>
        <div class="mask d-flex align-items-center mt-5">
            <div class="container h-100">
                <!--row-->
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <!--col grid-->
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-center mb-5">Add user</h2>
                                <form method="POST" enctype="multipart/form-data">
                                    <!--first name input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">First name <span style="color: red;">*</span></label>
                                        <input id="myInput" type="text" name="fname" placeholder="Enter first name "value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : null ?>" class="form-control form-control-lg" />
                                            <span style="color: red; "><?php echo isset($error['fname']) ?  $error['fname'] : null; ?></span>
                                    </div>
                                    <!--end first name input -->
                                    <!--last name input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Last  name <span style="color: red;">*</span></label>
                                        <input type="text" name="lname" placeholder="Enter last name " value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : null ?>" class="form-control form-control-lg" />
                                        <span style="color: red; "><?php echo isset($error['lname']) ?  $error['lname'] : null; ?></span>
                                    </div>
                                    <!--end last  name input -->
                                    <!--email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" >Your email <span style="color: red;">*</span></label>
                                        <input type="email" name="email" placeholder="Enter email address "value="<?php echo isset($_POST['email']) ? $_POST['email'] : null ?>" class="form-control form-control-lg" />
                                        <span style="color: red;"><?php echo isset($error
                                        ['email']) ?  $error['email'] : null; ?></span>
                                    </div>
                                    <!--end email input -->
                                    <!--password input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Password <span style="color: red;">*</span></label>
                                        <input type="password" name="password" placeholder="Enter password"value="<?php echo isset($_POST['password']) ? $_POST['password'] : null ?>"class="form-control form-control-lg" />
                                         <span style="color: red; "><?php echo isset($error['password']) ?  $error['password'] : null; ?></span>
                                    </div>
                                    <!--end password input-->
                                    <!--conform password input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Conform password <span style="color: red;">*</span></label>
                                        <input type="password" name="conform" placeholder="Enter conform password "class="form-control form-control-lg" />
                                        <span style="color: red;"><?php echo isset($error['conform']) ?  $error['conform'] : null; ?></span>
                                    </div>
                                    <!--end conform password input-->
                                     <!--start image upload input-->
                                     <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Upload image <span style="color: red;">*</span></label>
                                        <input type="file" name="image" class="form-control form-control-lg" tabindex="5" />
                                        <span style="color: red;"><?php echo isset($error['image']) ?  $error['image'] : null; ?></span>
                                    </div>
                                    <!--date of birth input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Date of birth <span style="color: red;">*</span></label>
                                        <input type="date" name="dob" value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : null ?>"class="form-control form-control-lg" />
                                        <span style="color: red;"><?php echo isset($error['dob']) ?  $error['dob'] : null; ?></span>
                                    </div>
                                    <!--end date of birth input-->
                                    <!--zender input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-lable">Gender <span style="color: red;">*</span></label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="male">Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="female">Female
                                        </label>
                                        <span style="color: red; "><?php echo isset($error['gender']) ?  $error['gender'] : null; ?></span>
                                    </div>
                                    <!--end zender input-->
                                    <!--mobile number input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Mobile number <span style="color: red;">*</span></label>

                                        <input type="text" name="phone"placeholder="Enter mobile number" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : null ?>" class="form-control form-control-lg" />
                                        <span style="color: red;"><?php echo isset($error['phone']) ?  $error['phone'] : null; ?></span>
                                    </div>
                                    <!--end mobile number input-->
                                <!--country input-->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cdg">Select country <span style="color: red;">*</span></label>

                                        <select id ="country" name="country" class="form-select" >
                                            <option value="">Select country</option>
                                            
                                        </select> 
                                        <span style="color: red; "><?php echo isset($error['country']) ?  $error['country'] : null; ?></span>   
                                    </div>
                                    <!--end country input-->
                                    <!--state input-->
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cdg">Select state <span style="color: red;">*</span></label>

                                        <select id="statedroup" name="state" class="form-select">
                                            <option value="">Select state</option>
                                        </select>   
                                        <span style="color: red; "><?php echo isset($error['state']) ?  $error['state'] : null; ?></span>
                                    </div>
                                    <!--end state input-->
                                    <!--city input-->
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cdg">Select city <span style="color: red;">*</span></label>

                                        <select id="citydroup" class="form-select" name="city">                                                 <option value="">Select city</option>

                                        </select>   
                                        <span style="color: red; "><?php echo isset($error['city']) ?  $error['city'] : null; ?></span>
                                    </div>
                                    <!--end city input-->
                                    <!--terms and condition checkbox -->
                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" name="terms" value="yes" />
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                                    service</u></a>
                                        </label>
                                        <span style="color: red;"><?php echo isset($error['terms']) ?  $error['terms'] : null; ?></span>
                                    </div>
                                    <!--terms and condition checkbox -->
                                    <!--register button-->
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="submit"
                                            class="btn btn-primary btn-lg gradient-custom-4 blue text-white">Add User</button>
                                    </div>
                                    <!--end register button-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>

$(document).ready(function() {
    // get all country 
    $.ajax({
        type: "POST",
        url: 'getCountry.php',
        data: { },
        dataType: 'json',
        success: function(datacountry){
          
            $("#statedroup").empty();
            $("#statedroup").append("<option value=''>Select state</option>");
            $("#citydroup").empty();
            $("#citydroup").append("<option value=''>Select city</option>");
            
            for(i = 0; i <= datacountry.length; i++) {
               
                $("#country").append("<option value="+datacountry[i].id+">"+datacountry[i].name+"</option>");
                
            }
        }
    });
});

</script>
<?php
    include "footer.php";
?>