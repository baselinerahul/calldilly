<?php
    $db_connection = pg_connect("host=ec2-184-72-239-186.compute-1.amazonaws.com
 dbname=dfkcsq047ej0lu user=fzxqjsjlxieohl password=fbdfcaa97415b4062f460a6f3abda63d4bd1565766cdf382d536c4e66a67cf27");
     if($db_connection) {
		$create="CREATE TABLE IF NOT EXISTS users (
			id INT PRIMARY KEY NOT NULL, 
			username CHAR(30), 
			email TEXT, 
			phone CHAR(30), 
			password CHAR(30)
			)";

	// Execute query
		if (pg_query($db_connection,$create))  {
			echo "Table users created successfully. ";
		}
		else  {
			echo "Error creating table. ";
		}
	
	 $insert = "INSERT INTO users (username, email, phone, password) VALUE (test, 'test@gmail.com', 96768789, 'gfhvbgvhg')";
        # Execute query
        if (pg_query($db_connection,$insert)) {
            echo "Data entered successfully. ";
        }
        else {
            echo "Data entry unsuccessful. ";
        }
	
	
	
	
	   
	   
	   
    } else {
        echo 'there has been an error connecting';
    }


 
	
?>

