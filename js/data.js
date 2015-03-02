function requestCsvData(php_script, opcode) {
	
	var response = $.post(php_script, 
						  {
							opcode : opcode
						  })
						  
	.error( function() { alert("requestCsvData(): Error"); } )
	.success( function(data) {
		alert(data);
	});

	return null;
}



$(document).ready(function(){
	
	requestCsvData("php/data.php", "get_stats_avg_pricem2");
	
});
