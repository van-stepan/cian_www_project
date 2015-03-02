// function dump(obj) {
    // var out = "";
    // if(obj && typeof(obj) == "object"){
        // for (var i in obj) {
            // out += i + ": " + obj[i] + "\n";
        // }
    // } else {
        // out = obj;
    // }
    // alert(out);
// }
// 
// 
// 
// function requestCsvData(php_script, opcode) {
// 	
	// var response = $.post(php_script, 
						  // {
							// opcode : opcode
						  // })
// 						  
	// .error( function() { alert("requestCsvData(): Error"); } );
// 	
	// return response;
// }


$(document).ready(function () {
	
	$.post('php/data.php', 
			{
				opcode: 'get_stats_avg_pricem2',
				params: 
				[
					{
						name: 'nrooms',
						value: $("#nrooms_selector :selected").text()
					}
				]
			})
	
	.success( function (csv) {
			
			alert(csv);
			
			try {
				
				$('#plot_container').highcharts({
		
			        title: {
			            text: 'My first High Plot'
			        },
			
			        data: {
			            csv: csv
			        },
			        
			        plotOptions: {
			            series: {
			                marker: {
			                    enabled: false
			                }
			            }
			        }
			
				});
				
			}
			catch(e) {
				alert(e);
			}
		});
	});

// 
// $(function () {
// 
    // // Get the CSV and create the chart
    // $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=analytics.csv&callback=?', function (csv) {
// 		
        // $('#plot_container').highcharts({
// 
            // data: {
                // csv: csv
            // },
// 
            // title: {
                // text: 'Average apartment price Dynamics in Moscow'
            // },
// 
            // subtitle: {
                // text: 'Source: Google Analytics'
            // },
// 
            // xAxis: {
                // tickInterval: 7 * 24 * 3600 * 1000, // one week
                // tickWidth: 0,
                // gridLineWidth: 1,
                // labels: {
                    // align: 'left',
                    // x: 3,
                    // y: -3
                // }
            // },
// 
            // yAxis: [{ // left y axis
                // title: {
                    // text: null
                // },
                // labels: {
                    // align: 'left',
                    // x: 3,
                    // y: 16,
                    // format: '{value:.,0f}'
                // },
                // showFirstLabel: false
            // }, { // right y axis
                // linkedTo: 0,
                // gridLineWidth: 0,
                // opposite: true,
                // title: {
                    // text: null
                // },
                // labels: {
                    // align: 'right',
                    // x: -3,
                    // y: 16,
                    // format: '{value:.,0f}'
                // },
                // showFirstLabel: false
            // }],
// 
            // legend: {
                // align: 'left',
                // verticalAlign: 'top',
                // y: 20,
                // floating: true,
                // borderWidth: 0
            // },
// 
            // tooltip: {
                // shared: true,
                // crosshairs: true
            // },
//             
            // series: [{
                // name: 'All visits',
                // lineWidth: 4,
                // marker: {
                    // radius: 4
                // }
            // }, {
                // name: 'New visitors'
            // }]
        // });
    // });
// 
// });
// 
