$(document).ready(function() {
    $("#addnewquestion").click(function(e) {

        var questionData = {
          question: $('#newquestion').val(),
        };

        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "addnewquestion.php", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: questionData, //Form variables
            success: function(response) {
                alert("success");
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });
});
