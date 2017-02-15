$(document).ready(function() {
  $("#randomquiz").click(function(e) {
    e.preventDefault();
  jQuery.ajax({
          type: "POST", // HTTP method POST or GET
          url: "getrandomquestions.php", //Where to make Ajax calls
          //dataType:"json", // Data type, HTML, json etc.
          //data:answerData, //Form variables
          success:function(response){
            console.log(response);
          },
          error:function (xhr, ajaxOptions, thrownError){
              alert(thrownError);
          }
      });
  });
});
