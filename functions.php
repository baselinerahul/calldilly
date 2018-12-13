<?php
/*     function database_connect() {
		$db_connection = pg_connect("host=ec2-184-72-239-186.compute-1.amazonaws.com
	 dbname=dfkcsq047ej0lu user=fzxqjsjlxieohl password=fbdfcaa97415b4062f460a6f3abda63d4bd1565766cdf382d536c4e66a67cf27");
		return $db_connection;
	} */
	
	function user_registeration($data){
		
/* 	$db_connection=database_connect();
	$insert = "INSERT INTO USERS (ID,USERNAME,EMAIL,PASSWORD,PHONE,OTP) VALUES (DEFAULT,'".$data['username']."', '".$data['email']."', '".$data['password']."', '".$data['phone']."','".$data['otp']."')";
		# Execute query
		if (pg_query($db_connection,$insert)) {
			echo "Data entered successfully. ";
		}
		else {
			echo "Data entry unsuccessful. ";
			echo pg_last_error($db_connection);
		} */
		
		// Define $username and $password
		$new_username= pg_escape_string('abcd');
		$new_email= pg_escape_string('abcd@mail.com');
		$new_pass= pg_escape_string('awer1234');
		$new_phone= pg_escape_string('2345432456');
		$new_otp= pg_escape_string('2545');
		
		// Connecting, selecting database
		include 'config.php';	

		$select = 'Select * from users where users."username" = \''.$new_username.'\'';
		
		$result = pg_query($select) or die('Query failed: ' . pg_last_error());
		
		if ($row = pg_num_rows($result) == 1)
		{	
			$message = "This Username is already exist ";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else {	
		// SQL query to fetch information of registerd users and finds user match.
		$sql = 'INSERT INTO users ("username", "email", "phone", "password", "otp") VALUES (\''.$new_username.'\',\''.$new_email.'\', \''.$new_pass.'\', \''.$new_phone.'\', \''.$new_otp.'\')';
		
		$result = pg_query($sql) or die('Query failed: ' . pg_last_error());

		if ($result)
		{	
			echo '<script type="text/javascript">'; 
			echo 'alert("Registration Successfully");'; 
			echo 'window.location.href = "https://calldilly.herokuapp.com/";';
			echo '</script>';	
		}
		}
		// Free resultset
		pg_free_result($result);
		
		// Closing connection
		pg_close($connection);		
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

