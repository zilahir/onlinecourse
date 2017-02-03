$(document).ready(function() {
    var allChoises = "";
    $("#addnewoption").click(function(e) {
        //alert("clicked");
        var Numbers = $("#optioncontainer input");
        var lastItem = Numbers[Numbers.length-1];
        var lastId = $(lastItem).data("number");
        var newId = lastId+1;
        var newLine = '<div class="input-group"><span class="input-group-addon" id="basic-addon1">'+newId+'</span><input data-number="'+newId+'" id="choice-'+newId+'" name="choice-'+newId+'" type="text" class="form-control" placeholder="Provide a choice" aria-describedby="basic-addon1"></div>';
        $("#optioncontainer").append(newLine);;
        //console.log(allChoises)
    });
    var choicesData = {};
    $("#sbmitchoices").click(function(e) {
        /*var choicesData = {
          choice1: $('#choice-1').val(),
          choice2: $('#choice-2').val(),
          questionId: $('#questionid').data("id"),
        };*/

        //create the json object for inserting the values to the DB
        allChoises = $("input[id^='choice-']")
        $.each(allChoises, function() {
          //console.log($(this).data("number"));
          var number = $(this).data("number");
          var value = $(this).val();
          var name = "choice"+number;
          choicesData[name] = value;
        });

        console.log(choicesData);
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
