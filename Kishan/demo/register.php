<?php
    include "header.php";
    include "Validator.php";
    include "User.php";    

    //create object validation class
    $validator = new Validator();
    $user = new User();
    
    // check submit button in call check funtion
    if(isset($_POST['submit'])) {

        $EmailPassword = $user->listingUser(); 
        $error = $validator->check($_POST, $EmailPassword);


        // error is not than register function call
        if(empty($error)) {
            $user->register($_POST);
        } else {
            $data = $_POST;
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
                                <h2 class="text-capitalize text-center mb-5">Registration form</h2>
                                <form method="POST"  enctype="multipart/form-data">
                                    <!--first name input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">First name <span style="color: red;">*</span></label>
                                        <input id="myInput"type="text" name="fname" placeholder="Enter first name " value="<?php echo isset($data) ? $data['fname'] : null ?>" class="form-control form-control-lg" tabindex="1"/>
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['fname']) ?  $error['fname'] : null; ?></span>
                                    </div>
                                    <!--end first name input -->
                                    <!--last name input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Last  name <span style="color: red;">*</span></label>
                                        <input type="text" name="lname" placeholder="Enter last name "value="<?php echo isset($data) ? $data['lname'] : null ?>" class="form-control form-control-lg" tabindex="2"/>
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['lname']) ?  $error['lname'] : null; ?></span>
                                    </div>
                                    <!--end last  name input -->
                                    <!--email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" >Your email <span style="color: red;">*</span></label>
                                        <input type="email" name="email" placeholder="Enter email address "value="<?php echo isset($data) ? $data['email'] : null ?>" class="form-control form-control-lg"tabindex="3" />
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['email']) ?  $error['email'] : null; ?></span>
                                    </div>
                                    <!--end email input -->
                                    <!--password input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Password <span style="color: red;">*</span></label>
                                        <input type="password" name="password" placeholder="Enter password " class="form-control form-control-lg"tabindex="4" />
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['password']) ?  $error['password'] : null; ?></span>
                                    </div>
                                    <!--end password input-->
                                    <!--conform password input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Conform password <span style="color: red;">*</span></label>
                                        <input type="password" name="conform" placeholder="Enter conform password "class="form-control form-control-lg"tabindex="5" />
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['conform']) ?  $error['conform'] : null; ?></span>
                                    </div>
                                    <!--end conform password input-->
                                     <!--start image upload input-->
                                     <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Upload image <span style="color: red;">*</span></label>
                                        <input type="file" name="image" class="form-control form-control-lg" tabindex="5" />
                                        <span style="color: red;"><?php echo isset($error['image']) ?  $error['image'] : null; ?></span>
                                    </div>
                                    <!--end image upload input-->
                                    <!--date of birth input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Date of birth <span style="color: red;">*</span></label>
                                        <input type="date" name="dob" value="<?php echo isset($data) ? $data['dob'] : null ?>"class="form-control form-control-lg" tabindex="6"/>
                                        <span style="color: red;"><?php echo isset($error['dob']) ?  $error['dob'] : null; ?></span>
                                    </div>
                                    <!--end date of birth input-->
                                    <!--zender input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-lable">Gender <span style="color: red;">*</span></label>
                                        <br>
                                       
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="male" tabindex="7" <?php echo (isset($data['gender']) == 'male') ? 'checked' : null ?>>Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="female" tabindex="8" <?php echo (isset($data['gender']) == 'female') ? 'checked' : null ?>>Female
                                        </label>
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['gender']) ?  $error['gender'] : null; ?></span>
                                    </div>
                                    <!--end zender input-->
                                    <!--mobile number input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Mobile number <span style="color: red;">*</span></label>
                                        <input type="text" name="phone" placeholder="Enter mobile number "value="<?php echo isset($data) ? $data['phone'] : null ?>"class="form-control form-control-lg"tabindex="9" />
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['phone']) ?  $error['phone'] : null; ?></span>
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

                                        <select id="citydroup" class="form-select" name="city">                                                 <option value="" >Select city</option>

                                        </select>   
                                        <span style="color: red; "><?php echo isset($error['city']) ?  $error['city'] : null; ?></span>  
                                    </div>
                                    <!--end city input-->
                                    <!--terms and condition checkbox -->
                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" name="terms" value="yes" tabindex="11" />
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                                    service</u></a>
                                        </label>
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['terms']) ?  $error['terms'] : null; ?></span>
                                    </div>
                                    <!--terms and condition checkbox -->
                                    <!--register button-->
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="submit"
                                            class="btn btn btn-primary  btn-lg gradient-custom-4 blue text-white" tabindex="12">Register</button>
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
 <!-- ajax code to get state -->
  <!--add countri,state and city jquery add  -->
  <script src="js/country.js"></script>

  <script src="js/ajax.js"></script>

<?php
    include "footer.php";
?>