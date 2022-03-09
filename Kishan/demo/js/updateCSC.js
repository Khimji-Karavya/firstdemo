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
