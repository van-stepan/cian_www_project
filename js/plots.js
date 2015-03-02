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
}


$(document).ready(function () {
	
	$("#nrooms_selector").change(function() {
		renewPlot();
	});
		
	renewPlot();
});
	