$(document).ready(function() {
    $("#sbmitchoices").click(function(e) {

        var choicesData = {
          choice1: $('#choice-1').val(),
          choice2: $('#choice-2').val(),
          questionId: $('#questionid').data("id"),
        };

        //console.log(choicesData);

        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "addnewchoices.php", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: choicesData, //Form variables
            success: function(response) {
                //alert("success");
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });
});
