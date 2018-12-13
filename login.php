<?php

	// Define $username and $password
	$username= pg_escape_string('abcd');
	$password= pg_escape_string('2345432456');

	// Connecting, selecting database
	include 'config.php';	

	// SQL query to fetch information of registerd users and finds user match.
	$query = 'Select * from users where users."username" = \''.$username.'\' and users."password" = \''.$password.'\'';

	$result = pg_query($query) or die('Query failed: ' . pg_last_error());

	$rows = pg_num_rows($result);
	if ($rows == 1) {
		echo 'Success';
	} 
	else {
		$error = "Username or Password is invalid";
	}
	// Free resultset
	pg_free_result($result);

	// Closing connection
	pg_close($connection);
?>
