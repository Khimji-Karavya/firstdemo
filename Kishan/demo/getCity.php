<?php
include "City.php";

$state = new City();
if(isset($_POST['state_id'])) {
    $id = $_POST['state_id'];
    $res = $state->getCity($id);
    echo json_encode($res);
}



?>