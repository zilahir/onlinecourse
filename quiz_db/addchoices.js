$(document).ready(function() {

    $("#addnewoption").click(function(e) {
        //alert("clicked");
        var newLine = '<div class="input-group"><span class="input-group-addon" id="basic-addon1">2.</span><input id="choice-2" name="choice-2" type="text" class="form-control" placeholder="Provide a choice" aria-describedby="basic-addon1"></div>';
        $("#optioncontainer").append(newLine);
    });

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
