$(document).ready(function() {
  $(".signup").click(function(e) {
    var courseCode = $(this).parent().data('courseid')
    e.preventDefault();
    var signeUpObjext = {
      courseCode: courseCode,
    };
    jQuery.ajax({
        type: "POST",
        url: "php/signuptocourse.php",
        dataType: "json",
        data: signeUpObjext,
        success: function(response) {
          console.log(response);
          var n = noty({
            text: 'You hvae signed up to course!',
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

  $("#createnewcourse").click(function(e) {
    e.preventDefault();
    alert("lofasz");
  });
});
