$(document).ready(function() {
    $(".throwmeaway").click(function() {
        var url = "submitquiz.php?id="+$(this).data("id");
        window.document.location = url;
      });


      $("#edituser").click(function(e) {

          var userData = {
            newpassword: $("#newpassword").val()
          };

          //console.log(userData);
          jQuery.ajax({
              type: "POST", // HTTP method POST or GET
              url: "edituser.php", //Where to make Ajax calls
              dataType: "json", // Data type, HTML, json etc.
              data: userData, //Form variables
              success: function(response) {
                var n = noty({
                  text: 'Your password has been updated successfully!',
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
