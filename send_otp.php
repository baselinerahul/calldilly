<?php
error_reporting(E_ALL);
include 'config.php';
//$data = json_decode(file_get_contents("php://input"));

	//$to = $data->id;
	//$to = $data->phone;
	$userid=1;
	$to = '+919882756610';
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
	echo "<pre>";
	print_r($y);
	echo "<pre>";
	echo json_encode(array("message" => "error in sending otp","success"=>"0"));	
	


function generateNumericOTP($n) { 
    $generator = "1357902468";
    $result = "";
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
    return $result; 
} 
?>
