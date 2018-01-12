$(document).ready(function() {

  $("#course-dropdown li a").click(function(){

      /*$(".btn:first-child").text($(this).text());
      $(".btn:first-child").val($(this).text());*/
      console.log($(this).text());
      $('.course-list-dropdown').text($(this).text());
   });

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
        var course = $(".course-list-dropdown").text();
        course = (course.split(' ').join(''));
        var quizData = {
          selectedquestions : selectedQuestions,
          startsFrom : startsFrom,
          deadline : deadline,
          quizname : quizname,
          limit : limit,
          course: course,
        }
        //console.log(quizData);
          jQuery.ajax({
              type: "POST",
              url: "addnewquiz.php",
              dataType: "json",
              data: quizData,
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
                        speed: 500
                    }
                });
              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(thrownError);
              }
          });
      });
  });
