<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Flat Price Dynamics</title>
        <link rel="stylesheet" href="css/base.css">
        
        <script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js' charset="utf-8"></script>
        <script src="http://code.highcharts.com/highcharts.js" charset="utf-8"></script>
		<script src="http://code.highcharts.com/modules/data.js" charset="utf-8"></script>
		<script src="http://code.highcharts.com/modules/exporting.js" charset="utf-8"></script>
		
		<!-- Additional files for the Highslide popup effect -->
		<script type="text/javascript" src="http://www.highcharts.com/media/com_demo/highslide-full.min.js" charset="utf-8"></script>
		<script type="text/javascript" src="http://www.highcharts.com/media/com_demo/highslide.config.js" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="http://www.highcharts.com/media/com_demo/highslide.css" />
		
		<!-- Own scripts -->
        <script type='text/javascript' src="js/plots.js" charset="utf-8"></script>
        <!-- <script type='text/javascript' src="js/data.js" charset="utf-8"></script> -->
        
    </head>
    
    <body>
    	<div id = "main_container">
    		<div id = "query_options">
    			
    			<?php
    			
    				include 'php/data.php';
    				
    				$dbhandler = getDefaultDB();
    				$result = pg_query($dbhandler, "SELECT DISTINCT nrooms FROM stats ORDER BY nrooms;");
    				
    				echo "<select id = 'nrooms_selector'>";
	    			while ($row = pg_fetch_row($result)) {
	    				echo "<option value='$row[0]'>$row[0]</option>";
					}
					echo "</select>";
				?>
    			
    		</div>
        	<div id = "plot_container"></div>
        </div>
    </body>
    
</html>
