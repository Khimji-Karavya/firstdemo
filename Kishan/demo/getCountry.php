<?php
include "Country.php";

     $country = new Country();
    // get country in database  country table
     $res = $country->getCountries();    
     echo json_encode($res);


    
      

?>