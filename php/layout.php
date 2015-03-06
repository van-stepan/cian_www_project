<?php

	function getRoomListSelector($db_type) {
	
	    $db_type = "psql";
	    include_once 'php/data.php';
	    				
	    if($db_type == "psql") {
	    				
		    $dbhandler = getDefaultDB('psql');
		    $result = pg_query($dbhandler, "SELECT DISTINCT nrooms FROM stats ORDER BY nrooms;");
		    				
		    echo "<select id = 'nrooms_selector'>";
			while ($row = pg_fetch_row($result)) {
			    echo "<option value='$row[0]'>$row[0]</option>";
			}
			echo "</select>";
							
		}
		else {
							
			$dbhandler = getDefaultDB('mysql');
		    $result = $dbhandler->query("SELECT DISTINCT nrooms FROM stats ORDER BY nrooms;");
		    				
		    echo "<select id = 'nrooms_selector'>";
			while ($row = $result->fetch_array(MYSQLI_NUM)) {
			    echo "<option value='$row[0]'>$row[0]</option>";
			}
			echo "</select>";							
		}
	}
	
	
	function getRoomCheckBoxSelector($db_type) {
	
	    $db_type = "psql";
	    include_once 'php/data.php';
	    				
	    if($db_type == "psql") {
	    				
		    $dbhandler = getDefaultDB('psql');
		    $result = pg_query($dbhandler, "SELECT DISTINCT nrooms FROM stats ORDER BY nrooms;");
		    
			$flag = 0;
			while ($row = pg_fetch_row($result)) {
			    
				if($flag == 0) {
					$checked = 'checked';
					$flag = 1;
				}
				else {
					$checked = '';
				}
				
			    echo 
			    	 "<div class = 'checkbox_container'>
						<input type='checkbox' class = 'checkbox' $checked/>  
						<label>" . explode('.', $row[0])[0] . "</label>
					  </div>";
					  
				if($flag == 0) {
					$flag = 1;
				}
			}
							
		}
	}
?>