function display() {
   // Create the chart
  $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ' Global Twitter Trends by Category'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Percentage of tweets in each category'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: 'Tweet Categories',
            colorByPoint: true,
            data: [{
                name: 'Entertainment',
                y: 24,
                drilldown: 'Entertainment'
            }, {
                name: 'Sports',
                y: 23,
                drilldown: 'Sports'
            }, {
                name: 'Technology',
                y: 18,
                drilldown: 'Technology'
            }, {
                name: 'Politics',
                y: 12,
                drilldown: 'Politics'
            }, {
                name: 'Food',
                y: 10,
                drilldown: 'Food'
            }, {
                name: 'Personal',
                y: 8,
                drilldown: 'Personal (Other)'
            }, {
                name: 'Animals',
                y: 5,
                drilldown: 'Animals'
            }]
        }],
        drilldown: {

        }
    });
}