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
        var quizData = {
          lofasz : "lofasz"
        }
          jQuery.ajax({
              type: "POST", // HTTP method POST or GET
              url: "addnewquiz.php", //Where to make Ajax calls
              dataType: "json", // Data type, HTML, json etc.
              data: quizData, //Form variables
              success: function(response) {
                //alert("success")

              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(thrownError);
              }
          });
      });


  });
