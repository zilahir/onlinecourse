$(document).ready(function() {
    $(".fa-times").click(function(e) {

        var deleteData = {
          idToDelete: $(this).parent().parent().data("id")
        };

        //console.log(deleteData);
        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "deletequestion.php", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: deleteData, //Form variables
            success: function(response) {
              //alert("success");
              console.log(response);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });
});
