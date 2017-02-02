$(document).ready(function() {
  $("#submitforgrade").click(function(e) {
    //alert("pushed");
    var answerData = {
          answer1: $('input[name=question-1-answers]:checked').val(),
          answer2: $('input[name=question-2-answers]:checked').val()
        };
    jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "grade.php", //Where to make Ajax calls
            dataType:"json", // Data type, HTML, json etc.
            data:answerData, //Form variables

            success:function(response){
              //alert("success");
              if (response.result == "100") {
                $("#graderesult").addClass("hundredpercent");
              }
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
  });
});
