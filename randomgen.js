$(document).ready(function() {
  $("#randomquiz").click(function(e) {
    e.preventDefault();
    //$(".someClass").eq(random).click();
    var ids = [];
    for (var i=0; i<10; i++) {
      var random = Math.floor(Math.random()*10);
      //console.log($("#questioncontainer tr").eq(random));
      var result = $("#questioncontainer tr").eq(random);
      var questionId = $(result).data("id");
      //console.log($.inArray(questionId, ids ));
      if ($.inArray(questionId, ids ) !== "-1") {
        console.log("duplicated");
        random = Math.floor(Math.random()*10);
        result = $("#questioncontainer tr").eq(random);
        questionId = $(result).data("id");
      }
      ids.push(questionId);
    }
    console.log(ids);
  });

});
