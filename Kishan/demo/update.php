<?php
    include "header.php";
    include "Validator.php";
    include "User.php";
    
    //create object validation class
    $validator = new Validator();
    $user = new User();

    $data=$user->userData($_GET);
    // check submit button in call check funtion
    if(isset($_POST['submit'])) {

        $error = $validator->check($_POST);
      
        if(
            empty($error['fname']) && 
            empty($error['lname']) && 
            empty($error['email']) && 
            empty($error['dob']) && 
            empty($error['gender']) && 
            empty($error['phone']) && 
            empty($error['country']) && 
            empty($error['state']) && 
            empty($error['city']) && 
            empty($error['terms'])  
        ) {
           // update function call
            if(isset($_GET['id'])) {
                $userUpdated = $user->updateUSer($_GET['id'], $_POST);
                if ($userUpdated == true) {
                    header("location:dashboard.php");
                } 
            }
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
                                <h2 class="text-center mb-5">Update User</h2>
                                <form method="POST" enctype="multipart/form-data">
                                    <!--first name input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">First name</label>
                                        <input id="myInput"type="text" name="fname" value="<?php echo $data['fname'] ?>" class="form-control form-control-lg" />
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['fname']) ?  $error['fname'] : null; ?>
                                        </span> 
                                    </div>
                                    <!--end first name input -->
                                    <!--last name input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Last  name</label>
                                        <input type="text" name="lname" value="<?php echo $data['lname']?>" class="form-control form-control-lg" />
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['lname']) ?  $error['lname'] : null; ?></span>
                                    </div>
                                    <!--end last  name input -->
                                    <!--email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" >Your email</label>
                                        <input type="email" name="email" value="<?php echo $data['email']?>" class="form-control form-control-lg" readonly />
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['email']) ?  $error['email'] : null; ?></span>
                                    </div>
                                    <!--end email input -->
                                     <!--start image upload input-->
                                     <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Upload image</label>
                                        <input type="file" name="image" value="<?php echo $data['image']; ?>" class="form-control form-control-lg" tabindex="5" />
                                        <span style="color: red;"><?php echo isset($error['image']) ?  $error['image'] : null; ?></span>
                                    </div>
                                    <!--date of birth input-->
                                    <!--date of birth input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Date of birth</label>
                                        <input type="date" name="dob" value="<?php echo $data['dob']?>"class="form-control form-control-lg" />
                                        <span style="color: red;"><?php echo isset($error['dob']) ?  $error['dob'] : null; ?></span>
                                    </div>
                                    <!--end date of birth input-->
                                    <!--zender input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-lable">Gender</label>
                                        <br>
                                        <?php
                                            if ($data['gender'] == 'male') {
                                                $male = "checked";
                                            
                                            } else {
                                                $female = "checked";
                                            }
                                        ?>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="male" <?php echo isset($male) ? $male :null; ?>>Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="female" <?php echo isset($female) ? $female :null; ?>>Female
                                        </label>
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['gender']) ?  $error['gender'] : null; ?></span>
                                    </div>
                                    <!--end zender input-->
                                    <!--mobile number input-->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Mobile number</label>
                                        <input type="text" name="phone" value="<?php echo $data['mobile']?>" class="form-control form-control-lg" />
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['phone']) ?  $error['phone'] : null; ?></span>
                                    </div>
                                    <!--end mobile number input-->
                                     <!--country input-->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cdg">Select country <span style="color: red;">*</span></label>

                                        <select id ="country" name="country" class="form-select" >
                                           
                                        
                                            
                                        </select> 
                                        
                                        <span style="color: red; "><?php echo isset($error['country']) ?  $error['country'] : null; ?></span>   
                                    </div>
                                    <!--end country input-->
                                    <!--state input-->
                                   
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cdg">Select state <span style="color: red;">*</span></label>

                                        <select id="statedroup" name="state" class="form-select">

                                           


                                        </select>   
                                        <span style="color: red; "><?php echo isset($error['state']) ?  $error['state'] : null; ?></span>
                                    </div>
                                    <!--end state input-->
                                    <!--city input-->
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cdg">Select city <span style="color: red;">*</span></label>

                                        <select id="citydroup" class="form-select" name="city">                                


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
                                        <span style="color: red; text-transform:capitalize"><?php echo isset($error['terms']) ? $error['terms'] : null; ?></span>
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
                if(datacountry[i].id ==  <?php echo $data['country_id']?>) {
                    $("#country").append("<option value="+datacountry[i].id+" selected>"+datacountry[i].name+"</option>");
                } else {
                    $("#country").append("<option value="+datacountry[i].id+">"+datacountry[i].name+"</option>");
                }
            }
        }
    });

    // get state update data
    var country_id = <?php echo $data['country_id']?>;
    $.ajax({
        type: "POST",
        url: 'getStateList.php',
        data: { country_id: country_id },
        dataType: 'json',
        success: function(datacountry){
            $("#statedroup").empty();
            $("#statedroup").append("<option value=''>Select state</option>");
            $("#citydroup").empty();
            $("#citydroup").append("<option value=''>Select city</option>");
            for(i = 0; i <= datacountry.length; i++) {
                if(datacountry[i].id ==  <?php echo $data['state_id']?>) {
                    $("#statedroup").append("<option value="+datacountry[i].id+" selected>"+datacountry[i].name+"</option>");
                } else {
                    $("#statedroup").append("<option value="+datacountry[i].id+">"+datacountry[i].name+"</option>");
                }
            }
        }
    });

    // get city update data
    var state_id =  <?php echo $data['state_id']?>;
    $.ajax({
        url: 'getCity.php',
        type: "POST",
        data: {state_id: state_id},
        dataType : 'json',
        success: function(datacountry){
            $("#citydroup").empty();
            $("#citydroup").append("<option value=''>Select city</option>");
            for(i = 0; i <= datacountry.length; i++) {
                if(datacountry[i].id ==  <?php echo $data['city_id']?>) {
                    $("#citydroup").append("<option value="+datacountry[i].id+" selected>"+datacountry[i].name+"</option>");
                } else {
                    $("#citydroup").append("<option value="+datacountry[i].id+">"+datacountry[i].name+"</option>");
                }
            }
        }   
    });
});

</script>
    <?php
        include "footer.php";
    ?>