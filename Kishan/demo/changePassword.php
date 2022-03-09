<?php
    include "header.php";
    include "Validator.php";
    include "User.php";

     //create object validation class
     $validator = new Validator();
     $user = new User();

     if(isset($_POST['submit'])) {
        $error = $validator->checkUserPassword($_POST);
      
        if(
            empty($error['password']) &&
            empty($error['newpassword']) &&
            empty($error['conform']) && 
            empty($error['terms'])
        ) {
                // update function call
            $user->updateUSerPassword($_POST);
                
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
                        <h2 class="text-center mb-5">Change password user</h2>
                        <form method="POST">
                             <!--password input-->
                             <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Current password<span style="color: red;">*</span></label>
                                        <input type="password" name="password" placeholder="Enter password " class="form-control form-control-lg"tabindex="4" />
                                        <span style="color: red;"><?php echo isset($error['password']) ?  $error['password'] : null; ?></span>
                                    </div>
                                    <!--end password input-->
                                     <!--password input-->
                             <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">New password<span style="color: red;">*</span></label>
                                        <input type="password" name="newpassword" placeholder="Enter password " class="form-control form-control-lg"tabindex="4" />
                                        <span style="color: red;"><?php echo isset($error['newpassword']) ?  $error['newpassword'] : null; ?></span>
                                    </div>
                                    <!--end password input-->
                                    <!--conform password input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Conform password <span style="color: red;">*</span></label>
                                        <input type="password" name="conform" placeholder="Enter conform password "class="form-control form-control-lg"tabindex="5" />
                                        <span style="color: red;"><?php echo isset($error['conform']) ?  $error['conform'] : null; ?></span>
                                    </div>
                                    <!--end conform password input-->
                            <!--terms and condition checkbox -->
                            <div class="form-check d-flex justify-content-center mb-5">
                                <input class="form-check-input me-2" type="checkbox" name="terms" value="yes" />
                                <label class="form-check-label" for="form2Example3g">
                                    I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                            service</u></a>
                                </label>
                                <span style="color: red; "><?php echo isset($error['terms']) ? $error['terms'] : null; ?></span>
                            </div>
                            <!--terms and condition checkbox -->
                            <!--register button-->
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="submit"
                                    class="btn btn-primary btn-lg gradient-custom-4 blue text-white">Update</button>
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
<?php
include "footer.php";
?>