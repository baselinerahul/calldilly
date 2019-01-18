<?php
$data = json_decode(file_get_contents("php://input"));
if(!empty($data->id)){
	
	$to = $data->to; 
	$body = $data->body; 

$sid='AC877bfda2457808ef1730e26c927e08cd';
	$token='f172487eed89428a85a80f8799fe122c';
	$url = "https://api.twilio.com/2010-04-01/Accounts/".$sid."/Messages.json";
	$from = "+14388342203";
	
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
	echo $y = json_decode(curl_exec($x));
}else{
 echo $y = json_decode('error');
}
?>
