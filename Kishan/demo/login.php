<?php

    include "header.php";
    include "User.php";

    $user = new User();

    if( isset($_POST['login']) ) {
        $result = $user->login($_POST);
        if($result) {
            header("location:dashboard.php");
        } else {
            $errorloin = "plese corect login details";
            $data = $_POST;
        }
    } 
?>

    <!--start login form-->

    <section>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 cl-lg-7 col-xl-6">
                    <div class="card mt-5" style="border-radius: 10px ;">
                        <div class="card-body p-5">
                            <h2 class="text-capitalize text-center mb-5">Login Form</h2>
                            <form method="POST">
                                <!--email input-->
                                <div class="form-outline mb-4">
                                    <label class="form-lable">Email<span style="color: red;">*</span></label>
                                    <input id="myInput"class="form-control" type="text" name="email" value="<?php echo isset($data) ? $data['email'] : null ?>" placeholder="Enter email" tabindex="1">
                                </div>

                                <!--password input-->
                                <div class="form-outline mb-4">
                                    <label class="form-lable">Password<span style="color: red;">*</span></label>
                                    <input class="form-control" type="password" name="password"  placeholder="Enter password" tabindex="2">
                                </div>
                                <span style="color: red; text-transform:capitalize"><?php echo isset($errorloin)? $errorloin : null   ?></span>
                                <!--submit button-->
                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="login"
                                        class="btn btn-primary btn-lg gradient-custom-4 blue text-white" tabindex="3">login</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end login form-->
    <?php
        include "footer.php";
    ?>