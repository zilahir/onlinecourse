function drawPieChart() {
    var chart = c3.generate({
        size: {
            width: 170,
            height: 170
        },
        bindto: d3.select('#' + "chart"),
        data: {
            // iris data from R
            columns: [
                ['Failure', 30],
                ['Success', 70],
            ],
            type: 'pie',
            colors: {
                'Failure': '#ff0000',
                'Success': '#85D663'
            },
            /*onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); }*/
        },
    });
}

drawPieChart();
