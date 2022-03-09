    

$(document).ready(function() {
   
$('#country').on('change', function() {
    var country_id = this.value;
    $.ajax({
        type: "POST",
        url: 'getStateList.php',
        data: { country_id: country_id },
        dataType: 'json',
        success: function(data){
            $("#statedroup").empty();
            $("#statedroup").append("<option>Select state</option>");
            $("#citydroup").empty();
            $("#citydroup").append("<option>Select city</option>");
            for(i = 0; i <= data.length; i++) {
                $("#statedroup").append("<option value="+data[i].id+">"+data[i].name+"</option>");
            }
        }
    });
});    

    $('#statedroup').on('change', function() {
        var state_id = this.value;
        $.ajax({
            url: 'getCity.php',
            type: "POST",
            data: {state_id: state_id},
            dataType : 'json',
            success: function(data){
                $("#citydroup").empty();
                $("#citydroup").append("<option>Select city</option>");
                for(i = 0; i <= data.length; i++) {
                    $("#citydroup").append("<option value="+data[i].id+">"+data[i].name+"</option>");
                }
            }   
        });
    });
});
        