$(document).ready(function() {
    $("#deletequestion").click(function(e) {

        var deleteData = {
          idToDelete: $(this).data("id")
        };

        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "deletequestion.php", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: deleteData, //Form variables
            success: function(response) {
              window.document.location = "questions.php?action=deleted";
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });
});
