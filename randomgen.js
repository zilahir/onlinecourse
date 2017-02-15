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
            //console.log(quizData);
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
          error:function (xhr, ajaxOptions, thrownError){
              alert(thrownError);
          }
      });
  });
});
