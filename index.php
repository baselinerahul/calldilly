<?php

include('functions.php');
$data=get_users();
 while($row = pg_fetch_row($data)) {
	 echo "<pre>";
	 print_r($row);
	  echo "<pre>";
		  echo "ID = ". $row[0] . "\n";
		  echo "NAME = ". $row[1] ."\n";
		  echo "ADDRESS = ". $row[2] ."\n";
		  echo "SALARY =  ".$row[4] ."\n\n";
	   }
$db_connection=database_connect();
	$select = "ALTER TABLE USERS  ALTER COLUMN ID TYPE  SERIAL";
	 $ret = pg_query($db_connection, $select);
	   if(!$ret) {
		  echo pg_last_error($db_connection);
		  exit;
	   }else{ 'edited';
	   
	   }
?>

