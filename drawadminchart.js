$(document).ready(function() {
  jQuery.ajax({
      type: "GET",
      url: "php/getchartfortags.php",
      success: function(response) {
          var json = jQuery.parseJSON(response);
          drawPieChart(json);
      },
      error: function(xhr, ajaxOptions, thrownError) {
      }
  });
});

function drawPieChart(json) {
    var chart = c3.generate({
        size: {
            width: 170,
            height: 170
        },
        bindto: d3.select('#' + "questionsbytags"),
        data: {
            // iris data from R
            columns: [
                ['HTML', json.html],
                ['CSS', json.css],
            ],
            type: 'pie',
            colors: {
                'HTML': '#7ea4b3',
                'CSS': '#ffb347'
            },
            /*onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); }*/
        },
    });
}
