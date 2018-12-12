<?php
    $db_connection = pg_connect("host=ec2-184-72-239-186.compute-1.amazonaws.com
 dbname=dfkcsq047ej0lu user=fzxqjsjlxieohl password=fbdfcaa97415b4062f460a6f3abda63d4bd1565766cdf382d536c4e66a67cf27");
     if($db_connection) {
       echo 'connected';
    } else {
        echo 'there has been an error connecting';
    }
 $result = pg_query($db_connection, "SELECT * FROM users");	
	$data=pg_fetch_assoc($result);
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	
?>

