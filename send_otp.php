<?php
error_reporting(E_ALL);
include 'config.php';
$data = json_decode(file_get_contents("php://input"));
if(!empty($data->id)){
	$userid = $data->id;
	$to = $data->phone; 
	/* $userid=1;
	$sid='AC877bfda2457808ef1730e26c927e08cd';
	$token='f172487eed89428a85a80f8799fe122c';
	$url = "https://api.twilio.com/2010-04-01/Accounts/".$sid."/Messages.json";
	$from = "+14388342203";
	//$to = "+919882756610"; 
	$n = 6; 
	$otp=generateNumericOTP($n);
	$body = "Your otp is: " .$otp."";
	$data = array (
			'From' => $from,
			'To' => $to,
			'Body' => $body,

		);
	$post = http_build_query($data);
	$x = curl_init($url );
	curl_setopt($x, CURLOPT_POST, true);
	curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($x, CURLOPT_USERPWD, "$sid:$token");
	curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($x, CURLOPT_POSTFIELDS, $post);
	var_dump($post);
	$y = json_decode(curl_exec($x));
	/* echo "<pre>";
	print_r($y);
	echo "<pre>"; */
	
	if (curl_error($x)) {
		 echo json_encode(array("message" => "error in sending otp","success"=>"0"));	
	}else{
		$d=date('Y-m-d h:i:s');
		 $sql = 'UPDATE users SET "otp"= \''.$otp.'\', "status"= \'inactive\', "expire"= \''.$d.'\' WHERE users."Id" = \''.$userid.'\'';
		
			$result = pg_query($sql) or die('Query failed: ' . pg_last_error());
				if ($result)
				{	
					echo json_encode(array("message" => "Otp Sent","success"=>"1"));		
				}
				pg_free_result($result);
				pg_close($connection);
		}

}
function generateNumericOTP($n) { 
    $generator = "1357902468";
    $result = "";
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
    return $result; 
} 
?>
