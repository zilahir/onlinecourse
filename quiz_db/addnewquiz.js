$(document).ready(function() {
  var numberOfQuestions = 0;
  var selectedQuestions = [];
  $("input[type='checkbox']").change(function() {
      if(this.checked) {
        var questionId = $(this).data("questionid");
        numberOfQuestions = numberOfQuestions+1;
        selectedQuestions.push(questionId);
        //console.log(selectedQuestions);
        $("#selectedquestions").html(numberOfQuestions);
      } else {
        var questionId = $(this).data("questionid");
        selectedQuestions.splice($.inArray(questionId, selectedQuestions), 1);
        numberOfQuestions = numberOfQuestions-1;
        //console.log(selectedQuestions);
        $("#selectedquestions").html(numberOfQuestions);
      }
      });

      $("#createnewquiz").click(function(e) {
        var startsFrom = $("#opendate").val();
        var deadline = $("#deadline").val();
        var quizname = $("#quizname").val();
        var limit = $("#submission_limit").val();
        var quizData = {
          selectedquestions : selectedQuestions,
          startsFrom : startsFrom,
          deadline : deadline,
          quizname : quizname,
          limit : limit

        }
        //console.log(quizData);
          jQuery.ajax({
              type: "POST", // HTTP method POST or GET
              url: "addnewquiz.php", //Where to make Ajax calls
              dataType: "json", // Data type, HTML, json etc.
              data: quizData, //Form variables
              success: function(response) {
                //alert("success")
                console.log(quizData);
                var n = noty({
                  text: 'New quiz has been added successfully!',
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

              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(thrownError);
              }
          });
      });


  });
