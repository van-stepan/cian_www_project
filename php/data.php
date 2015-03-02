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
				   
	function getDefaultDB() {
		
		$username = "postgres";
		$password = "130130130";
		$hostname = "localhost";
		$port = "5432";
		$dbname = "cian";
		
		$conn_string = $conn_string = "host=" . $hostname . " port=" . $port . " dbname=" . $dbname . " user=" . $username . " password=" . $password;
    	$db = pg_connect($conn_string) or die('connection failed');
    	return $db;
	}
				   
	
		
?>

<?php
	
	$username = "postgres";
	$password = "130130130";
	$hostname = "localhost";
	$port = "5432";
	$dbname = "cian";
	
	$dbconn = getDB($username,
				   $password,
				   $hostname,
				   $port,
				   $dbname);
	
	
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
				echo var_dump($param);
			    $query = $query . " WHERE " . $param['name'] . " = " . $param['value'];
			}
			
			$query = $query . ";";
			
			echo $query;
			
			$result = pg_query($dbconn, $query);
			
			if (!$result) {
			  echo "An error occurred.\n";
			  exit;
			}
			
			$str = "";
			while ($row = pg_fetch_row($result)) {
				
				$str = $str . "$row[3], $row[1]\n";
				
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
?>