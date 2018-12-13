<?php
//include('functions.php');

$arr_data = json_decode(file_get_contents("php://input"));

	if(!empty($arr_data->username) && !empty($arr_data->email) && !empty($arr_data->phone) && !empty($arr_data->password)) {
		
				$u_user = $arr_data->username;
				$u_email = $arr_data->email;
				$u_phone = $arr_data->phone;
				$u_pass = $arr_data->password;
	
				// Define $username and $password
				$new_username= pg_escape_string($u_user);
				$new_email= pg_escape_string($u_email);
				$new_pass= pg_escape_string($u_phone);
				$new_phone= pg_escape_string($u_pass);
				$new_otp= pg_escape_string('2545');
				
				// Connecting, selecting database
				include 'config.php';	

				$select = 'Select * from users where users."username" = \''.$new_username.'\'';
				
				$result = pg_query($select) or die('Query failed: ' . pg_last_error());
				
				if ($row = pg_num_rows($result) == 1)
				{	
					//$message = "This Username is already exist ";
					//echo "<script type='text/javascript'>alert('$message');</script>";
					
					// tell the user
					echo json_encode(array("message" => "This Username is already exist."));
					
				}
				else {	
				// SQL query to fetch information of registerd users and finds user match.
				$sql = 'INSERT INTO users ("username", "email", "phone", "password", "otp") VALUES (\''.$new_username.'\',\''.$new_email.'\', \''.$new_pass.'\', \''.$new_phone.'\', \''.$new_otp.'\')';
				
				$result = pg_query($sql) or die('Query failed: ' . pg_last_error());

				if ($result)
				{	
				/* 	echo '<script type="text/javascript">'; 
					echo 'alert("Registration Successfully");'; 
					echo 'window.location.href = "https://calldilly.herokuapp.com/";';
					echo '</script>';	 */
					
					// tell the user
					echo json_encode(array("message" => "Registration Successfully"));					
				}
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
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}			

//echo $data=user_registeration($arr_data);

?>
