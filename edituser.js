$(document).ready(function() {
    $("#edituser").click(function(e) {

        var userData = {
          newpassword: $("newpassword").val()
        };

        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "edituser.php", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: userData, //Form variables
            success: function(response) {
              alert("success");
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });
});
