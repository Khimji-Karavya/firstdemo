<?php
    $status = session_status();
    // There is no active session
    if($status == PHP_SESSION_NONE){
        session_start();
    }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <link href="css/style.css" rel="stylesheet">
   
</head>
<body onLoad="">
     <!--statrt header-->
    <nav class="navbar navbar-expand-lg navbar-light orange">
      <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img class="logo" src="Images/logo/logo.jpeg"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                  <!--home page ancore link-->
                  <li class="nav-item">
                      <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                  </li>
                  <!--end home page ancore link-->
                  
                  <!--brand page ancore link-->
                  <li class="nav-item">
                      <a class="nav-link active text-white" aria-current="page" href="dashboard.php">Dashabord</a>
                  </li>
                  <!-- end brand page ancore link-->

                  <!--service page ancore link-->
                  <li class="nav-item">
                      <a class="nav-link active  text-white" aria-current="page" href="read.php">File read</a>
                  </li>
                  <!--end service page ancore link-->

                  <!--product page ancore link-->
                  <li class="nav-item">
                      <a class="nav-link active text-white" aria-current="page" href="#">Product</a>
                  </li>
                  <!--end product page ancore link-->

                  <!--dropdown tools start-->
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle  text-white" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Tools
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Integration</a></li>
                          <li><a class="dropdown-item" href="#">catalogay</a></li>
                      </ul>
                  </li>
                  <!--dropdown end-->

              </ul>

              <!--login user image-->
                <?php
                ob_start();
                    if(isset($_SESSION['user']['email'])) {
                        $userId = $_SESSION['user']['id'];
                    ?>
                        <ul class="nav-item dropdown text-white text-center mt-3">
                            <img id= "userdropdown" class="dropdown-toggle rounded-circle" role="button" data-bs-toggle="dropdown" aria-expanded="false" src="Images/imageDirectory/<?php echo $_SESSION['user']['image']; ?>" style="height:40px; width:40px;margin-right :40px;">

                            <h5><?php echo "Hello " . $_SESSION['user']['fname'] ?></h5>

                            <ul class="dropdown-menu" aria-labelledby="userdropdown" >
                                <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>

                                <li><a class="dropdown-item" href="changePassword.php?id=<?php echo $userId; ?>">Change password</a></li>

                                <li><a class="dropdown-item" href="update.php?id=<?php echo $userId; ?>">Edit user</a></li>

                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </ul>

                    <?PHP
                    } else { 
                    ?>
                   <div class='d-flex'>
                        <div><a href = 'register.php'>Register</a></div>
                    </div>
                    <div class='d-flex p-2'>
                        <div><a href = 'login.php'>Login</a></div>
                    </div>
                    <?PHP
                
                	 }
                ?>
              <!--end register and login link-->
          </div>
      </div>
  </nav>
  <!--end header-->
</body>
</html>

