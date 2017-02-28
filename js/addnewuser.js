$(document).ready(function() {
    $("#addnewuser").click(function(e) {
        
        jQuery.ajax({
            type: "POST",
            url: "../tests/csv.php",
            dataType: "json",
            //data: exerciseData,
            success: function(response) {
              console.log(result);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });
});
