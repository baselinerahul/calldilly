<?php

//$login_data = json_decode(file_get_contents("php://input"));

//if(!empty($login_data->username) && !empty($login_data->password)) {
	
	$log_user = $login_data->username;
	$log_pass = $login_data->password;

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
		
		$log_query = 'SELECT * from users where users."username" = \''.$username.'\'';
		$log_result = pg_query($log_query) or die('Query failed: ' . pg_last_error());

		while ($row = pg_fetch_array($log_result)) {
			//print_r ($row);
			echo $row['username'];
			echo $row['email'];
			echo $row['phone'];
			echo $row['password'];
			echo $row['otp'];
			echo $row['Id'];
		}	
		echo json_encode(array("message" => "Login Successfully","success"=>"1","username"=>"$row['username']","email"=>"$row['email']","phone"=>"$row['phone']","password"=>"$row['password']","otp"=>"$row['otp']","Id"=>"$row['Id']"));
	} 
	else {
		$error = "Username or Password is invalid";
		echo json_encode(array("message" => "Username or Password is invalid","success"=>"0"));
	}
	// Free resultset
	pg_free_result($result);

	// Closing connection
	pg_close($connection);
//		}	
// tell the user data is incomplete			
/* else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to Process Request. Data is incomplete."));
} */	
?>
