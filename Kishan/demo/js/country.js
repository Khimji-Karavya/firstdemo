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
               
                $("#country").append("<option value="+datacountry[i].id+">"+datacountry[i].name+"</option>");
                
            }
        }
    });
});