function renewPlot() {
	
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
			
			try {
				
				$('#plot_container').highcharts({
		
			        title: {
			            text: 'Average M2 Price Dynamics in Moscow'
			        },
			
			        data: {
			            csv: csv
			        },
			        
			        plotOptions: {
			            series: {
			                marker: {
			                    enabled: true
			                },
			                title: {
			                	text: 'Price'
			                }
			            }
			        },
			        					
					yAxis: {
			            title: {
			                text: 'Price M2'
			            }
			        },
					
					xAxis: {
						title: {
			                text: 'Date'
			            }
					},
					
					legend: {
						title: {
							text: "Price Dynamics"
						}
					}
			        
				});
				
			}
			catch(e) {
				alert(e);
			}
		});
}


$(document).ready(function () {
	
	$("#nrooms_selector").change(function() {
		renewPlot();
	});
	
	$("#nrooms_selector").change(function() {
		renewPlot();
	});
		
	renewPlot();
});
	