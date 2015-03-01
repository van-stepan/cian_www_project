function requestCsvData(php_script) {
	
	var response = $.post(php_script)
	
	.error( function() { alert("requestCsvData(): Error"); } )
	
	.success( function(data) { 
			alert("requestCsvData(): Successful execution"); 
			alert(data);
		} );
	
	return response;

}

$(document).ready(function(){
	
	alert( requestCsvData("php/data.php") );
	
});
