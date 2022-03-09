<?php
    include "header.php";
    include "User.php";
    include "Country.php";
    include "State.php";
    include "City.php";


    /**session check login user */
    if(!isset($_SESSION['user']['email'])){
        header("location:login.php");
    }
    // create object
    $user = new User();
    $country = new Country();
    $state = new State();
    $city = new City();

    // listing function call
    $result = $user->listingUser();
    
    /**delete user condition */
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $user->delete($id);
        $result = $user->listingUser();
    }
?>

<!--start dashbord table-->
<div class="container table-responsive mt-5 dashboard">
    <!--row heading-->
    <div class="row">
        <h1>Dashboard users</h1>
    </div>
    <!--row add user link-->
    <div class="row justify-content-end">
        <a class="btn btn-primary" href="addUser.php?type=add" style="width:auto;">Add user</a>
    </div>
    <!--row show user data table-->
    <div class="row">
        <table class="table scroll" id="table">
            <!--table heading -->
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Image</th>
                    <th scope="col">Date of birth</th>
                    <th scope="col">Country</th>
                    <th scope="col">State</th>
                    <th scope="col">City</th>
                    <th scope="col">Action</th>
                   
                </tr>
            </thead>
            <!--end table heading-->
            <!--table body-->
            <tbody>
                
                <?php
                    $i = 1;
                    while($row = $result->fetch_assoc()) {
                        if(!($_SESSION['user']['email'] == $row['email'])){
                ?>
                            <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['fname']." ".$row['lname']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><img src="Images/imageDirectory/<?php echo $row['image']?>" style="height:100px; width:100px;"></td>
                            <td><?php echo $row['dob']?></td>
                            <td>
                                <?php  
                                    echo $country->getCountryNameById($row['country_id']);
                                ?>
                            </td>
                            <td>
                                <?php  
                                    echo $state->getStateNameById($row['state_id']);
                                ?>
                            </td>
                            <td >
                                <?php 
                                   echo $city->getCityNameById($row['city_id']);   
                                ?>
                            </td>
                            <td>
                            <?php
                                $loginUser = $_SESSION['user']['email'];
                                if($loginUser != $row['email']) {
                            ?>
                                <a href="update.php?id=<?php echo $row['id']?>"><i class="fa fa-edit"></i></a>
                                <a href="?id=<?php echo $row['id']?>" onclick="return confirm('Are You Sure delete record')"><i class="fa fa-trash-o"></i></a>
                            <?php
                                }
                            ?>
                                
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
               
                <?php
                    }
                ?>
            <!--end table body-->
            </tbody>
        </table>
    </div>
</div>

<!--end dashbord -->
<?php
    include "footer.php";
?>   