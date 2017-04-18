/**
 * Created by Michael Kovalsky on 4/11/2017.
 */

function displayGraph() {
    alert("Work in Progress");

    $('#results').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Twitter vs. User'
        },
        xAxis: {
            categories: ['Animals', 'Technology', 'Food', 'Politics', 'Entertainment', 'Sports', 'Other (Personal)']
        },
        yAxis: {
            title: {
                text: 'Percentages'
            }
        },
        series: [{
            name: 'Twitter Avg Percentages',
            data: [5, 18, 10, 12, 24, 23, 8]
        }, {
            name: 'User',
            data: [5, 7, 3, 7, 7, 7, 7]
        }]
    });

    //24726
        //5%    =   1236
        //18%   =   4450
        //10%   =   2472
        //12%   =   2967
        //24%   =   5934
        //23%   =   5687
        //8%    =   1978

}