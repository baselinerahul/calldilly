<?php
//$arr_data = json_decode(file_get_contents("php://input"));

//if(!empty($arr_data->username) && !empty($arr_data->email) && !empty($arr_data->phone) && !empty($arr_data->password)) {
	
/* 			$u_user = $arr_data->username;
			$u_email = $arr_data->email;
			$u_phone = $arr_data->phone;
			$u_pass = $arr_data->password; */

			// Define $username and $password
			$update_username= pg_escape_string('abcd');
			$update_email= pg_escape_string('abcd@mail.com');
			$update_pass= pg_escape_string('awer1234');
			$update_phone= pg_escape_string('9625874120');
			$update_otp= pg_escape_string('2545');
			$update_id= pg_escape_string('4');
			
			// Connecting, selecting database
			include 'config.php';	

		$sql = 'UPDATE users SET "username"= \''.$update_username.'\', "email"= \''.$update_email.'\', "phone"= \''.$update_pass.'\', "password"= \''.$update_phone.'\', "otp"= \''.$update_otp.'\' where users."Id" = \''.$update_id.'\'';
	
		$result_update = pg_query($sql) or die('Query failed: ' . pg_last_error());
			
		if($result_update)
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("Update successfully");'; 
			echo 'window.location.href = "https://calldilly.herokuapp.com/";';
			echo '</script>';
		}
		else
		{
			$message = "Update unsuccessful ";
		echo "<script type='text/javascript'>alert('$message');</script>";
		}
			
			// Free resultset
			pg_free_result($result);
			
			// Closing connection
			pg_close($connection);	
/* 		}	
// tell the user data is incomplete			
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to Process Request. Data is incomplete."));
} */			
?>
