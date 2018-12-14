<?php
$arr_data = json_decode(file_get_contents("php://input"));

if(!empty($arr_data->username) && !empty($arr_data->email) && !empty($arr_data->phone) && !empty($arr_data->password) && !empty($arr_data->Id)) {
	
 			$up_user = $arr_data->username;
			$up_email = $arr_data->email;
			$up_phone = $arr_data->phone;
			$up_pass = $arr_data->password;
			$up_id = $arr_data->Id;

			// Define $username and $password
			$update_username= pg_escape_string($up_user);
			$update_email= pg_escape_string($up_email);
			$update_pass= pg_escape_string($up_phone);
			$update_phone= pg_escape_string($up_pass);
			//$update_otp= pg_escape_string('2545');
			$update_id= pg_escape_string($up_id);
			
			// Connecting, selecting database
			include 'config.php';	

		$sql = 'UPDATE users SET "username"= \''.$update_username.'\', "email"= \''.$update_email.'\', "phone"= \''.$update_pass.'\', "password"= \''.$update_phone.'\' where users."Id" = \''.$update_id.'\'';
	
		$result_update = pg_query($sql) or die('Query failed: ' . pg_last_error());
			
		if($result_update)
		{
		$log_query = 'SELECT * from users where users."Id" = \''.$update_id.'\'';
		$log_result = pg_query($log_query) or die('Query failed: ' . pg_last_error());

		while ($row = pg_fetch_array($log_result)) {
			//print_r ($row);
			$u_username = $row['username'];
			$u_email = $row['email'];
			$u_phone = $row['phone'];
			$u_pass = $row['password'];
			$u_otp = $row['otp'];
			$u_id = $row['Id'];
		}	
		echo json_encode(array("message" => "Update Successfully","success"=>"1","username"=>"$u_username","email"=>"$u_email","phone"=>"$u_phone","password"=>"$u_pass","otp"=>"$u_otp","Id"=>"$u_id"));			
			
		}
		else
		{
			echo json_encode(array("message" => "Update Unsuccessfully","success"=>"0"));
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
