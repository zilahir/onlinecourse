$(document).ready(function() {
  $("#randomquiz").click(function(e) {
    e.preventDefault();
    var startsFrom = $("#opendate").val();
    var deadline = $("#deadline").val();
    var quizname = $("#quizname").val();
    var limit = $("#submission_limit").val();
    var quizData = {
      startsFrom : startsFrom,
      deadline : deadline,
      quizname : quizname,
      limit : limit
    }
  jQuery.ajax({
          type: "POST", // HTTP method POST or GET
          url: "getrandomquestions.php", //Where to make Ajax calls
          dataType:"json", // Data type, HTML, json etc.
          data:quizData, //Form variables
          success:function(response){
            console.log(quizData);
          },
          error:function (xhr, ajaxOptions, thrownError){
              alert(thrownError);
          }
      });
  });
});
