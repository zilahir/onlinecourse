$(document).ready(function() {
    $("#showaddnewexerciseform").click(function(e) {
        $("#addnewexercise").toggleClass("hidden");
    });
    $("#submitbutton").click(function(e) {
        var exerciseData = {
            exercisename: $('#exercisename').val(),
            maxpoints: $('#maxpoints').val(),
            minpoints: $('#minpoints').val(),
            deadline : $('#deadline').val()
        };
        console.log(exerciseData);
        jQuery.ajax({
            type: "POST",
            url: "addnewexercise.php",
            dataType: "json",
            data: exerciseData,
            success: function(response) {
                //alert("success");
                var newLine = '<tr class="newlineadded"><td><span class="badge bg-warning">NEW</span></td><td>' + response.name + '</td><td>'+response.max_points+'</td><td>'+response.deadline+'</td><td>'+response.owner+'</td><td></td></tr>';
                $("#questions tbody").prepend(newLine);
                var n = noty({
                  text: 'New exercise has been added successfully!',
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
