$(document).ready(function() {
  $("#submitforgrade").click(function(e) {
    //alert("pushed");
    var showErrorBox = false;
    var numberOfQuestions = $(".exercise-container li").length;
    var questions = $('input[name^=question-]:checked');
    var answerData = [];
    $(questions).each(function() {
        //console.log(this);
        var questionid = $(this).data("questionid");
        var givenanswer = $(this).data("answerid");
        item = {}
        item ["questionid"] = questionid;
        item ["givenanswer"] = givenanswer;
        answerData.push(item);
    });

    //console.log(answerData);

    jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "grade_test.php", //Where to make Ajax calls
            dataType:"json", // Data type, HTML, json etc.
            data:{answerData}, //Form variables
            success:function(response){
              //alert("success");
              console.log(response);
              //console.log(response.result);
                //$("#graderesult").addClass(response.result);
                $("#graderesult").css("width", response.result+"%");
                $.each(response.answers, function(i, obj) {
                  console.log(obj);
                  if (obj == false || obj == undefined) {
                    $("li#"+i).addClass("wrong-answer");
                    showErrorBox = true;
                  }
                });

                if (showErrorBox == true) {
                  $("#errorcontainer").toggleClass("hidden"); //show the error message container
                }
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
  });
});
