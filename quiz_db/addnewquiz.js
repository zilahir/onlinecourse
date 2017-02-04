$(document).ready(function() {
  var selectedquestions = 0;
  $("input[type='checkbox']").change(function() {
      if(this.checked) {
        var questionId = $(this).data("questionid");
        console.log(questionId);
        selectedquestions = selectedquestions+1;
        $("#selectedquestions").html(selectedquestions);
      } else {
        selectedquestions = selectedquestions-1;
        $("#selectedquestions").html(selectedquestions);
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
