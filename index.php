<?php
    $db_connection = pg_connect("host=ec2-184-72-239-186.compute-1.amazonaws.com
 dbname=dfkcsq047ej0lu user=fzxqjsjlxieohl password=fbdfcaa97415b4062f460a6f3abda63d4bd1565766cdf382d536c4e66a67cf27");
     if($db_connection) {
		$create="CREATE TABLE COMPANY(
			   ID INT PRIMARY KEY     NOT NULL,
			   NAME           TEXT    NOT NULL,
			   AGE            INT     NOT NULL,
			   ADDRESS        CHAR(50),
			   SALARY         REAL,
			   JOIN_DATE	  DATE
			)";

	// Execute query
		if (pg_query($db_connection,$create))  {
			echo "Table users created successfully. ";
			$insert = "INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY,JOIN_DATE) VALUES (1, 'Paul', 32, 'California', 20000.00,'2001-07-13');
";
				# Execute query
				if (pg_query($db_connection,$insert)) {
				    echo "Data entered successfully. ";
				}
				else {
				    echo "Data entry unsuccessful. ";
				}
	
		}
		else  {
			echo "Error creating table. ";
		}
	
	 
	
	
	
	   
	   
	   
    } else {
        echo 'there has been an error connecting';
    }


 
	
?>

