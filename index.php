<?php
    $db_connection = pg_connect("host=ec2-184-72-239-186.compute-1.amazonaws.com
 dbname=dfkcsq047ej0lu user=fzxqjsjlxieohl password=fbdfcaa97415b4062f460a6f3abda63d4bd1565766cdf382d536c4e66a67cf27");
     if($db_connection) {
		$create="CREATE TABLE USERS(
			   ID INT PRIMARY KEY     NOT NULL,
			   USERNAME           TEXT    NOT NULL,
			   EMAIL           TEXT    NOT NULL,
			   PASSWORD        CHAR(50),
			   PHONE           CHAR(50),
			   OTP	  CHAR(50)
			)";

	 
		//if (pg_query($db_connection,$create))  {
			echo "Table users created successfully. ";
			$insert = "INSERT INTO USERS (ID,USERNAME,EMAIL,PASSWORD,PHONE) VALUES ('1','test', 'test@gmail.com', 'welcome123', '9755778678');
";
				# Execute query
				if (pg_query($db_connection,$insert)) {
				    echo "Data entered successfully. ";
				}
				else {
				    echo "Data entry unsuccessful. ";
					echo pg_last_error($db_connection);
				}
	
		/*}
		 else  {
			echo "Error creating table. ";
			  echo pg_last_error($db_connection);
		} */
	
	
	
	$select = "SELECT * FROM USERS";
	 $ret = pg_query($db_connection, $select);
	   if(!$ret) {
		  echo pg_last_error($db_connection);
		  exit;
	   } 
	   while($row = pg_fetch_row($ret)) {
		  echo "ID = ". $row[0] . "\n";
		  echo "NAME = ". $row[1] ."\n";
		  echo "ADDRESS = ". $row[2] ."\n";
		  echo "SALARY =  ".$row[4] ."\n\n";
	   }
	   echo "Operation done successfully\n";
	   pg_close($db_connection);

	
	
	
	   
	   
	   
    } else {
        echo 'there has been an error connecting';
    }


 
	
?>

