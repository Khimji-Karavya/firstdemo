<?php
include "State.php";


$state = new State();
if(isset($_POST['country_id'])) {
    $id = $_POST['country_id'];
    $res = $state->getState($id);
    echo json_encode($res);
   
}
 
?>