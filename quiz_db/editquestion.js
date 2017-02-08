$(document).ready(function() {
    $("#deletequestion").click(function(e) {

        var deleteData = {
          idToDelete: $(this).data("id")
        };

        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "deletequestion.php", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: deleteData, //Form variables
            success: function(response) {
              var n = noty({
                text: "Question has been deleted",
                theme: 'relax',
                type: 'information',
                timeout: '5000',
                  animation: {
                      open: {height: 'toggle'},
                      close: {height: 'toggle'},
                      easing: 'swing',
                      speed: 500 // opening & closing animation speed
                  }
              });
              window.document.location = "questions.php?action=deleted";
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });
});
