<?php

$login_data = json_decode(file_get_contents("php://input"));

if(!empty($login_data->username) && !empty($login_data->password)) {
	
	$log_user = $login_data->username;
	$log_pass = $login_data->password;

	// Define $username and $password
	$username= pg_escape_string($log_user);
	$password= pg_escape_string($log_pass);

	// Connecting, selecting database
	include 'config.php';	

	// SQL query to fetch information of registerd users and finds user match.
	$query = 'Select * from users where users."username" = \''.$username.'\' and users."password" = \''.$password.'\'';

	$result = pg_query($query) or die('Query failed: ' . pg_last_error());

	$rows = pg_num_rows($result);
	if ($rows == 1) {
		echo json_encode(array("message" => "Login Successfully","success"=>"1"));
	} 
	else {
		$error = "Username or Password is invalid";
		echo json_encode(array("message" => "Username or Password is invalid","success"=>"0"));
	}
	// Free resultset
	pg_free_result($result);

	// Closing connection
	pg_close($connection);
		}	
// tell the user data is incomplete			
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to Process Request. Data is incomplete."));
}	
?>
