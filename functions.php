<?php
    
	function database_connect() {
		$db_connection = pg_connect("host=ec2-184-72-239-186.compute-1.amazonaws.com
	 dbname=dfkcsq047ej0lu user=fzxqjsjlxieohl password=fbdfcaa97415b4062f460a6f3abda63d4bd1565766cdf382d536c4e66a67cf27");
		if($db_connection){
			return 'connected';
		}else{
			return 'not';
		}
	}
	function user_registeration($data){
		$db_connection=database_connect();
	$insert = "INSERT INTO USERS (ID,USERNAME,EMAIL,PASSWORD,PHONE) VALUES ('".$data['id']."','".$data['username']."', '".$data['email']."', '".$data['password']."', '".$data['phone']."')";
		# Execute query
		if (pg_query($db_connection,$insert)) {
			echo "Data entered successfully. ";
		}
		else {
			echo "Data entry unsuccessful. ";
			echo pg_last_error($db_connection);
		}
	
		
	}
	function get_users(){
		$db_connection=database_connect();
	$select = "SELECT * FROM USERS";
	 $ret = pg_query($db_connection, $select);
	   if(!$ret) {
		  echo pg_last_error($db_connection);
		  exit;
	   } 
	  
	   return $ret;
	   

	}
	
	
	   
	   
	


 
	
?>

