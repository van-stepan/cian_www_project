<?php
	
	function getDB($username,
				   $password,
				   $hostname,
				   $port,
				   $dbname) {
		$conn_string = $conn_string = "host=" . $hostname . " port=" . $port . " dbname=" . $dbname . " user=" . $username . " password=" . $password;
    	$db = pg_connect($conn_string) or die('connection failed');
    	return $db;
	}
				   
	function getDefaultDB($db_type) {
		
		$db = null;
		
		if($db_type=="psql") {
			
				$username = "postgres";
				$password = "130130130";
				$hostname = "localhost";
				$port = "5432";
				$dbname = "cian";
				
				$conn_string = $conn_string = "host=" . $hostname . " port=" . $port . " dbname=" . $dbname . " user=" . $username . " password=" . $password;
		    	$db = pg_connect($conn_string) or die('connection failed');
		}
		else {
				
				$username = "u724790256_root";
				$password = "130130130";
				$hostname = "mysql.hostinger.ru";
				$dbname = "u724790256_main";
				
				$mysqli = new mysqli($hostname, $username, $password, $dbname);
				
				if ($mysqli->connect_error) {
					die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
				}
				
				$db = $mysqli;		
		}
		
    	return $db;
	}
				   
	function workInMYSQL() {
				
		$dbconn = getDefaultDB("mysql");
		
		$opcode = '';
		$params = '';
		if( isset($_POST['opcode']) )
		{
		     $opcode = $_POST['opcode'];
			 $params = $_POST['params'];
		}
		
		
		switch($opcode) {
			
			case 'get_stats_avg_pricem2':
				
				$query = "SELECT * FROM stats ";
				foreach($params as $param) {
				    $query = $query . " WHERE " . $param['name'] . " = '" . $param['value'] . "' ";
				}
				$query = $query . ";";
				
				
				$result = $dbconn->query($query);
				if (!$result) {
				  echo "An error occurred.\n";
				  exit;
				}
				
				$str = "";
				while ($row = $result->fetch_array(MYSQLI_NUM)) {
					
					$pricem2 = (int)$row[1];
					$str = $str . "$row[3], $pricem2\n";
					
					// for($i = 0; $i < count($row); $i++) {
				  		// $str = $str . "$row[$i]";
						// if($i != count($row) - 1) {
							// $str = $str . ", ";
						// }
						// else {
							// $str = $str . "\n";
						// }
					// }
					
					
				}
				
				echo $str;
			}
		
		}

		
?>


<?php

	// workInMYSQL();
	
	$dbconn = getDefaultDB("psql");
	
	$opcode = '';
	$params = '';
	if( isset($_POST['opcode']) )
	{
	     $opcode = $_POST['opcode'];
		 $params = $_POST['params'];
	}
	
	
	switch($opcode) {
		
		case 'get_stats_avg_pricem2':
			
			$query = "SELECT * FROM stats ";
			foreach($params as $param) {
			    $query = $query . " WHERE " . $param['name'] . " = '" . $param['value'] . "' ";
			}
			$query = $query . ";";
			
			
			$result = pg_query($dbconn, $query);
			
			if (!$result) {
			  echo "An error occurred.\n";
			  exit;
			}
			
			$str = "";
			while ($row = pg_fetch_row($result)) {
				
				$pricem2 = (int)$row[1];
				$str = $str . "$row[3], $pricem2\n";
				
			}
			
			echo $str;
	}
?>