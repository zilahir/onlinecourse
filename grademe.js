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
            url: "grade.php", //Where to make Ajax calls
            dataType:"json", // Data type, HTML, json etc.
            data:{answerData, numberOfQuestions}, //Form variables
            success:function(response){
                if (response == "limitreached") {
                  //alert("limit reached");
                  var n = noty({
                    text: 'You have reached the submission limit!',
                  	theme: 'relax',
                  	type: 'error',
                  	timeout: '5000',
                      animation: {
                          open: {height: 'toggle'},
                          close: {height: 'toggle'},
                          easing: 'swing',
                          speed: 500 // opening & closing animation speed
                      }
                  });
                } else {
                  var n = noty({
                    text: 'Submission was successful!',
                  	theme: 'relax',
                  	type: 'success',
                  	timeout: '5000',
                      animation: {
                          open: {height: 'toggle'},
                          close: {height: 'toggle'},
                          easing: 'swing',
                          speed: 500 // opening & closing animation speed
                      }
                  });
                  $("#graderesult").css("width", response.result+"%");
                  $.each(response.answers, function(i, obj) {
                    console.log(obj);
                    if (obj == false || obj == undefined) {
                      showErrorBox = true;
                    }
                  });

                  if (showErrorBox == true) {
                    $("#errorcontainer").toggleClass("hidden"); //show the error message container
                  }
                }
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
  });
});
