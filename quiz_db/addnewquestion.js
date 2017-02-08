$(document).ready(function() {
    var simplemde = new SimpleMDE({
        element: document.getElementById("markdowneditor")
    });
    $("#showaddnewquestionform").click(function(e) {
        $("#addnewquestion").toggleClass("hidden");
    });
    $("#submitbutton").click(function(e) {
        var context = simplemde.value();
        var questionData = {
            question: $('#newquestion').val(),
            context: context,
            tags: $('#tags').val()
        };

        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "addnewquestion.php", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: questionData, //Form variables
            success: function(response) {
                //alert("success");
                var newLine = '<tr class="newlineadded"><td><span class="badge bg-warning">NEW</span></td><td>' + response.question + '</td><td><i class="fa fa-check"></i></td><td></td></tr>';
                $("#questions tbody").prepend(newLine);
                var n = noty({
                  text: 'New question has been added successfully!',
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
