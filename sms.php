<?php
$data = json_decode(file_get_contents("php://input"));
//print_r($data);
if(!empty($data)){
	
	$to = $data->to; 
	$body = $data->body; 

        $sid=' ';
	$token=' ';
	$url = "https://api.twilio.com/2010-04-01/Accounts/".$sid."/Messages.json";
	$from = "+17067057493";
	
	$data1 = array (
			'From' => $from,
			'To' => $to,
			'Body' => $body,

		);
	$post = http_build_query($data1);
	$x = curl_init($url );
	curl_setopt($x, CURLOPT_POST, true);
	curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($x, CURLOPT_USERPWD, "$sid:$token");
	curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($x, CURLOPT_POSTFIELDS, $post);
	$y = curl_exec($x);
	print_r($y);
}else{
 echo $y = json_decode('error');
}
?>
