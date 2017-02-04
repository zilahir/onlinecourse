$(document).ready(function() {
    var allChoises = "";
    $("#addnewoption").click(function(e) {
        //alert("clicked");
        var Numbers = $("#optioncontainer input");
        var lastItem = Numbers[Numbers.length-1];
        var lastId = $(lastItem).data("number");
        var newId = lastId+1;
        var newLine = '<div class="input-group"><span class="input-group-addon" id="basic-addon1"><input data-number="'+newId+'" type="checkbox" aria-label=""></span><input data-number="'+newId+'" id="choice-'+newId+'" name="choice-'+newId+'" type="text" class="form-control" placeholder="Provide a choice" aria-describedby="basic-addon1"></div>';
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
        var allCheckbox = $("[type=checkbox]");

        $.each(allCheckbox, function() {
            if ($(this).is(':checked')) {
              console.log($(this).data("number"));  //WORKS
              var correctChoise = $(this).data("number");
              choicesData["correct_choice"] = correctChoise;
            } else {
              console.log("no checkbox is checked");
            }
        });

        allChoises = $("input[id^='choice-']")
        var allChoisesLength = allChoises.length;
        $.each(allChoises, function() {
          //console.log($(this).data("number"));
          var number = $(this).data("number");
          var value = $(this).val();
          var name = "choice"+number;
          choicesData[name] = value;
          choicesData["length"] = allChoisesLength;
          choicesData ["questionId"] = $('#questionid').data("id");
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
