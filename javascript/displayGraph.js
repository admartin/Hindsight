/**
 * Created by Michael Kovalsky on 4/11/2017.
 */

function displayGraph() {


    var finalResult = [0, 0, 0, 0, 0, 0, 0];
    var result = null;
    var table = null;

    $.when(
        $.get("../php/displayGraph.php",
            function (data) {
                console.log("Data" + data);
                result = JSON.parse(data);
            }
        ),
        $.get("../php/displayTweetsTable.php",
            function (data) {
                console.log(data);
                table = data;
            }
        )
    ).then(function () {



        for(var i = 0; i < result.length; i++) {
            finalResult[determineIndexToChange(result[i][0].type)] = parseInt(result[i][0].count);
        }

        console.log('Final Result' + finalResult);
        // $('#results').highcharts({
        //     chart: {
        //         type: 'bar'
        //     },
        //     title: {
        //         text: 'Twitter vs. User'
        //     },
        //     xAxis: {
        //         categories: ['Animals', 'Technology', 'Food', 'Politics', 'Entertainment', 'Sports', 'Other (Personal)']
        //     },
        //     yAxis: {
        //         title: {
        //             text: 'Percentages'
        //         }
        //     },
        //     series: [{
        //         name: 'Twitter Avg Percentages',
        //         data: [5, 18, 10, 12, 24, 23, 8]
        //     }, {
        //         name: 'User',
        //         data: finalResult
        //     }]
        // });

        $('#results').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: "User Specific Tweets"
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Categories',
                colorByPoint: true,
                data: [{
                    name: 'Animals',
                    y: finalResult[0]
                }, {
                    name: 'Technology',
                    y: finalResult[1]
                }, {
                    name: 'Food',
                    y: finalResult[2]
                }, {
                    name: 'Politics',
                    y: finalResult[3]
                }, {
                    name: 'Entertainment',
                    y: finalResult[4]
                }, {
                    name: 'Sports',
                    y: finalResult[5]
                }, {
                    name: 'Other/Personal',
                    y: finalResult[6]
                }
                ]
            }]
        });

        $("#resultsArea").html(table);
        $("#sidebar").hide();

    });




    //24726
        //5%    =   1236
        //18%   =   4450
        //10%   =   2472
        //12%   =   2967
        //24%   =   5934
        //23%   =   5687
        //8%    =   1978

    //$("#sidebar").hide();
}


/*
*
* +------------+---------------+
 | idCategory | type          |
 +------------+---------------+
 |          5 | Animals       |
 |          3 | Entertainment |
 |          7 | Food          |
 |          6 | Other         |
 |          2 | Politics      |
 |          1 | Sports        |
 |          4 | Technology    |
 +------------+---------------+
                0              1          2         3           4               5           6
 categories: ['Animals', 'Technology', 'Food', 'Politics', 'Entertainment', 'Sports', 'Other (Personal)']
* */

function determineIndexToChange(type) {

    var index = 0;

    switch(type) {

        case 'Entertainment':
            index = 4;
            break;
        case 'Animals':
            index = 0;
            break;
        case 'Food':
            index = 2;
            break;
        case 'Other':
            index = 6;
            break;
        case 'Politics':
            index = 3;
            break;
        case 'Technology':
            index = 1;
            break;
        case 'Sports':
            index = 5;
            break;
    }

    return index;

}
