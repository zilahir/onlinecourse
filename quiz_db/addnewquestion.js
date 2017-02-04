$(document).ready(function() {
    $("#showaddnewquestionform").click(function(e) {
      $("#addnewquestion").toggleClass("hidden");
    });
    $("#submitbutton").click(function(e) {

        var questionData = {
          question: $('#newquestion').val(),
        };

        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "addnewquestion.php", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: questionData, //Form variables
            success: function(response) {
                //alert("success");
                var newLine = '<tr class="newlineadded"><td><span class="badge bg-warning">NEW</span></td><td>'+response.question+'</td><td><i class="fa fa-check"></i></td><td></td></tr>';
                $("#questions tbody").prepend(newLine);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });
});
