$(document).ready(function() {
  $("#hitme").click(function (e) {
    e.preventDefault();
    //alert("clicked");
    var parameter = $("#parameter").val();
    jQuery.ajax({
        type: "POST",
        //url: "http://robot:bd6259f0769976dc672fe22d30cb174d@kat.inf.elte.hu/jenkins/job/robot-demo/build?token=m2L5t8jlA0r880pjzQIrxGn9L6pzg410",
        url: "http://robot:bd6259f0769976dc672fe22d30cb174d@kat.inf.elte.hu/jenkins/job/robot-demo/buildWithParameters?token=m2L5t8jlA0r880pjzQIrxGn9L6pzg410&filename="+parameter,
        dataType:"html",
        success:function(response){
            //build has started successfully
    getLastBuild();
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    });
  });

  function getConsoleText () {
    jQuery.ajax({
        type: "POST",
        url: "http://robot:bd6259f0769976dc672fe22d30cb174d@kat.inf.elte.hu/jenkins/job/robot-demo/lastBuild/consoleText",
        dataType:"html",
        success:function(response){
            $("#loading").toggleClass("hidden");
            $("#buildconsoletext").append(response);
            console.log(response);
            // regex for the json
            var regex = "(\*{3})(.*)(\*{3})";

        },
        error:function (xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    });

  }

  // getting back the last result
  $(".getlastbuild").click(function (e) {
    getConsoleText();
  });


  function getLastBuild () {
    jQuery.ajax({
        type: "POST",
        url: "http://robot:bd6259f0769976dc672fe22d30cb174d@kat.inf.elte.hu/jenkins/job/robot-demo/lastBuild/api/json?depth=1",
        dataType:"json",
        success:function(response){
            if (response.building) {
      $("#buildinprogress").removeClass("hidden");
      setTimeout(getLastBuild, 5000);
    } else {
      getConsoleText();
    }
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    });
  }

});
